document.addEventListener('DOMContentLoaded', function () {

    const deleteButtons = document.querySelectorAll('.delete-appointment');
    deleteButtons.forEach((btn) => {
        btn.addEventListener('click', function (e) {
            e.preventDefault(); // Предотвращаем возможное действие по умолчанию

            const appointmentId = btn.dataset.id; // Получаем ID из data-атрибута

            if (!appointmentId) {
                alert('Appointment ID not found.');
                return;
            }


            if (!confirm(`Are you sure you want to delete appointment #${appointmentId}?`)) {
                return;
            }


            const payload = {
                id: appointmentId
            };


            fetch('/api/appointments/delete', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(payload)
            })
                .then((res) => {
                    if (!res.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return res.json();
                })
                .then((data) => {
                    if (data.success) {
                        alert(`Appointment #${appointmentId} deleted!`);

                        const elem = document.getElementById(`appointment-${appointmentId}`);
                        if (elem) {
                            elem.remove();
                        }
                    } else {
                        alert(`Failed to delete appointment #${appointmentId}. Error: ${data.error}`);
                    }
                })
                .catch((err) => {
                    console.error('Error:', err);
                    alert('Something went wrong. Please try again.');
                });
        });
    });
});
