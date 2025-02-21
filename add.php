<?php
ob_start(); 
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $quantity = intval($_POST["quantity"]);

    if (!empty($name) && $quantity > 0) {
        $stmt = $conn->prepare("INSERT INTO items (name, quantity) VALUES (?, ?)");
        $stmt->bind_param("si", $name, $quantity);

        if ($stmt->execute()) {
            $stmt->close();
            echo "✅ Item added successfully! ";
            
            
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
