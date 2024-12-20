<?php
$isUserLoggined = isset($_SESSION['user']);
$user = $_SESSION['user'];
$urlPath = $_SERVER['REQUEST_URI'];

$isUserClient = isset($user['user_type']) && $user['user_type'] == 0;
?>
<header>
    <div class="wrap-header">
        <div class="logo">
            <img src="../images/logo.png" alt="">
        </div>
        <?php if($isUserLoggined):?>
            Hello <?=$user['name'] ?>!
        <?php endif;?>
        <span id="exchange"></span>
        <div class="mobile">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="contact">
            <div class="block">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-geo-alt" viewBox="0 0 16 16">
                    <path
                        d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                </svg>
                <p>
                    <span>OUR LOCATION</span>
                    2418 Nancy St, New York
                </p>
            </div>
            <div class="block">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-clock" viewBox="0 0 16 16">
                    <path
                        d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                </svg>
                <p>
                    <span>WE ARE OPEN</span>
                    08:00 - 21:00
                </p>
            </div>
            <div class="block">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-telephone" viewBox="0 0 16 16">
                    <path
                        d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                </svg>
                <p>
                    <span>CALL US NOW</span>
                    0 (800) 337 7737
                </p>
            </div>
        </div>
    </div>
    <div class="main-menu">
        <div class="wrap-menu">
            <div>
                <span class="close">x</span>
                <span><a href="/">Home</a></span>
                <span><a <?= $urlPath == '/contact' ? 'class="active"': '' ?> href="/contact">Contacts</a></span>

                <?php if($isUserLoggined && $isUserClient):?>
                    <span><a <?= $urlPath == '/doctor' ? 'class="active"': '' ?> href="/doctor">Select doctor</a></span>
                    <span><a <?= $urlPath == '/add-pet' ? 'class="active"': '' ?> href="/add-pet">Add pet</a></span>
                <?php endif;?>

                <?php if($isUserLoggined && !$isUserClient):?>
                    <span><a <?= $urlPath == '/doctor-appointment' ? 'class="active"': '' ?> href="/doctor-appointment">Your appointments</a></span>
                    <span><a <?= $urlPath == '/doctor-services' ? 'class="active"': '' ?> href="/doctor-services">Your services</a></span>
                <?php endif;?>

                <?php if($isUserLoggined):?>
                    <span><a <?= $urlPath == '/profile' ? 'class="active"': '' ?> href="/profile">Profile</a></span>
                <?php endif;?>
            </div>

            <?php if ($isUserLoggined):?>
                <span><a href="/logout">Logout</a></span>
            <?php else:;?>
                <span><a href="/login">Sign in</a></span>
            <?php endif;?>

            <?php if($isUserLoggined && $isUserClient):?>
                <div>
                    <span><a <?= $urlPath == '/account' ? 'class="active"': '' ?> href="/account">Account</a></span>
                </div>
            <?php endif;?>
        </div>
    </div>
</header>
