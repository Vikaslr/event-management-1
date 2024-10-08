<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Event Registration</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
if (isset($_GET['id'])) {
    $event_id = $_GET['id'];
    $result = $conn->query("SELECT * FROM events WHERE id = $event_id");
    $event = $result->fetch_assoc();

    echo "<h1>{$event['name']}</h1>";
    echo "<p>Date: {$event['date']}</p>";
    echo "<p>Location: {$event['location']}</p>";
    echo "<p>Description: {$event['description']}</p>";
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $conn->query("INSERT INTO users (name, email, phone) VALUES ('$name', '$email', '$phone')");
    $user_id = $conn->insert_id;
    $conn->query("INSERT INTO registrations (user_id, event_id) VALUES ($user_id, $event_id)");

    echo "<p>Thank you for registering, $name!</p>";
}
?>
<form method="POST">
    <label>Name:</label>
    <input type="text" name="name" required><br>
    <label>Email:</label>
    <input type="email" name="email" required><br>
    <label>Phone:</label>
    <input type="text" name="phone" required><br>
    <input type="submit" value="Register">
</form>
</body>
</html>
