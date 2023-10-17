<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</html>

<?php
include_once './backend_inc/header.php';
include './../contact.php';
$query ="SELECT * FROM categories";
$result= mysqli_query($conn ,$query);
$posts = mysqli_fetch_all($result,1);


$f_id= $_REQUEST['id'];
$f_query ="SELECT * FROM foods WHERE id ='$f_id'";
$f_result= mysqli_query($conn ,$f_query);
$food = mysqli_fetch_assoc($f_result);
?>

<div class="Container-fluid ml-5 mr-5">
    <h2 class="text-center text-dark" >Add New food </h2>
    <?php
    if (isset($_SESSION['success'])){
 echo '<div class="alert alert-success">'.$_SESSION['success']."</div>";
}
 ?>
    <form class="row my-5" action="./../controllers/food_update.php?id=<?= $food['id']?>" method="POST" enctype="multipart/form-data">
        <div class="col-lg-12">
            <label for=""> Enter your categori Name</label>
            <input name="name"  value="<?= $food['name'] ?>" class="form-control mb-4" type="text">
            <p class="text-danger"><?= isset($_SESSION['errors']['name_error'])? $_SESSION['errors']['name_error']: ''?></p>

        </div>
        <div class="col-lg-12">
            <label for=""> Description</label>
            <textarea name="description"class="form-control mb-4"><?= $food['description'] ?></textarea>
            <p class="text-danger"><?= isset($_SESSION['errors']['description_error'])? $_SESSION['errors']['description_error']: ''?></p>

        </div>
        
        <div class="col-lg-6">
            <label for=""> price</label>
            <input name="price"value="<?= $food['price'] ?>" class="form-control mb-4" >
            <p class="text-danger"><?= isset($_SESSION['errors']['price_error'])? $_SESSION['errors']['price_error']: ''?></p>
        </div>
       
      
       
        <div class="col-lg-6">
        <label for=""> Enter your Catagory </label>
         <select name="category_id"value="<?= $food['category_id'] ?>" id="" class="form-control mb-4">
         <?php
foreach($posts as $key=> $post){
   

?>
<option value="<?=$post['id']?>"><?=$post['f_name']?></option>
    <?php
}
   

?> 
         </select>
            <p class="text-danger"><?= isset($_SESSION['errors']['cate_error'])? $_SESSION['errors']['cate_error']: ''?></p>
        </div>
        <div class="col-lg-12">
            <label for=""> Enter your food image </label>
            <input name="image"  class="form-control mb-4" type="file">
            <p class="text-danger"><?= isset($_SESSION['errors']['image_error'])? $_SESSION['errors']['image_error']: ''?></p>
            <img src="./../uploads/<?=$food['image']?>" width="100">
        </div>


        <div class="col-lg-12 mb-4  ">
           <button type="submit" class="btn btn-info mt-4 w-25">food Update </button>
        </div>

    </form>

</div>








            <?php
include_once './backend_inc/footer.php';

?>
<?php
unset($_SESSION['errors'],$_SESSION['success']);
?>