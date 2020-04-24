<?php
    require_once('head.php'); 
?>
<?php      
     require_once('menu.php'); 
?> 

<div class="container">
	<div class="d-flex justify-content-center">
		<div class="card">
			<div class="card-header" style="text-align:center;">
              <a href="home">  
                <img src="rcs/icon/bot.png" width="64" height="64" class="d-inline-block align-top" alt="" ></img>      
              </a>
				<h3>Sign In</h3>

			</div>
			<div class="card-body">
				<form action="login-controler" method="POST">
					<div class="input-group form-group">
						<div class="input-group-prepend"  style="padding-right:10px;">
							<img src="rcs/icon/user.png" width="30" height="30" class="d-inline-block align-top" alt="user-icon" ></img>    
						</div>
						<input type="text" class="form-control" placeholder="username">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend" style="padding-right:10px;">
							<img src="rcs/icon/password.png" width="30" height="30" class="d-inline-block align-top" alt="" ></img>   
						</div>
						<input type="password" class="form-control" placeholder="password">
					</div>
					<div class="row align-items-center remember" style="padding-right: 25px; padding-left: 25px;">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group" style="text-align:center;">
						<input type="submit" value="Login" class="btn center-block login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="sign-up">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="forgot-password">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
.container {
    width: 100%;
    margin-top:100px;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
    height: 100%;
    align-content: center;
}
</style>
<?php   require_once('footer.php');  ?>

