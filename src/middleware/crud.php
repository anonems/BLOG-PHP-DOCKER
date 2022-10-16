<?php
session_start();
require("../cobdd.php");
if( $_SESSION["connecte"] === true){
    if(($_SERVER["REQUEST_METHOD"] == "POST")){

        //CREATE
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
                    echo "<script>location.href='../index.php'</script>";
                }elseif($verifuse){
                    echo "<script>alert('This ptitle already use! choice an other.');location.href='../index.php';</script>"; //log n'existe pas ou combo incorrect
                }
            }

        //READ
            //see read.php

        //UPDATE
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
                    echo "<script>location.href='../index.php'</script>";
                }elseif($verifuse){
                    echo "<script>alert('This title already use! choice an other.');location.href='../index.php';</script>"; //log n'existe pas ou combo incorrect
                }
            }

        //DELETE
            if(($_SERVER["REQUEST_METHOD"] == "POST")){
                if(isset($_POST['delete'])){
                    $choice = filter_input(INPUT_POST, "choice");
                    $maRequete7 = $pdo->prepare("DELETE FROM article WHERE id=:choice");
                    $maRequete7->execute(['choice' => $choice]);
                    echo "<script>location.href='../index.php'</script>";
                }
            }
        
        //DELETE USER (on suprime l'user et tous ses articles)
        if(($_SERVER["REQUEST_METHOD"] == "POST") && ($_SESSION["username"] =='test')){
            if(isset($_POST['delete_user'])){
                $choice = filter_input(INPUT_POST, "choice");
                $maRequete7 = $pdo->prepare("DELETE FROM user WHERE username=:choice ");
                $maRequete7->execute(['choice' => $choice]);
                $maRequete8 = $pdo->prepare("DELETE FROM article WHERE author=:choice ");
                $maRequete8->execute(['choice' => $choice]);
                echo "<script>location.href='../index.php'</script>";
            }
        }

    }
}
?>