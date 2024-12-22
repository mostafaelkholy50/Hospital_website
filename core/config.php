<?php
try{
    $connect=mysqli_connect("localhost","root","","hospitalsystem");
}catch(Exception $e ){
   echo $e->getMessage();
}
?>