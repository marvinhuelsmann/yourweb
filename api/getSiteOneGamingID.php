<?php
header('Access-Control-Allow-Origin: *');

$count = false;

$db =  mysqli_connect($_ENV['DB_HOSTNAME'],  $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_USERNAME']);
$user_check_query = "SELECT * FROM websites";
$db_erg = mysqli_query($db, $user_check_query);

if (isset($_GET['i'])) {
    $name = $_GET['i'];

    while ($row = mysqli_fetch_array($db_erg, MYSQLI_ASSOC)) {
        if ($row['userID'] === $name) {
            $count = true;

            echo json_encode([
                'id' => $row['id'],
                'name' => $row['name'],
                'subHeadLine' => $row['subHeadLine'],
                'color' => $row['color'],
                'text' => $row['text'],
                'birthday' => $row['birthday'],
                'place' => $row['place'],
                'image' => $row['image'],
                'likes' => $row['likes']
            ]);
            return http_response_code(200);
        }
    }

    if (!$count) return http_response_code(404);

} else {
    return http_response_code(404);
}
header('Content-Type: application/json');

?>