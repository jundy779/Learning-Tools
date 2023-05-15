<?php
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $code = $_POST['code'];
    $name = $_POST['name'];
    $discount = $_POST['discount'];
    $member_fee = $_POST['member_fee'];

    $sql = "INSERT INTO card (code, name, discount, member_fee) VALUES ('$code', '$name', '$discount', '$member_fee')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: card.php');
        exit;
    } else {
        $error = mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Card</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Add Card</h2>

    <?php if (isset($error)) : ?>
        <div class="alert alert-danger" role="alert">
            Error: <?= $error ?>
        </div>
    <?php endif ?>

    <form method="POST">
        <div class="form-group">
            <label for="code">Code:</label>
            <input type="text" class="form-control" id="code" name="code">
        </div>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="discount">Discount:</label>
            <input type="text" class="form-control" id="discount" name="discount">
        </div>

        <div class="form-group">
            <label for="member_fee">Member Fee:</label>
            <input type="text" class="form-control" id="member_fee" name="member_fee">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
