<?php

require "../con/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $response = array();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];

    $cek = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_fetch_array(mysqli_query($con, $cek));

    if (isset($result)) {
        $response['value'] = 2;
        $response['message'] = "Username sudah terdaftar";
        echo json_encode($response);
    } else {
        $insert = "INSERT INTO users VALUE(NULL,'$username','$password','1','$nama','1',NOW())";

    if (mysqli_query($con, $insert)) {
            $response['value'] = 1;
            $response['message'] = "Berhasil Daftar";
            echo json_encode($response);
    } else {
            $response['value'] = 0;
            $response['message'] = "Gagal Daftar";
            echo json_encode($response);
        }
    }
}

?>