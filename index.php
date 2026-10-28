<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movie_booking_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM movies";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie List</title>
</head>
<body>
    <h1>Choose Your Movie</h1>
    <ul>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <li>
                <a href="book_ticket.php?movie_id=<?php echo $row['id']; ?>">
                    <?php echo $row['title']; ?> (<?php echo $row['genre']; ?>)
                </a>
            </li>
        <?php } ?>
    </ul>
</body>
</html>

<?php
$conn->close();
?>
