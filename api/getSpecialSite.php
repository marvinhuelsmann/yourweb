<?php
header('Access-Control-Allow-Origin: *');

getUser(!isset($_GET['oldUser']) ? '' : $_GET['oldUser'], $_GET['fromID']);

function getUser($userID, $fromID)
{
    $db = mysqli_connect($_ENV['DB_HOSTNAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_USERNAME']);
    $user_check_query = "SELECT * FROM websites ORDER BY rand()";
    $db_erg = mysqli_query($db, $user_check_query);

    $alreadyFind = false;
    $likeFind = false;

    while ($row = mysqli_fetch_array($db_erg, MYSQLI_ASSOC)) {
        if ($row['id'] !== $userID && $alreadyFind == false || $userID === '' && $alreadyFind == false) {
            $user_check_query = "SELECT * FROM yourweb_likes";
            $db_erg = mysqli_query($db, $user_check_query);

            while ($inRow = mysqli_fetch_array($db_erg, MYSQLI_ASSOC)) {
                if ($inRow['userID'] === $row['id'] && $inRow['fromLike'] === $fromID) {
                    $likeFind = true;
                }
            }
            $alreadyFind = true;

            $queryIntoWebsites = "UPDATE websites SET `views` = `views`+1 WHERE `id` = '" . mysqli_real_escape_string($db, $row['id']) . "'";
            mysqli_query($db, $queryIntoWebsites);

            echo json_encode([
                'id' => $row['id'],
                'name' => $row['name'],
                'subHeadLine' => $row['subHeadLine'],
                'color' => $row['color'],
                'text' => $row['text'],
                'birthday' => $row['birthday'],
                'place' => $row['place'],
                'image' => $row['image'],
                'link' => $row['link'],
                'likes' => $row['likes'],
                'hasUserLiked' => $likeFind,
                'views' => $row['views'],
                'verify' => $row['verify'],

                'twitter' => $row['twitter'],
                'minecraft' => $row['minecraft'],
                'youtube' => $row['youtube'],
                'twitch' => $row['twitch'],
                'discord' => $row['discord'],
                'instagram' => $row['instagram'],
                'snapchat' => $row['snapchat']
            ]);
        } else if ($alreadyFind) {
            return;
        }
    }
}


?>