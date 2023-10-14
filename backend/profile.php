<?php

include_once './backend_inc/header.php';

?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <form action="./../controllers/usercontrollers/updateuser.php" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-5 text-center">
                   <div>
                   <label for="profile_input">
                        <img src="./../uploads/<?= isset($_SESSION['auth']['avatar'])? $_SESSION['auth']['avatar'] : "https://api.dicebear.com/7.x/initials/svg?seed=".$_SESSION['auth']['fname']?>" alt="" class="w-50 rounded" id="profile_picture">
                    </label>
                   <input name="avatar" type="file" id="profile_input" class="d-none">
                   </div>
            
                </div>
                <div class="col-7 bg-secondary">
                <h1 class=" text-danger mt-4 text-center">Profile</h1>
                <?php
    if (isset($_SESSION['success'])){
 echo '<div class="alert alert-success">'.$_SESSION['success']."</div>";
}
 ?>

    <div class="form-group">
    <label for=""> First Name</label>
    <input name="fname" type="text" class="form-control mb-4" value="<?= $_SESSION['auth']['fname']?>">
   <p class="text-danger"> <?php
    echo isset($_SESSION['errors']['fnameError'])? $_SESSION['errors']['fnameError']: '';
  
    
  
  
    ?></p>
    </div>

    <div class="form-group">
    <label for=""> Last Name</label>
    <input name="lname" type="text" class="form-control mb-4"  value="<?= $_SESSION['auth']['lname']?>">
<p class="text-danger"> <?php
    echo isset($_SESSION['errors']['lnameError'])? $_SESSION['errors']['lnameError']: '';
    
    
  
  
    ?></p>

    </div>
    <div class="form-group">
    <label for=""> Email</label>
    <input name="email" type="text" class="form-control mb-4"  value="<?= $_SESSION['auth']['email']?>">
 <p class="text-danger" > <?php
    echo isset($_SESSION['errors']['emailError'])? $_SESSION['errors']['emailError']: '';
 
    
  
  
    ?></p>
    </div>
    <button type="submit"class="btn btn-info mb-3">Save Changes</button>



                </div>
              </div>

              </form>
              <div class="row">
        <div class="col-lg-6 bg-warning mx-auto my-5">
            <h3 class="h3 text-center text-dark mt-3">Change Password</h3>
            <?php
    if (isset($_SESSION['msg'])){
 echo '<div class="alert alert-success">'.$_SESSION['msg']."</div>";
}
 ?>

           

            <form action="./../controllers/usercontrollers/passwordupdate.php" method="POST">
            <div class="form-group"> 
            <label for="">Current Password</label>
                <input name="oldpassword" type="password"class="form-control mb-3">
                <p class= "text-danger"><?php
    echo isset($_SESSION['errors']['passError'])? $_SESSION['errors']['passError']: "";
     ?></p>
                <p class="text-danger"><?php echo isset($_SESSION['password_error'])? $_SESSION['password_error']: "";
  ?>
</p>
            </div>
            <div class="form-group">
                <label for="">New Password</label>
                <input name="password" type="password"class="form-control mb-3">
               <p class="text-danger"> <?php
    echo isset($_SESSION['errors']['passwordError'])? $_SESSION['errors']['passwordError']: "";
     
  
  
    ?></p>
                  
                </div>
                <div class="form-group">
                <label for="">Confirm Password</label>
                <input name="confirmpassword" type="password"class="form-control mb-3">
                <p class="text-danger"><?php
    echo isset($_SESSION['errors']['confirmpasswordError'])? $_SESSION['errors']['confirmpasswordError']: "";
    
  
  
    ?></p>
                </div>
                <button class="btn btn-info mb-3" type="submit">Update Password</button>
            </form>
        </div>
    </div>




                </div>

            <!-- End of Main Content -->
            <?php
include_once './backend_inc/footer.php';
?>

<script>
  let profileSelector = document.querySelector('#profile_input');
  let profilePicture = document.querySelector('#profile_picture');
  function imageUpload(event){
    let image_url = URL.createObjectURL(event.target.files[0]);
    profilePicture.src = image_url;
  }
  profileSelector.addEventListener('change',imageUpload)

</script>
<?php
unset($_SESSION['errors'],$_SESSION['success'],$_SESSION['password_error'] ,$_SESSION['msg'] );
?>