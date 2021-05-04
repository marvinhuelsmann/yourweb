<?php

require 'db.php';

session_start();

function authenticate() {
    global $mysqli;

    if (!isset($_SESSION['refresh_token'])) {
        $_SESSION['state'] = bin2hex(random_bytes(5));

        $hostUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
        $loginUrl = 'http://id.onegaming.group/api/v1/oauth2/authorize' .
            '?response_type=code' .
            '&client_id=' . urlencode(CLIENT_ID) .
            '&state=' . urlencode($_SESSION['state']) .
            '&scope=' . urlencode('openid profile') .
            '&redirect_uri=' . urlencode($hostUrl . '/auth/callback') .
            '&prompt=consent';

        header('Location: ' . $loginUrl);
        exit;
    }

    if (!isset($mysqli)) {
        die('mysqli init error');
    }

    return $_SESSION['user'];
}