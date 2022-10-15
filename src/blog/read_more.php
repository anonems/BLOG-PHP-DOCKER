<?php
session_start();
if( $_SESSION["connecte"] === true){
    require('../cobdd.php');
    $username = $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="fr" >

    <head>
        <meta charset="UTF-8">
        <title>BLOG - DOCKER COURS 1-2</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css'>
        <link rel="stylesheet" href="../assets/style/style.css">
            
    </head>

    <body>
    <div class="blog-slider">
        <div class="blog-slider__wrp swiper-wrapper">
        <?php
                require('../cobdd.php');
                $username = $_SESSION["username"];
                $id = filter_input(INPUT_GET, "id");
                $maRequete = $pdo->prepare("SELECT * FROM article WHERE id = :id");
                $maRequete->execute(['id' => $id]);
                $postes = $maRequete->fetch();
            ?>
            <div class="blog-slider__item swiper-slide">
                <div class="blog-slider__img">
                    <img src="<?=$postes['illustration']?>">
                </div>
                <div class="blog-slider__content">
                    <span class="blog-slider__code"><?=$postes['pubdate']?> by @<?=$postes['author']?></span>
                    <div class="blog-slider__title"><?=$postes['title']?></div>
                    <div class="blog-slider__text"><?=$postes['content']?></div>
                </div>
            </div>
           
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js'></script><script  src="../assets/script/script.js"></script>
    

</div>
        <div class="blog-slider__pagination"></div>
    </div>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js'></script><script  src="../assets/script/script.js"></script>
    </body>

    <footer>

    </footer>

</html>
<?php } ?>