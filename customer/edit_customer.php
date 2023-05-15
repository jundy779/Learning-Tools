<?php
include "../koneksi.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $card_id = $_POST['card_id'];

    $sql = "UPDATE customer SET name='$name', gender='$gender', phone='$phone', email='$email', address='$address', card_id='$card_id' WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: customer.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

$id = $_GET['id'];
$sql = "SELECT customer.id, customer.name, customer.gender, customer.phone, customer.email, customer.address, customer.card_id, card.code 
        FROM customer
        JOIN card ON customer.card_id = card.id
        WHERE customer.id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Edit Customer</h2>

    <form method="POST">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $row['name'] ?>">
        </div>

        <div class="form-group">
            <label for="gender">Gender:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender-male" value="L" <?= $row['gender'] == 'L' ? 'checked' : '' ?>>
                <label class="form-check-label" for="gender-male">Laki-Laki</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender-female" value="P" <?= $row['gender'] == 'P' ? 'checked' : '' ?>>
                <label class="form-check-label" for="gender-female">Perempuan</label>
            </div>
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?= $row['phone'] ?>">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" value="<?= $row['email'] ?>">
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" value="<?= $row['address'] ?>">
        </div>

        <div class="form-group">
            <label for="card_id">Card Code:</label>
            <select class="form-control" id="card_id" name="card_id">
                <?php
                $sql2 = "SELECT * FROM card";
                $result2 = mysqli_query($conn, $sql2);
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $selected = $row['card_id'] == $row2['id'] ? 'selected' : '';
                    echo "<option value='" . $row2['id'] . "' $selected>" . $row2['code'] . "</option>";
                }
                ?>
            </select>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
