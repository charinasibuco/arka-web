
<div id="crud-panel">
<div class="container-fluid">
    <div class="panel panel-popup" id="validation">
        <form action="<?php echo base_url().'user/'.(($title=='add')? 'save#validation': 'update#validation');?>" method="POST">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="title"><?php echo $title; ?></div>
                    </div>
                    <div class="col-xs-6">
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <?php echo validation_errors("<div class='alert alert-danger alert-dismissible' role='alert'>
                        <button type='button' data-dismiss='alert' class='close' aria-label='Close'><span>&times;</span></button>","</div>");
                    ?>
                
                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="fname" value="<?php echo (isset($first_name)? $first_name : $view_data['U_FName']) ?>" class="<?php echo (form_error('fname') ? 'inputError' : 'form-control') ?>" placeholder="first name" required>
                            <span class="<?php echo (form_error('fname') ? 'input-group-addon error' : 'input-group-addon') ?>"></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="lname" value="<?php echo (isset($last_name)? $last_name : $view_data['U_LName']) ?>" class="<?php echo (form_error('lname') ? 'inputError' : 'form-control') ?>" placeholder="last name" required>
                            <span class="<?php echo (form_error('lname') ? 'input-group-addon error' : 'input-group-addon') ?>"  id="email-addon1">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <input type="email" name="email" value="<?php echo (isset($email)? $email : $view_data['U_Email']) ?>" class="<?php echo (form_error('email') ? 'inputError' : 'form-control') ?>" placeholder="email address" required>
                    <span class="<?php echo (form_error('email') ? 'input-group-addon error' : 'input-group-addon') ?>" id="basic-addon1">                                                                                         <span class=" glyphicon glyphicon-envelope"></span>
                    </span>
                </div>
				
				<div class="input-group">
                    <!-- <input type="text" name="password" class="form-control" placeholder="password" <?php echo (($view_data['U_ID'])?'':'required'); ?> <?php echo (($title=='add')? '': 'disabled'); ?>> -->
                    <input type="text" name="password" value="<?php echo (isset($password)? $password : '') ?>" class="<?php echo (form_error('password') ? 'inputError' : 'form-control') ?>" placeholder="password" <?php echo ($title == 'add') ? 'required': ''; ?>>
                    <span class="<?php echo (form_error('password') ? 'input-group-addon error' : 'input-group-addon') ?>" id="basic-addon1">                                                                                         <span class="glyphicon glyphicon-earphone"></span>
                    </span>
                </div>
                <div class="input-group">
                    <input type="text" name="phone" value="<?php echo (isset($phone)? $phone : $view_data['U_Phone']) ?>" class="<?php echo (form_error('phone') ? 'inputError' : 'form-control') ?>" placeholder="contact number" required>
                    <span class="<?php echo (form_error('phone') ? 'input-group-addon error' : 'input-group-addon') ?>" id="basic-addon1">                                                                                         <span class="glyphicon glyphicon-earphone"></span>
                    </span>
                </div>
                <div class="input-group">
					<select name="type" class="form-control block" >
					  <option value="<?php echo (isset($view_data['U_Type'])?$view_data['U_Type']:'Driver'); ?>">
					  <?php echo (isset($type) ? $type : (isset($view_data['U_Type'])? $view_data['U_Type']:'Driver')); ?>
					  </option>
					  <option value="Driver">Driver</option>
					  <option value="SecurityGuard">SecurityGuard</option>
					  <option value="Tenant">Tenant</option>
                      <option value="Staff">Staff</option>
					  <option value="Admin">Admin</option>
					</select>
                    <span class="input-group-addon" id="basic-addon1">                                                                                         <span class="glyphicon glyphicon-user"></span>
                    </span>
                </div>
                <div class="input-group">
        
					<select name="vehicle" class="<?php echo (form_error('vehicle') ? 'inputError' : 'form-control block') ?>">
					  <option value="<?php echo ($view_data['V_ID']?$view_data['V_ID']:''); ?>" >
					  <?php echo (isset($vehicle) ? $vehicle : ($view_data['V_ID']?$view_data['V_ID']:'Select Vehicle')); ?></option>
					  <option value=''>Clear Vehicle</option>
					  <?php
					  foreach ($view_vehicle as $key => $data):
							  echo "<option value='".$data['V_ID']."'>".$data['V_ID']." - ".$data['V_Type']." ,".$data['V_Plate']."</option>";
					  endforeach;
					  ?>
					</select>
                    <span class="<?php echo (form_error('vehicle') ? 'input-group-addon error' : 'input-group-addon') ?>" id="basic-addon1">                                                                                         <span class="fa fa-truck"></span>
                    </span>
				</div>
				<div class="input-group">
                    <textarea rows="4" cols="55" name="remarks" class="form-control" placeholder="Remarks"><?php echo (isset($remarks)? $remarks : $view_data['U_Remarks']) ?></textarea>
                </div>
				<div class="input-group">
					<select name="flag" class="form-control block" >
					  <option value="<?php echo ($view_data['U_Flag']?$view_data['U_Flag']:''); ?>">
					  <?php echo (isset($flag)? $flag : ($view_data['U_Flag']? $view_data['U_Flag']:'No Flag')); ?>
					  </option>
					  <?php
					  if($view_data['U_Flag']){
						  echo '<option value="">Clear Flag</option>';
					  }
					  ?>
					  <option value="Yellow">Yellow</option>
					  <option value="Red">Red</option>
					</select>
                    <span class="input-group-addon" id="basic-addon1">                                                                                         <span class="fa fa-flag"></span>
                    </span>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-xs-12">
						<input type="hidden" name="id" value="<?php echo $view_data['U_ID']; ?>">
						<input type="hidden" name="save" value="true">
                        <button type="submit" class="btn btn-primary btn-lg right" id="add-user-btn"><?php echo $title; ?></button>
                        <a href="<?php echo base_url('user/view') ?>"><button type="button" class="btn btn-default btn-lg right" id="cancel-add-user">cancel</button>  </a>
                    </div>
                </div>         
            </div>
        </form>
    </div>
</div>
</div>

