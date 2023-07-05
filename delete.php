<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $penggunaID = $_GET['id'];

    // Delete related records from the staff table
    $result_staff = mysqli_query($koneksi, "DELETE FROM staff WHERE penggunaID='$penggunaID'");
    if ($result_staff) {
        // Delete the pengguna record based on the penggunaID
        $result_pengguna = mysqli_query($koneksi, "DELETE FROM pengguna WHERE penggunaID='$penggunaID'");
        if ($result_pengguna) {
            header("Location: pengguna.php");
            exit;
        } else {
            echo "Delete Gagal pada Tabel Pengguna";
        }
    } else {
        echo "Delete Gagal pada Tabel Staff";
    }
}
?>
