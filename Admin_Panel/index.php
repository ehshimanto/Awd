<?php
 include_once "file_function/function.php";
 needLogged();
 get_header();
 get_sidebar();

?>
   
                    <div class="row">
                        <div class="col-md-12 welcome_part">
                            <p><span>Welcome Mr.</span> <?=  $_SESSION['name']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 

    <?php
   get_footer();
    ?>