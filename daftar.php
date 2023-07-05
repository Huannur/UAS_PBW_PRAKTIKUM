<?php
include 'koneksi.php';

// Mendapatkan daftar kategori dari tabel kategori
$query_kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
$kategori_options = '';
while ($row = mysqli_fetch_assoc($query_kategori)) {
    $kategoriID = $row['kategoriID'];
    $kategori_options .= "<option value='$kategoriID'>$kategoriID</option>";
}

if (isset($_POST['daftar'])) {
    $penggunaID = $_POST['penggunaID'];
    $sandi = $_POST['sandi'];
    $confirm_sandi = $_POST['confirm_pass'];
    $kategoriID = $_POST['kategoriID'];

    $query_pengguna = mysqli_query($koneksi, "SELECT penggunaID FROM pengguna WHERE penggunaID='$penggunaID'");
    $num_pengguna = mysqli_num_rows($query_pengguna);

    if ($sandi !== $confirm_sandi) {
        echo "Password tidak sesuai";
        return false;
    }

    if ($num_pengguna > 0) {
        echo "Username sudah terdaftar";
    } else {
        $result_pengguna = mysqli_query($koneksi, "INSERT INTO pengguna (penggunaID, sandi, kategoriID) VALUES ('$penggunaID', '$sandi', '$kategoriID')");
        if ($result_pengguna) {
            echo "Registrasi Berhasil";
            header("Location: index.php");
            exit;
        } else {
            echo "Registrasi Gagal";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Halaman Registrasi</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center pt-5">Selamat Datang di Halaman Registrasi</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="" method="post" class="mt-4">
                    <div class="mb-3">
                        <label for="penggunaID" class="form-label">Pengguna ID</label>
                        <input type="text" class="form-control" id="penggunaID" name="penggunaID" required>
                    </div>

                    <div class="mb-3">
                        <label for="kategoriID" class="form-label">Kategori</label>
                        <select class="form-control" id="kategoriID" name="kategoriID" required>
                            <?php echo $kategori_options; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="sandi" class="form-label">Sandi</label>
                        <input type="password" class="form-control" id="sandi" name="sandi" required>
                    </div>

                    <div class="mb-3">
                        <label for="confirm_pass" class="form-label">Konfirmasi Sandi</label>
                        <input type="password" class="form-control" id="confirm_pass" name="confirm_pass" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" name="daftar" class="btn btn-primary">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
