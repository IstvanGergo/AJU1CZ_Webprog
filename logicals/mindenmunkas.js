document.addEventListener('DOMContentLoaded', function () {
    generateWorkerBoxes();
});

function generateWorkerBoxes() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'logicals/mindenmunkas.php');
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
                professionsElement.textContent = 'Szakmák: ' + worker.Professions.join(', ');
                box.appendChild(professionsElement);

                const citiesElement = document.createElement('p');
                citiesElement.textContent = 'Elérhető városok: ' + worker.Cities.join(', ');
                box.appendChild(citiesElement);
                
                const phoneNumElement = document.createElement('p');
                phoneNumElement.textContent = 'Telefonszám: ' + worker.Handyman_Phonenum;
                box.appendChild(phoneNumElement);
                container.appendChild(box); // A munkás doboz hozzáadása a tartalomhoz
            });
        }
    };
    xhr.send();
}