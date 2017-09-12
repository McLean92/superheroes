<?php SESSION_START();
if ($cmd = FILTER_INPUT(INPUT_POST, 'cmd')) {
  // IF the Edit-button is clicked...
  if ($cmd == 'edit-description') {
    // Setting variables 
    $user = $_SESSION['supername'];
    $description = filter_input(INPUT_POST, 'desc');
    // Updating the superhero description + redirecting to Update.php
    require_once('db_con.php');
    $sql = ("UPDATE characters SET description=? WHERE cName='$user'");
    $stmt = $con->prepare($sql);
    $stmt->bind_param('s', $description);
    $stmt->execute();
    header("Location: ../update.php?=description-set");
  } elseif($cmd == 'superhero-name') {
    $user = $_SESSION['supername'];
    $superhero = filter_input(INPUT_POST, 'cName', FILTER_SANITIZE_STRING);
    // Updating the superhero name + redirecting to Login.php due to new username
    require_once('db_con.php');
    $sql = ("UPDATE characters SET cName=? WHERE cName='$user'");
    $stmt = $con->prepare($sql);
    $stmt->bind_param('s', $superhero);
    $stmt->execute();
    header('Location: ../login.php?forcedlogout=' . urldecode(base64_encode("You have been logged out because of name change")));
    session_destroy();
    exit();
  } elseif($cmd == 'change-email') {
    $user = $_SESSION['supername'];
    $useremail = filter_input(INPUT_POST, 'email');
    // Updating the superhero email + redirecting to Update.php
    require_once('db_con.php');
    $sql = ("UPDATE characters SET email=? WHERE cName='$user'");
    $stmt = $con->prepare($sql);
    $stmt->bind_param('s', $useremail);
    $stmt->execute();
      header("Location: ../update.php?=emailchangesuccess");
      exit();
  } elseif($cmd == 'passwordchange') {
    $user = $_SESSION['supername'];
    $pw = filter_input(INPUT_POST, 'pw');
    // Updating the superhero password + redirecting to Update.php
    $pwd = password_hash($pw, PASSWORD_DEFAULT);

    $sql = ("UPDATE characters SET pw=? WHERE cName='$user'");
    $stmt = $con->prepare($sql);
    $stmt->bind_param('s', $pwd);
    $stmt->execute();
      header("Location: ../update.php?=passwordchangesucess");
      exit();
    // Updating the superhero team
  } elseif($cmd == 'teamchange') {
    $user = $_SESSION['supername'];
    $team = filter_input(INPUT_POST, 'team');

    // First SELECTING the characters id in characters-table
    require_once('db_con.php');
    $sqlid =("SELECT idChar from characters WHERE cName='$user'");
    $stmtid = $con->prepare($sqlid);
    $stmtid->execute();
    $stmtid->bind_result($idChars);

    while($stmtid->fetch()) {};
    // Then SELECTING the characters id in category-table
    $sqlcat = ("SELECT idChar FROM category WHERE idChar='$idChars'");
    $stmtcat = $con->prepare($sqlcat);
    $stmtcat->execute();
    $stmtcat->bind_result($catidChar);

    while($stmtcat->fetch()) {};
    // Joining the two tables in a SQL UPDATE statement in order to UPDATE the team
    if ($catidChar == $idChars ) {
      $sql = ("UPDATE category, characters SET category.superheroTeam =? WHERE category.idChar = characters.idChar and characters.cName='$user'");
      $stmt = $con->prepare($sql);
      $stmt->bind_param('s', $team);
      $stmt->execute();
      header("Location: ../update.php?=updated");
      exit();
    // IF the team has not been selected yet, then it will not be updated, but selected first
     } else {  
      $sqlinsert = ("INSERT INTO category(superheroTeam, idChar) VALUES(?,?)");
      $sqlinsert = $con->prepare($sqlinsert);
      $sqlinsert->bind_param('si', $team, $idChars);
      $sqlinsert->execute();
      header("Location: ../update.php?=inserted");
      exit();
    }
}



}






 ?>
