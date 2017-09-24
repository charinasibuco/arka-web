              <?php 
                    if(!isset($error))
                    {
                ?> 
                <div class="panel-body">
                	<?php 
                	// echo validation_errors("<div class='alert alert-danger alert-dismissible' role='alert'>
                 //        <button type='button' data-dismiss='alert' class='close' aria-label='Close'><span>&times;</span></button>","</div>");
                           
                           if ($this->session->flashdata('success')){
                                echo "<div class='alert alert-success alert-dismissible' role='alert' >";
                                echo $this->session->flashdata('success');
                                echo "<button type='button' data-dismiss='alert' class='close' aria-label='Close'><span>&times;</span></button>";
                                echo "</div>";
                            }
                            if ($this->session->flashdata('deleted')){
                                echo "<div class='alert alert-success alert-dismissible' role='alert' >";
                                echo $this->session->flashdata('deleted');
                                echo "<button type='button' data-dismiss='alert' class='close' aria-label='Close'><span>&times;</span></button>";
                                echo "</div>";
                            }
                    ?>
               
                    <table class="table user-table table-striped">
                        <thead>
                            <tr>
                            	<?php foreach ($fields as $field_name => $field_display): ?>
									<th <?php if ($order_column == $field_name) echo "class=sort_$order_type " ?>>
										<?php echo anchor('user/view/'.$search.'/'.$limit.'/'.$field_name.'/'.
										(($order_type == 'asc' && $order_column == $field_name ) ? 'desc' : 'asc') ,
										$field_display);?>
									</th>
								<?php endforeach; ?>
                                <th>qr code</a></th>
                                <th>actions</th>
                            </tr>
                        </thead>
						
                        <tbody>
							<?php foreach ($view_data as $key =>$data): ?>
							  <tr>
								<?php foreach ($fields as $field_name => $field_display): ?>
									<td>
										<?php echo $data[$field_name] ; ?>
									</td>
								<?php endforeach; ?>
								
								<td>
                                    <button type="button" class="btn btn-primary btn-sm qr-code-context" title="view QR code" data-qr-title="<?php echo $data['U_ID'].' - '.$data['U_LName'].', '.$data['U_FName']; ?>" data-qr-url="http://api.qrserver.com/v1/create-qr-code/?data=<?php echo $data['U_Type'].'-'.$data['U_ID']; ?>&size=100x100">
                                        <span class="glyphicon glyphicon-qrcode"></span> 
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-link btn-sm edit-user-context" title="edit" data-edit-user="<?php echo base_url().$class.'/edit/'.$data['U_ID'];?>">
                                        <span class="glyphicon glyphicon-cog"></span>
                                    </button>
                                    <button type="submit" class="btn btn-link btn-sm delete-user-btn" title="delete" data-delete-user="<?php echo base_url().$class.'/delete/'.$data['U_ID'];?>">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
									
									
                                </td>
							  </tr>
							<?php endforeach; ?>
                            
                        </tbody>
                    </table>                        
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6">
                        	<?php if (strlen($pagination)): ?>
                            <nav>
                              <ul class="pagination pagination-lg">
							  <?php echo $pagination; ?>
                              </ul>
                            </nav>  
                            <?php endif; ?>       
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-default btn-lg right" id="add-user" data-edit-user="<?php echo base_url().$class.'/edit/';?>">
                                <span class="glyphicon glyphicon-plus"></span> add user
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php }?>
        <div class="confirmation-panel">
            <div class="row">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-xs-12">
                            <p>Do you want to delete this item?</p>
                        </div>
                        <div class="col-lg-12">
                            <a href="" class="btn btn-danger btn-lg right" id="continue-delete">continue</a>
                            <button class="btn btn-link btn-lg right" id="cancel-confirmation">cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
<div class="mask">
            <div id="crud-panel">
                <div class="container-fluid">
					<div class="panel panel-popup">
						<form id="frmuser" action="<?php echo base_url().'user/save';?>" method="POST">
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
								<div class='alert alert-danger hidden'  id="validation-erroru">
								
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="input-group">
											<input type="text" name="fname" value="<?php echo $view_data['U_FName']; ?>" class="form-control" placeholder="first name" required>
											<span class="input-group-addon"></span>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="input-group">
											<input type="text" name="lname" value="<?php echo $view_data['U_LName']; ?>" class="form-control" placeholder="last name" required>
											<span class="input-group-addon"  id="email-addon1">
											</span>
										</div>
									</div>
								</div>
								<div class="input-group">
									<input type="email" name="email" value="<?php echo $view_data['U_Email']; ?>" class="form-control" placeholder="email address" required>
									<span class="input-group-addon" id="basic-addon1">                                                                                         <span class=" glyphicon glyphicon-envelope"></span>
									</span>
								</div>
								
								<div class="input-group">
									<input type="text" name="password" class="form-control" placeholder="password" <?php echo (($view_data['U_ID'])?'':'required'); ?>>
									<span class="input-group-addon" id="basic-addon1">                                                                                         <span class="glyphicon glyphicon-earphone"></span>
									</span>
								</div>
								<div class="input-group">
									<input type="text" name="phone" value="<?php echo $view_data['U_Phone']; ?>" class="form-control" placeholder="contact number" required>
									<span class="input-group-addon" id="basic-addon1">                                                                                         <span class="glyphicon glyphicon-earphone"></span>
									</span>
								</div>
								<div class="input-group">
									<input type="text" name="pin" value="<?php echo $view_data['U_PIN']; ?>" class="form-control" placeholder="PIN" required>										
									<span class="input-group-addon" id="basic-addon1">              																			<span class="glyphicon glyphicon-lock"></span>                                                                           
									</span>
								</div>
								<div class="input-group">
									<select name="type" class="form-control block" >
									  <option value="<?php echo (isset($view_data['U_Type'])?$view_data['U_Type']:'Driver'); ?>">
									  <?php echo (isset($view_data['U_Type'])? $view_data['U_Type']:'Driver'); ?>
									  </option>
									  <option value="Driver">Driver1</option>
									  <option value="SecurityGuard">SecurityGuard</option>
									  <option value="Admin">Admin</option>
									</select>
									<span class="input-group-addon" id="basic-addon1">                                                                                         <span class="glyphicon glyphicon-user"></span>
									</span>
								</div>
								<div class="input-group">
									<select name="vehicle" class="form-control block" >
									  <option value="<?php echo ($view_data['V_ID']?$view_data['V_ID']:''); ?>" >
									  <?php echo ($view_data['V_ID']?$view_data['V_ID']:'Select Vehicle'); ?></option>
									  <option value="">Clear Vehicle</option>
									  <?php
									  foreach ($view_vehicle as $key => $data):
											  echo "<option value='".$data['V_ID']."'>".$data['V_ID']." - ".$data['V_Type']." ,".$data['V_Plate']."</option>";
									  endforeach;
									  ?>
									</select>
									<span class="input-group-addon" id="basic-addon1">                                                                                         <span class="fa fa-truck"></span>
									</span>
								</div>
								<div class="input-group">
									<textarea rows="4" cols="55" name="remarks" class="form-control" placeholder="Remarks"><?php echo $view_data['U_Remarks']; ?></textarea>
								</div>
								<div class="input-group">
									<select name="flag" class="form-control block" >
									  <option value="<?php echo ($view_data['U_Flag']?$view_data['U_Flag']:''); ?>">
									  <?php echo ($view_data['U_Flag']? $view_data['U_Flag']:'No Flag'); ?>
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
										<button type="button" class="btn btn-default btn-lg right" id="cancel-add-user">cancel</button>  
									</div>
								</div>         
							</div>
						</form>
					</div>
				</div>
            </div>
            <div id="qr-code-panel">
                <div class="container-fluid">
                    <div class="panel panel-popup">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="title">USER QR CODE</div>
                                </div>
                                <div class="col-xs-6">
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <img src="">
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="button" class="btn btn-default btn-lg right" id="close-qrcode-panel">close</button>  
                                </div>
                            </div>          
                        </div>
                    </div>
                </div>
            </div>
        </div>
