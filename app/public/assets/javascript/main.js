let mobile = document.querySelector('.mobile');
let menu = document.querySelector('.wrap-menu');
let close = document.querySelector('.close');

mobile.onclick = function () {
    menu.style.display = 'block';
}

close.onclick = function () {
    menu.style.display = 'none';
}

document.addEventListener("DOMContentLoaded", () => {

    async function loadAnimals() {
        try {
            const response = await fetch("/api/appointments/animals");
            if (!response.ok) throw new Error("Failed to fetch animals");

            const animals = await response.json();
            const petSelect = document.getElementById("pet-select");

            petSelect.innerHTML = ""; // Очистить старые опции
            animals.forEach((animal) => {
                const option = document.createElement("option");
                option.value = animal.id;
                option.textContent = animal.name;
                petSelect.appendChild(option);
            });
        } catch (error) {
            console.error("Error loading animals:", error);
            alert("Failed to load user animals. Please try again later.");
        }
    }


    async function submitAppointment(event) {
        event.preventDefault();

        const petId = document.getElementById("pet-select").value;
        const description = document.getElementById("description").value;
        const date = document.getElementById("date").value;
        const doctorId = document.getElementById("doctor-id").value;

        if (!petId || !description || !date || !doctorId) {
            alert("All fields are required!");
            return;
        }

        const appointmentData = { pet_id: petId, description, date, doctor_id: doctorId };

        try {
            const response = await fetch("/api/appointments", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(appointmentData),
            });

            if (!response.ok) throw new Error("Failed to create appointment");
            alert("Appointment created successfully");
            document.getElementById("appointment-form").reset();
        } catch (error) {
            console.error("Error creating appointment:", error);
            alert("Failed to create appointment. Please try again later.");
        }
    }

    loadAnimals();
    document.getElementById("appointment-form").addEventListener("submit", submitAppointment);
});

