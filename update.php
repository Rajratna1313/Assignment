<?php
ob_start(); 
include 'db.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$item = $conn->query("SELECT * FROM items WHERE id=$id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $quantity = intval($_POST['quantity']);

    if (!empty($name) && $quantity > 0) {
        $stmt = $conn->prepare("UPDATE items SET name=?, quantity=? WHERE id=?");
        $stmt->bind_param("sii", $name, $quantity, $id);

        if ($stmt->execute()) {
            echo "✅ Item updated successfully!";
            $stmt->close();

            sleep(1);
            header("Location: index.php");
            exit();
        } else {
            echo "❌ Error: " . $conn->error;
        }
    } else {
        echo "⚠ Invalid input!";
    }
}

ob_end_flush(); 
?>

<form method="POST">
    <input type="text" name="name" value="<?= htmlspecialchars($item['name']); ?>" required>
    <input type="number" name="quantity" value="<?= htmlspecialchars($item['quantity']); ?>" required>
    <button type="submit">Update</button>
</form>
