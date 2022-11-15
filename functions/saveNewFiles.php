<?php
require_once('../config/connect.php');
require_once('functions.php');
//die;

$array = [];

$directory = 'school_fees';
$ds = DIRECTORY_SEPARATOR;  //1
$year = "year" . $_SESSION['student_next_filing_session'];
$storeFolder = 'uploads';   //2

$targetPath1 = '..' . $ds . $storeFolder . $ds . $_SESSION['student_reg'] . $ds . $year . $ds . 'course_reg1' . $ds;  //4
$targetPath2 = '..' . $ds . $storeFolder . $ds . $_SESSION['student_reg'] . $ds . $year . $ds . 'course_reg2' . $ds;  //4
$targetPath3 = '..' . $ds . $storeFolder . $ds . $_SESSION['student_reg'] . $ds . $year . $ds . 'departmental_fee' . $ds;  //4
$targetPath4 = '..' . $ds . $storeFolder . $ds . $_SESSION['student_reg'] . $ds . $year . $ds . 'faculty_fee' . $ds;  //4
$targetPath5 = '..' . $ds . $storeFolder . $ds . $_SESSION['student_reg'] . $ds . $year . $ds . 'school_fees' . $ds;  //4

if (!is_dir($targetPath1)) echo $targetPath1 . '<br>';
if (!is_dir($targetPath2)) echo $targetPath2 . '<br>';
if (!is_dir($targetPath3)) echo $targetPath3 . '<br>';
if (!is_dir($targetPath4)) echo $targetPath4 . '<br>';
if (!is_dir($targetPath5)) echo $targetPath5 . '<br>';

if (is_dir($targetPath1) && is_dir($targetPath2) && is_dir($targetPath3) && is_dir($targetPath4) && is_dir($targetPath5)) {
    $file1 = scandir($targetPath1, 1)[0];
    $file2 = scandir($targetPath2, 1)[0];
    $file3 = scandir($targetPath3, 1)[0];
    $file4 = scandir($targetPath4, 1)[0];
    $file5 = scandir($targetPath5, 1)[0];

    if (addNewFileUploads($file1, $file2, $file3, $file4, $file5)) {
        $_SESSION['student_next_filing_session'] = getStudentNextFilingSession($_SESSION['student_id']);
        array_push($array, ['success' => 'Files Successfully Uploaded!']);
        echo (json_encode($array));
    } else {
        array_push($array, ['error' => 'Unknown DB error occured']);
        echo (json_encode($array));
    }
} else {
    array_push($array, ['error' => 'Some files are missing. Make sure all are selected and uploaded.']);
    echo (json_encode($array));
}

//print_r($file1);
