<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Header on Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<?php
$isUserLoggined = isset($_SESSION['user']);
$user = $_SESSION['user'] ?? null;
$urlPath = $_SERVER['REQUEST_URI'];
$isUserClient = isset($user['user_type']) && $user['user_type'] == 0;
?>

<header>
    <div class="wrap-header container">
        <div class="row align-items-center justify-content-between">

            <div class="col-auto d-flex align-items-center">
                <div class="logo">
                    <img src="/assets/images/logo.png" alt="">
                </div>
                <?php if($isUserLoggined): ?>

                    <span class="ms-3">
              Hello <?= htmlspecialchars($user['name']) ?>!
            </span>
                <?php endif; ?>
            </div>

            <div class="col-auto mobile">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="col-auto contact d-none d-md-flex">
                <div class="block d-flex align-items-center me-4">
                    <svg width="16" height="16" fill="currentColor" class="bi bi-geo-alt" ...> ... </svg>
                    <p class="ms-2 mb-0">
                        <span>OUR LOCATION</span>
                        2418 Nancy St, New York
                    </p>
                </div>
                <div class="block d-flex align-items-center me-4">
                    <svg width="16" height="16" fill="currentColor" class="bi bi-clock" ...> ... </svg>
                    <p class="ms-2 mb-0">
                        <span>WE ARE OPEN</span>
                        08:00 - 21:00
                    </p>
                </div>
                <div class="block d-flex align-items-center">
                    <svg width="16" height="16" fill="currentColor" class="bi bi-telephone" ...> ... </svg>
                    <p class="ms-2 mb-0">
                        <span>CALL US NOW</span>
                        0 (800) 337 7737
                    </p>
                </div>
            </div>

        </div>
    </div>


    <div class="main-menu">

        <div class="wrap-menu container d-flex align-items-center gap-4 py-2">


            <div>
                <span class="close">x</span>
                <span>
            <a href="/" <?= $urlPath == '/' ? 'class="active"' : '' ?>>Home</a>
          </span>
                <span>
            <a href="/contact" <?= $urlPath == '/contact' ? 'class="active"' : '' ?>>Contacts</a>
          </span>

                <?php if($isUserLoggined && $isUserClient): ?>
                    <span>
              <a href="/doctor" <?= $urlPath == '/doctor' ? 'class="active"' : '' ?>>Select doctor</a>
            </span>
                    <span>
              <a href="/add_pet" <?= $urlPath == '/add_pet' ? 'class="active"' : '' ?>>Add pet</a>
            </span>
                <?php endif; ?>

                <?php if($isUserLoggined && !$isUserClient): ?>
                    <span>
              <a href="/doctor_appointments" <?= $urlPath == '/doctor_appointments' ? 'class="active"' : '' ?>>
                Your appointments
              </a>
            </span>
                    <span>
              <a href="/doctor_services" <?= $urlPath == '/doctor_services' ? 'class="active"' : '' ?>>
                Your services
              </a>
            </span>
                <?php endif; ?>
            </div>


            <?php if($isUserLoggined): ?>
                <span>
            <a href="/logout">Logout</a>
          </span>
            <?php else: ?>
                <span>
            <a href="/login">Sign in</a>
          </span>
            <?php endif; ?>


            <?php if($isUserLoggined && $isUserClient): ?>
                <div>
            <span>
              <a href="/account" <?= $urlPath == '/account' ? 'class="active"' : '' ?>>Account</a>
            </span>
                </div>
            <?php endif; ?>

        </div>
    </div>
</header>

<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">

</script>
</body>
</html>
