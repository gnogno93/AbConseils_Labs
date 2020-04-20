// include/botcpp.php
jQuery(document).ready(function(){
    
   jQuery('#comment_edit').click(function(){
        editAction(selectData(this));
   });
   
   jQuery('#comment_remove').click(function(){
        removeAction(selectData(this));
   });
   selectData = function (id) {
       return jQuery(id).attr('data');
   }
   
   removeAction = function(dataId) {
       alert(dataId);
   }
   
   editAction = function(dataId) {
       alert(dataId);
   }
   
   _insertComment = function () {
   }
   
   // check nonce
   
});