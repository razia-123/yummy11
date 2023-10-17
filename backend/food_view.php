<?php

include './../contact.php';
$f_id = $_REQUEST['id'];
$query ="SELECT * FROM foods WHERE id ='$f_id'";
$result= mysqli_query($conn ,$query);
$food= mysqli_fetch_assoc($result);

include_once './backend_inc/header.php';

?>


<div class="container">
        <p class=" display-4 h2 text-center mt-3 mb-3">Banner View</p>
  

        
    </div>

<section class="mt-5 ">
    <div class="container ">
        <div class="row text-center  ">
            <div class= "col-md-12 mb-md-0 mb-5">
                <div class="card">
                
                    <div class="card-header">
                        <p class="text-danger  "> Category_id</p>
                        <hr class="sidebar-divider">
                        <p><?=$food['category_id']?></p>


                    </div>
                    <div class="card-header ">
                    <p class="text-danger "> name</p>
                        <hr class="sidebar-divider">
                        <p> <?=$food['name']?></p>

                    </div>
                    <div class="card-header">
                    <p class="text-danger ">description </p>
                        <hr class="sidebar-divider">
                        <p> <?=$food['description']?></p>

                    </div>
                    <div class="card-header">
                    <p class="text-danger "> price</p>
                        <hr class="sidebar-divider">
                        <p> <?=$food['price']?> </p>

                    </div>
                    
                    <div class="card-header">
                    <p class="text-danger "> image</p>
                        <hr class="sidebar-divider">
                        <p><img src="./../uploads/<?=$food['image']?>" width="200"></p>

                    </div>

                    



                </div>

            </div>

        </div>

    </div>

</section>



    
    

<?php
include_once './backend_inc/footer.php';
unset($_SESSION['mess'],$_SESSION['delete']);
?>
