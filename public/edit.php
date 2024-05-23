<?php
require_once '../config/db.php';

$id = $_GET['id'];

$conn = getDBConnection();
$result = $conn->query("SELECT * FROM users WHERE id = $id");
$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
    $stmt->bind_param("ssi", $name, $email, $id);
    $stmt->execute();

    header("Location: index.php");
}

require_once '../templates/header.php';
?>

<h1>Editar Usuário</h1>
<form method="POST" action="edit.php?id=<?php echo $id; ?>">
    <label for="name">Nome:</label>
    <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
    <br>
    <button type="submit">Atualizar</button>
</form>

<?php
require_once '../templates/footer.php';
$conn->close();
?>