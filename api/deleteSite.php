<?php
require 'util/config.php';
setCorsPolice();

$count = false;

$tokenResponse = json_decode(isValidToken(getBearerToken()), true);

$db =  mysqli_connect($_ENV['DB_HOSTNAME'],  $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_USERNAME']);
$user_check_query = "SELECT * FROM websites";
$db_erg = mysqli_query($db, $user_check_query);

if (isset($_GET['user'])) {
    $user = $_GET['user'];

    if (checkIfIdIsValid($tokenResponse, $user)) {

        while ($row = mysqli_fetch_array($db_erg, MYSQLI_ASSOC)) {
            if ($row['userID'] === $user) {
                $count = true;
            }
        }
        if ($count) {
            $deleteSite = "DELETE FROM `websites` WHERE `userID`= '".mysqli_real_escape_string($db, $user)."'";
            if (mysqli_query($db, $deleteSite)) {
                return http_response_code(200);
            } else return http_response_code(503);
        } else return http_response_code(400);
    } else return http_response_code(401);
} else return http_response_code(404);


?>