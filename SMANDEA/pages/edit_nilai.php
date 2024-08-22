<?php
include '../backend/connection.php';

$id = $_GET['id'];
$sql = "SELECT * FROM nilai WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $petugas_ib = $_POST['petugas_ib'];
    $jumlah_populasi_sapi = $_POST['jumlah_populasi_sapi'];
    $sapi_yang_di_ib = $_POST['sapi_yang_di_ib'];
    $pkb_bunting = $_POST['pkb_bunting'];
    $kelahiran = $_POST['kelahiran'];

    $sql = "UPDATE nilai SET petugas_ib='$petugas_ib', jumlah_populasi_sapi='$jumlah_populasi_sapi', sapi_yang_di_ib='$sapi_yang_di_ib', pkb_bunting='$pkb_bunting', kelahiran='$kelahiran' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: nilai.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>Edit Nilai</title>
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Nilai</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Petugas IB</label>
                <input type="number" name="petugas_ib" class="form-control" value="<?= $row['petugas_ib'] ?>" required>
            </div>
            <div class="form-group">
                <label>Jumlah Populasi Sapi</label>
                <input type="number" name="jumlah_populasi_sapi" class="form-control"
                    value="<?= $row['jumlah_populasi_sapi'] ?>" required>
            </div>
            <div class="form-group">
                <label>Sapi yang di IB</label>
                <input type="number" name="sapi_yang_di_ib" class="form-control" value="<?= $row['sapi_yang_di_ib'] ?>"
                    required>
            </div>
            <div class="form-group">
                <label>PKB Bunting</label>
                <input type="number" name="pkb_bunting" class="form-control" value="<?= $row['pkb_bunting'] ?>"
                    required>
            </div>
            <div class="form-group">
                <label>Kelahiran</label>
                <input type="number" name="kelahiran" class="form-control" value="<?= $row['kelahiran'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="nilai.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>