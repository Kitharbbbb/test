<?php 
    include('server.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดงโปรไฟล์</title>
</head>
<body>
<?php
    // Assuming you have a user ID for the profile you want to display
    $user_id = 1; // Change this to the appropriate user ID

    // Retrieve user data from the database
    $sql = "SELECT * FROM customers WHERE id = $user_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Display user information
        echo "<h1> " . $row['username'] . "!</h1>";
        echo "<h1> " . $row['firstname'] . "!</h1>";
        echo "<h1> " . $row['lastname'] . "!</h1>";
        echo "<p>Email: " . $row['email'] . "</p>";
        echo "<p>Date of Birth: " . $row['date_of_birth'] . "</p>";
        echo "<p>Address: " . $row['address'] . "</p>";
        echo "<p>Phone Number: " . $row['phone_number'] . "</p>";

        // Display user profile picture
        $img = $row['profile_picture'];
        echo "<img src='$profile_picture' alt='Profile Picture' width='150' height='150'>";
    } else {
        echo "User not found.";
    }

    mysqli_close($conn);
    ?>
</body>
</html>