fetch('/college-site/server/staff_fetch.php')
    .then(res => {
        return res.json();
    })
    .then(data => {
        const container = document.getElementById('bca-container');

        if (data <= 0) {
            container.innerHTML = `
                <h1 style="color: white;">No information is available</h1>
            `;
            return;
        }

        data.forEach(element => {
            const card = document.createElement('div');
            card.className = 'card';

            const info = document.createElement('div');
            info.className = 'info';

            info.innerHTML = `
                <p>Name: ${element.name}</p>
                <p>Age: ${element.age}</p>
                <p>Qualification: ${element.expertise}</p>
            `;
            container.appendChild(card);
            card.appendChild(info);
        })
    })
    .catch(error => console.error('Error fetching data: ', error));