<?php
if(isset($_POST['create'])){
    session_start();
    require('./cobdd.php');
            $title = filter_input(INPUT_POST, "title");
            $content = filter_input(INPUT_POST, "content");
            $category = filter_input(INPUT_POST, "category");
            $illustration = filter_input(INPUT_POST, "illustration");
            $descript = filter_input(INPUT_POST, "descript");
            $createRequete = $pdo->prepare("SELECT title FROM article WHERE title = :title ");
            $createRequete->execute(['title' => $title]);
            $verifuse = $createRequete->fetch(); 
            if (!$verifuse){
                echo "ok";
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
                echo "<span style='color:red'>This title already use! choice an other. <a id='login_bt' style='text-decoration:none;' href='./index.php'>HOME</a></span>";
            }
    }else{ ?>    
    <div>
    <center><h2>Create an article</h2></center>
    <center  style="margin:20px">You want cancel ? <a id="login_bt" style="text-decoration:none;" href="./index.php">HOME</a></center>
        <form action="./middleware/crud.php" method="post" style="display:grid; gap:20px">
            <div style="grid-row:1; " >
            <label >Title of article</label>
            <input type="text"  name="title" required>
            </div>
            <div style="grid-row:2; grid-column:1" >
            <label >description</label>
            <input type="text" name="descript" required>
            </div>
            <div style="grid-row:3; grid-column:1" >
            <label >illustration</label>
            <input type="url" name="illustration" required>
            </div>
            <div style="grid-row:1; grid-column:2" >
            <label >content</label>
            <input type="texte" name="content" required>
            </div>
            <div style="grid-row:2; grid-column:2" >
            <label >Category</label>
            <select name="category"required>
                <option selected>Choice</option>
                <option value="ecolo">écologie</option>
            </select>
            </div>
            <button style="grid-row:3; grid-column:2"  type="submit" name="create">Submit</button>
        </form>
        </div>
<?php } ?>