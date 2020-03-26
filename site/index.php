<!DOCTYPE html>

<html lang="fr">
<?php
    require_once('include/head.php'); 
?>
    <body>
<?php  
     require(dirname(__FILE__).'/class/flagGenerator.class.php');
     
     
     $singleton = FlagGenerator::initInstance();
     require(dirname(__FILE__).'/class/database/management.model.class.php');
      
     Management::createDatabase();
 
     require_once(dirname(__FILE__).'/include/header.php');
     require_once(dirname(__FILE__).'/include/footer.php'); 
?> 

    </body>
</html>