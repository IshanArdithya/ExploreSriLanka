<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
  <title>Contact Us</title>

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
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li class="active">Contact</li>
      </ol>
    </div>

    <div class="contact-container">
    <form action="" method="POST" class="contact-left">
        <div class="contact-left-title">
          <h2>Get in touch</h2>
          <hr>
          <p class="contact-small">For any inquiries, please call or email us. Alternatively, <br> you can fill in the following contact form.</p>
        </div>

        <input type="text" name="name" placeholder="Your name" class="contact-inputs" required>
        <input type="email" name="emai" placeholder="Your email" class="contact-inputs" required>
        <input type="text" name="name" placeholder="Phone No:" class="contact-inputs" required>
        <input type="text" name="emai" placeholder="Country" class="contact-inputs" required>
        <textarea name="message" id="" placeholder="Your message" class="contact-inputs" required></textarea>
        <button type="submit">Submit
        </button>
      </form>


      <div class="contact-right">
        <img src="./Images/contact2.jpeg" alt="">
      </div>
    </div>

      </div>



  </div>
  <!-- Footer -->
  <?php
  include 'components/footer.php';
  ?>

  <script src="js/script.js"></script>

</body>

</html>