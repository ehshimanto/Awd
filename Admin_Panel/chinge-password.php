<?php
 include_once "file_function/function.php";
 $id= $_GET['p'];
 $select= "SELECT * FROM students WHERE st_id='$id'";
 $QR = mysqli_query($connect,$select) ;
 $info= mysqli_fetch_array($QR);
 $pw=$info['pw'];

 if($_POST){
  $opw= md5($_POST['old_pass']);
  $npw= md5($_POST['new_pass']);
  $cpw= md5($_POST['cpass']);
  $updata="UPDATE students SET pw='$npw' WHERE st_id='$id'";
  if(!empty($opw)){
    if(!empty($npw)){
      if(!empty($cpw)){
        if($npw===$cpw){
          if($pw===$opw){
          if(mysqli_query($connect,$updata)){
            header("Location:login.php");
          }else{
            echo "Opps! Password Change Faild";
          }
          }else{
           echo "Password Did Not Match";
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
   
  }else{
    echo "Please enter Olde Password";
   }

 }
 needLogged();
 get_header();
 get_sidebar();


?>
                
                  
                    <div class="row">
                        <div class="col-md-12 ">
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="card mb-3">
                                  <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-8 card_title_part">
                                            <i class="fab fa-gg-circle"></i>chinge-password
                                        </div>  
                                        <div class="col-md-4 card_button_part">
                                            <a href="all-user.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All User</a>
                                        </div>  
                                    </div>
                                  </div>
                                  <div class="card-body">
                                      
                                      
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Olde password<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="old_pass">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">New Password<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="password" class="form-control form_control" id="" name="new_pass">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Confirm-Password<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="password" class="form-control form_control" id="" name="cpass">
                                        </div>
                                      </div>
                                      
                                      
                                  </div>
                                  <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-sm btn-dark">Update</button>
                                  </div>  
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
        <?php
   get_footer();
    ?>