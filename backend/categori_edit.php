<?php

include './../contact.php';
$banner_id= $_REQUEST['id'];
$query ="SELECT * FROM categories WHERE id ='$banner_id'";
$result= mysqli_query($conn ,$query);
$post = mysqli_fetch_assoc($result);


include_once './backend_inc/header.php';


?>


<div class="Container-fluid ml-5 mr-5">
    <h2 class="text-center text-dark" >Add New Banner </h2>
    <?php
    if (isset($_SESSION['success'])){
 echo '<div class="alert alert-success">'.$_SESSION['success']."</div>";
}
 ?>
  <?php
    if (isset($_SESSION['fall'])){
 echo '<div class="alert alert-success">'.$_SESSION['fall']."</div>";
}
 ?>
    <form class="row my-5" action="./../controllers/categori_update.php?id=<?= $post['id']?>" method="POST" enctype="multipart/form-data">
        <div class="col-lg-12">
            <label for=""> Enter your Banner Name</label>
            <input value="<?= $post['f_name'] ?>" name="f_name" class="form-control mb-4" type="text">
            <p class="text-danger"><?= isset($_SESSION['errors']['fname_error'])? $_SESSION['errors']['fname_error']: ''?></p>

        </div>
     
        <div class="col-lg-12  text-center">
           <button type="submit" class="btn btn-info w-25">Category Update </button>
        </div>

    </form>

</div>








            <?php
include_once './backend_inc/footer.php';

?>
<?php
unset($_SESSION['errors'],$_SESSION['success'],$_SESSION['fall']);
?>