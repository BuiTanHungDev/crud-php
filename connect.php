<?php
    $connect = mysqli_connect("localhost","root","","crud_php");

    if ($connect) {
       return true;
    }
    else{
        return false;
    }

?>