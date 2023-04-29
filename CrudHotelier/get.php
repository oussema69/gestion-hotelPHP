<?php
    $request = $_REQUEST; //a PHP Super Global variable which used to collect data after submitting it from the form
    $employeeId = $request['dataId'];//define the employee ID
    
    require '../connection.php';
    require '../User.php';


    // Set the INSERT SQL data
    $user=new User(null,"","","","","","","");
    $res=$user->__selectionbyid($conn,$employeeId);
    $row=$res->fetch();
   
  

 

    echo json_encode($row);
?>
