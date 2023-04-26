<div id="student" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header"><div class="alert alert-info">Please Enter Required Details Below.</div></div>
		<div class="modal-body">
			<form class="form-horizontal" method="post" action="login.php">
				<div class="control-group">
					<label class="control-label" for="inputEmail">ID Number</label>
					<div class="controls">
					<input type="text" id="inputEmail" name="user_id" placeholder="ID Number" required>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputPassword">Password</label>
					<div class="controls">
					<input type="password" id="inputPassword" name="password" placeholder="Password" required>
				</div>
				</div>
				<div class="control-group">
					<div class="controls">
					<p style="margin-left:-60px;"><a href="#students" data-toggle="modal">Forget Id or Password</a>
					<button type="submit" name="login" style="margin-left:30px;" class="btn btn-success"><i class="icon-signin icon-large"></i>&nbsp;Login</button></p>
				</div>
				</div>
			</form>
		</div>
		<div class="modal-footer" style=" margin-top:-20px;">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </div>
	
	
	<div id="students" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header"><div class="alert alert-info">Please Enter your recovery email.</div></div>
		<div class="modal-body" style="margin-left:-40px;">
			<form class="form-horizontal" method="post" action="forgetpassword.php">
				
				<div class="control-group">
				<div style="margin-left:40px;">
				</div>
					<label class="control-label" for="inputEmail">E-mail address</label>
					<div class="controls">
					<input type="email" style="height:20px; width:250px; margin-left:-10px;" id="inputEmail" name="email" placeholder="e-mail address" required>
					<button type="submit" name="submit" class="btn btn-success"><i class="icon-signin icon-large"></i>&nbsp;Submit</button>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </div>	
	
	
	

	