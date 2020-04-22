<!DOCTYPE html>

<html lang="fr">
<?php
    require_once(dirname(__FILE__).'/include/head.php'); 
?>
    <body>
    
<?php     
    require_once(dirname(__FILE__).'/include/menu.php');
    require_once(dirname(__FILE__).'/class/database/management.model.class.php');
      
    Management::createDatabase();
    Management::createBase();
     
    require_once(dirname(__FILE__).'/class/flagsLoader.class.php');
     
    FlagsLoader::initInstance();
    require_once(dirname(__FILE__).'/include/botcpp.php');
    //require_once(realpath('./').'/include/header.php');
    require_once(dirname(__FILE__).'/include/footer.php'); 
?> 

    </body>
</html>