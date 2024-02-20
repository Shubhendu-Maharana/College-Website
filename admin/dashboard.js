$(document).ready(function () {
    $("#staff").on("submit", ".add-staff-box .form form", function (e) {
        e.preventDefault();
        let form = this;
        $.ajax({
            type: "POST",
            url: "../server/staff_store.php",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (response) {
                alert(response);
                $(form).trigger("reset");
                off();
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    tab(event, 'dashboard');
    document.getElementById("first").className += " active";
});
function tab(evt, ele) {
    let i, tabcontent, tablink;

    tabcontent = document.getElementsByClassName("tab-content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    tablink = document.getElementsByClassName("link");
    for (i = 0; i < tablink.length; i++) {
        tablink[i].className = tablink[i].className.replace(" active", "");
    }

    document.getElementById(ele).style.display = "flex";
    evt.currentTarget.className += " active";
}

// Function for logging user out
function logout() {
    if(confirm("Are you sure to log out?")) {
        window.location.href = '../server/logout.php';
    }
}


// Fetch random quotes from API
const QUOTE_API_KEY = "G8/EdhF5/GIMEWNNVxHsiQ==Odcm3dYvsLplipaT";
const QUOTE_API_URL = "https://api.api-ninjas.com/v1/quotes?category=inspirational";
const quote = document.getElementById("quote");
const author = document.getElementById("author");

// fetch(QUOTE_API_URL, {
//     headers: { 'X-Api-Key': QUOTE_API_KEY }
// })
//     .then(res => res.json())
//     .then(data => {
//         quote.innerText = data[0].quote;
//         author.innerText = data[0].author;
//     })
//     .catch(error => {
//         console.error(error);
//     })

// Fetch random quotes from local json
fetch("quotes.json")
    .then(res => res.json())
    .then(data => {
        let min = 0, max = data.quotes.length - 1;
        let random = parseInt(Math.random() * (max - min) + min);
        quote.innerText = data.quotes[random].quote;
        author.innerText = data.quotes[random].author;
    })


// Function to convert date into day name
function getDayName(date = new Date(), locale = 'en-US') {
    return date.toLocaleDateString(locale, { weekday: 'long' });
}

// Fetch weather
const city = "Berhampur";
const WEATHER_API_KEY = "12ff0dc2354044f397f112153241801";
const WEATHER_API_URL = `http://api.weatherapi.com/v1/forecast.json?key=${WEATHER_API_KEY}&q=${city}&days=5&aqi=no`;
const currentWeather = document.getElementById("currentWeather");
const forecast = document.getElementById("forecast");
const days = document.getElementsByClassName("day-wise");

fetch(WEATHER_API_URL)
    .then(res => res.json())
    .then(data => {
        currentWeather.innerHTML = `
        <div class="info">
            <h3>Today</h3>
            <h3>${data.current.condition.text}</h3>
            <h3>Temp: ${data.current.temp_c}</h3>
            <p>Humidity: ${data.current.humidity}</p>
            <p>Visibility: ${data.current.vis_km} km</p>
        </div>
        <img src="https:${data.current.condition.icon}" alt="">
        `
        data.forecast.forecastday.forEach((element, index) => {
            if (index == 0) return;
            forecast.innerHTML += `
            <div class="day-wise">
                <h3>${getDayName(new Date(data.forecast.forecastday[index].date))}</h3>
                <h3>${data.forecast.forecastday[index].day.avgtemp_c}</h3>
                <h3>${data.forecast.forecastday[index].day.condition.text}</h3>
                <img src="https:${data.forecast.forecastday[index].day.condition.icon}" alt="">
            </div>
            `
        });
    })
    .catch(error => {
        console.error(error);
    })


// Getting current date
const date = document.getElementById("date");
const time = document.getElementById("time");
const greeting = document.getElementById("greeting");

function getCurrentDateFormatted() {
    const months = [
        "Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
    ];

    const currentDate = new Date();
    const day = currentDate.getDate();
    const month = months[currentDate.getMonth()];
    const year = currentDate.getFullYear();

    // Add ordinal suffix to the day
    const ordinalSuffix = (day) => {
        if (day >= 11 && day <= 13) {
            return `${day}th`;
        }
        switch (day % 10) {
            case 1: return `${day}st`;
            case 2: return `${day}nd`;
            case 3: return `${day}rd`;
            default: return `${day}th`;
        }
    };

    const formattedDate = `${ordinalSuffix(day)} ${month} ${year}`;
    date.innerHTML = `<h3>${formattedDate}</h3>`;
}

function getCurrentTimeFormatted() {
    const currentDate = new Date();
    let hours = currentDate.getHours();
    let minutes = currentDate.getMinutes();
    const ampm = hours >= 12 ? 'PM' : 'AM';

    hours = hours % 12;
    hours = hours ? hours : 12; // Handle midnight (0 hours)

    minutes = minutes < 10 ? `0${minutes}` : minutes;

    const formattedTime = `${hours}:${minutes} ${ampm}`;
    time.innerHTML = `<h2>${formattedTime}</h2>`;
}

function getGreeting() {
    const currentDate = new Date();
    const currentHour = currentDate.getHours();

    if (currentHour >= 5 && currentHour < 12) {
        greeting.innerText = "Good Morning";
    } else if (currentHour >= 12 && currentHour < 17) {
        greeting.innerText = "Good Afternoon";
    } else if (currentHour >= 17 && currentHour < 20) {
        greeting.innerText = "Good Evening";
    } else {
        greeting.innerText = "Good Night";
    }
}

setInterval(getCurrentTimeFormatted, 2000);
setInterval(getCurrentDateFormatted, 2000);
getGreeting();
