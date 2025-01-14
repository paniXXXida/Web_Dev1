<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinary Clinic | Main pages</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/media.css">
</head>

<body>
<div class="wrapper">
    <?php include('views/partials/header.php')?>
    <main class="container">
        <div class="account">
            <h2>My clients</h2>

            <?php foreach ($clients as $client):?>
                <div class="account-application">
                    <div class="account-application__info">
                        <h2>Talon №<?= $client['id'] ?></h2>
                        <button class="btn"><a target="_blank" href="/edit_appointment?id=<?= $client['id']?>">Edit</a></button>
                    </div>
                    <div class="account-application__info">
                        <p><b>Name: </b><?= $client['name'] ?></p>
                        <p><b>Type of animal: </b><?= $client['type'] ?></p>
                    </div>

                    <p><b>Phone: </b><?= $client['phone'] ?></p>

                    <p><b>Time: </b><?= $client['date'] ?></p>

                    <div class="comentar">
                        <h3>Problems: </h3>
                        <p><?= $client['description'] ?></p>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </main>
    <?php include('views/partials/footer.php')?>
</div>
<script src="../script/menu.js"></script>
</body>
</html>