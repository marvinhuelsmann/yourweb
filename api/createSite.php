<?php
require 'util/config.php';
setCorsPolice();

$db = mysqli_connect('db.dlrm-hosting.de', 'marvinhuelsmann', 'wyUoXpjFKl2vAEqb', 'marvinhuelsmann');

$tokenResponse = json_decode(isValidToken(getBearerToken()), true);
$alreadyExistCode = false;

if (isset($_GET['code']) &&
    isset($_GET['name']) &&
    isset($_GET['userID']) &&
    isset($_GET['text']) &&
    isset($_GET['color']) &&
    isset($_GET['subHeadLine']) &&
    isset($_GET['birthday']) &&
    isset($_GET['place']) &&
    isset($_GET['image']) &&
    isset($_GET['email'])) {

    $code = $_GET['code'];
    $userID = $_GET['userID'];
    $name = $_GET['name'];
    $text = $_GET['text'];
    $subHeadLine = $_GET['subHeadLine'];
    $color = $_GET['color'];
    $birthday = $_GET['birthday'];
    $place = $_GET['place'];
    $image = $_GET['image'];
    $email = $_GET['email'];
    $ip = getIp();

    $likes = 0;

    if ($tokenResponse["id"] === $userID) {

        $sql = "INSERT INTO `websites` (`ip`, `userID`, `name`, `subHeadLine`, `birthday`, `text`, `email`, `color`, `place`, `image`, `likes`)
 VALUES ('" . mysqli_real_escape_string($db, $ip) . "', '" . mysqli_real_escape_string($db, $userID) . "', '" . mysqli_real_escape_string($db, $name) . "',
     '" . mysqli_real_escape_string($db, $subHeadLine) . "', '" . mysqli_real_escape_string($db, $birthday) . "',
      '" . mysqli_real_escape_string($db, $text) . "','" . mysqli_real_escape_string($db, $email) . "',
      '" . mysqli_real_escape_string($db, $color) . "','" . mysqli_real_escape_string($db, $place) . "',
      '" . mysqli_real_escape_string($db, $image) . "', '" . mysqli_real_escape_string($db, $likes) . "' );";

        $user_check_query = "SELECT * FROM websites";
        $db_erg = mysqli_query($db, $user_check_query);

        while ($row = mysqli_fetch_array($db_erg, MYSQLI_ASSOC)) {
            if ($row['userID'] === $userID) {
                $alreadyExistCode = true;
            }
        }

        if (!$alreadyExistCode) {
            if (mysqli_query($db, $sql)) {
                while ($row = mysqli_fetch_array($db_erg, MYSQLI_ASSOC)) {
                    if ($row['name'] === $name && $row['text'] === $text) {
                        echo json_encode([
                            'id' => $row['id']
                        ]);
                        return;
                    }
                }
            } else {
                echo json_encode([
                    'error' => mysqli_error($db)
                ]);
            }
        } else {
            echo json_encode([
                'error' => "a site with your onegaming id is already exist!"
            ]);
            return http_response_code(404);
        }
    } else {
        echo json_encode([
            'error' => "your user id is not the same as your onegaming id"
        ]);
        return http_response_code(401);
    }
} else {
    echo json_encode([
        'error' => "some parameters are missing"
    ]);
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
