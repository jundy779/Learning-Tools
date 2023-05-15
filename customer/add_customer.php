<?php
include "../koneksi.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $card_id = $_POST['card_id'];

    $sql = "INSERT INTO customer (name, gender, phone, email, address, card_id) VALUES ('$name', '$gender', '$phone', '$email', '$address', '$card_id')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: customer.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Customer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Create Customer</h2>

    <form method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="gender">Gender:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender-male" value="L">
                <label class="form-check-label" for="gender-male">Laki-Laki</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender-female" value="P">
                <label class="form-check-label" for="gender-female">Perempuan</label>
            </div>
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address">
        </div>

        <div class="form-group">
            <label for="card_id">Card Code:</label>
            <select class="form-control" id="card_id" name="card_id">
                <?php
                $sql2 = "SELECT * FROM card";
                $result2 = mysqli_query($conn, $sql2);
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    echo "<option value='" . $row2['id'] . "'>" . $row2['code'] . "</option>";
                }
                ?>
            </select>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Create</button>
    </form>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
