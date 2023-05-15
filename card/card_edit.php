<?php
include "../koneksi.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $code = $_POST['code'];
    $name = $_POST['name'];
    $discount = $_POST['discount'];
    $member_fee = $_POST['member_fee'];

    $sql = "UPDATE card SET code='$code', name='$name', discount='$discount', member_fee='$member_fee' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: card.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM card WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "No record found";
        exit;
    }
} else {
    echo "Invalid request";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Card</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Edit Card</h2>

    <form method="POST">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">

        <div class="form-group">
            <label for="code">Code:</label>
            <input type="text" class="form-control" id="code" name="code" value="<?= $row['code'] ?>">
        </div>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $row['name'] ?>">
        </div>

        <div class="form-group">
            <label for="discount">Discount:</label>
            <input type="text" class="form-control" id="discount" name="discount" value="<?= $row['discount'] ?>">
        </div>

        <div class="form-group">
            <label for="member_fee">Member Fee:</label>
            <input type="text" class="form-control" id="member_fee" name="member_fee" value="<?= $row['member_fee'] ?>">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </form>

    <a href="card.php" class="btn btn-secondary mt-3">Back to Card List</a>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
