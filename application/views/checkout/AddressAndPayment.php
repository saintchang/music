<script src=<?php echo base_url("/Scripts/jquery.validate.min.js")?>  type="text/javascript"></script>
<script src=<?php echo base_url("/Scripts/jquery.validate.unobtrusive.min.js")?>  type="text/javascript"></script>
<?php
	$this->load->helper('form');
	echo form_open("checkout_controller/create_save");		
 ?>
        
    <!---
	<fieldset>
        <legend>Shipping Information</legend>
        @Html.EditorForModel() ← 一句打死
    </fieldset>
	--->
	<h2>Address And Payment</h2>
	<fieldset>
        <legend>Shipping Information</legend>
        <div class="editor-label">
			<label for="FirstName">First Name</label>	
		</div>
		<div class="editor-field">
			<?php 
				$FirstName = array(
				  'name'    => 'FirstName',				  
				  'id'      => 'FirstName',
				  'class'   => 'text-box single-line',
				  'data-val' => 'true',
				  'data-val-length-max' => "160",
				  'data-val-length' => "欄位 First Name 必須是最大長度為 160 的字串。",
				  'data-val-required' => 'First Name is required');
				echo form_input($FirstName);
			?>
			<span class="field-validation-error" data-valmsg-replace="true" data-valmsg-for="FirstName"></span>
		</div>
		
		<div class="editor-label">
			<label for="LastName">Last Name</label>	
		</div>
		<div class="editor-field">
			<?php 
				$LastName = array(
					"class" => "text-box single-line" ,
					"data-val" => "true" ,
					"data-val-length" => "欄位 Last Name 必須是最大長度為 160 的字串。" ,
					"data-val-length-max" => "160" ,
					"data-val-required" => "Last Name is required" ,
					"id" => "LastName" ,
					'type' 	=> 'text',
					"name" => "LastName" 
				);
				echo form_input($LastName);
			?>	
			<span class="field-validation-error" data-valmsg-replace="true" data-valmsg-for="LastName"></span>
		</div>
		
		<div class="editor-label">
			<label for="Address">Address</label>	
		</div>
		<div class="editor-field">
			<?php 
				$Address = array(
					"class" => "text-box single-line" ,
					"data-val" => "true" ,
					"data-val-length" => "欄位 Address 必須是最大長度為 70 的字串。" ,
					"data-val-length-max" => "70" ,
					"data-val-required" => "Address is required" ,
					"id" => "Address" ,
					"name" => "Address" 
					); 			
				echo form_input($Address);	
			?>
			<span class="field-validation-valid" data-valmsg-for="Address" data-valmsg-replace="true"></span>
		</div>
		
		<div class="editor-label">
			<label for="City">City</label>	
		</div>
		<div class="editor-field">
			<?php
				$City = array(
					"class" => "text-box single-line" ,
					"data-val" => "true" ,
					"data-val-length" => "欄位 City 必須是最大長度為 40 的字串。" ,
					"data-val-length-max" => "40" ,
					"data-val-required" => "City is required" ,
					"id" => "City" ,
					'type' 	=> 'text',
					"name" => "City"
					);		
				echo form_input($City);	
			?>
			<span class="field-validation-valid" data-valmsg-for="City" data-valmsg-replace="true"></span>
		</div>
		
		<div class="editor-label">
			<label for="State">State</label>	
		</div>
		<div class="editor-field">
			<?php
				$State = array(
					"class" => "text-box single-line" ,
					"data-val" => "true" ,
					"data-val-length" => "欄位 State 必須是最大長度為 40 的字串。" ,
					"data-val-length-max" => "40" ,
					"data-val-required" => "State is required" ,
					"id" => "State" ,
					"name" => "State" 
				);	
				echo form_input($State);
			?> 
			<span class="field-validation-valid" data-valmsg-for="State" data-valmsg-replace="true"></span>
		</div>
		
		<div class="editor-label">
			<label for="PostalCode">Postal Code</label>	
		</div>
		<div class="editor-field">
			<?php
				$PostalCode = array(
					"class" => "text-box single-line" ,
					"data-val" => "true" ,
					"data-val-length" => "欄位 Postal Code 必須是最大長度為 10 的字串。" ,
					"data-val-length-max" => "10" ,
					"data-val-required" => "Postal Code is required" ,
					"id" => "PostalCode" ,
					"name" => "PostalCode"
				);
				echo form_input($PostalCode);
			?>
			<span class="field-validation-valid" data-valmsg-for="PostalCode" data-valmsg-replace="true"></span>
		</div>
		
		<div class="editor-label">
			<label for="Country">Country</label>	
		</div>
		<div class="editor-field">
			<?php
				$Country = array(
					"class" => "text-box single-line" ,
					"data-val" => "true" ,
					"data-val-length" => "欄位 Country 必須是最大長度為 40 的字串。" ,
					"data-val-length-max" => "40" ,
					"data-val-required" => "Country is required" ,
					"id" => "Country", 
					"name" => "Country" 		
				);
				echo form_input($Country);
			?>
			<span class="field-validation-valid" data-valmsg-for="Country" data-valmsg-replace="true"></span>
		</div>
				
		<div class="editor-label">
			<label for="Phone">Phone</label>	
		</div>
		<div class="editor-field">
			<?php	
				$Phone = array(
					"class" => "text-box single-line" ,
					"data-val" => "true" ,
					"data-val-length" => "欄位 Phone 必須是最大長度為 24 的字串。" ,
					"data-val-length-max" =>"24" ,
					"data-val-required" => "Phone is required" ,
					"id" => "Phone" ,
					"name" => "Phone" 
				);
				echo form_input($Phone);
			?>	
			<span class="field-validation-valid" data-valmsg-for="Phone" data-valmsg-replace="true"></span>
		</div>		
		
		<div class="editor-label">
			<label for="EmailAddress">Email Address</label>	
		</div>
		<div class="editor-field">
			<?php
				$Email = array(
					"class" => "text-box single-line" ,
					"data-val" => "true" ,
					"data-val-regex" => "Email is is not valid." ,
					"data-val-regex-pattern" => "[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}" ,
					"data-val-required" => "Email Address is required" ,
					"id" => "Email" ,
					"name" => "Email" 
				);
				echo form_input($Email);				
			?>
			<span class="field-validation-valid" data-valmsg-for="Email" data-valmsg-replace="true"></span>
		</div>	
    </fieldset>
	<fieldset>
        <legend>Payment</legend>
        <p>We're running a promotion: all music is free with the promo code: "FREE"</p>

        <div class="editor-label">
            <label for="Promo_Code">Promo Code</label>
        </div>
        <div class="editor-field">
            <input id="PromoCode" name="PromoCode" type="text" value="" />
        </div>
    </fieldset>

	<?=form_submit('', 'Submit Order'); ?>