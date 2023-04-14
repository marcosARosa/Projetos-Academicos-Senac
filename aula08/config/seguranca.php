<?php

session_start();

if($_SESSION["ID_USUARIO"]) {
    

} 
else if($_SESSION["ID_USUARIO"] == "id_adm"){
        
}
else {
    header("location: login.php");
}
?>