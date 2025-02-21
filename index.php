
<!DOCTYPE html>
<html lang="en">
<head>
<?php
include 'db.php';



$result = $conn->query("SELECT * FROM items");
?>

    <title>CRUD Application</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Item List</h2>
    <form action="add.php" method="POST">
        <input type="text" name="name" required placeholder="Enter item name">
        <input type="number" name="quantity" required placeholder="Enter quantity">
        <button type="submit">Add Item</button>
    </form>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['name']; ?></td>
            <td><?= $row['quantity']; ?></td>
            <td>
                <a href="update.php?id=<?= $row['id']; ?>">Edit</a>
                <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Delete this item?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    
</body>
</html>
