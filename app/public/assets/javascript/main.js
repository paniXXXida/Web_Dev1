function deleteAppointmentById(id) {
    if (!confirm('Are you sure to delete appointment with ID ' + id + '?')) {
        return;
    }

    fetch('/api/account', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'id=' + encodeURIComponent(id),
    })
        .then(response => response.text())
        .then(res => {
            alert("Appointment was deleted!");
            location.reload();
        })
        .catch(err => {
            console.error(err);
            alert("Failed to delete appointment. Please try again later.");
        });
}
