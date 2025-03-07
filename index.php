<?php include 'header.php'; ?>
<?php
header("login.php");
// session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
} else {
    $loggedin = false;
}
?>

          


    <!-- Hero Section-->
    <div class="hero">
        <div class="hero__content">
            <h1 class="animate-hero">ALPHA GYM</h1>
            <p class="animate-hero">Join Now for Rs. 1000</p>
            <a href="" class="button animate-hero">Get Started</a>
        </div>
    </div>

    <!-- Information section -->
    <div class="information-section">

        <div class="gym-info">
           
            <h1>"Your Ultimate Fitness Destination: Explore Our Gym Website!"</h1>
            <p>Welcome to our gym website, your ultimate destination for fitness and wellness! Whether you're a seasoned
                gym-goer or just starting your fitness journey, our website is here to support you every step of the
                way.
                <br>
                <br>
                Explore our state-of-the-art facilities, equipped with top-of-the-line workout machines and amenities to
                help you reach your fitness goals. Our expert trainers are here to guide and motivate you, offering
                personalized training programs tailored to your needs.
                <br>
                <br>
                Our freshly revamped 10,000 Sq. Ft. gym floor offers the best of Life Fitness, Nautilus, Cybex & Matrix
                bodybuilding, and weight training equipment. Couple this with training sessions in our dedicated
                personal training studio to have the most enjoyable exercise experience. New showers, steam rooms,
                changing rooms, digital lockers, juice bar, complimentary towels, valet parking are just a few of the
                amenities Waves gym offers.
                <br>
                <br>
                Looking for group classes? We offer a wide range of classes to suit every preference, from
                high-intensity
                interval training (HIIT) to yoga and Pilates. Join our community of fitness enthusiasts and experience
                the
                energy and camaraderie of working out together.
                <br>
                <br>
                Stay updated with our latest promotions, events, and fitness tips on our blog. Connect with us on social
                media to be part of our online community and share your fitness journey with others.
                <br>
                <br>
                Ready to take the first step towards a healthier lifestyle? Sign up for a membership today and embark on
                a
                journey to a fitter, healthier you with our gym website!
                <br>
                <br>

            </p>
            
        </div>
        <div class="information-images">
            <div class="info-images"><img src="./images/alphaLoga-3.jpg" alt=""></div>
            <div class="info-images"><img src="./images/alphaLoga-2.jpg" alt=""></div>
            <div class="info-images"><img src="./images/alphaLoga-4.jpg" alt=""></div>

        </div>
    </div>

    <!-- email section-->
    <div class="email">
        <div class="email__content">
            <h1 class="animate-email">
                Get Access to Members Only Perks
            </h1>
            <p class="animate-email">
                Sign up for our newsletter below to get Rs. 1200 off your first training session

            </p>
            <!-- <form action="#">
                <div class="form__wrap">
                    <label for="email">
                        <input type="email" placeholder="Enter your email" id="email">
                    </label>
                    <button class="button" type="submit">Sign up</button>
                </div>
            </form> -->
        </div>
    </div>


    <!-- footer section-->
    <?php include 'footer.php'; ?>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>
        <script src="app.js"></script> -->