<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $conn->query("SELECT * FROM table_name WHERE id=$id")->fetch_assoc();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $conn->query("UPDATE table_name SET name='$name' WHERE id=$id");
        header('Location: index.php');
    }
}
?>
<form method="POST">
    <input type="text" name="name" value="<?= $data['name'] ?>" required>
    <button type="submit">Update</button>
</form>