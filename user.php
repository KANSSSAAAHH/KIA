<?php
if(isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    $conn = connectDB();
    $sql = "SELECT id, NamaUser, NomorTelp, Email, JenisKelamin FROM user WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    
    $stmt->close();
    $conn->close();
    
    // Return data as JSON
    header('Content-Type: application/json');
    echo json_encode($user);
    exit();
}
?>