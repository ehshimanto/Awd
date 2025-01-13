<?php
 include_once "file_function/function.php";
 if(!empty($_POST)){
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $username = $_POST['user'];
  $password = md5($_POST['pass']);
  $cpass =  md5($_POST['cpass']);
  $role =  $_POST['role'];
  $image = $_FILES['pic'];
  $imageName ='';
  $slug=uniqid('u');
  
  if($image['name']!=''){
  $imageName= 'user_'.time().'_'.rand(100000,300000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
  }
  $insert ="INSERT INTO students(st_name,st_number,st_email,st_user,pw,role_id,st_photo,st_slug) VALUES('$name','$phone','$email','$username','$password','$role','$imageName','$slug')" ;
 
 if(!empty($name)){
  if(!empty($phone)){
    if(!empty($email)){
      if(!empty($username)){
        if(!empty($password)){
      if($password==$cpass){
        if(mysqli_query($connect,$insert)){
          
          move_uploaded_file($image['tmp_name'],'uplude/'.$imageName) ;
         header("Location:all-user.php");
      }else{
        echo "Registration Faild" ;
      }
      }else{
        echo "Password Did not match";
      }
        }else{
         echo "Input your Password";
        }
      }else{
       echo "Input your Username";
      }
    }else{
     echo "Input your Email";
    }
  }else{
   echo "Input your Phone number";
  }
 }else{
  echo "Input your Name";
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
                                            <i class="fab fa-gg-circle"></i>User Registration
                                        </div>  
                                        <div class="col-md-4 card_button_part">
                                            <a href="all-user.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All User</a>
                                        </div>  
                                    </div>
                                  </div>
                                  <div class="card-body">
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="name">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Phone:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="phone">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Email<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="email" class="form-control form_control" id="" name="email">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Username<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="user">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Password<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="password" class="form-control form_control" id="" name="pass">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Confirm-Password<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="password" class="form-control form_control" id="" name="cpass">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">User Role<span class="req_star">*</span>:</label>
                                        <div class="col-sm-4">
                                          <select class="form-control form_control" id="" name="role">
                                            <option>Select Role</option>
                                         <?php   $select = "SELECT * FROM role ORDER BY role_id DESC";
                                     $QR = mysqli_query($connect,$select);
                                     While($data=mysqli_fetch_array($QR)){ ?>
                                            <option value="<?= $data['role_id']?>"><?= $data['role_name']?></option>
                                            <?php } ?>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Photo:</label>
                                        <div class="col-sm-4">
                                          <input type="file" class="form-control form_control" id="" name="pic">
                                        </div>
                                      </div>
                                  </div>
                                  <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-sm btn-dark">REGISTRATION</button>
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