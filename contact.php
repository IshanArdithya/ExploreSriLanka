<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <title>About | Explore Srilanka</title>
</head>

<body>

    <!-- Header -->
    <?php
    include 'components/header.php';
    ?>

    <div class="top-image">
        <img src="./Images/slides/slide-27.jpeg" alt="">
        <h1 class="headings sub-heading"></h1>
    </div>

    <!-- Breadcrumbs -->
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
                <li class="active">Hotel</li>
            </ol>
        </div>

        <!-- <div class="container"> -->
            <h1 class="headings mini-heading">Contact</h1>
            <p class="lead mini-lead" style="text-align: center;">For any inquiries, please call or email us. Alternatively, you can fill in the following contact form.</p>


            <section id="about">
                <div class="container">
                    <div class="about-content-wrapper">
                        <div class="agency-left-side">
                            <!-- <form id="contact-form" method="post" action="contact.php"> -->
                            <div class="form-group">
                                <label for="fullname">Full Name</label>
                                <input type="text" id="fullname" name="fullname" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="telephone">Telephone Number</label>
                                <input type="tel" id="telephone" name="telephone" required>
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" id="country" name="country" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Short Description</label>
                                <textarea id="message" name="message" required></textarea>
                            </div>
                            <button type="submit">Submit</button>
                            <!-- </form> -->
                        </div>
                        <div class="agency-right-side">
                            <img src="Images/about.jpg" alt="">
                        </div>
                    </div>
                </div>
            </section>
        <!-- </div> -->
    </div>

    <!-- Footer -->
    <?php
    include 'components/footer.php';
    ?>
</body>

<script src="js/script.js"></script>


</html>