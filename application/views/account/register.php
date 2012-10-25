<script src=<?php echo base_url("/Scripts/jquery.validate.min.js")?>  type="text/javascript"></script>
<script src=<?php echo base_url("/Scripts/jquery.validate.unobtrusive.min.js")?>  type="text/javascript"></script>

<h2>Log On</h2>
<p>
    Use the form below to create a new account. 
</p>
<p>
    <!--Passwords are required to be a minimum of @Membership.MinRequiredPasswordLength characters in length.
	-->
	Passwords are required to be a minimum of 7 characters in length.
</p>




<!--
Form validation with jQuery and CodeIgniter | Gazpo.com 
<http://gazpo.com/2011/07/codeigniter-jquery-form-validation/>
--->

<!--
@Html.ValidationSummary(true, "Login was unsuccessful. Please correct the errors and try again.")
--->
<?php
	$this->load->helper('form');
	echo validation_errors();
	echo form_open("account_controller/create");	
 ?>
<div>
    <fieldset>
        <legend>Account Information</legend>

        <div class="editor-label">
            <label for="username"> User name</label>
        </div>
        <div class="editor-field">
			<?php 
				$username = array(
				  'name'    => 'username',				  
				  'id'      => 'username',
				  'type' 	=> 'text',
				  'type' 	=> 'text',
				  'data-val' => 'true',
				  'data-val-required' => 'User name 欄位是必要項。'
				);
				echo form_input($username);
			?>
			<span data-valmsg-for="username"></span>
            <!--@Html.TextBoxFor(m => m.UserName)
            @Html.ValidationMessageFor(m => m.UserName)-->
        </div>
		
		<div class="editor-label">
            <label for="username">Email address</label>
        </div>
        <div class="editor-field">
			<?php 
				$emailaddress = array(
				  'name'    => 'email',				  
				  'id'      => 'email',
				  'type' 	=> 'text',
				  'type' 	=> 'text',
				  'data-val' => 'true',
				  'data-val-required' => 'Email address 欄位是必要項。'
				);
				echo form_input($emailaddress);
			?>
			<span data-valmsg-for="email"></span>
            <!--@Html.TextBoxFor(m => m.UserName)
            @Html.ValidationMessageFor(m => m.UserName)-->
        </div>
		
        <div class="editor-label">
            <label for="password">Password</label>
        </div>
        <div class="editor-field">
			<?php 
				$password = array(
				  'name'    => 'password',				  
				  'id'      => 'password',
				  'type' 	=> 'text',
				  'type' 	=> 'text',
				  'data-val' => 'true',
				  'data-val-required' => 'Pass word 欄位是必要項。'
				);
				echo form_password($password) ;				
			?>
			<span data-valmsg-for="password"></span>
			<!--
            @Html.PasswordFor(m => m.Password)
            @Html.ValidationMessageFor(m => m.Password)
			-->
			
        </div>
		
		<div class="editor-label">
            <label for="password">Confirm password</label>
        </div>
        <div class="editor-field">
			<?php 
				$password = array(
				  'name'    => 'password',				  
				  'id'      => 'password',
				  'type' 	=> 'text',
				  'type' 	=> 'text',
				  'data-val' => 'true',
				  'data-val-required' => 'Pass word 欄位是必要項。'
				);
				echo form_password($password) ;				
			?>
			<span data-valmsg-for="password"></span>
			<!--
            @Html.PasswordFor(m => m.Password)
            @Html.ValidationMessageFor(m => m.Password)
			-->
			
        </div>

        <p>
            <?php echo form_submit('', 'Register'); ?>
        </p>
	    </fieldset>
</div>
<?php echo form_close();?>
    




