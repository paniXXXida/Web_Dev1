<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinary Clinic | Main pages</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/media.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
</head>

<body>
<div class="main-pages">
    <div class="wrap-main-description">
        <h1>Providing Special Care
            For Your Pets
        </h1>
        <p>
            Your pet is in good hands with us! Let your favorite get the best care in our center.
        </p>
    </div>
</div>
<div class="about-clinik">
    <div class="img-about">
        <img src="assets/images/about-images.png" alt="">
    </div>
    <div class="deacription-about">
        <div>
            <h2 id="title">About Clinic</h2>
            <p class="info-title-about">PET'S BEST FRIEND</p>
        </div>
        <p class="main-about">
            Eiusmod qui pig veniam nostrud. Chicken mollit flank ground round est short loin ad do bacon velit
            bresaola excepteur eu. Doner turducken aute, ut lorem alcatra pork belly capicola short ribs meatball.
            Excepteur quis nostrud, et dolor laborum pig bresaola corned beef officia
        </p>
    </div>
</div>
<div class="our-services">
    <div class="header-our-services">
        <h2 class="title">
            Our Services & Procedures
        </h2>
        <p class="info-title-about">COMPASSIONATE AND HIGH QUALITY CARE</p>
    </div>
    <div class="card-for-us">
        <div>
            <h4>Wellness Care</h4>
            <p>Our wellness programs include: comprehensive physical exam; internal and external parasite testing.
            </p>
        </div>
        <div>
            <h4>Anesthetic Monitoring</h4>
            <p>Your pet will be examined during check in to ensure that he or she is in top shape for surgery that
                day.</p>
        </div>
        <div>
            <h4>
                Nutritional Counseling</h4>
            <p>Some pets require special prescription food and all pets benefit from a balanced diet.</p>
        </div>
        <div>
            <h4>
                Pain Management</h4>
            <p>We understand that our patients feel pain and discomfort under the same circumstances as people do.
            </p>
        </div>
        <div>
            <h4>Vaccination Care</h4>
            <p>When a baby kitten or puppy is born, its immune system is not yet mature; the baby is wide open for
                infection.</p>
        </div>
        <div>
            <h4>Dental Care</h4>
            <p>Regular dental cleanings are important in maintaining not only your pet’s teeth but his or her
                overall health as well.</p>
        </div>
    </div>
</div>

<div class="wrap-rew-title">
    <h2 class="rewiew">What Clients Say</h2>
    <p>BECAUSE THEY CAN’T TELL YOU WHAT’S WRONG</p>
</div>
<div class="wrap-rewievs">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="wrap-rewiev">
                    <p>"Strip steak swine nisi sunt porchetta. Cillum shoulder commodo frankfurter exercitation
                        cupidatat est et sunt velit chicken aute pork. Tail excepteur brisket duis qui.</p>
                    <h4>Steve Malone</h4>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="wrap-rewiev">
                    <p>"Strip steak swine nisi sunt porchetta. Cillum shoulder commodo frankfurter exercitation
                        cupidatat est et sunt velit chicken aute pork. Tail excepteur brisket duis qui.</p>
                    <h4> Malone</h4>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="wrap-rewiev">
                    <p>"Strip steak swine nisi sunt porchetta. Cillum shoulder commodo frankfurter exercitation
                        cupidatat est et sunt velit chicken aute pork. Tail excepteur brisket duis qui.</p>
                    <h4>Steve </h4>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="wrap-rewiev">
                    <p>"Strip steak swine nisi sunt porchetta. Cillum shoulder commodo frankfurter exercitation
                        cupidatat est et sunt velit chicken aute pork. Tail excepteur brisket duis qui.</p>
                    <h4>Steve Malone</h4>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="wrap-rewiev">
                    <p>"Strip steak swine nisi sunt porchetta. Cillum shoulder commodo frankfurter exercitation
                        cupidatat est et sunt velit chicken aute pork. Tail excepteur brisket duis qui.</p>
                    <h4> Malone</h4>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="wrap-rewiev">
                    <p>"Strip steak swine nisi sunt porchetta. Cillum shoulder commodo frankfurter exercitation
                        cupidatat est et sunt velit chicken aute pork. Tail excepteur brisket duis qui.</p>
                    <h4>Steve </h4>
                </div>
            </div>

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 20,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>
</body>
</html>