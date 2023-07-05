<?php
include 'koneksi.php';

// Mendapatkan daftar pengguna dari tabel pengguna
$query_pengguna = mysqli_query($koneksi, "SELECT * FROM pengguna");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Halaman Data Pengguna</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center pt-5">Data Pengguna</h1>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">Pengguna ID</th>
                    <th scope="col">Kategori ID</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($query_pengguna)) : ?>
                    <tr>
                        <td><?php echo $row['penggunaID']; ?></td>
                        <td><?php echo $row['kategoriID']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['penggunaID']; ?>" class="btn btn-primary">Edit</a>
                            <a href="delete.php?id=<?php echo $row['penggunaID']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
