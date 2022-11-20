<?php
require_once('../config/connect.php');
require_once('functions.php');

// print_r(json_encode($_POST));
// print_r(json_encode($_GET));
if (isset($_GET['upload_id']) && isset($_POST['file_comment'])) {
    if (approveFile($_GET['upload_id'], $_POST['file_comment'])) {
        print json_encode([['success' => 'Filing Successfully Approved!']]);
    } else {
        print json_encode([['error' => 'DB Error Occured']]);
    }
} else {
    print json_encode([['error' => 'Comments are missing']]);
}
