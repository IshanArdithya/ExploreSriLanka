<?php
require_once 'config.php';

$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
$sortOption = isset($_GET['sort']) ? $_GET['sort'] : '';

$sql = "SELECT * FROM shopitems WHERE item_name LIKE '%$searchQuery%' ORDER BY ";

switch ($sortOption) {
  case 'lowest_price':
    $sql .= "item_price ASC";
    break;
  case 'highest_price':
    $sql .= "item_price DESC";
    break;
  default:
    $sql .= "item_name ASC";
    break;
}

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="shopping-col-4">';
    echo '<a href="' . $row['shopitemurl'] . '">';
    echo '<img src="' . $row['item_photo'] . '" alt="">';
    echo '<h4>' . $row['item_name'] . '</h4>';
    echo '<div class="shopping-rating">';
    for ($i = 0; $i < 4; $i++) {
      echo '<i class="fa fa-star"></i>';
    }
    echo '<i class="fa fa-star-o"></i>';
    echo '</div>';
    echo '<p class="shop-details">' . $row['item_description'] . '</p>';
    echo '<p class="shop-price">LKR ' . $row['item_price'] . '</p>';
    echo '</a>';
    echo '</div>';
  }
} else {
  echo "No products found.";
}
?>
