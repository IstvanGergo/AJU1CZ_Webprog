document.body.addEventListener('load', function () {
    generateWorkerBoxes();
});

function generateWorkerBoxes() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'mindenmunkas.php');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 ) {
            const workers = JSON.parse(xhr.responseText);
            const container = document.getElementById('workers-container');
            container.innerHTML = '';

            workers.forEach(function (worker) {
                const box = document.createElement('div');
                box.classList.add('worker-box');
                const nameElement = document.createElement('h3');
                nameElement.textContent = worker.Handyman_Name;
                box.appendChild(nameElement);

                const professionsElement = document.createElement('p');
                professionsElement.textContent = 'Szakmák: ' + worker.Profession_Name.join(', ');
                box.appendChild(professionsElement);

                const citiesElement = document.createElement('p');
                citiesElement.textContent = 'Elérhető városok: ' + worker.City_Name.join(', ');
                box.appendChild(citiesElement);

                container.appendChild(box); // A munkás doboz hozzáadása a tartalomhoz
            });
        }
    };
    xhr.send();
}