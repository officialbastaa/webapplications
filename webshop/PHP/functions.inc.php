<?php
// Leere Eingabe Singup
function emptyInputSignup($vorname, $name, $email, $password, $pwdRepeat) {
    $result;
    if (empty($vorname) || empty($name) || empty($email) || empty($password) || empty($pwdRepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Email fehlerhaft
function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Nutzer existiert bereits
function emailExists($conn, $email) {
    $sql = "SELECT * FROM nutzer WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../PHP/signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

// Leere Eingabe Login
function emptyInputLogin($email, $password) {
    $result;
    if (empty($email) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function samePasswords ($inputPwd, $dbPwd){
  $result;
  if ($dbPwd === $inputPwd) {
      $result = true;
  } else {
      $result = false;
  }
  return $result;

}

// Login User
function loginUser($conn, $email, $password) {
    $emailExists = emailExists($conn, $email);

    if ($emailExists === false) {
        header("location: ../PHP/login.php?error=wronglogin");
        exit();
    }

    $pwdDB = $emailExists["password"];
    $checkPwd = samePasswords($password, $pwdDB);

    if ($checkPwd === false) {
        header("location: ../PHP/login.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["id"] = $emailExists["nid"];
        $_SESSION["email"] = $emailExists["email"];
        $_SESSION["vorname"] = $emailExists["vorname"];
        $_SESSION["warenkorb"] = array();
        $_SESSION["anzahl"] = array();


        header("location: ../PHP/index.php?");
        exit();
    }
}
