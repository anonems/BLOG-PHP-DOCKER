<?php
if( $_SESSION["connecte"] === true){
    if(($_SERVER["REQUEST_METHOD"] == "POST")){
        if(isset($_POST['create'])){
            $title = filter_input(INPUT_POST, "title");
            $content = filter_input(INPUT_POST, "content");
            $category = filter_input(INPUT_POST, "category");
            $illustration = filter_input(INPUT_POST, "illustration");
            $descript = filter_input(INPUT_POST, "descript");
            $createRequete = $pdo->prepare("SELECT title FROM article WHERE title = :title ");
            $createRequete->execute(['title' => $title]);
            $verifuse = $createRequete->fetch(); 
            if (!$verifuse){
                $verifUseRequete = $pdo->prepare("INSERT INTO article (author, title, content, category, illustration, descript) VALUES (:username, :title, :content, :category, :illustration, :descript) ");
                $verifUseRequete->execute(array(
                    'username' => $_SESSION['username'],
                    'title'=> $title,
                    'content' => $content,
                    'category' => $category,
                    'illustration' => $illustration, 
                    'descript' => $descript
                ));
                include('./auth/login.php');
            }elseif($verifuse){
                echo "<span style='color:red'>This title already use! choice an other.</span>";
            }
        }
    } ?>
        <form action="" method="post" >
            <label >Title</label>
            <input type="text" name="title">
            <label >description</label>
            <input type="text" name="descript">
            <label >illustration</label>
            <input type="url" name="illustration">
            <label >content</label>
            <textarea name="content" ></textarea>
            <label >Category</label>
            <select name="category">
                <option selected>Choice</option>
                <option value="">écologie</option>
            </select>
            <button type="submit" name="create">Submit</button>
        </form>
<?php } ?> 