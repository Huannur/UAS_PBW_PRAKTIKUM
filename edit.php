<?php
include 'koneksi.php';

// Get the penggunaID from the URL parameter
if (isset($_GET['id'])) {
    $penggunaID = $_GET['id'];

    // Query the pengguna based on the penggunaID
    $query_pengguna = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE penggunaID='$penggunaID'");
    $pengguna = mysqli_fetch_assoc($query_pengguna);

    // Query the kategori options from the kategori table
    $query_kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
    $kategori_options = '';
    while ($row = mysqli_fetch_assoc($query_kategori)) {
        $kategoriID = $row['kategoriID'];
        $selected = ($kategoriID == $pengguna['kategoriID']) ? 'selected' : '';
        $kategori_options .= "<option value='$kategoriID' $selected>$kategoriID</option>";
    }
}

if (isset($_POST['update'])) {
    $penggunaID = $_POST['penggunaID'];
    $kategoriID = $_POST['kategoriID'];

    $result_pengguna = mysqli_query($koneksi, "UPDATE pengguna SET kategoriID='$kategoriID' WHERE penggunaID='$penggunaID'");
    if ($result_pengguna) {
        header("Location: pengguna.php");
        exit;
    } else {
        echo "Update Gagal";
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
    <title>Edit Pengguna</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center pt-5">Edit Pengguna</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="" method="post" class="mt-4">
                    <div class="mb-3">
                        <label for="penggunaID" class="form-label">Pengguna ID</label>
                        <input type="text" class="form-control" id="penggunaID" name="penggunaID" value="<?php echo $pengguna['penggunaID']; ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="kategoriID" class="form-label">Kategori</label>
                        <select class="form-control" id="kategoriID" name="kategoriID" required>
                            <?php echo $kategori_options; ?>
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
