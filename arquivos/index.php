<?php
if(!isset($_SESSION['id'])){
  header("Location: sai.php");
}else{
    header("Location: ../index.php");
}