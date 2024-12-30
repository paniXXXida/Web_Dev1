<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinary Clinic | Main pages</title>
    <link rel="stylesheet" href="/assets/css/media.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
<div class="wrapper">
    <?php include('views/partials/header.php')?>
    <main class="container">
        <div class="account">
            <h2>My appointments</h2>
            <?php foreach ($appointments as $appointment):?>
                <div class="account-application">
                    <h2>Talon №<?= $appointment['id']?></h2>
                    <p><b>Type of animal: </b><?= $appointment['type']?></p>
                    <p><b>Date: </b><?= $appointment['date']?></p>

                    <div class="comentar">
                        <h3>Problems: </h3>
                        <p><?= $appointment['description']?></p>
                    </div>
                    <button class="btn" id="delete" onclick="deleteAppointmentById(<?= $appointment['id'] ?>)">Delete</button>
                </div>
            <?php endforeach;?>
        </div>
    </main>
    <?php include('views/partials/footer.php')?>
</div>
<script src="../script/main.js"></script>
<!-- Swiper JS -->
<script src="../script/menu.js"></script>
</body>
</html>