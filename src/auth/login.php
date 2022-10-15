<?php
if(($_SERVER["REQUEST_METHOD"] == "POST")){
    if(isset($_POST['log'])) {
        $username = filter_input(INPUT_POST, "username");
        $pwd = filter_input(INPUT_POST, "pwd");
        $requeteSig = $pdo->prepare("SELECT * FROM user WHERE username = :username ");
        $requeteSig->execute([
            ":username" => $username
        ]);
        $requeteSig->setFetchMode(PDO::FETCH_ASSOC);
        $log = $requeteSig->fetch();
        if (($log['username'] == $username) && (password_verify($pwd, $log['pwd']))){
            $_SESSION['connecte'] = true;
            $_SESSION['username'] = $username;
            http_response_code(302);
            include('./blog/blog.php');
        }else{
                echo "<span style='color:red'>Error log.</span> "; //log n'existe pas ou combo incorrect
            }
    }elseif(isset($_POST['sig'])){
        $username = filter_input(INPUT_POST, "username");
        $pwd = filter_input(INPUT_POST, "pwd");
        $pwd_hash =  password_hash($pwd, PASSWORD_DEFAULT);
        $requeteLog = $pdo->prepare("SELECT username, pwd FROM user WHERE username = :username  ");
        $requeteLog->execute(['username' => $username]);
        $verifuse = $requeteLog->fetch(); 
        if (!$verifuse){
            $verifUseRequete = $pdo->prepare("INSERT INTO user (username,pwd) VALUES (:username,:pwd) ");
            $verifUseRequete->execute(array(
                'username' => $username,
                'pwd' => $pwd_hash        
            ));
            include('./auth/login.php');
        }elseif($verifuse){
            echo "<span style='color:red'>This pseudo already use! choice an other.</span>"; //pseudo deja utilisé
        }
    }
}else{ ?>
<div id="login">
    <form method="post" >
        <label >Username</label>
        <input type="text" name="username">
        <label >Password</label>
        <input type="password" name="pwd">
        <button type="submit" name="log">Submit</button>
    </form>
    <button id="signin_bt">Signin</button>
</div>
<div id="signin">
    <form method="post" >
        <label >Username</label>
        <input type="text" name="username">
        <label >Password</label>
        <input type="password" name="pwd">
        <button type="submit" name="sig">Submit</button>
    </form>
    <button id="login_bt">Login</button>
</div>
<script> //afficher login/signin
    let signin = document.getElementById("signin_bt");
    let login = document.getElementById("login_bt");
    document.getElementById("login").style.display = "none";
    signin.addEventListener("click", () => {
        document.getElementById("signin").style.display = "block";
        document.getElementById("login").style.display = "none";
    })
    login.addEventListener("click", () => {
        document.getElementById("login").style.display = "block";
        document.getElementById("signin").style.display = "none";
    })                
</script>
<?php } ?> 