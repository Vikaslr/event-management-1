<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Admin Dashboard</h1>
<h2>Manage Events</h2>
<table>
    <tr>
        <th>Event Name</th>
        <th>Date</th>
        <th>Location</th>
        <th>Action</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM events");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['date']}</td>
                <td>{$row['location']}</td>
                <td><a href='delete_event.php?id={$row['id']}'>Delete</a></td>
            </tr>";
    }
    ?>
</table>

<h2>Add New Event</h2>
<form method="POST">
    <label>Name:</label>
    <input type="text" name="name" required><br>
    <label>Date:</label>
    <input type="date" name="date" required><br>
    <label>Location:</label>
    <input type="text" name="location" required><br>
    <label>Description:</label>
    <textarea name="description" required></textarea><br>
    <input type="submit" value="Add Event">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $location = $_POST['location'];
    $description = $_POST['description'];

    $conn->query("INSERT INTO events (name, date, location, description) VALUES ('$name', '$date', '$location', '$description')");
    header("Location: admin-dashboard.php");
}
?>
</body>
</html>
