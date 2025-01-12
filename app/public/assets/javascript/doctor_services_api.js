async function fetchServices() {
    try {
        const response = await fetch('/api/doctor_services',
            {
                method: 'GET',
                headers: new Headers({
                    'Content-Type': 'application/json'
                })
            })
       const servicesContainer = document.getElementById('services')
        for (const service of await response.json()) {
            const container = document.createElement('div')
            container.className = 'form-add'
            const nameInput = document.createElement('input')
            nameInput.setAttribute('type', 'text')
            nameInput.setAttribute('placeholder', 'Name_services')
            nameInput.setAttribute('name', 'service_name')
            nameInput.setAttribute('value', service.name)
            container.appendChild(nameInput)
            const submitButton = document.createElement('button')
            submitButton.innerText = 'Update service'
            submitButton.setAttribute('type', 'submit')
            submitButton.addEventListener('click', async function() {
                const updateResponse = await fetch('/api/doctor_services', {
                    method: 'PATCH',
                    body: JSON.stringify({ service_name: nameInput.value.trim(), service_id: service.id }),
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    })
                })
                const responseJson = await updateResponse.json()
                console.log(responseJson)
                nameInput.setAttribute('name',responseJson[0].name)
            })
            container.appendChild(submitButton)
            servicesContainer.appendChild(container)
        }
    } catch (e) {
        console.error(e)
    }
}

fetchServices();