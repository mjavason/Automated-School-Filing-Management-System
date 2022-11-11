<?php
session_start();
$directory = 'departmental_fee';
if (isset($directory)) {
    $ds = DIRECTORY_SEPARATOR;  //1
    $year = "year".$_SESSION['student_next_filing_session'];
    $storeFolder = 'uploads';   //2

    if (!empty($_FILES)) {
        mkdir($storeFolder . $ds . $_SESSION['student_reg'] . $ds . $year . $ds . $directory, 0755);

        $tempFile = $_FILES['file']['tmp_name'];          //3 
        if (!is_dir($storeFolder)) {
            mkdir($storeFolder, 0755);
        }
        if (!is_dir($storeFolder . $ds . $_SESSION['student_reg'])) {
            mkdir($storeFolder . $ds . $_SESSION['student_reg'], 0755);
        }
        if (!is_dir($storeFolder . $ds . $_SESSION['student_reg'] . $ds . $year)) {
            mkdir($storeFolder . $ds . $_SESSION['student_reg'] . $ds . $year, 0755);
        }
        if (!is_dir($storeFolder . $ds . $_SESSION['student_reg'] . $ds . $year . $ds . $directory)) {
            mkdir($storeFolder . $ds . $_SESSION['student_reg'] . $ds . $year . $ds . $directory, 0755);
        } else {
            $dirname = $storeFolder . $ds . $_SESSION['student_reg'] . $ds . $year . $ds . $directory;
            array_map('unlink', glob("$dirname/*.*"));
            rmdir($dirname);
            mkdir($storeFolder . $ds . $_SESSION['student_reg'] . $ds . $year . $ds . $directory, 0755);
        }

        $targetPath = dirname(__FILE__) . $ds . $storeFolder . $ds . $_SESSION['student_reg'] . $ds . $year . $ds . $directory . $ds;  //4

        $targetFile =  $targetPath . $_FILES['file']['name'];  //5

        move_uploaded_file($tempFile, $targetFile); //6

    }
}
