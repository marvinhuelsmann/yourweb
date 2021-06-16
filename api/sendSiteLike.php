<?php
require 'util/config.php';
setCorsPolice();

$count = false;

$tokenResponse = json_decode(isValidToken(getBearerToken()), true);

$db =  mysqli_connect($_ENV['DB_HOSTNAME'],  $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_USERNAME']);
$user_check_query = "SELECT * FROM yourweb_likes";
$db_erg = mysqli_query($db, $user_check_query);

if (isset($_GET['id']) && isset($_GET['user'])) {
    $id = $_GET['id'];
    $user = $_GET['user'];

    if (checkIfIdIsValid($tokenResponse, $user)) {

        while ($row = mysqli_fetch_array($db_erg, MYSQLI_ASSOC)) {
            if ($row['fromLike'] === $user && $row['userID'] === $id) {
                $count = true;
            }
        }
        if (!$count) {
            $queryIntoLikes = "INSERT INTO `yourweb_likes` (`userID`, `fromLike`, `timestamp`) VALUES ('" . mysqli_real_escape_string($db, $id) . "', '" . mysqli_real_escape_string($db, $user) . "', NOW())";
            if (mysqli_query($db, $queryIntoLikes)) {

                $queryIntoWebsites = "UPDATE websites SET `likes` = `likes`+1 WHERE `id` = '" . mysqli_real_escape_string($db, $id) . "'";
                if (mysqli_query($db, $queryIntoWebsites)) {
                    echo json_encode([
                        'success' => "you like the user"
                    ]);
                    return http_response_code(200);
                } else return http_response_code(503);
            } else return http_response_code(503);
        } else {
            echo json_encode([
                'error' => "you have already liked this person"
            ]);
            return http_response_code(400);
        }
    } else {
        echo json_encode([
            'error' => "your token have not the same id as your id"
        ]);
        return http_response_code(401);
    }
} else {
    echo json_encode([
        'error' => "parameter are missing"
    ]);
    return http_response_code(404);
}


?>