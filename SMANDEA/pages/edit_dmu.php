<?php
include '../backend/connection.php';

$id = $_GET['id'];
$sql = "SELECT * FROM dmu WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_dmu = $_POST['nama_dmu'];

    $sql = "UPDATE dmu SET nama_dmu='$nama_dmu' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: dmu.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit DMU</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit DMU</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="nama_dmu">Nama DMU</label>
                <input type="text" class="form-control" id="nama_dmu" name="nama_dmu" value="<?= $row['nama_dmu'] ?>"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="dmu.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>