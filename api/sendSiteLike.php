<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

require 'util/config.php';

$count = false;

$tokenResponse = isValidToken(getBearerToken());

$db = mysqli_connect('db.dlrm-hosting.de', 'marvinhuelsmann', 'wyUoXpjFKl2vAEqb', 'marvinhuelsmann');
$user_check_query = "SELECT * FROM yourweb_likes";
$db_erg = mysqli_query($db, $user_check_query);

if (isset($_GET['id']) && isset($_GET['user'])) {
    $id = $_GET['id'];
    $user = $_GET['user'];

    if ($tokenResponse->id == $id) {

        while ($row = mysqli_fetch_array($db_erg, MYSQLI_ASSOC)) {
            if ($row['fromLike'] === $user && $row['userID'] === $id) {
                $count = true;
            }
        }
        if (!$count) {
            $queryIntoLikes = "INSERT INTO `yourweb_likes` (`userID`, `fromLike`) VALUES ('" . mysqli_real_escape_string($db, $id) . "', '" . mysqli_real_escape_string($db, $user) . "')";
            if (mysqli_query($db, $queryIntoLikes)) {

                $queryIntoWebsites = "UPDATE websites SET `likes` = `likes`+1 WHERE `id` = '" . mysqli_real_escape_string($db, $id) . "'";
                if (mysqli_query($db, $queryIntoWebsites)) {
                    return http_response_code(200);
                }
            }
        } else {
            return http_response_code(400);
        }

    } else {
        return http_response_code(401);
    }

} else {
    return http_response_code(404);
}


?>