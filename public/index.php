<?php
require_once '../config/db.php';

$conn = getDBConnection();
$result = $conn->query("SELECT * FROM users");

require_once '../templates/header.php';
?>

<h1>Usuários</h1>
<a href="create.php">Adicionar Usuário</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Editar</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>">Deletar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<?php
require_once '../templates/footer.php';
$conn->close();
?>