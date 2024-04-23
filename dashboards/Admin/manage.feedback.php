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
    <title>manage feedback</title>
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
                <h1>Edit Feedback</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <table class="tbl-30">
                        <tr>
                            <td>User Type :</td>
                            <td>
                                <select name="room_type">
                                    <option value="Hotel">Hotel</option>
                                    <option value="Tour Guide">Tour Guide</option>
                                    <option value="Customer">Customer</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>Ratings: </td>
                            <td><input type="number" name="qty" value=""></td>
                        </tr>
                        </tr>

                        <tr>
                            <td>Description: </td>
                            <td><input type="text" name="description"></td>
                        </tr>
                        <tr>

                            <td colspan="2">
                                <input type="hidden" name="id" value="">
                                <input type="hidden" name="current_img" value="">
                                <input type="submit" name="submit" value="Update Review" class="btn-secondary">
                                <input type="submit" name="submit" value="Delete Review" class="btn-danger">
                            </td>

                    </table>
                </form>
            </div>

            <div class="back">
                <a href="admin.index.html" class="btn btn-back">Back</a>
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