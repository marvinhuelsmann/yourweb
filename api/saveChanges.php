<?php
require 'util/config.php';
setCorsPolice();

$db = mysqli_connect($_ENV['DB_HOSTNAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_USERNAME']);

$tokenResponse = json_decode(isValidToken(getBearerToken()), true);
$alreadyExistCode = false;

if (isset($_GET['name']) &&
    isset($_GET['userID']) &&
    isset($_GET['text']) &&
    isset($_GET['subHeadLine']) &&
    isset($_GET['birthday']) &&
    isset($_GET['place']) &&
    isset($_GET['link']) &&
    isset($_GET['image'])) {

    $userID = $_GET['userID'];
    $name = $_GET['name'];
    $text = $_GET['text'];
    $subHeadLine = $_GET['subHeadLine'];
    $birthday = $_GET['birthday'];
    $place = $_GET['place'];
    $image = $_GET['image'];
    $link = $_GET['link'];

    $twitter = $_GET['twitter'];
    $minecraft = $_GET['minecraft'];
    $youtube = $_GET['youtube'];
    $twitch = $_GET['twitch'];
    $discord = $_GET['discord'];

    $ip = getIp();

    if (checkIfIdIsValid($tokenResponse, $userID)) {

        $sql = "UPDATE `websites` SET `ip` = '" . mysqli_real_escape_string($db, $ip) . "', `name` = '" . mysqli_real_escape_string($db, $name) . "', `text` = '" . mysqli_real_escape_string($db, $text) . "',
        `subHeadLine` = '" . mysqli_real_escape_string($db, $subHeadLine) . "', `birthday` = '" . mysqli_real_escape_string($db, $birthday) . "', `place` = '" . mysqli_real_escape_string($db, $place) . "',
        `image` = '" . mysqli_real_escape_string($db, $image) . "', `link` = '" . mysqli_real_escape_string($db, $link) . "', `twitter` = '" . mysqli_real_escape_string($db, $twitter) . "', `minecraft` = '" . mysqli_real_escape_string($db, $minecraft) . "', `youtube` = '" . mysqli_real_escape_string($db, $youtube) . "', `twitch` = '" . mysqli_real_escape_string($db, $twitch) . "', `discord` = '" . mysqli_real_escape_string($db, $discord) . "'  WHERE `userID` = '" . mysqli_real_escape_string($db, $userID) . "'";

        $user_check_query = "SELECT * FROM websites";
        $db_erg = mysqli_query($db, $user_check_query);

        while ($row = mysqli_fetch_array($db_erg, MYSQLI_ASSOC)) {
            if ($row['userID'] === $userID) {
                $alreadyExistCode = true;
            }
        }

        if ($alreadyExistCode) {
            mysqli_query($db, $sql);
        } else {
            echo json_encode([
                'error' => "a site with your onegaming id is not exisiting!"
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

