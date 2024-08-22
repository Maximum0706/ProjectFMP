<?php
include '../backend/connection.php';

$id = $_GET['id'];
$sql = "SELECT * FROM variable WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $variable = $_POST['variable'];
    $type_variable = $_POST['type_variable'];
    $nama_variabel = $_POST['nama_variabel'];

    $sql = "UPDATE variable SET variable='$variable', type_variable='$type_variable', nama_variabel='$nama_variabel' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: variable.php");
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
    <title>
        Analisis DEA SMAN
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Variable</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Kode Variable</label>
                <input type="text" name="variable" class="form-control" value="<?= $row['variable'] ?>" required>
            </div>
            <div class="form-group">
                <label>Tipe Variable</label>
                <input type="text" name="type_variable" class="form-control" value="<?= $row['type_variable'] ?>"
                    required>
            </div>
            <div class="form-group">
                <label>Nama Variable</label>
                <input type="text" name="nama_variabel" class="form-control" value="<?= $row['nama_variabel'] ?>"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="variable.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>