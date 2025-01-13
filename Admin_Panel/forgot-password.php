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
                  <h3 class="mb-3">forgot-password</h3>
                    <div class="bg-white shadow rounded">
                        <div class="row">
                            <div class="col-md-7 pe-0">
                                <div class="form-left h-100 py-5 px-5">
                                    <?php
                                    if($_POST){
                                        $email=$_POST['email'];
                                        $sel="SELECT * FROM students WHERE st_email='$email'";
                                        $QR=mysqli_query($connect,$sel);
                                        $data=mysqli_fetch_array($QR);
                                        if($data){
                                            header("Location:reset-password.php?rp=".$data['st_slug']);
                                        }else{
                                            echo"This Email Did Not Match";
                                        }
                                    }
                                    ?>
                                    <form action="" method="post" class="row g-4">
                                        <div class="col-12">
                                            <label>Email<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                                <input type="email" name="email" class="form-control" placeholder="Enter Email">
                                            </div>
                                        </div>
                                      
                                        <div class="col-sm-6">
                                            <a href="login.php" class="float-end text-primary">Back</a>
                                        </div>
                                                                               

                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-primary px-4 mt-4">send</button>
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