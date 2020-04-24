<?php 
    require_once(dirname(__FILE__).'/head.php'); 
    require_once(dirname(__FILE__).'/menu.php');
    
?>

<div class="container">
	<div class="d-flex justify-content-center">
		<div class="card">
			<div class="card-header" style="text-align:center;">
              <a href="home">  
                <img src="rcs/icon/bot.png" width="64" height="64" class="d-inline-block align-top" alt="" ></img>      
              </a>
				<h3>Sign Up</h3>

			</div>
			<div class="card-body">
				<form action="register" method="POST">
                
					<div class="input-group form-group">
						<div class="input-group-prepend"  style="padding-right:10px;">
							<img src="rcs/icon/user.png" width="30" height="30" class="d-inline-block align-top" alt="user_icon" ></img>    
						</div>
						<input type="text" name="user_name" class="form-control" placeholder="Username" required>
						
					</div>
                    
					<div class="input-group form-group">
						<div class="input-group-prepend" style="padding-right:10px;">
							<img src="rcs/icon/password.png" width="30" height="30" class="d-inline-block align-top" alt="user_password" ></img>   
						</div>
						<input type="password" name="user_password" class="form-control" placeholder="Password" required>
					</div>
                    
                    <div class="input-group form-group">
						<div class="input-group-prepend" style="padding-right:10px;">
							<img src="rcs/icon/mail.png" width="30" height="30" class="d-inline-block align-top" alt="user_email" ></img>   
						</div>
						<input type="text" name="user_email" class="form-control" placeholder="Email" required>
					</div>
                    
                    <div class="input-group form-group">
						<div class="input-group-prepend" style="padding-right:10px;">
							<img src="rcs/icon/right-arrow.png" width="30" height="30" class="d-inline-block align-top" alt="user_first_name" ></img>   
						</div>
						<input type="text" name="user_first_name" class="form-control" placeholder="First name" required>
					</div>
                    
                   <div class="input-group form-group">
						<div class="input-group-prepend" style="padding-right:10px;">
							<img src="rcs/icon/right-arrow.png" width="30" height="30" class="d-inline-block align-top" alt="user_last_name" ></img>   
						</div>
						<input type="text" name="user_last_name" class="form-control" placeholder="Last name" required>
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
    margin-top:10px;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
    height: 100%;
    align-content: center;
}
</style>


<?php 
    require_once(dirname(__FILE__).'/footer.php'); 
?>