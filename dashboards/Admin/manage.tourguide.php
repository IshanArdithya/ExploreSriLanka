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
    <title>Update Tourguide | Explore Srilanka</title>

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
                <h1>Update Tour Guide</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <table class="tbl-30">
                        <tr>
                            <td>Tour Guide Name : </td>
                            <td><input type="text" name="name" value=""></td>
                        </tr>
                        <tr>
                            <td>Tour Guide Email : </td>
                            <td><input type="email" name="email" value=""></td>
                        </tr>
                        <tr>
                            <td>Years Of Experience: </td>
                            <td><input type="number" name="exp" value=""></td>
                        </tr>
                        </tr>
                        <tr>
                            <td>Profile Picture: </td>
                            <td><input type="file" name="new_img_name"></td>
                        </tr>
                        <tr>
                            <td>Price: </td>
                            <td><input type="number" name="price" value=""></td>
                        </tr>
                        </tr>

                        <tr>
                            <td>Available : </td>
                            <td>
                                <label for="active_yes"><input type="checkbox" name="active" value="YES" id="active_yes">Yes</label>
                                <label for="active_no"><input type="checkbox" name="active" value="No" id="active_no">No</label>
                            </td>
                        </tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="">
                            <input type="hidden" name="current_img" value="">
                            <input type="submit" name="submit" value="Update Tour Guide" class="btn-secondary">
                            <input type="submit" name="submit" value="Delete Tour Guide" class="btn-danger">
                        </td>

                    </table>
                </form>
            </div>

            <div class="back">
                <a href="admin.tourguide.html" class="btn btn-back">Back</a>
            </div>

        </main>
        <!-- Right Section -->
        
        <?php
        include 'Components/rightsection.php'
        ?>

    </div>
    </div>

</body>

</html>