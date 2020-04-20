<footer id="footer">
   <div class="container_footer">
        <div class="row">
            <div class="col-md-6">
                <a href="https://github.com/auzou/botcpp" target="blank"> 
                    <img src="rcs/icon/github_32.png" alt="github" style="height:32px; width:32px;">
                </a>
             </div>
             <div class="col-md-6" style="margin-top:5px;">
                &copy; No copyright &hearts; 
             </div>
       </div>
   </div>
</footer>


<style>
footer {
    color: white;
    width: 100%;
    height: auto;
    position: fixed;
    bottom: 0;
    text-align:center;
}
footer .container_footer { 
    background-color: #34475E;
}

</style>

<script>
jQuery(document).ready(function(){
    jQuery('#footer').fadeOut(0);
    jQuery('#footer').fadeIn(1500);
});
</script>