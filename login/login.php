<?php
$pdo = include '../connection.php';


if(isset($_POST['email']) && isset($_POST['password'])){
    $pswd=$_POST['password'];
    $email=$_POST['email'];
    
  
    
    $sql = "SELECT id,role FROM user WHERE email = :email and password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(':email' => $email, ':password' => $pswd));
    
    if ($stmt->rowCount() > 0) {
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   if($row['role']==0){
    session_start();
   header("location:../dashboard.php");
   }
   elseif($row['role']==2){
    session_start();
    $_SESSION['role'] = $row['role']; 
    $_SESSION['email'] = $email;
    $_SESSION['id']=$row['id']; 
    header("location:../home.php");
    }
    } else {
      header('location:signin.php');
    }
}
?>
