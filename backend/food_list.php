<?php

include './../contact.php';
$f_query ="SELECT * FROM foods";
$f_result= mysqli_query($conn ,$f_query);
$foods = mysqli_fetch_all($f_result,1);


include_once './backend_inc/header.php';


?>





<div class="container">
        <p class=" display-4 h2 text-center mt-3 mb-3">Food List</p>
        <?php
    if (isset($_SESSION['mess'])){
 echo '<div class="alert alert-success">'.$_SESSION['mess']."</div>";
}
 ?>
         <?php
    if (isset($_SESSION['delete'])){
 echo '<div class="alert alert-success">'.$_SESSION['delete']."</div>";
}
 ?>
 <?php
    if (isset($_SESSION['message'])){
 echo '<div class="alert alert-success">'.$_SESSION['message']."</div>";
}
 ?>

        
    </div>
    <div class="container">
    <div class="row ">
  
<table class="table text-center table-bordered table-striped table-hover col-lg-12  col-md-12 col-12 mt-5 mx-auto text-danger" >
    <thead class="bg-info ">
      <tr>
        <th scope="col">serial no</th>
        
        <th scope="col">Category_id</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Price</th>
    <th scope="col">image</th>
     
        <th scope="col">action</th>
</tr>
    </thead>
        <tbody>
<?php
foreach($foods as $key=> $food){
   

?>
<tr>
    <th scope='row'><?= ++$key?></th>
    <td ><?=$food['category_id']?></td>
    <td ><?=$food['name']?></td>
    <td ><?=$food['description']?></td>
    <td ><?=$food['price']?></td>
   
  
    <td ><img src="./../uploads/<?=$food['image']?>" width="100"></td>

    <td >
       <div class="btn-group-sm">
        <a href="./food_view.php?id=<?=$food['id']?>" class="btn btn-success"><i class="fas fa-eye"></i></a>
        <a href="./food_edit.php?id=<?=$food['id']?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
        <a href="./../controllers/food_delete.php?id=<?=$food['id']?>" class="btn btn-danger food"><i class="fas fa-trash"></i></a>

       </div> 
    </td>
    </tr> 
    <?php
}
   

?> 
        </tbody>




      
  
</table>
</div>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>



$('.food').on('click',function(event){
  event.preventDefault();
  Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {

let url =$(this).attr('href');
window.location.href =url;

 
  }
})

})













</script>
 
    <?php
include_once './backend_inc/footer.php';
unset($_SESSION['mess'],$_SESSION['delete'],$_SESSION['message']);
?>