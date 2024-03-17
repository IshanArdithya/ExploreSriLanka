<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.carousel.min.css" />


    <title>About - Explore Srilanka</title>
</head>

<body>

    <!-- Header -->
    <?php
    include '../components/header.php';
    ?>

    <div class="top-image">
        <h1 class="headings sub-heading">Destinations</h1>
    </div>

    <!-- Breadcrumbs -->
    <div class="container">
        <div class="breadcrumbs">
            <ul class="breadcrumbs-list lead">
                <li class="breadcrumbs-item">
                    <a href="index.php" class="breadcrumbs-link"><i class="fa-solid fa-home"></i> Home</a>
                </li>
                <li class="breadcrumbs-item">
                    <a href="" class="breadcrumbs-link">Tours</a>
                </li>
                <li class="breadcrumbs-item">
                    <a href="" class="breadcrumbs-link-active">Wildlife Adventure</a>
                </li>

            </ul>
        </div>

        <h1 class="headings mini-heading">Wildlife Adventure</h1>
        <p class="lead mini-lead"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque corporis repellat incidunt ex, libero accusantium eum quia sed praesentium, odit itaque! Aliquam possimus veritatis, repudiandae vel, temporibus debitis eos reiciendis voluptates recusandae maiores autem nostrum dignissimos voluptatibus libero distinctio sed veniam exercitationem? Facilis fuga dignissimos perferendis vel ullam eius cumque.</p>

        <div class="owl-carousel owl-theme">
            <div> <img src="../Images/about.jpg" alt=""> </div>
            <div> <img src="../Images/about.jpg" alt=""> </div>
            <div> <img src="../Images/about.jpg" alt=""> </div>
            <div> <img src="../Images/about.jpg" alt=""> </div>
            <div> <img src="../Images/about.jpg" alt=""> </div>
        </div>
    </div>



    <!-- Footer -->
    <?php
    include '../components/footer.php';
    ?>

    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="../js/script.js"></script>

    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel();

        });

        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 4,
            loop: true,
            margin: 5,
            autoplay: true,
            autoplayTimeout: 2500,
            autoplayHoverPause: true,
        });
    </script>
</body>

</html>