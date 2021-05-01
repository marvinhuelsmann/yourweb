<?php
header('Access-Control-Allow-Origin: *');

$count = false;

$db = mysqli_connect('db.dlrm-hosting.de', 'marvinhuelsmann', 'wyUoXpjFKl2vAEqb', 'marvinhuelsmann');
$user_check_query = "SELECT * FROM websites ORDER BY rand()";
$db_erg = mysqli_query($db, $user_check_query);

    while ($row = mysqli_fetch_array($db_erg, MYSQLI_ASSOC)) {
            echo json_encode([
                'name' => $row['name'],
                'subHeadLine' => $row['subHeadLine'],
                'color' => $row['color'],
                'text' => $row['text'],
                'birthday' => $row['birthday'],
                'place' => $row['place'],
                'image' => $row['image']
            ]);
    }


header('Content-Type: application/json');

?>