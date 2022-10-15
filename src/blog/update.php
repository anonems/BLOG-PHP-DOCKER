<?php
if( $_SESSION["connecte"] === true){
    if(($_SERVER["REQUEST_METHOD"] == "POST")){
        if(isset($_POST['update'])){
            $title = filter_input(INPUT_POST, "title");
            $content = filter_input(INPUT_POST, "content");
            $category = filter_input(INPUT_POST, "category");
            $illustration = filter_input(INPUT_POST, "illustration");
            $descript = filter_input(INPUT_POST, "descript");
            $choice = filter_input(INPUT_POST, "choice");
            $createRequete = $pdo->prepare("SELECT title FROM article WHERE title = :title ");
            $createRequete->execute(['title' => $title]);
            $verifuse = $createRequete->fetch(); 
            if (!$verifuse){
                $verifUseRequete = $pdo->prepare("UPDATE article SET author = :username, title = :title, content = :content, category = :category, illustration = :illustration, descript = :descript WHERE id = :choice ");
                $verifUseRequete->execute(array(
                    'username' => $_SESSION['username'],
                    'title'=> $title,
                    'content' => $content,
                    'category' => $category,
                    'illustration' => $illustration, 
                    'descript' => $descript,
                    'choice' => $choice
                ));
                header('Location: ../index.php');
            }elseif($verifuse){
                echo "<span style='color:red'>This title already use! choice an other.</span>";
            }
        }
    } ?>
        <form method="post" >
            <label >Choise an article to update :</label>
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
            <label >New title</label>
            <input type="text" name="title">
            <label >New description</label>
            <input type="text" name="descript">
            <label >New illustration</label>
            <input type="url" name="illustration">
            <label >New content</label>
            <textarea name="content" ></textarea>
            <label >Category</label>
            <select name="category">
                <option selected>Choice</option>
                <option value="ecolo">écologie</option>
            </select>
            <button type="submit" name="update">Submit</button>
        </form>
<?php } ?>