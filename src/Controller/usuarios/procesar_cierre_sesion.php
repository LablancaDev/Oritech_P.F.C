<?php
    session_start();
    
  
    if(isset($_SESSION['nombre_usuario'])){
        
        session_destroy();
    }

    header ('Location:  ../../../public/pagina_principal.php');
    
?>