<?php
if( $_SESSION["connecte"] === true){
    if(($_SERVER["REQUEST_METHOD"] == "POST")){
        if(isset($_POST['delete'])){
            $choice = filter_input(INPUT_POST, "choice");
            $maRequete7 = $pdo->prepare("DELETE FROM article WHERE choice=:choice");
            $maRequete7->execute(['choice' => $choice]);
            include('./auth/login.php');
        }
    }
?>
            <form action="" method="post" >
                <label >Choise an article to delete :</label>
                <select name="choice" require>
                <option selected>choice</option>
                <?php
                    $username = $_SESSION["username"];
                    $maRequete = $pdo->prepare("SELECT * FROM article WHERE author = :username");
                    $maRequete->execute(['username'=>$username]);
                    $postes = $maRequete->fetchAll(PDO::FETCH_ASSOC);
                        foreach($postes as $poste): 
                        ?>
                        <option value="<?=$poste['id']?>"><?=$poste['title']?></option>
                        <?php endforeach; ?>
                </select>
                
                <button type="submit" name="delete">Delete</button>
            </form>
<?php } ?>