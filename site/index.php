<!DOCTYPE html>

<html lang="fr">
<?php
    require_once(realpath('./').'/include/head.php'); 
?>
    <body>
    
<?php     
    require_once(realpath('./').'/include/menu.php');
    require_once(realpath('./').'/class/database/management.model.class.php');
      
    Management::createDatabase();
    Management::createTable();
     
    require_once(realpath('./').'/class/flagsLoader.class.php');
     
    FlagsLoader::initInstance();
    require_once(realpath('./').'/include/botcpp.php');
    //require_once(realpath('./').'/include/header.php');
    require_once(realpath('./').'/include/footer.php'); 
?> 

    </body>
</html>