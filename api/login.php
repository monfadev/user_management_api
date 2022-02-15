<?php

require "../con/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $response = array();
    $username = $_POST['username'];
    $password = $_POST['password'];


    $login = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $cek = mysqli_fetch_array(mysqli_query($con, $login));

    if($cek > 0){
        $data = mysqli_fetch_array(mysqli_query($con, $login));
        
        if($data['level']==1){
            $response['value'] = 1;
            $response['level'] = 1;
            $response['username'] = $data['username'];
            $response['nama'] = $data['nama'];
            $response['message'] = "Login Berhasil User";
            echo json_encode($response);
        } else if($data['level']==2) {
            $response['value'] = 2;
            $response['level'] = 2;
            $response['username'] = $data['username'];
            $response['nama'] = $data['nama'];
            $response['message'] = "Login Berhasil Admin";
            echo json_encode($response);
        } else {
            $response['value'] = 0;
            $response['message'] = "Login Gagal";
            echo json_encode($response);
        }
    } else {
        $response['value'] = 0;
        $response['message'] = "Login Gagal";
        echo json_encode($response);
    }

}
?>