<!-- views/pages/edit_appointment.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Veterinary Clinic | Edit Appointment</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/media.css">
</head>

<body>
<div class="wrapper">
    <?php include('views/partials/header.php'); ?>
    <!-- content -->
    <main class="container">
        <div class="account">
            <h2>Edit Appointment</h2>
            <?php if (!empty($id) && !empty($date)): ?>
                <form action="/edit_appointment" method="post">
                    <p>Edit Date:</p>
                    <input type="date" name="date" value="<?= htmlspecialchars($date) ?>" required>
                    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
                    <button type="submit" class="btn">Edit</button>
                </form>
            <?php else: ?>
                <p>Invalid appointment data.</p>
            <?php endif; ?>
        </div>
    </main>
    <?php include('views/partials/footer.php'); ?>
</div>
<!-- Подключаем JavaScript-файл для меню -->
<script src="/assets/javascript/menu.js"></script>
</body>
</html>
