<?php
session_start();
$db_handle = new DBController();


$first_name = 'Tester';
$last_name = 'Zero';
$id = 1;
$postemail = 'testerzero@mail.com';
$phone = '08148863871';


$_SESSION['user_name'] = ucwords(strtolower($first_name)) . " " . ucwords(strtolower($last_name));
$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['full_name'] = $first_name . ' ' . $last_name;
$_SESSION['staff_id'] = $id;
$_SESSION['staff_email'] = $postemail;
$_SESSION['phone'] = $phone;
$_SESSION['super_log'] = true;



/**
 * Removes unwanted and harmful characters
 * 
 * Takes in a string cleanses and formats it, then returns a clean copy.
 * 
 * @param string $data
 * Any data or variable that may contain characters that needs cleansing.
 * @param string $case
 * [optional]
 * 
 * If set to 'lower' it automatically formats the results to lowercase, if set to 'none' it is left as it is.
 * @return string
 * Returns cleansed string.
 */
function sanitize($data, $case = null)
{
  $result = htmlentities($data, ENT_QUOTES);
  if ($case == 'lower') {
    $result = strtoupper($result);
  } elseif ($case == 'none') {
    //leave it as it is
  } elseif ($case == 'clean') {
    $result = ucwords(strtolower($result));
  } else {
    $result = strtoupper($result);
  }
  return $result;
}

function gotoPage($location)
{
  header('location:' . $location);
  exit();
}

function validateStudentRegNumber($reg)
{
  global $db_handle;
  //$response = [];
  $result = $db_handle->selectAllWhere('students', 'reg_no', $reg);

  return isset($result) && count($result) > 0;
}

function getDepartmentId($departmentName)
{
  global $db_handle;

  $result = $db_handle->selectAllWhere('departments', 'department_name', $departmentName);
  if (isset($result)) {
    return $result[0]['id'];
  } else {
    return false;
  }
}

function calculateStudentLevel($set)
{
  $set = explode('/', $set);
  $year = date('Y');
  $level = 0;
  if (isset($set[0])) {
    $level = ($year - $set[0]);
  }
  //createLog('Success', 'calculateStudentLevel');
  if ($level < 1) {
    return 1;
  }
  return ($level);
}

function createLog($title, $description)
{
  global $db_handle;

  $title = sanitize($title, 'clean');
  $description = sanitize($description, 'none');

  $query = "INSERT INTO `log` (
    `log_title`,
    `log_description`
         ) VALUES (
    '$title', 
    '$description'
         )";
  return $db_handle->runQueryWithoutResponse($query);
}

function getStudentNextFilingSession($studentId)
{
  global $db_handle;
  //$response = [];

  // $result = $db_handle->selectAllWhereWith2ConditionsOrderByDesc('file_uploads', 'student_id', $studentId, 'status', 'Rejected', 'level');
  $result = $db_handle->selectAllWhereOrderByDesc('file_uploads', 'student_id', $studentId, 'level');

  if (isset($result)) {
    return ((int)$result[0]['level'] + 1);
  } else {
    return 1;
  }
}

function addNewFileUploads($courseReg1, $courseReg2, $departmentalFee, $facultyFee, $schoolFees)
{
  global $db_handle;
  $id = $_SESSION['student_id'];
  $currentFilingSession = $_SESSION['student_next_filing_session'];

  $query = "INSERT INTO `file_uploads` (
  `student_id`,
  `level`,	
  `course_reg1`,
  `course_reg2`,
  `school_fees`,	
  `departmental_fee`,
  `faculty_fee`,	
  `status`) VALUES (
    $id,
    $currentFilingSession,
    '$courseReg1',
    '$courseReg2',
    '$schoolFees',
    '$departmentalFee',
    '$facultyFee',
    'Waiting');";

  return $db_handle->runQueryWithoutResponse($query);
}

function getAllFileSessionsUploaded()
{
  global $db_handle;
  //$response = [];
  $result = $db_handle->selectAllOrderByAsc('file_uploads', 'level');

  if (isset($result)) {
    return $result;
  } else {
    return false;
  }
}

function returnColorPerStatus($status)
{
  switch ($status) {
    case 'Waiting':
      return 'tertiary';

    case 'Approved':
      return 'success';

    case 'Rejected':
      return 'danger';

    default:
      return 'warning';
  }
}

function returnImagePerStatus($status)
{
  switch ($status) {
    case 'Waiting':
      return 'file_waiting.svg';

    case 'Approved':
      return 'file_approved.svg';

    case 'Rejected':
      return 'file_rejected.svg';

    default:
      return 'file_not_found.svg';
  }
}

function returnFaIconPerStatus($status)
{
  switch ($status) {
    case 'Waiting':
      return 'rotate';

    case 'Approved':
      return 'check';

    case 'Rejected':
      return 'close';

    default:
      return 'warning';
  }
}

function returnNumberOfFilesPerStatusPerYear($uploads, $status, $level)
{
  $count = 0;
  foreach ($uploads as $upload) {
    if ($upload['level'] == $level && $upload['status'] == $status) {
      $count++;
    }
  }
  return $count;
}

function returnNumberOfFilesPerYear($uploads, $level)
{
  $count = 0;
  foreach ($uploads as $upload) {
    if ($upload['level'] == $level) {
      $count++;
    }
  }
  return $count;
}

function returnImagePerFilesProcessed($processed, $total)
{
  $result = $total - $processed;

  if ($result > 0) {
    return 'file_waiting.svg';
  } else {
    return 'file_approved.svg';
  }
}

function getAllUploads()
{
  global $db_handle;

  $result = $db_handle->selectAll('file_uploads');
  if (isset($result)) {
    return $result;
  } else {
    return false;
  }
}

function getUploadInfo($uploadId)
{
  global $db_handle;

  $result = $db_handle->selectAllWhere('file_uploads', 'id', $uploadId);
  if (isset($result)) {
    return $result[0];
  } else {
    return false;
  }
}

function getStudentInfo($studentId)
{
  global $db_handle;

  $result = $db_handle->selectAllWhere('students', 'id', $studentId);
  if (isset($result)) {
    return $result[0];
  } else {
    return false;
  }
}

function approveFile($uploadId, $comment)
{
  $staffId =  $_SESSION['staff_id'];
  $comment = sanitize($comment, 'none');

  global $db_handle;

  $query = "UPDATE `file_uploads` SET 
  `status` = 'Approved', `comment` = '$comment', `staff_id` = $staffId
  WHERE `file_uploads`.`id` = $uploadId";

  if ($db_handle->runQueryWithoutResponse($query)) {
    // createLog('Success', 'updateCourseSessionResults');
    return true;
  } else {
    // createLog('Failed', 'updateCourseSessionResults');
    return false;
  }
}

function rejectFile($uploadId, $comment)
{
  $staffId =  $_SESSION['staff_id'];
  $comment = sanitize($comment, 'none');

  global $db_handle;

  $query = "UPDATE `file_uploads` SET 
  `status` = 'Rejected',  `comment` = '$comment', `staff_id` = $staffId
  WHERE `file_uploads`.`id` = $uploadId";

  if ($db_handle->runQueryWithoutResponse($query)) {
    // createLog('Success', 'updateCourseSessionResults');
    return true;
  } else {
    // createLog('Failed', 'updateCourseSessionResults');
    return false;
  }
}
