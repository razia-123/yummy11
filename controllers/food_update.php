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
$id= $_REQUEST['id'];
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
$expected_extension=['jpg','jpeg','png','Webp'];
if(!$image['size'] >0){
    if(in_array($image_extension,$expected_extension)){
        $errors['image_error'] = 'image must be jpg,jpeg,png or webp ';
    }elseif($image['size'] >500000){
        $errors['image_error'] = 'image size not more than 5 mb';
    }
}
//price Validation
if (empty($price)) {
    $errors['price_error'] = ' please enter a title';
} elseif (strlen($price) > 300) {
    $errors['price_error'] = 'title len not greater than 100 charcter';
}




if(count($errors)>0){
    $_SESSION['errors']= $errors;
    header("Location: ./../backend/food_edit.php?id=$id");
}else{

    $select_query = "SELECT image FROM foods WHERE id= '$id'";
    $select_query_result= mysqli_query($conn, $select_query);
    $data = mysqli_fetch_assoc($select_query_result);
    
    $image_path ='./../uploads/'. $data['image'];
    $image_name = uniqid().'.'.$image_extension;
    if($image_size > 0){
    if(file_exists($image_path)){
            unlink($image_path);
        }
        $query = "UPDATE foods SET category_id='$category_id',name='$name',description='$description',price='$price',image='$image_name'WHERE id= '$id'";
    }else{
        $query = "UPDATE foods SET category_id='$category_id',name='$name',description='$description',price='$price' WHERE id= '$id'";
    
    }

        $result = mysqli_query($conn, $query);

        if($result){
        move_uploaded_file($image['tmp_name'],"./../uploads/".$image_name);
        
        $_SESSION["success"] ="food updated successfully!.....";
        header("Location: ./../backend/food_edit.php?id=$id");
        }else{
            $_SESSION["fall"] ="failed.....";
        header("Location: ./../backend/food_edit.php?id=$id");
        }
}



