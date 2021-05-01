<?php
header('Access-Control-Allow-Origin: *');

$count = false;

$db = mysqli_connect('db.dlrm-hosting.de', 'marvinhuelsmann', 'wyUoXpjFKl2vAEqb', 'marvinhuelsmann');
$user_check_query = "SELECT * FROM websites";
$db_erg = mysqli_query($db, $user_check_query);

if (isset($_GET['name']) && isset($_GET['text'])) {
    $name = $_GET['name'];
    $text = $_GET['text'];

    while ($row = mysqli_fetch_array($db_erg, MYSQLI_ASSOC)) {
        if ($row['name'] === $name && $row['text'] === $text) {
            $count = true;

            echo json_encode([
                'id' => $row['id']
            ]);
            return;
        }
    }

    if (!$count) {
        return http_response_code(404);
    }

} else {
    return http_response_code(404);
}
header('Content-Type: application/json');

?>