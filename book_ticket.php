<?php
if (!isset($_GET['movie_id'])) {
    echo "Movie ID is missing.";
    exit;
}

$movie_id = $_GET['movie_id'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movie_booking_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM movies WHERE id = $movie_id";
$result = $conn->query($sql);
$movie = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Ticket</title>
</head>
<body>
    <h1>Book Ticket for <?php echo $movie['title']; ?></h1>
    <form action="confirm_booking.php" method="POST">
        <input type="hidden" name="movie_id" value="<?php echo $movie['id']; ?>">
        <label for="seats">Number of Seats:</label>
        <input type="number" id="seats" name="seats" min="1" required>
        <button type="submit">Book Now</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>
