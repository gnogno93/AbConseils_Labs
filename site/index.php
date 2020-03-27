<!DOCTYPE html>

<html lang="fr">
<?php
    require_once('include/head.php'); 
?>
    <body>
<?php      
     require_once(dirname(__FILE__).'/class/database/management.model.class.php');
      
     Management::createDatabase();
     Management::createTable();
     
     require(dirname(__FILE__).'/class/flagsLoader.class.php');
     
     FlagsLoader::initInstance();
     
     require_once(dirname(__FILE__).'/include/header.php');
     require_once(dirname(__FILE__).'/include/footer.php'); 
?> 

    </body>
</html>