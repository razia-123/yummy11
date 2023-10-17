<?php
include_once './../contact.php';
session_start();
$category_id =trim($_REQUEST['category_id']);

$name =trim($_REQUEST['name']);
$description =trim($_REQUEST['description']);
$price =trim($_REQUEST['price']);

$image =$_FILES['image'];
$image_extension=pathinfo($image['name'] ,PATHINFO_EXTENSION);
$image_size = $image['size'];

$errors=[];


//title Validation
if (empty($name)) {
    $errors['name_error'] = ' please enter a title';
} elseif (strlen($name) > 300) {
    $errors['name_error'] = 'title len not greater than 100 charcter';
}

// description Validation
if (empty($description)) {
    $errors['description_error'] = 'please enter a description';
} elseif (strlen($description) > 300) {
    $errors['description_error'] = 'description len not greater than 300 charcter';
}


// cate Validation
if (empty($category_id)) {
    $errors['cate_error'] = 'please enter a cta text';
} elseif (strlen($category_id) > 500) {
    $errors['cate_error'] = ' cta text len not greater than 50 charcter';
}





// image validation
$expected_extension=['jpeg','png','Webp','jpg'];
if(!$image['size'] >0){
    $errors['image_error'] = 'image is required';
}
elseif(in_array($image_extension,$expected_extension)){

  $errors['image_error'] = 'image must be jpg,jpeg,png or webp ';
}
elseif($image['size'] >500000){
    $errors['image_error'] = 'image size not more than 5 mb';
}
//title Validation
if (empty($price)) {
    $errors['price_error'] = ' please enter a title';
} elseif (strlen($price) > 300) {
    $errors['price_error'] = 'title len not greater than 100 charcter';
}






if(count($errors)>0){
    $_SESSION['errors']=$errors;
    header('Location: ./../backend/food_create.php'); 
}else{
$image_name = uniqid().'.'.$image_extension;
  
$query="INSERT INTO foods ( category_id, name, description, price, image) VALUES ('$category_id','$name','$description','$price','$image_name')";
$result = mysqli_query($conn, $query);
if($result){
    move_uploaded_file($image['tmp_name'],"./../uploads/".$image_name);
  
$_SESSION["success"] ="food Inserted successfully!.....";
header('Location: ./../backend/food_create.php'); 
}
}