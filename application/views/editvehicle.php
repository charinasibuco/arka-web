
<div class="container-fluid">
    <div class="panel panel-popup" id="validation">
        <form action="<?php echo base_url().'vehicle/'.(($title=='add')? 'save#validation': 'update#validation');?>" method="POST">
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
                <div class="input-group">
                    <input type="text" name="number" value="<?php echo (isset($number)? $number :$view_data['V_Number']); ?>" class="<?php echo (form_error('number') ? 'inputError' : 'form-control') ?>" placeholder="Vehicle Number" required>
                    <span class="<?php echo (form_error('number') ? 'input-group-addon error' : 'input-group-addon') ?>" id="basic-addon1">                                                                                         <span class="fa fa-truck"></span>
                    </span>
                </div>
                    <div class="input-group">
    					<select name="type" class="<?php echo (form_error('type') ? 'inputError' : 'form-control block') ?>" required>
    					  <option value="<?php echo ($view_data['V_Type']?$view_data['V_Type']:$type); ?>">
    					  <?php echo (isset($type)? $type:($view_data['V_Type']?$view_data['V_Type']:'Choose Type')); ?>
    					  </option>
    					  <option value="Truck">Truck</option>
    					  <option value="Private Vehicle">Private Vehicle</option>
    					</select>
                        <span class="<?php echo (form_error('type') ? 'input-group-addon error' : 'input-group-addon') ?>" id="basic-addon1">                                                                                         <span class="fa fa-truck"></span>
                        </span>
                    </div>
				
				<div class="input-group">
                    <input type="text" name="plate" value="<?php echo (isset($plate)? $plate : $view_data['V_Plate']); ?>" class="<?php echo (form_error('plate') ? 'inputError' : 'form-control') ?>" placeholder="Plate Number" required>
                    <span class="<?php echo (form_error('plate') ? 'input-group-addon error' : 'input-group-addon') ?>" id="basic-addon1">                                                                                         <span class="glyphicon glyphicon-earphone"></span>
                    </span>
                </div>
				
               
                <div class="input-group">
                    <textarea rows="4" cols="55" name="remarks" class="form-control" placeholder="Remarks"><?php echo (isset($remarks)? $remarks : $view_data['V_Remarks']); ?></textarea>
                </div>
				<div class="input-group">
					<select name="flag" class="form-control block" >
					  <option value="<?php echo ($view_data['V_Flag']?$view_data['V_Flag']:(isset($flag)? $flag : 'No Flag')); ?>">
					  <?php echo (isset($flag)? $flag:($view_data['V_Flag']? $view_data['V_Flag']:'No Flag')); ?>
					  </option>
					  <?php
					  if($view_data['V_Flag']){
						  echo '<option value="">Clear Flag</option>';
					  }
					  ?>
					  <option value="Yellow">Yellow</option>
					  <option value="Red">Red</option>
					</select>
                    <span class="input-group-addon" id="basic-addon1">                                                                                         <span class="fa fa-flag"></span>
                    </span>
                </div>
                <div class="input-group">
					<select name="condition" class="form-control block" >
					  <option value="<?php echo ($view_data['V_Status2']?$view_data['V_Status2']:(isset($condition) ? $condition : 'Empty')); ?>">
					  <?php echo (isset($condition)? $condition:($view_data['V_Status2']? $view_data['V_Status2']:'Condition')); ?>
					  </option>
					  
					  <option value="Loaded">Loaded</option>
					  <option value="Empty">Empty</option>
					  <option value="Out of Service">Out of Service</option>
					</select>
                    <span class="input-group-addon" id="basic-addon1">                                                                                         <span class="fa fa-flag"></span>
                    </span>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-xs-12">
						<input type="hidden" name="id" value="<?php echo $view_data['V_ID']; ?>">
						<input type="hidden" name="save" value="true">
                        <button type="submit" class="btn btn-primary btn-lg right" id="add-user-btn"><?php echo $title; ?></button>
                        <a href="<?php echo base_url('vehicle/view')?>">
                            <button type="button" class="btn btn-default btn-lg right" id="cancel-add-user">cancel</button>  
                        </a>
                    </div>
                </div>         
            </div>
        </form>
    </div>
</div>
