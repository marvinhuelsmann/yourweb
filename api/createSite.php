<?php
header('Access-Control-Allow-Origin: *');
$db = mysqli_connect('db.dlrm-hosting.de', 'marvinhuelsmann', 'wyUoXpjFKl2vAEqb', 'marvinhuelsmann');

if (isset($_GET['code']) &&
    isset($_GET['name']) &&
    isset($_GET['text']) &&
    isset($_GET['color']) &&
    isset($_GET['subHeadLine']) &&
    isset($_GET['birthday']) &&
    isset($_GET['place']) &&
    isset($_GET['image']) &&
    isset($_GET['email'])) {

    $code = $_GET['code'];
    $name = $_GET['name'];
    $text = $_GET['text'];
    $subHeadLine = $_GET['subHeadLine'];
    $color = $_GET['color'];
    $birthday = $_GET['birthday'];
    $place = $_GET['place'];
    $image = $_GET['image'];
    $email = $_GET['email'];
    $ip = getIp();

    if ($code !== '500' || $name !== '' || $name != null) {
        return http_response_code(203);
    }

    $sql = "INSERT INTO `websites` (`ip`, `name`, `code`, `subHeadLine`, `birthday`, `text`, `email`, `color`, `place`, `image`)
 VALUES ('" . mysqli_real_escape_string($db, $ip) . "', '" . mysqli_real_escape_string($db, $name) . "', '" . mysqli_real_escape_string($db, $code) . "',
     '" . mysqli_real_escape_string($db, $subHeadLine) . "', '" . mysqli_real_escape_string($db, $birthday) . "',
      '" . mysqli_real_escape_string($db, $text) . "','" . mysqli_real_escape_string($db, $email) . "',
      '" . mysqli_real_escape_string($db, $color) . "','" . mysqli_real_escape_string($db, $place) . "',
      '" . mysqli_real_escape_string($db, $image) . "');";

    if (mysqli_query($db, $sql)) {
        echo json_encode([
            'success' => 'Site is created!'
        ]);
        return http_response_code(201);
    } else {
        echo json_encode([
            'error' => mysqli_error($db)
        ]);
    }

} else {
    return http_response_code(400);
}

header('Content-Type: application/json');

function getIp()
{
    $ip = $_SERVER['REMOTE_ADDR'];
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
    } elseif (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    return $ip;
}
