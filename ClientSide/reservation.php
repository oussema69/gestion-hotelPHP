<?php
require('../Reserver.php');
require('../connection.php');
require('../Chambre.php');

if(isset($_POST['reserver'])){
  $id=$_POST['id'];
  $date_deb=$_POST['date_deb'];
  $date_fin=$_POST['date_fin'];
   var_dump($_POST);
}
session_start();

if(isset($_SESSION['role']) && $_SESSION['role'] == 2){
  // user is logged in with a role of 2
  $user_email = $_SESSION['email']; 
  $id_user= $_SESSION['id'];
var_dump($_SESSION);
} 

$reserver =new Reserver();
$reserver->id_client= $id_user;
$reserver->id_chambre=$id;
$reserver->date_deb=$date_deb;
$reserver->date_fin=$date_fin;
$reserver->insert($conn);
$chambre=new Chambre();
$res=$chambre->__selectionbyid($conn,$id);
$row=$res->fetch();
var_dump($row)
?>

