<?php
if( $_SESSION["connecte"] === true){
 
                if(isset($_POST['create_bt'])) {
                    include('./blog/create.php');
                }
                else if(isset($_POST['read_bt'])) {
                    include('./blog/read.php');
                }
                else if(isset($_POST['update_bt'])) {
                    include('./blog/update.php');
                }
                else if(isset($_POST['delete_bt'])) {
                    include('./blog/delete.php');
                }else{
                    include('./blog/blog_content.php');
                }
            
        } ?>   