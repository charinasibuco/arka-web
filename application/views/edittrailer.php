
<div class="container-fluid">
    <div class="panel panel-popup" id="validation">
        
        <form action="<?php echo base_url().'trailer/'.(($title=='add')? 'save': 'update');?>" method="POST">
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
                    <input type="text" name="number" value="<?php echo (isset($number)? $number : $view_data['T_Number']); ?>" class="<?php echo (form_error('number') ? 'inputError' : 'form-control') ?>" placeholder="Trailer Number" required>
                    <span class="<?php echo (form_error('number') ? 'input-group-addon error' : 'input-group-addon') ?>" id="basic-addon1">                                                                                         <span class="fa fa-truck"></span>
                    </span>
                </div>
       
                <div class="input-group">
                    <textarea rows="4" cols="55" name="remarks" class="<?php echo (form_error('remarks') ? 'inputError' : 'form-control') ?>" placeholder="Remarks"><?php echo (isset($remarks) ? $remarks :$view_data['T_Remarks']); ?></textarea>
                </div>
				<div class="input-group">
					<select name="flag" class="form-control block" >
					  <option value="<?php echo ($view_data['T_Flag']?$view_data['T_Flag']:(isset($flag)? $flag : 'No Flag')); ?>">
					  <?php echo (isset($flag) ? $flag : ($view_data['T_Flag']? $view_data['T_Flag']:'No Flag')); ?>
					  </option>
					  <?php
					  if($view_data['T_Flag']){
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
						<input type="hidden" name="id" value="<?php echo $view_data['T_ID']; ?>">
						<input type="hidden" name="save" value="true">
                        <button type="submit" class="btn btn-primary btn-lg right" id="add-user-btn"><?php echo $title; ?></button>
                        <a href="<?php echo base_url('trailer/view') ?>">
                            <button type="button" class="btn btn-default btn-lg right" id="cancel-add-user">cancel</button>  
                        </a>
                    </div>
                </div>         
            </div>
        </form>
    </div>
</div>
