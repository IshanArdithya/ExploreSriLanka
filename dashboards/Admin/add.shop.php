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
    <title>add products</title>
</head>

<body>
    <div class="container">
        <!-- Sidebar Section -->

        <?php
        include 'Components/sidebar.php'
        ?>

        <!-- End of Sidebar Section -->

        <!-- form for update user -->
        <main>
            <div class="update">
                <h1>Add Products</h1>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <table class="tbl-30">
                        <tr>
                            <td>Name : </td>
                            <td><input type="text" id="itemName" name="itemName" required></td>
                        </tr>
                        <tr>
                            <td>Stocks</td>
                            <td>
                                <input type="number" id="stockCount" name="stockCount" min="0" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Image: </td>
                            <td><input type="file" id="itemPhoto" name="itemPhoto" accept="image/*" required></td>
                        </tr>
                        <tr>
                            <td>Description: </td>
                            <td><textarea id="itemDescription" name="itemDescription" rows="4" required></textarea></td>
                        </tr>
                        <tr>
                            <td>Price: </td>
                            <td><input type="number" id="itemPrice" name="itemPrice" min="0" step="0.01" required></td>
                        </tr>

                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Product" class="btn-secondary">
                        </td>

                    </table>
                </form>

            </div>
            <div class="back">
                <a href="admin.shop.php" class="btn btn-back">Back</a>
            </div>

        </main>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

            require_once "../../config.php";

            $sql = "SELECT MAX(RIGHT(item_id, 5)) AS max_id FROM shopitems";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $max_id = $row['max_id'];
            $next_id = $max_id + 1;
            $item_id = 'ITEM' . str_pad($next_id, 5, '0', STR_PAD_LEFT);

            $itemName = $_POST["itemName"];
            $itemPrice = $_POST["itemPrice"];
            $itemDescription = $_POST["itemDescription"];
            $stockCount = $_POST["stockCount"];
            $itemPhoto = $_FILES["itemPhoto"]["name"];
            $targetDir = "../../images/shop/";
            $targetFile = $targetDir . basename($_FILES["itemPhoto"]["name"]);

            $check = getimagesize($_FILES["itemPhoto"]["tmp_name"]);
            if ($check !== false) {
                if (move_uploaded_file($_FILES["itemPhoto"]["tmp_name"], $targetFile)) {
                    echo "File uploaded successfully.";

                    $relativeFilePath = "images/shop/" . $_FILES["itemPhoto"]["name"];

                    $sql = "INSERT INTO shopitems (item_id, item_name, item_price, item_description, item_photo, stocks) VALUES ('$item_id', '$itemName', $itemPrice, '$itemDescription', '$relativeFilePath', $stockCount)";

                    if ($conn->query($sql) === TRUE) {
                        echo "<p>New item added successfully.</p>";
                    } else {
                        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
                    }

                    $itemPageName = "item-" . str_replace(" ", "", $itemName) . ".php";
                    $itemPagePath = "../../shop-items/" . $itemPageName;
                    $itemPagePathdb = "shop-items/" . $itemPageName;

                    $templateFilePath = "../../item-template-link.php";
                    copy($templateFilePath, $itemPagePath);

                    $itemPageContent = file_get_contents($itemPagePath);
                    $itemPageContent = str_replace("{item_id}", $item_id, $itemPageContent);
                    file_put_contents($itemPagePath, $itemPageContent);

                    $updateUrlSql = "UPDATE shopitems SET shopitemurl = '$itemPagePathdb' WHERE item_id = '$item_id'";
                    if ($conn->query($updateUrlSql) === TRUE) {
                        echo "<script>Swal.fire('Added!',
                            'The product is added!.', 
                            'success').then(() => { 
                                window.location.href = 'admin.shop.php';
                            })
                            </script>";
                    } else {
                        echo "<script>Swal.fire('Error!',
                            'Error adding record: " . $conn->error . "', 
                            'error').then(() => { 
                                window.location.href = 'admin.shop.php';
                            })</script>";
                    }
                } else {
                    echo "<script>Swal.fire('Error!',
                        'Error Uploading file.', 
                        'error').then(() => { 
                            window.location.href = 'admin.shop.php';
                        })</script>";
                }
            } else {
                echo "<script>Swal.fire('Error!',
                        'File is not an image', 
                        'error').then(() => { 
                            window.location.href = 'admin.shop.php';
                        })</script>";
                exit();
            }

            // Close connection
            $conn->close();
        }
        ?>

        <?php
        include 'Components/rightsection.php'
        ?>

    </div>
    </div>

</body>

</html>