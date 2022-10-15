<?php
if( $_SESSION["connecte"] === true){
    $username = $_SESSION["username"];
    $maRequete = $pdo->prepare("SELECT * FROM article ORDER BY pubdate DESC");
    $maRequete->execute();
    $postes = $maRequete->fetchAll(PDO::FETCH_ASSOC);         
    if ($postes){
        foreach($postes as $poste): 
            if($poste['statut']=='1'){
                ?>
                <div class="blog-slider__item swiper-slide">
                    <div class="blog-slider__img">
                        <img src="<?=$poste['illustration']?>">
                    </div>
                    <div class="blog-slider__content">
                        <span class="blog-slider__code"><?=$poste['pubdate']?> by @<?=$poste['author']?></span>
                        <div class="blog-slider__title"><?=$poste['title']?></div>
                        <div class="blog-slider__text"><?=$poste['descript']?></div>
                        <a href="./blog/read_more.php?id=<?=$poste['id']?>" class="blog-slider__button">READ MORE</a>
                    </div>
                </div>
        <?php }; 
        endforeach;
}else{echo 'None';}?>
<?php } ?>