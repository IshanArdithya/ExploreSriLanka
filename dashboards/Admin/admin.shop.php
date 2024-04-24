<?php

include_once '../../config.php';

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// tour guides booking
// total tour guides booking & last 30 days bookings
$sql = "SELECT COUNT(*) as totalProducts FROM shopitems";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalProducts = $row['totalProducts'];

$sql = "SELECT COUNT(*) as productsLast30Days FROM shopitems WHERE date_added >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$productsLast30Days = $row["productsLast30Days"];

// tour guides
// total tour guides & last 30 days tour guides
$sql = "SELECT COUNT(*) as totalOrders FROM shoporders";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalOrders = $row["totalOrders"];

$sql = "SELECT COUNT(*) as ordersLast30Days FROM shoporders WHERE order_date >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$ordersLast30Days = $row["ordersLast30Days"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../css/admin.style.css">
    <script src="user.js"></script>
    <script src="../../js/admin.index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Shop dashboard</title>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->

        <?php
        include 'Components/sidebar.php'
        ?>

        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
            <h1>Shop</h1>
            <!-- Analyses -->

            <div class="analyse shoppage">
                <div class="sales">
                    <div class="status">
                        <div class="info">
                            <h3>Total Products</h3>
                            <h1 id="totalProducts">...</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                                <circle class="progress-ring ring-products" cx="38" cy="38" r="36" style="stroke-dashoffset: 0;"></circle>
                            </svg>
                            <div class="percentage">
                                <p id="percentChangeProducts">...</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="visits">
                    <div class="status">
                        <div class="info">
                            <h3>Orders</h3>
                            <h1 id="totalOrders">...</h1>
                        </div>

                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                                <circle class="progress-ring ring-orders" cx="38" cy="38" r="36" style="stroke-dashoffset: 0;"></circle>
                            </svg>
                            <div class="percentage">
                                <p id="percentChangeOrders">...</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End of Analyses -->


            <!-- Order Details Table -->
            <div class="recent-user">
                <h2>Update Products</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Item ID</th>
                            <th>Name</th>
                            <th>Price (LKR)</th>
                            <th>Description</th>
                            <th>Stocks</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM shopitems ORDER BY item_id";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['item_id'] . "</td>";
                                echo "<td>" . $row['item_name'] . "</td>";
                                echo "<td>" . $row['item_price'] . "</td>";
                                echo "<td>" . $row['item_description'] . "</td>";
                                echo "<td>" . $row['stocks'] . "</td>";
                                echo "<td>";
                                echo "<a href='#' class='btn-primary' onclick='updateProduct(\"" . $row['item_id'] . "\", \"" . $row['item_name'] . "\", \"" . $row['item_price'] . "\", \"" . $row['item_description'] . "\", \"" . $row['item_photo'] . "\")'>Update</a>";
                                echo "<a href='#' class='btn-secondary' onclick='updateStocks(\"" . $row['item_id'] . "\", \"" . $row['item_name'] . "\", \"" . $row['stocks'] . "\", \"" . $row['item_photo'] . "\")'>Update Stocks</a>";
                                echo "<a href='#' class='btn-danger' onclick='deleteProduct(\"" . $row['item_id'] . "\", \"" . $row['item_name'] . "\")'>Delete</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='9'>No products found</td></tr>";
                        }

                        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && isset($_GET['id'])) {
                            if ($_GET['action'] == 'update') {
                                if (!empty(trim($_GET['id']))) {
                                    $item_id = trim($_GET['id']);
                                    $updated_name = trim($_GET['name']);
                                    $updated_price = trim($_GET['price']);
                                    $updated_description = trim($_GET['description']);
                                    $shopitemurl = str_replace(' ', '', $updated_name);
                                    $updateditemurl = 'shop-items/item-' . $shopitemurl . '.php';

                                    $sql = "SELECT * FROM shopitems WHERE item_id = '$item_id'";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        $item_name = $row['item_name'];
                                        $item_price = $row['item_price'];
                                        $item_description = $row['item_description'];
                                        $item_photo = $row['item_photo'];

                                        $sqlshopitems = "UPDATE shopitems SET item_name = '$updated_name', item_price = '$updated_price', item_description = '$updated_description', shopitemurl = '$updateditemurl' WHERE item_id = '$item_id'";

                                        if ($conn->query($sqlshopitems) === TRUE) {
                                            $old_shopitem_file = '../../shop-items/item-' . str_replace(' ', '', strtolower($item_name)) . '.php';
                                            $new_shopitem_file = '../../shop-items/item-' . $shopitemurl . '.php';
                                            rename($old_shopitem_file, $new_shopitem_file);

                                            echo "<script>Swal.fire('Updated!',
                                                'The product successfully updated.', 
                                                'success').then(() => { 
                                                    window.location.href = 'admin.shop.php';
                                                })
                                                </script>";
                                        } else {
                                            echo "<script>Swal.fire('Oops...',
                                                    'Product not found!', 
                                                    'error').then(() => { 
                                                        window.location.href = 'admin.shop.php';
                                                    })</script>";
                                        }
                                    }
                                }
                            } elseif ($_GET['action'] == 'delete') {
                                if (!empty(trim($_GET['id']))) {
                                    $item_id = trim($_GET['id']);
                                    $item_name = trim($_GET['name']);

                                    $sql = "DELETE FROM shopitems WHERE item_id='$item_id'";

                                    if ($conn->query($sql) === TRUE) {

                                        $shopitem_file = '../../shop-items/item-' . str_replace(' ', '', strtolower($item_name)) . '.php';
                                        unlink($shopitem_file);

                                        echo "<script>Swal.fire('Deleted!',
                                            'The product is deleted!.', 
                                            'success').then(() => { 
                                                window.location.href = 'admin.shop.php';
                                            })
                                            </script>";
                                    } else {
                                        echo "<script>Swal.fire('Error!',
                                            'Error deleting record: " . $conn->error . "', 
                                            'error').then(() => { 
                                                window.location.href = 'admin.shop.php';
                                            })</script>";
                                    }
                                }
                            } elseif ($_GET['action'] == 'stockupdate') {
                                if (!empty(trim($_GET['id']))) {
                                    $item_id = trim($_GET['id']);
                                    $updated_stocks = trim($_GET['stocks']);

                                    $sql = "SELECT * FROM shopitems WHERE item_id = '$item_id'";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        $item_name = $row['item_name'];
                                        $item_price = $row['item_price'];
                                        $item_description = $row['item_description'];
                                        $item_photo = $row['item_photo'];

                                        $sqlshopitems = "UPDATE shopitems SET stocks = '$updated_stocks' WHERE item_id = '$item_id'";

                                        if ($conn->query($sqlshopitems) === TRUE) {
                                            echo "<script>Swal.fire('Updated!',
                                                'The product stocks successfully updated.', 
                                                'success').then(() => { 
                                                    window.location.href = 'admin.shop.php';
                                                })
                                                </script>";
                                        } else {
                                            echo "<script>Swal.fire('Oops...',
                                                    'Product not found!', 
                                                    'error').then(() => { 
                                                        window.location.href = 'admin.shop.php';
                                                    })</script>";
                                        }
                                    }
                                }
                            }
                        }

                        ?>

                    </tbody>
                </table>
            </div>
            <!-- End of Order Details Table -->

            <br>
            <br>
            <br>
            <div class="add">
                <a href="add.shop.php" class="btn btn-primary">Add Product</a>
            </div>

            <!-- Add product Details Table -->
            <!-- <div class="recent-user">
                <h2>Add New Product</h2>
                
                    <div class="product-container">
                        <div class="add">
                            <a href="add.shop.php" class="btn btn-primary">Add Product</a>
                        </div>
                    </div>
                
            </div> -->
            <!-- product add Details Table end -->
        </main>
        <!-- End of Main Content -->

        <?php
        include 'Components/rightsection.php'
        ?>

    </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {

            const totalproducts = <?php echo $totalProducts; ?>;
            const productsLast30Days = <?php echo $productsLast30Days; ?>;
            const totalorders = <?php echo $totalOrders; ?>;
            const ordersLast30Days = <?php echo $ordersLast30Days; ?>;

            // Total Products
            // update total products count
            document.getElementById('totalProducts').innerText = totalproducts;

            // calc percentage - total products
            const percentChangeProducts = ((productsLast30Days / totalproducts) * 100).toFixed(2);

            // update percentage change & circle - products
            document.getElementById('percentChangeProducts').innerText = `+${percentChangeProducts}%`;
            const circleProducts = document.querySelector('.ring-products');
            const circleLengthProducts = 2 * Math.PI * circleProducts.getAttribute('r');
            const newOffsetProducts = circleLengthProducts * ((totalproducts - productsLast30Days) / totalproducts);
            circleProducts.style.strokeDashoffset = newOffsetProducts;

            // Orders
            // update total orders
            document.getElementById('totalOrders').innerText = totalorders;

            // calc percentage - orders
            const percentChangeOrders = ((ordersLast30Days / totalorders) * 100).toFixed(2);

            // update percentage change & circle - orders
            document.getElementById('percentChangeOrders').innerText = `+${percentChangeOrders}%`;
            const circleOrders = document.querySelector('.ring-orders');
            const circleLengthOrders = 2 * Math.PI * circleOrders.getAttribute('r');
            const newOffsetOrders = circleLengthOrders * ((totalorders - ordersLast30Days) / totalorders);
            circleOrders.style.strokeDashoffset = newOffsetOrders;

        });
    </script>

    <script>
        function updateProduct(item_id, item_name, item_price, item_description, item_photo) {
            Swal.fire({
                title: 'Update Product',
                html: `<div class="update-form">
                    <div class="input-container">
                        <img src="../../${item_photo}" alt="Product Photo" class="product-photo">
                        <br><p>Change fields to update the product!</p><br>
                        <label for="item_id" class="field-name">Item ID</label>
                        <input type="text" id="item_id" value="${item_id}" placeholder="Item ID" class="swal2-input" readonly>
                        <label for="name" class="field-name">Name</label>
                        <input type="text" id="name" value="${item_name}" placeholder="Name" class="swal2-input" required>
                        <label for="price" class="field-name">Price</label>
                        <input type="text" id="price" value="${item_price}" placeholder="Price (LKR)" class="swal2-input" required>
                        <label for="description" class="field-name">Description</label>
                        <textarea id="description" placeholder="Description" class="swal2-textarea" required>${item_description}</textarea>
                    </div>
                </div>
                `,
                focusConfirm: false,
                preConfirm: () => {
                    const name = Swal.getPopup().querySelector('#name').value;
                    const price = Swal.getPopup().querySelector('#price').value;
                    const description = Swal.getPopup().querySelector('#description').value;
                    return {
                        name: name,
                        price: price,
                        description: description
                    };
                },
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Change',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    const name = Swal.getPopup().querySelector('#name').value;
                    const price = Swal.getPopup().querySelector('#price').value;
                    const description = Swal.getPopup().querySelector('#description').value;

                    Swal.fire({
                        title: 'Are you sure you want to change?',
                        html: `
                            <div class="update-form">
                                <div class="input-container">
                                    <label for="item_id" class="field-name">Item ID</label>
                                    <div class="info-container">
                                        <p class="current-info">${item_id}</p>
                                    </div><br>
                                    <label for="name" class="field-name">Name</label>
                                    <p class="confirmation-text">
                                        <div class="info-container">
                                            <span class="current-info">${item_name}</span><br>
                                        </div>
                                        <span class="arrow-down">↓</span>
                                        <div class="info-container">
                                            <span class="changed-info">${name}</span>
                                        </div>
                                    </p><br>
                                    <label for="price" class="field-name">Price</label>
                                    <p class="confirmation-text">
                                        <div class="info-container">
                                            <span class="current-info">LKR ${item_price}</span><br>
                                        </div>
                                        <span class="arrow-down">↓</span>
                                        <div class="info-container">
                                            <span class="changed-info">LKR ${price}</span>
                                        </div>
                                    </p><br>
                                    <label for="description" class="field-name">Description</label>
                                    <p class="confirmation-text">
                                        <div class="info-container">
                                            <span class="current-info">${item_description}</span><br>
                                        </div>
                                        <span class="arrow-down">↓</span>
                                        <div class="info-container">
                                            <span class="changed-info">${description}</span>
                                        </div>
                                    </p><br>
                                </div>
                            </div>
                        `,
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Confirm',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {

                            window.location.href = "<?= $_SERVER['PHP_SELF'] ?>?action=update&id=" + item_id + "&name=" + name + "&price=" + price + "&description=" + description;
                        }
                    });
                }
            });
        }

        function deleteProduct(item_id, item_name) {
            Swal.fire({
                title: 'Are you sure you want to delete product?',
                html: "Product ID: " + item_id + "<br>Name: " + item_name,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {

                    window.location.href = "<?= $_SERVER['PHP_SELF'] ?>?action=delete&id=" + item_id + "&name=" + item_name;
                }
            });
        }

        function updateStocks(item_id, item_name, item_stocks, item_photo) {
            Swal.fire({
                title: 'Are you sure you want to delete product?',
                html: `<div class="update-form">
                    <div class="input-container">
                        <img src="../../${item_photo}" alt="Product Photo" class="product-photo">
                        <br><p>Change field to update the stocks!</p><br>
                        <label for="item_id" class="field-name">Item ID</label>
                        <input type="text" id="item_id" value="${item_id}" placeholder="Item ID" class="swal2-input" readonly>
                        <label for="name" class="field-name">Name</label>
                        <input type="text" id="name" value="${item_name}" placeholder="Name" class="swal2-input" readonly>
                        <label for="stocks" class="field-name">Stocks</label>
                        <input type="number" id="stocks" value="${item_stocks}" placeholder="Stocks" class="swal2-input" required>
                    </div>
                </div>
                `,
                focusConfirm: false,
                preConfirm: () => {
                    const stocks = Swal.getPopup().querySelector('#stocks').value;
                    return {
                        stocks: stocks
                    };
                },
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Change',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    const stocks = Swal.getPopup().querySelector('#stocks').value;

                    Swal.fire({
                        title: 'Are you sure you want to change?',
                        html: `
                            <div class="update-form">
                                <div class="input-container">
                                    <label for="item_id" class="field-name">Item ID</label>
                                    <div class="info-container">
                                        <p class="current-info">${item_id}</p>
                                    </div><br>
                                    <label for="name" class="field-name">Name</label>
                                    <p class="confirmation-text">
                                        <div class="info-container">
                                            <span class="current-info">${item_name}</span><br>
                                        </div>
                                    </p><br>
                                    <label for="stocks" class="field-name">Stocks</label>
                                    <p class="confirmation-text">
                                        <div class="info-container">
                                            <span class="current-info">${item_stocks}</span><br>
                                        </div>
                                        <span class="arrow-down">↓</span>
                                        <div class="info-container">
                                            <span class="changed-info">${stocks}</span>
                                        </div>
                                    </p><br>
                                </div>
                            </div>
                        `,
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Confirm',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {

                            window.location.href = "<?= $_SERVER['PHP_SELF'] ?>?action=stockupdate&id=" + item_id + "&stocks=" + stocks;
                        }
                    });
                }
            });
        }
    </script>

</body>

</html>