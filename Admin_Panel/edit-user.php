<?php
 include_once "file_function/function.php";
 $id= $_GET['e'];
 $sel="SELECT * FROM students WHERE st_id='$id'";
 $QR=mysqli_query($connect,$sel);
 $info=mysqli_fetch_array($QR);

 if(!empty($_POST)){
  $name=$_POST['edit_name'];
  $number=$_POST['edit_number'];
  $email=$_POST['edit_email'];
  $role =  $_POST['role'];
  $image = $_FILES['pic'];
  $imageName ='';
  
  if($image['name']!=''){
  $imageName= 'user_'.time().'_'.rand(100000,300000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
  }
  
  $update="UPDATE students SET st_name='$name',st_number='$number',st_email='$email',role_id='$role',st_photo='$imageName' WHERE st_id='$id'";

  if(mysqli_query($connect,$update)){
    move_uploaded_file($image['tmp_name'],'uplude/'.$imageName) ;
    header("Location:all-user.php");
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
                                            <i class="fab fa-gg-circle"></i>Update User Information
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
                                          <input type="text" class="form-control form_control" id="" value="<?=$info['st_name']?>" name="edit_name">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Phone:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" value="<?=$info['st_number']?>" name="edit_number">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Email<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="email" class="form-control form_control" id="" value="<?=$info['st_email']?>" name="edit_email">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Username<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" readonly="readonly" value="<?=$info['st_user']?>" name="">
                                        </div>
                                      </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">User Role<span class="req_star">*</span>:</label>
                                        <div class="col-sm-4">
                                          <select class="form-control form_control" id="" name="role">
                                            <option>Select Role</option>
                                            <?php
                                            $sel= "SELECT * FROM role ORDER BY role_id ASC";
                                            $qr= mysqli_query($connect,$sel);
                                            while($urole=mysqli_fetch_array($qr)){

                                            
                                             ?>
                                            <option value="<?= $urole['role_id'] ?>"<?php if($urole['role_id']==$info['role_id'] ){echo 'selected';} ?>><?php echo $urole['role_name']; ?></option>
                                            <?php } ?>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Photo:</label>
                                        <div class="col-sm-4">
                                          <input type="file" class="form-control form_control" id="" name="pic">
                                          <td>
                                      <?php if($info['st_photo']!=''){ ?>
                                        <img height="40" width= "60" style="object-fit:cover;" src="uplude/<?= $info['st_photo'] ;?>" alt=""></td>
                                      <?php }else{ ?>
                                        <img class="img200" height="40" width= "60" style="object-fit:cover;" src="images/avatar.jpg" alt=""/>
                                        <?php } ?>
                                      <td>
                                        </div>
                                      </div>
                                  </div>
                                  <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-sm btn-dark">UPDATE</button>
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