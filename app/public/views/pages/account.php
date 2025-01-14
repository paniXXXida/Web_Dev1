<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Veterinary Clinic | My Appointments</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/media.css">
</head>
<body>
<div class="wrapper">
    <?php include('views/partials/header.php'); ?>
    <main class="container">
        <div class="account">
            <h2>My appointments</h2>

            <?php if (!empty($appointments)): ?>
                <?php foreach ($appointments as $appointment): ?>
                    <div class="account-application" id="appointment-<?= htmlspecialchars($appointment['id']) ?>">
                        <h2>Talon №<?= htmlspecialchars($appointment['id']) ?></h2>
                        <p><b>Type of animal: </b><?= htmlspecialchars($appointment['type']) ?></p>
                        <p><b>Date: </b><?= htmlspecialchars($appointment['date']) ?></p>
                        <div class="comentar">
                            <h3>Problems: </h3>
                            <p><?= htmlspecialchars($appointment['description']) ?></p>
                        </div>
                        <!-- Обновлённая кнопка Delete -->
                        <button class="btn delete-appointment" data-id="<?= htmlspecialchars($appointment['id']) ?>">Delete</button>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No appointments yet.</p>
            <?php endif; ?>
        </div>
    </main>
    <?php include('views/partials/footer.php'); ?>
</div>
<!-- Подключаем JavaScript-файл для удаления -->
<script src="/assets/javascript/delete_appointment_API.js"></script>
</body>
</html>
