<?php
ob_start(); 
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    if ($conn->query("DELETE FROM items WHERE id=$id")) {
        echo "✅ Item deleted successfully!";
        
        
        sleep(1);
        header("Location: index.php");
        exit();
    } else {
        echo "❌ Error: " . $conn->error;
    }
} else {
    echo "⚠ Invalid request!";
}
ob_end_flush(); 
?>
