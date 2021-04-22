<?php
header('Access-Control-Allow-Origin: *');

$name = $_GET['name'];


$db = mysqli_connect('db.dlrm-hosting.de', 'marvinhuelsmann', 'wyUoXpjFKl2vAEqb', 'marvinhuelsmann');
$user_check_query = "SELECT * FROM websites";
$db_erg = mysqli_query($db, $user_check_query);

if (isset($name)) {
    while ($zeile = mysqli_fetch_array($db_erg, MYSQLI_ASSOC)) {
        if ($zeile['name'] === $_GET[$name]) {
            echo json_encode([
                'name' => $zeile['name'],
                'subHeadLine' => $zeile['subHeadLine'],
                'color' => $zeile['color'],
                'text' => $zeile['text'],
                'birthday' => $zeile['birthday'],
                'place' => $zeile['place'],
                'image' => $zeile['image']
            ]);
            return;
        }
    }
} else {
    return http_response_code(404);
}

?>
