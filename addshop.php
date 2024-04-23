<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Add New Item</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <label for="itemName">Item Name:</label>
            <input type="text" id="itemName" name="itemName" required>

            <label for="itemPrice">Item Price:</label>
            <input type="number" id="itemPrice" name="itemPrice" min="0" step="0.01" required>

            <label for="itemPhoto">Item Photo:</label>
            <input type="file" id="itemPhoto" name="itemPhoto" accept="image/*" required>

            <label for="itemDescription">Item Description:</label>
            <textarea id="itemDescription" name="itemDescription" rows="4" required></textarea>

            <label for="stockCount">Stock Count:</label>
            <input type="number" id="stockCount" name="stockCount" min="0" required>

            <input type="submit" value="Add Item" name="submit">
        </form>
    </div>

    <?php
    // PHP code for adding item to the database
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

        require_once "config.php";

        // Generate a unique item ID
        $sql = "SELECT MAX(RIGHT(item_id, 5)) AS max_id FROM shopitems";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $max_id = $row['max_id'];
        $next_id = $max_id + 1;
        $item_id = 'ITEM' . str_pad($next_id, 5, '0', STR_PAD_LEFT);

        // Prepare and bind parameters
        $itemName = $_POST["itemName"];
        $itemPrice = $_POST["itemPrice"];
        $itemDescription = $_POST["itemDescription"];
        $stockCount = $_POST["stockCount"];
        $itemPhoto = $_FILES["itemPhoto"]["name"];
        $targetDir = "images/shop/";
        $targetFile = $targetDir . basename($_FILES["itemPhoto"]["name"]);

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["itemPhoto"]["tmp_name"]);
        if ($check !== false) {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["itemPhoto"]["tmp_name"], $targetFile)) {
                echo "File uploaded successfully.";

                // Construct the relative path to the uploaded file
                $relativeFilePath = "images/shop/" . $_FILES["itemPhoto"]["name"];

                // Insert data using SQL statement
                $sql = "INSERT INTO shopitems (item_id, item_name, item_price, item_description, item_photo, stocks) VALUES ('$item_id', '$itemName', $itemPrice, '$itemDescription', '$relativeFilePath', $stockCount)";

                if ($conn->query($sql) === TRUE) {
                    echo "<p>New item added successfully.</p>";
                } else {
                    echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
                }

                // Dynamically create a page for the item
                $itemPageName = "item-" . str_replace(" ", "", $itemName) . ".php";
                $itemPagePath = "shop-items/" . $itemPageName;

                // Copy the template file
                $templateFilePath = "item-template-link.php";
                copy($templateFilePath, $itemPagePath);

                // Replace placeholder values with actual data in the new item page file
                $itemPageContent = file_get_contents($itemPagePath);
                $itemPageContent = str_replace("{item_id}", $item_id, $itemPageContent); // Corrected placeholder
                file_put_contents($itemPagePath, $itemPageContent);

                $updateUrlSql = "UPDATE shopitems SET shopitemurl = '$itemPagePath' WHERE item_id = '$item_id'";
                if ($conn->query($updateUrlSql) === TRUE) {
                    echo "<p>Shop item URL updated successfully.</p>";
                } else {
                    echo "<p>Error updating shop item URL: " . $conn->error . "</p>";
                }
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "File is not an image.";
            exit();
        }

        // Close connection
        $conn->close();
    }
    ?>
</body>

</html>