<?php
include_once "file_function/function.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="login-page bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                  <h3 class="mb-3">Reset Password</h3>
                    <div class="bg-white shadow rounded">
                        <div class="row">
                            <div class="col-md-7 pe-0">
                                <div class="form-left h-100 py-5 px-5">
                                    <?php
                                    $slug= $_GET['rp'];
                                    $select= "SELECT * FROM students WHERE st_slug='$slug'";
                                    $QR = mysqli_query($connect,$select) ;
                                    $info= mysqli_fetch_array($QR);
                                    $id=$info['st_id'];
                                   
                                    if($_POST){
                                     $npw= md5($_POST['new_pass']);
                                     $cpw= md5($_POST['cpass']);
                                     $updata="UPDATE students SET pw='$npw' WHERE st_id='$id'";
                                    
                                       if(!empty($npw)){
                                         if(!empty($cpw)){
                                           if($npw===$cpw){
                                             
                                             if(mysqli_query($connect,$updata)){
                                               header("Location:login.php");
                                             }else{
                                               echo "Opps! Password Change Faild";
                                             }
                                             
                                           }else{
                                            echo "Password Did Not Match";
                                           }
                                         }else{
                                          echo "Please enter Confarm Password";
                                         }
                                       }else{
                                        echo "Please enter New Password";
                                       }
                                      
                                                                      
                                    }
                                    ?>
                                    <form action="" method="post" class="row g-4">
                                        <div class="col-12">
                                            <label>New Password<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                                <input type="password" name="new_pass" class="form-control" placeholder="Enter password">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label>Comfarm Password<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                                <input type="password" name="cpass"  class="form-control" placeholder="Enter Password">
                                            </div>
                                        </div>

                                        

                                        <div class="col-sm-6">
                                            <a href="forgot-password.php" class="float-end text-primary">Back</a>
                                        </div>

                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-primary px-4  mt-4">Reset Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>