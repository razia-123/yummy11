<?php

include './../contact.php';
$c_id = $_REQUEST['id'];
$query ="SELECT * FROM categories WHERE id ='$c_id'";
$result= mysqli_query($conn ,$query);
$post = mysqli_fetch_assoc($result);

include_once './backend_inc/header.php';

?>


<div class="container">
        <p class=" display-4 h2 text-center mt-3 mb-3">category View</p>
  

        
    </div>

<section class="mt-5 ">
    <div class="container ">
        <div class="row text-center  ">
            <div class= "col-md-12 mb-md-0 mb-5">
                <div class="card">
          
                    <div class="card-header">
                        <p class="text-danger  "> title</p>
                        <hr class="sidebar-divider">
                        <p><?=$post['f_name']?></p>


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
