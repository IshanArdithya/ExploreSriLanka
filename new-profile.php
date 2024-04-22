<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Explore Sri Lanka</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

</head>

<body>

  <!-- Header -->
  <?php
  include 'components/header.php';
  ?>


  <div class="top-image">
    <h1 class="headings sub-heading"></h1>
  </div>

  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li class="active">Profile</li>
      </ol>
    </div>

    <div class="container-user-profile">
      <div class="user-profile-header">

        <h1>Profile</h1>

        <div class="user-profile-menu">
          <a href="#" class="user-menu-link" data-target="activity-feed">Activity-Feed</a>
          <a href="#" class="user-menu-link" data-target="trips">Package Bookings</a>
          <a href="#" class="user-menu-link" data-target="photos">Hotel Bookings</a>
          <a href="#" class="user-menu-link" data-target="reviews">Product Purchases</a>
          <a href="#" class="user-menu-link" data-target="forums">Reviews</a>
          <a href="user.php" class="user-settings-link">Settings</a>
        </div>

      </div>
      <div class="user-profile-photo">
        <img src="./Images/adams-peak.jpg" alt="Profile Photo">
      </div>

      <div class="user-profile-content active" id="activity-feed">
        <h2 class="user-profile-description">Activity feed</h2>
        <div class="user-profile-intro">
          <h2>Welcome to Your Profile</h2>
          <p> Enhance your experience on our tourism platform by filling out your profile. Share your travel stories, connect with like-minded individuals, and discover new destinations. Let's explore together!</p>
          <ul>
            <li><strong>Joined Date:</strong> April 20, 2023</li>
            <li><strong>Current City:</strong> New York City</li>
            <li><strong>Favorite Destination:</strong> Paris</li>
            <li><strong>Travel Interests:</strong> Adventure travel, Cultural exploration</li>
          </ul>

        </div>

      </div>
      <div class="user-profile-content" id="trips">
        <h2 class="user-profile-description">Package Bookings</h2>
        <table>
          <thead>
            <tr>
              <th>Package Name</th>
              <th>Date</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Trip to Paris</td>
              <td>April 15, 2024</td>
              <td>$1500</td>
            </tr>

          </tbody>
        </table>
      </div>
      <div class="user-profile-content" id="photos">
        <h2 class="user-profile-description"> Hotel Bookings</h2>
        <table>
          <thead>
            <tr>
              <th>Hotel Name</th>
              <th>Check-in</th>
              <th>Check-out</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Grand Hotel</td>
              <td>April 20, 2024</td>
              <td>April 25, 2024</td>
              <td>$800</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="user-profile-content" id="reviews">
        <h2 class="user-profile-description">Product Purchases</h2>
        <table>
          <thead>
            <tr>
              <th>Product</th>
              <th>Date</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Camera</td>
              <td>April 10, 2024</td>
              <td>$500</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="user-profile-content" id="forums">
        <h2 class="user-profile-description">Reviews</h2>
        <table>
          <thead>
            <tr>
              <th>Item Reviewed</th>
              <th>Rating</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Hotel XYZ</td>
              <td>5/5</td>
              <td>April 5, 2024</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    const menuLinks = document.querySelectorAll('.user-menu-link');

    menuLinks.forEach(link => {
      link.addEventListener('click', (e) => {
        e.preventDefault();
        const targetId = link.getAttribute('data-target');
        const targetContent = document.getElementById(targetId);

        document.querySelectorAll('.user-profile-content').forEach(content => {
          content.classList.remove('active');
        });

        targetContent.classList.add('active');
      });
    });
  </script>

  <!-- Footer -->
  <?php include 'components/footer.php'; ?>
</body>

</html>