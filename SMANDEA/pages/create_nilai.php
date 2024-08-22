<?php
include '../backend/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dmu_id = $_POST['dmu_id'];
    $petugas_ib = $_POST['petugas_ib'];
    $jumlah_populasi_sapi = $_POST['jumlah_populasi_sapi'];
    $sapi_yang_di_ib = $_POST['sapi_yang_di_ib'];
    $pkb_bunting = $_POST['pkb_bunting'];
    $kelahiran = $_POST['kelahiran'];

    $sql = "INSERT INTO nilai (dmu_id, petugas_ib, jumlah_populasi_sapi, sapi_yang_di_ib, pkb_bunting, kelahiran) 
            VALUES ('$dmu_id', '$petugas_ib', '$jumlah_populasi_sapi', '$sapi_yang_di_ib', '$pkb_bunting', '$kelahiran')";

    if ($conn->query($sql) === TRUE) {
        header("Location: nilai.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// Fetch DMU list for selection
$sql = "SELECT id, nama_dmu FROM dmu";
$dmuResult = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>Create Nilai</title>
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Create Nilai</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>DMU</label>
                <select name="dmu_id" class="form-control" required>
                    <?php while ($dmuRow = $dmuResult->fetch_assoc()): ?>
                        <option value="<?= $dmuRow['id'] ?>"><?= $dmuRow['nama_dmu'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Petugas IB</label>
                <input type="number" name="petugas_ib" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Jumlah Populasi Sapi</label>
                <input type="number" name="jumlah_populasi_sapi" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Sapi yang di IB</label>
                <input type="number" name="sapi_yang_di_ib" class="form-control" required>
            </div>
            <div class="form-group">
                <label>PKB Bunting</label>
                <input type="number" name="pkb_bunting" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Kelahiran</label>
                <input type="number" name="kelahiran" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="nilai.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>