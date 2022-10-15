<?php
if( $_SESSION["connecte"] === true){
?>
        <h1 >WHAT DO YOU WANT TO DO ?</h1><br>   
        <form class="btn_form" method="post">
                <button name="create_bt"  class="blog-slider__button">Create</button>
                <button name="read_bt"  class="blog-slider__button">Read</button>
                <button name="update_bt"  class="blog-slider__button">Update</button>
                <button name="delete_bt"  class="blog-slider__button">Delete</button>
                <a id="logout_bt" href="../auth/logout.php" class="blog-slider__button">Logout</a>  
        </form>
        <?php 
            if(($_SERVER["REQUEST_METHOD"] == "POST")){
                if(isset($_POST['create_bt'])) {
                    include('./blog/create.php');
                }
                if(isset($_POST['read_bt'])) {
                    include('./blog/read.php');
                }
                if(isset($_POST['update_bt'])) {
                    include('./blog/update.php');
                }
                if(isset($_POST['delete_bt'])) {
                    include('./blog/delete.php');
                }
            }
        } ?>   