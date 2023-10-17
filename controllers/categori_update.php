<?php

session_start ();
include_once './../contact.php';
$f_name =trim($_REQUEST['f_name']);
$id= $_REQUEST['id'];
$errors=[];


//name Validation
if (empty($f_name)) {
    $errors['fname_error'] = ' please enter a name';
} elseif (strlen($f_name) > 100) {
    $errors['fname_error'] = 'title len not greater than 100 charcter';
}




if(count($errors)>0){
    $_SESSION['errors']= $errors;
    header("Location: ./../backend/categori_edit.php?id=$id");
}else{
    $query = "UPDATE categories SET f_name='$f_name' WHERE id='$id'";
    
        $result = mysqli_query($conn, $query);

        if($result){
       
        $_SESSION["success"] ="category updated successfully!.....";
        header("Location: ./../backend/categori_edit.php?id=$id");
        }else{
            $_SESSION["fall"] ="failed.....";
        header("Location: ./../backend/categori_edit.php?id=$id");
        }
}















       
?>










