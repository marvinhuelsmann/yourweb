<?php
header('Access-Control-Allow-Origin: *');

$count = false;

$db = mysqli_connect('db.dlrm-hosting.de', 'marvinhuelsmann', 'wyUoXpjFKl2vAEqb', 'marvinhuelsmann');
$user_check_query = "SELECT * FROM websites";
$db_erg = mysqli_query($db, $user_check_query);

if (isset($_GET['id']) && isset($_GET['user'])) {
    $id = $_GET['id'];
    $user = $_GET['user'];

    while ($row = mysqli_fetch_array($db_erg, MYSQLI_ASSOC)) {
        if ($row['userID'] === $id) {
            $count = true;
        }
    }
    if (!$count) {
        $sql = "INSERT INTO `yourweb-likes` (`userID`, `fromLike`) VALUES ('" . mysqli_real_escape_string($db, $id) . "', '" . mysqli_real_escape_string($db, $user) . "')";
        if (mysqli_query($db, $sql)) {
            return http_response_code(200);
        }
    }

} else {
    return http_response_code(404);
}
header('Content-Type: application/json');

?>