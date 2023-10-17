<?php

session_start ();
include_once './../contact.php';
$title =trim($_REQUEST['title']);
$description =trim($_REQUEST['description']);
$cta_text =trim($_REQUEST['cta_text']);
$cta_link =trim($_REQUEST['cta_link']);
$video_link =trim($_REQUEST['video_link']);
$image = $_FILES['image'];
var_dump($image);
$image_extension=pathinfo($image['name'] ,PATHINFO_EXTENSION);
$image_size = $image['size'];
$id= $_REQUEST['id'];
$errors=[];


//title Validation
if (empty($title)) {
    $errors['title_error'] = ' please enter a title';
} elseif (strlen($title) > 100) {
    $errors['title_error'] = 'title len not greater than 100 charcter';
}

//description Validation
if (empty($description)) {
    $errors['description_error'] = 'please enter a description';
} elseif (strlen($description) > 300) {
    $errors['description_error'] = 'description len not greater than 300 charcter';
}


//cta text Validation
if (empty($cta_text)) {
    $errors['cta_text_error'] = 'please enter a cta text';
} elseif (strlen($cta_text) > 50) {
    $errors['cta_text_error'] = ' cta text len not greater than 50 charcter';
}



//cta link Validation
if (empty($cta_link)) {
    $errors['cta_link_error'] = 'please enter a cta link';
} 
//video link Validation
if (empty($video_link)) {
    $errors['video_link_error'] = 'please enter a video link';
} 

//image validation
$expected_extension=['jpg','jpeg','png','Webp'];
if(!$image['size'] >0){
    if(in_array($image_extension,$expected_extension)){
        $errors['image_error'] = 'image must be jpg,jpeg,png or webp ';
    }elseif($image['size'] >500000){
        $errors['image_error'] = 'image size not more than 5 mb';
    }
}




if(count($errors)>0){
    $_SESSION['errors']= $errors;
    header("Location: ./../backend/banneredit.php?id=$id");
}else{

    $select_query = "SELECT image FROM banners WHERE id= '$id'";
    $select_query_result= mysqli_query($conn, $select_query);
    $data = mysqli_fetch_assoc($select_query_result);
    
    $image_path ='./../uploads/'. $data['image'];
    $image_name = uniqid().'.'.$image_extension;
    if($image_size > 0){
    
        if(file_exists($image_path)){
            unlink($image_path);
        }
        $query = "UPDATE banners SET title='$title',description='$description',cta_text='$cta_text',
        cta_link='$cta_link',video_link='$video_link', image='$image_name' WHERE id= '$id'";
    }else{
        $query = "UPDATE banners SET title='$title',description='$description',cta_text='$cta_text',
        cta_link='$cta_link',video_link='$video_link' WHERE id= '$id'";
    
    }

        $result = mysqli_query($conn, $query);

        if($result){
        move_uploaded_file($image['tmp_name'],"./../uploads/".$image_name);
        
        $_SESSION["success"] ="Banner updated successfully!.....";
        header("Location: ./../backend/banneredit.php?id=$id");
        }else{
            $_SESSION["fall"] ="failed.....";
        header("Location: ./../backend/banneredit.php?id=$id");
        }
}















       
?>










