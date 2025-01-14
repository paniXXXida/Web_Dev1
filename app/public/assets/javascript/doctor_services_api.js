async function fetchServices() {
    try {
        const response = await fetch('/api/doctor_services', {
            method: 'GET',
            headers: new Headers({
                'Content-Type': 'application/json'
            })
        });

        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        const servicesContainer = document.getElementById('services');

        const services = await response.json();

        for (const service of services) {
            const form = document.createElement('form');
            form.className = 'form-add';

            const nameInput = document.createElement('input');
            nameInput.setAttribute('type', 'text');
            nameInput.setAttribute('placeholder', 'Name_services');
            nameInput.setAttribute('name', 'service_name');
            nameInput.setAttribute('value', service.name);
            form.appendChild(nameInput);

            const submitButton = document.createElement('button');
            submitButton.innerText = 'Update service';
            submitButton.setAttribute('type', 'submit');
            submitButton.classList.add('btn'); // Добавляем класс btn
            form.appendChild(submitButton);

            form.addEventListener('submit', async function(event) {
                event.preventDefault();
                try {
                    const updateResponse = await fetch('/api/doctor_services', {
                        method: 'PATCH',
                        body: JSON.stringify({ service_name: nameInput.value.trim(), service_id: service.id }),
                        headers: new Headers({
                            'Content-Type': 'application/json'
                        })
                    });

                    if (!updateResponse.ok) {
                        throw new Error('Network response was not ok');
                    }

                    const responseJson = await updateResponse.json();
                    console.log(responseJson);

                    if (responseJson.length > 0) {
                        nameInput.value = responseJson[0].name;
                        alert('Service updated successfully!');
                    }
                } catch (error) {
                    console.error('There was a problem with the update operation:', error);
                    alert('Failed to update service.');
                }
            });

            servicesContainer.appendChild(form);
        }
    } catch (e) {
        console.error(e);
        alert('Failed to load services.');
    }
}

fetchServices();
