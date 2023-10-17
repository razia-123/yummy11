<?php 
session_start();
include_once './../contact.php';
$c_id = $_REQUEST['id'];
$select_id="SELECT *FROM categories";
$result1= mysqli_query($conn, $select_id);
$post=mysqli_fetch_all($result1,1);




if(count($post)>1){


$query ="DELETE FROM categories WHERE id = $c_id ";
$result= mysqli_query($conn ,$query);
if( $result){
    
    $_SESSION['delete'] = 'category delete successfully!.';
    header('Location: ./../backend/categori_list.php');

}
}else{
    $_SESSION['message'] = 'you have just one cayegory.';
    header('Location: ./../backend/categori_list.php');
}


?>
