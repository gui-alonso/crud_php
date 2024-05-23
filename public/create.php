<?php
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $conn = getDBConnection();
    $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);
    $stmt->execute();

    header("Location: index.php");
}

require_once '../templates/header.php';
?>

<h1>Adicionar Usuário</h1>
<form method="POST" action="create.php">
    <label for="name">Nome:</label>
    <input type="text" id="name" name="name" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <button type="submit">Adicionar</button>
</form>

<?php
require_once '../templates/footer.php';
?>