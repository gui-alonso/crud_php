<?php
require_once '../config/db.php';

$id = $_GET['id'];

$conn = getDBConnection();
$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: index.php");
?>
