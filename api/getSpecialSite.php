<?php
header('Access-Control-Allow-Origin: *');

    getUser(isset($_GET['oldUser']) ?? $_GET['oldUser']);


function getUser($userID)
{
    $db = mysqli_connect('db.dlrm-hosting.de', 'marvinhuelsmann', 'wyUoXpjFKl2vAEqb', 'marvinhuelsmann');
    $user_check_query = "SELECT * FROM websites ORDER BY rand()";
    $db_erg = mysqli_query($db, $user_check_query);

    $alreadyFind = false;

    while ($row = mysqli_fetch_array($db_erg, MYSQLI_ASSOC)) {
        if ($row != $userID && !$alreadyFind) {
            $alreadyFind = true;
            echo json_encode([
                'id' => $row['id'],
                'name' => $row['name'],
                'subHeadLine' => $row['subHeadLine'],
                'color' => $row['color'],
                'text' => $row['text'],
                'birthday' => $row['birthday'],
                'place' => $row['place'],
                'image' => $row['image']
            ]);
        }
    }
}


?>