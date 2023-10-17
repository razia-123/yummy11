<?php
include_once './../contact.php';
session_start();
$f_name =trim($_REQUEST['f_name']);


$errors=[];


//name Validation
if (empty($f_name)) {
    $errors['fname_error'] = ' please enter a name';
} elseif (strlen($f_name) > 100) {
    $errors['fname_error'] = 'title len not greater than 100 charcter';
}





if(count($errors)>0){
    $_SESSION['errors']=$errors;
    header('Location: ./../backend/categori_create.php'); 
}else{
   
  
$query="INSERT INTO categories(f_name) VALUES ('$f_name')";
$result = mysqli_query($conn, $query);
if($result){
   
$_SESSION["success"] ="Category Inserted successfully!.....";
header('Location: ./../backend/categori_create.php'); 
}
}