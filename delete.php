<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myShop";

    // create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // check connection
    if ($conn->connect_error) {
        header("Location: /myShop/index.php?error=connection");
        exit;
    }
    
    // prepare and bind
    $stmt = $conn->prepare("DELETE FROM clients WHERE id = ?");
    if (!$stmt) {
        header("Location: /myShop/index.php?error=prepare");
        exit;
    }
    $stmt->bind_param("i", $id);
    
    // execute and check result
    if ($stmt->execute()) {
        header("Location: /myShop/index.php?success=1");
    } else {
        header("Location: /myShop/index.php?error=1");
    }
    $stmt->close();
    $conn->close();
    exit;
}
header("Location: /myShop/index.php");
exit;
?>