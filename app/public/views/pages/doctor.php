<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinary Clinic | Main pages</title>
    <link rel="stylesheet" href="/assets/css/media.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
</head>

<body>
<div class="wrapper">
    <?php include('views/partials/header.php')?>
    <main class="container">
        <div class="account">
            <h2>Doctor list</h2>
            <?php foreach ($doctors as $doctor):?>
                <div class="account-application">
                    <div class="account__header">
                        <h2><?= $doctor['name']?></h2>

                        <ul>
                            <?php foreach ($doctor['services'] as $service): ?>
                                <li><?= $service['name']?></li>
                            <?php endforeach;?>
                        </ul>
                    </div>

                    <button class="btn"><a target="_blank" href="add-appointment?id=<?= $doctor['id']?>">make an appointment</a></button>
                </div>
            <?php endforeach;?>
        </div>
    </main>
    <?php include('views/partials/footer.php')?>
</div>
<!-- Swiper JS -->
<script src="../script/menu.js"></script>
</body>
</html>