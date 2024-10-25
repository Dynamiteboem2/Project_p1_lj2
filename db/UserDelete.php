<?php

include_once("conn.php");
include_once("auth.php");

if (isset($_GET['id']) && isset($_GET['table']) && isset($_GET['page'])) {
    $id = intval($_GET['id']);
    $table = $_GET['table'];
    $page = $_GET['page'];

    if ($table === 'stand') {
        
        $stmt = $conn->prepare("CALL spDeleteStandById(?)");
        if ($stmt) {
            
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                
                header("Location: ../pages/gebruiker_overzicht/cart_overzicht.php?message=Record deleted successfully");
            } else {
                header("Location: ../pages/gebruiker_overzicht/cart_overzicht.php?error=Error deleting record");
            }
            $stmt->close();
           
        }
     }
}
