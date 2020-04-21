// include/botcpp.php
jQuery(document).ready(function(){
    
   jQuery('#comment_edit').click(function(){
        editAction(selectData(this));
   });
   
   jQuery('#comment_remove').click(function(){
        removeAction(this, selectData(this));
   });
   selectData = function (id) {
       return jQuery(id).attr('data');
   }
   
   removeAction = function(id, dataId) {
       if(dataId) // check // check nonce
       {
           jQuery(id).parent().remove();
       }
   }
   
   editAction = function(dataId) {
       alert(dataId);
   }
   
   _insertComment = function () {
       // html comment
   }
   
   // check nonce
   
});