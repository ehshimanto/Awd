<?php
 include_once "file_function/function.php";
 needLogged();
 get_header();
 get_sidebar();

?>

              
                   
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                              <div class="card-header">
                                <div class="row">
                                    <div class="col-md-8 card_title_part">
                                        <i class="fab fa-gg-circle"></i>All User Information
                                    </div>  
                                    <div class="col-md-4 card_button_part">
                                        <a href="add-user.php" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add User</a>
                                    </div>  
                                </div>
                              </div>
                              <div class="card-body">
                                <table class="table table-bordered table-striped table-hover custom_table">
                                  <thead class="table-dark">
                                    <tr>
                                    <th>SL</th>
                                      <th>Name</th>
                                      <th>Phone</th>
                                      <th>Email</th>
                                      <th>Username</th>
                                      <th>Role</th>
                                      <th>Photo</th>
                                      <th>Manage</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $i = 1;
                                     $select = "SELECT * FROM students NATURAL JOIN role ORDER BY st_id DESC";
                                     $QR = mysqli_query($connect,$select);
                                     While($data=mysqli_fetch_array($QR)){
                                      
                                    

                                    ?>


                                    <tr>
                                     <td><?php echo $i++ ?></td>
                                      <td><?php echo $data['st_name'] ; ?></td>
                                      <td><?= $data['st_number'] ;?></td>
                                      <td><?= $data['st_email'] ;?></td>
                                      <td><?= $data['st_user'] ;?></td>
                                      <td><?= $data['role_name'] ;?></td>
                                      
                                      <td>
                                      <?php if($data['st_photo']!=''){ ?>
                                        <img height="40" width= "60" style="object-fit:cover;" src="uplude/<?= $data['st_photo'] ;?>" alt=""></td>
                                      <?php }else{ ?>
                                        <img class="img200" height="40" width= "60" style="object-fit:cover;" src="images/avatar.jpg" alt=""/>
                                        <?php } ?>
                                      <td>
                                          <div class="btn-group btn_group_manage" role="group">
                                            <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                                            <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="view-user.php?v=<?= $data['st_id'] ;?>">View</a></li>
                                              <li><a class="dropdown-item" href="edit-user.php?e=<?= $data['st_id'] ;?>">Edit</a></li>
                                              <li><a id="delete" class="dropdown-item"  href="delete.php?d=<?= $data['st_id'] ;?>">Delete</a></li>
                                            </ul>
                                          </div>
                                      </td>
                                    </tr>
                                   <?php
                                    }
                                    ?>
                              
                                  </tbody>
                                </table>
                              </div>
                              <div class="card-footer">
                                <div class="btn-group" role="group" aria-label="Button group">
                                  <button type="button" class="btn btn-sm btn-dark">Print</button>
                                  <button type="button" class="btn btn-sm btn-secondary">PDF</button>
                                  <button type="button" class="btn btn-sm btn-dark">Excel</button>
                                </div>
                              </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
    <?php
   get_footer();
    ?>
    <script>
    
     $('#delete').on('click',function{
      const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: "btn btn-success",
    cancelButton: "btn btn-danger"
  },
  buttonsStyling: false
});
swalWithBootstrapButtons.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonText: "Yes, delete it!",
  cancelButtonText: "No, cancel!",
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    swalWithBootstrapButtons.fire({
      title: "Deleted!",
      text: "Your file has been deleted.",
      icon: "success"
    });
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire({
      title: "Cancelled",
      text: "Your imaginary file is safe :)",
      icon: "error"
    });
  }
});
     })
     </script>