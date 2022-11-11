<?php
session_start();
$db_handle = new DBController();


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


function showSweetAlert($type, $id = null)
{
  switch ($type) {
    case 'success':
      echo '<script>swal({
                //title: "New Course",
                title: "Successful",
                icon: "success",
                button: "Got It!",
              });</script>';
      break;

    case 'course_save_success':
      echo '<script>
            swal({
                //title: "New Course",
                title: "Successful",
                icon: "success",
                button: "Got It!",
            });
        </script>';
      break;

    case 'client_paid_admin_success':
      echo '<script>swal({
                        //title: "Edit Course",
                        title: "Client Payment Confirmed",
                        icon: "success",
                        button: "Got It!",
                      });</script>';
      break;

    case 'course_delete_success':
      echo '<script>swal({
                        //title: "Delete Course",
                        title: "Course Deleted Succesfully",
                        icon: "success",
                        button: "Got It!",
                      });</script>';
      break;

    case 'failure':
      echo '<script>swal({
                title: "Error",
                //title: "Payment confirmation failed",
                icon: "error",
                button: "Got It!",
              });</script>';
      break;

    case 'failure__argument_not_set':
      echo '<script>swal({
                    title: "Error!",
                    text: "Missing compulsory argument",
                    //title: "",
                    icon: "error",
                    button: "Got It!",
                  });</script>';
      break;

    case 'warning':
      break;

    case 'info':
      break;

    case 'advanced':
      echo '<script>swal({
                        text: `Search for a movie. e.g. "La La Land".`,
                        content: "input",
                        button: {
                          text: "Search!",
                          closeModal: false,
                        },
                      })
                      .then(name => {
                        if (!name) throw null;
                       
                        return fetch(`https://itunes.apple.com/search?term=${name}&entity=movie`);
                      })
                      .then(results => {
                        return results.json();
                      })
                      .then(json => {
                        const movie = json.results[0];
                       
                        if (!movie) {
                          return swal("No movie was found!");
                        }
                       
                        const name = movie.trackName;
                        const imageURL = movie.artworkUrl100;
                       
                        swal({
                          title: "Top result:",
                          text: name,
                          icon: imageURL,
                        });
                      })
                      .catch(err => {
                        if (err) {
                          swal("Oh noes!", "The AJAX request failed!", "error");
                        } else {
                          swal.stopLoading();
                          swal.close();
                        }
                      });</script>';
      break;

    case 'getTrueOnButtonClicked':
      echo '<script>swal("Click on either the button or outside the modal.")
            .then((value) => {
              swal(`The returned value is: ${value}`);
            });</script>';

    case 'warnBeforePerformingAction':
      echo '<script>swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this imaginary file!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                swal("Poof! Your imaginary file has been deleted!", {
                  icon: "success",
                });
              } else {
                swal("Your imaginary file is safe!");
              }
            });</script>';



    default:
      break;
  }
}

function validateEmail($email)
{
  global $db_handle;
  //$response = [];
  $result = $db_handle->selectAllWhere('students', 'email', $email);

  return isset($result) && count($result) > 0;
}

function validateStaffEmail($email)
{
  global $db_handle;
  //$response = [];
  $result = $db_handle->selectAllWhere('staff', 'email', $email);

  return isset($result) && count($result) > 0;
}

function validateSuperAdminEmail($email)
{
  global $db_handle;
  //$response = [];
  $result = $db_handle->selectAllWhere('super_admins', 'email', $email);

  return isset($result) && count($result) > 0;
}

function validateStudentRegNumber($reg)
{
  global $db_handle;
  //$response = [];
  $result = $db_handle->selectAllWhere('students', 'reg_no', $reg);

  return isset($result) && count($result) > 0;
}

function confirmUserEmailAndPassword($postemail, $postpassword, $rememberMe)
{
  global $db_handle;
  //$response = [];
  //students first
  $result = $db_handle->selectAllWhereWith2Conditions('students', 'email', $postemail, 'password', sha1($postpassword));
  if (isset($result) && count($result) > 0) {
    foreach ($result as $row) {
      extract($row);
      $_SESSION['user_name'] = ucwords(strtolower($first_name)) . " " . ucwords(strtolower($last_name));
      $_SESSION['first_name'] = $first_name;
      $_SESSION['last_name'] = $last_name;
      $_SESSION['full_name'] = $first_name . ' ' . $last_name;
      $_SESSION['student_id'] = $id;
      $_SESSION['student_email'] = $postemail;
      $_SESSION['student_set'] = $set_year;
      $_SESSION['phone'] = $phone;
      $_SESSION['student_reg'] = $row['reg_no'];
      $_SESSION['student_level'] = calculateStudentLevel($set_year);
      $_SESSION['student_next_filing_session'] = getStudentNextFilingSession($id);


      $_SESSION['log'] = true;

      // //This is the line of code for saving cookies AKA remember me

      // if (isset($remember)) {
      if ($rememberMe == true) {
        //Creates a cookie named "user" with the value "John Doe". The cookie will expire after 30 days (86400 * 30). The "/" means that the cookie is available in entire website (otherwise, select the directory you prefer).

        //setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        setcookie('client_mail', $postemail, time() + (86400 * 30), "/"); // 86400 = 1 day
        setcookie('client_password', $postpassword, time() + (86400 * 30), "/"); // 86400 = 1 day

      } else {
        if (isset($_COOKIE['mem_log'])) {
          setcookie('mem_log', '');
        }
        setcookie("client_mail",  $_SESSION['user_email'], time() + (10 * 365 * 24 * 60 * 60));
        setcookie("client_pass", '', time() + (10 * 365 * 24 * 60 * 60));
      }
    }
    return $result;
  } else {
    //lecturers next
    $result = $db_handle->selectAllWhereWith2Conditions('staff', 'email', $postemail, 'password', sha1($postpassword));
    if (isset($result) && count($result) > 0) {
      foreach ($result as $row) {
        extract($row);
        $_SESSION['user_name'] = ucwords(strtolower($first_name)) . " " . ucwords(strtolower($last_name));
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['full_name'] = $first_name . ' ' . $last_name;
        $_SESSION['staff_id'] = $id;
        $_SESSION['staff_email'] = $postemail;
        $_SESSION['staff_title'] = $title;
        $_SESSION['phone'] = $phone;

        $_SESSION['super_log'] = true;

        // //This is the line of code for saving cookies AKA remember me

        // if (isset($remember)) {
        if ($rememberMe == true) {
          //Creates a cookie named "user" with the value "John Doe". The cookie will expire after 30 days (86400 * 30). The "/" means that the cookie is available in entire website (otherwise, select the directory you prefer).

          //setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
          setcookie('client_mail', $postemail, time() + (86400 * 30), "/"); // 86400 = 1 day
          setcookie('client_password', $postpassword, time() + (86400 * 30), "/"); // 86400 = 1 day

        } else {
          if (isset($_COOKIE['mem_log'])) {
            setcookie('mem_log', '');
          }
          setcookie("client_mail",  $_SESSION['user_email'], time() + (10 * 365 * 24 * 60 * 60));
          setcookie("client_pass", '', time() + (10 * 365 * 24 * 60 * 60));
        }
      }
      return $result;
    } else {
      //superAdmins last
      $result = $db_handle->selectAllWhereWith2Conditions('super_admins', 'email', $postemail, 'password', sha1($postpassword));
      if (isset($result) && count($result) > 0) {
        foreach ($result as $row) {
          extract($row);
          $_SESSION['user_name'] = ucwords(strtolower($first_name)) . " " . ucwords(strtolower($last_name));
          $_SESSION['first_name'] = $first_name;
          $_SESSION['last_name'] = $last_name;
          $_SESSION['full_name'] = $first_name . ' ' . $last_name;
          $_SESSION['sadmin_id'] = $id;
          $_SESSION['sadmin_email'] = $postemail;
          $_SESSION['sadmin_authority'] = $authority;
          $_SESSION['phone'] = $phone;

          $_SESSION['ultra_log'] = true;

          // //This is the line of code for saving cookies AKA remember me

          // if (isset($remember)) {
          if ($rememberMe == true) {
            //Creates a cookie named "user" with the value "John Doe". The cookie will expire after 30 days (86400 * 30). The "/" means that the cookie is available in entire website (otherwise, select the directory you prefer).

            //setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie('client_mail', $postemail, time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie('client_password', $postpassword, time() + (86400 * 30), "/"); // 86400 = 1 day

          } else {
            if (isset($_COOKIE['mem_log'])) {
              setcookie('mem_log', '');
            }
            setcookie("client_mail",  $_SESSION['user_email'], time() + (10 * 365 * 24 * 60 * 60));
            setcookie("client_pass", '', time() + (10 * 365 * 24 * 60 * 60));
          }
        }
        return $result;
      } else {
        return ([['error' => 'Wrong Password']]);
        //return false;
      }
      //return false;
    }
    //return false;
  }
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

function createNewStudent($firstName, $lastName, $gender, $email, $phone, $reg, $departmentId, $password)
{
  global $db_handle;

  $firstName = sanitize($firstName, 'clean');
  $lastName = sanitize($lastName, 'clean');
  $email = sanitize($email);
  $gender = sanitize($gender);
  $phone = sanitize($phone);
  $reg = sanitize($reg);
  //$departmentId = getDepartmentID(sanitize($department));
  $password = sha1($password);


  $query = "INSERT INTO `students` (
  `first_name`,
  `last_name`,	
  `gender`,
  `email`,
  `reg_no`,	
  `phone`,
  `department_id`,	
  `password`) VALUES (
    '$firstName',
    '$lastName',
    '$gender',
    '$email',
    '$reg',
    '$phone',
    $departmentId,
    '$password');";
  return $db_handle->runQueryWithoutResponse($query);
}

function getCalenderYearPerLevel($coursesTaken, $level)
{
  for ($i = 0; $i < count($coursesTaken); $i++) {
    if ($coursesTaken[$i]['course_level'] == $level) {
      return $coursesTaken[$i]['year_taken'];
    }
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

function getCourseSessionInfo($courseId, $credits)
{
  global $db_handle;
  //$response = [];
  $result = $db_handle->selectAllWhereWith2Conditions('results', 'course_id', $courseId, 'course_credits', $credits);

  if (isset($result)) {
    return $result[0];
  } else {
    return false;
  }
}

function getStudentNextFilingSession($studentId)
{
  global $db_handle;
  //$response = [];
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
    'waiting');";

  return $db_handle->runQueryWithoutResponse($query);
}
