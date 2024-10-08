<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Event Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Upcoming Events</h1>
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
                    <td><a href='event.php?id={$row['id']}'>View & Register</a></td>
                </tr>";
        }
        ?>
    </table>
</body>
</html>
