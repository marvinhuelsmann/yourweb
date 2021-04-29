<?php
header('Access-Control-Allow-Origin: *');

$count = false;

$db = mysqli_connect('db.dlrm-hosting.de', 'marvinhuelsmann', 'wyUoXpjFKl2vAEqb', 'marvinhuelsmann');
$user_check_query = "SELECT * FROM websites";
$db_erg = mysqli_query($db, $user_check_query);

if (isset($_GET['i'])) {
    $name = $_GET['i'];

    while ($row = mysqli_fetch_array($db_erg, MYSQLI_ASSOC)) {
        if ($row['id'] === $name || $row['name'] === $name) {
            $count = true;

            echo json_encode([
                'name' => $row['name'],
                'subHeadLine' => $row['subHeadLine'],
                'color' => $row['color'],
                'text' => $row['text'],
                'birthday' => $row['birthday'],
                'place' => $row['place'],
                'image' => $row['image']
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
