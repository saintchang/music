<script src=<?php echo base_url("/Scripts/jquery.validate.min.js")?>  type="text/javascript"></script>
<script src=<?php echo base_url("/Scripts/jquery.validate.unobtrusive.min.js")?>  type="text/javascript"></script>

<h2>Log On</h2>
<p>
    Please enter your user name and password. <?php echo anchor("account_controller/register","Register") ?> if you don't have an account.
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
	echo form_open("account_controller/logon");
	
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
            <label for="password">Password</label>
        </div>
        <div class="editor-field">
			<?php 
				$password = array(
				  'name'    => 'password',				  
				  'id'      => 'password',
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
			<?php 
				$data = array(
              'name'    => 'rememberme',
              'id'      => 'rememberme',
              'type' 	=> 'checkbox'
            );
			echo form_input($data);
			?>
			<label for="rememberme">Remember me?</label>
			<!--
            @Html.CheckBoxFor(m => m.RememberMe)
            @Html.LabelFor(m => m.RememberMe)
			-->
        </div>

        <p>
            <?php echo form_submit('', 'Log on'); ?>
        </p>
	    </fieldset>
</div>
<?php echo form_close();?>
    




