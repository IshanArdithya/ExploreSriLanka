<?php

include_once 'config.php';

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $contact_number = $_POST['contact_number'];
  $country = $_POST['country'];
  $message = $_POST['message'];

  // generate reservation_id
  $sql = "SELECT MAX(RIGHT(inquiry_id, 5)) AS max_id FROM contactus";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $max_id = $row['max_id'];
  $next_id = $max_id + 1;
  $inquiry_id = 'IQ' . str_pad($next_id, 5, '0', STR_PAD_LEFT);

  $sql = "INSERT INTO contactus (inquiry_id, name, email, contact_number, country, message)
            VALUES ('$inquiry_id', '$name', '$email', '$contact_number', '$country', '$message')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>Swal.fire('Successful!',
                  'The message sent successfully!.', 
                  'success').then(() => { 
                      window.location.href = 'index.php';
                  })
          </script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
    
}

?>

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
        <input type="email" name="email" placeholder="Your email" class="contact-inputs" required>
        <input type="text" name="contact_number" placeholder="Phone No:" class="contact-inputs" required>
        <input type="text" name="country" placeholder="Country" class="contact-inputs" required>
        <textarea name="message" id="" placeholder="Your message" class="contact-inputs" required></textarea>
        <button type="submit" name="submit" id="submitBtn" class="disabled" disabled>Submit</button>
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

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const submitBtn = document.getElementById('submitBtn');
      const inputs = document.querySelectorAll('.contact-inputs');

      inputs.forEach(input => {
        input.addEventListener('input', function() {
          const isFilled = Array.from(inputs).every(input => input.value.trim() !== '');
          submitBtn.disabled = !isFilled;
          if (isFilled) {
            submitBtn.classList.remove('disabled');
          } else {
            submitBtn.classList.add('disabled');
          }
        });
      });
    });
  </script>

  <script src="js/script.js"></script>

  <?php
    $conn->close();
  ?>

</body>

</html>