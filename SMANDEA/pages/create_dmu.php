<?php
include '../backend/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_dmu = $_POST['nama_dmu'];

    $sql = "INSERT INTO dmu (nama_dmu) VALUES ('$nama_dmu')";
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
    <title>Create DMU</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Add New DMU</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="nama_dmu">Nama DMU</label>
                <input type="text" class="form-control" id="nama_dmu" name="nama_dmu" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="dmu.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>