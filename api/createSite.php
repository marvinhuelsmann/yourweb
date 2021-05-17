<?php
require 'util/config.php';
setCorsPolice();

$db = mysqli_connect($_ENV['DB_HOSTNAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_USERNAME']);

$tokenResponse = json_decode(isValidToken(getBearerToken()), true);
$alreadyExistCode = false;

if (isset($_GET['name']) &&
    isset($_GET['userID']) &&
    isset($_GET['text']) &&
    isset($_GET['color']) &&
    isset($_GET['subHeadLine']) &&
    isset($_GET['birthday']) &&
    isset($_GET['place']) &&
    isset($_GET['image']) &&
    isset($_GET['link']) &&
    isset($_GET['email']) &&

    isset($_GET['twitter']) &&
    isset($_GET['minecraft']) &&
    isset($_GET['youtube']) &&
    isset($_GET['discord']) &&
    isset($_GET['twitch'])) {

    $userID = $_GET['userID'];
    $name = $_GET['name'];
    $text = $_GET['text'];
    $subHeadLine = $_GET['subHeadLine'];
    $color = $_GET['color'];
    $birthday = $_GET['birthday'];
    $place = $_GET['place'];
    $image = $_GET['image'];
    $link = $_GET['link'];
    $email = $_GET['email'];

    $twitter = $_GET['twitter'];
    $minecraft = $_GET['minecraft'];
    $youtube = $_GET['youtube'];
    $twitch = $_GET['twitch'];
    $discord = $_GET['discord'];

    $ip = getIp();

    $amountZero = 0;

    if (checkIfIdIsValid($tokenResponse, $userID)) {

        $queryIntoSites = "INSERT INTO `websites` (`ip`, `userID`, `name`, `subHeadLine`, `birthday`, `text`, `email`, `color`, `place`, `image`, `link`, `likes`, `views`, `verify`, `twitter`, `minecraft`, `youtube`, `twitch`, `discord`)
 VALUES ('" . mysqli_real_escape_string($db, $ip) . "', '" . mysqli_real_escape_string($db, $userID) . "', '" . mysqli_real_escape_string($db, $name) . "',
     '" . mysqli_real_escape_string($db, $subHeadLine) . "', '" . mysqli_real_escape_string($db, $birthday) . "',
      '" . mysqli_real_escape_string($db, $text) . "','" . mysqli_real_escape_string($db, $email) . "',
      '" . mysqli_real_escape_string($db, $color) . "','" . mysqli_real_escape_string($db, $place) . "',
      '" . mysqli_real_escape_string($db, $image) . "',  '" . mysqli_real_escape_string($db, $link) . "', '" . mysqli_real_escape_string($db, $amountZero) . "', '" . mysqli_real_escape_string($db, $amountZero) . "', '" . mysqli_real_escape_string($db, $amountZero) . "',
       '" . mysqli_real_escape_string($db, $twitter) . "', '" . mysqli_real_escape_string($db, $minecraft) . "', '" . mysqli_real_escape_string($db, $youtube) . "', '" . mysqli_real_escape_string($db, $twitch) . "', '" . mysqli_real_escape_string($db, $discord) . "');";

        $user_check_query = "SELECT * FROM websites";
        $db_erg = mysqli_query($db, $user_check_query);

        while ($row = mysqli_fetch_array($db_erg, MYSQLI_ASSOC)) {
            if ($row['userID'] === $userID) {
                $alreadyExistCode = true;
            }
        }

        if (!$alreadyExistCode) {
            if (mysqli_query($db, $queryIntoSites)) {
                echo json_encode([
                    'success' => "your website is created!"
                ]);
                return http_response_code(200);
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

