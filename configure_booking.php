<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $movie_id = $_POST['movie_id'];
    $seats = $_POST['seats'];
    $user_id = 1; // Assuming user is logged in (You will need a login system)

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "movie_booking_system";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO bookings (user_id, movie_id, booking_time, seats) 
            VALUES ($user_id, $movie_id, NOW(), $seats)";
    if ($conn->query($sql) === TRUE) {
        echo "Booking confirmed!";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
