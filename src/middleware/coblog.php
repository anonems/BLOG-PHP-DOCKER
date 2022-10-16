<?php
session_start();
require("../cobdd.php");
if(($_SERVER["REQUEST_METHOD"] == "POST")){

    //LOGIN
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
                echo "<script>location.href='../index.php'</script>";
            }else{
                    echo "<script>alert('Error log.');location.href='../index.php';</script>"; //log n'existe pas ou combo incorrect
                }
        }
        
    //SIGN IN
        if(isset($_POST['sig'])){
            $username = filter_input(INPUT_POST, "username");
            $pwd = filter_input(INPUT_POST, "pwd");
            $pwd_hash =  password_hash($pwd, PASSWORD_DEFAULT);
            $requeteLog = $pdo->prepare("SELECT username FROM user WHERE username = :username  ");
            $requeteLog->execute(['username' => $username]);
            $verifuse = $requeteLog->fetch(); 
            if (!$verifuse){
                $verifUseRequete = $pdo->prepare("INSERT INTO user (username,pwd) VALUES (:username,:pwd) ");
                $verifUseRequete->execute(array(
                    'username' => $username,
                    'pwd' => $pwd_hash        
                ));
                echo "<script>location.href='../index.php'</script>";
            }else if ($verifuse){
                echo "<script>alert('This pseudo already use! choice an other.');location.href='../index.php';</script>"; //log n'existe pas ou combo incorrect
            }
        }
    
        //Update password
        if(isset($_POST['res'])){
            $username = filter_input(INPUT_POST, "username");
            $pwd = filter_input(INPUT_POST, "pwd");
            $pwd_hash =  password_hash($pwd, PASSWORD_DEFAULT);
            $requeteLog = $pdo->prepare("SELECT username FROM user WHERE username = :username  ");
            $requeteLog->execute(['username' => $username]);
            $verifuse = $requeteLog->fetch(); 
            if ($verifuse && $username!="test"){ //plus tard je pourrai rajouter une colone dans la bdd pour differencier entre user normal et admin, en attendant il n'y qu'un seul admin "test".
                $verifUseRequete = $pdo->prepare("UPDATE user SET pwd = :pwd WHERE username = :username");
                $verifUseRequete->execute(array(
                    'username' => $username,
                    'pwd' => $pwd_hash        
                ));
                echo "<script>location.href='../index.php'</script>";
            }else{
                echo "<script>alert('Error.');location.href='../index.php';</script>"; //log n'existe pas ou combo incorrect
            }
        }
}
?>