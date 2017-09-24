                <div class="panel-body">
                    <table class="table user-table table-striped">
                        <thead>
                            <tr>
                                <?php foreach ($fields as $field_name => $field_display): ?>
                                    <th <?php if ($order_column == $field_name) echo "class=sort_$order_type " ?>>
                                        <?php echo anchor('dashboard/view/'.$search.'/'.$limit.'/'.$field_name.'/'.
                                        (($order_type == 'asc' && $order_column == $field_name ) ? 'desc' : 'asc') ,
                                        $field_display); ?>
                                    </th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
						<?php //print_r(array_values($view_data));?>
                        <tbody>
							<?php foreach ($view_data as $key => $data): ?>
							  <tr>
								<td><?php echo $data['U_ID'].' - '.$data['U_LName'].', '.$data['U_FName']; ?></td>
								<?php 
								$damageTruck = 0;
								$damageTrailer = 0;
								$damageContainer = 0;
								if (isset($data['GL_TruckDamage']) && $data['GL_TruckDamage'])
								{
									$damageTruck = explode("-", $data['GL_TruckDamage']);
								}
								if (isset($data['GL_TrailerDamage']) && $data['GL_TrailerDamage'])
								{
									$damageTrailer = explode("-", $data['GL_TrailerDamage']);
								}
								if (isset($data['GL_ContainerDamage']) && $data['GL_ContainerDamage'])
								{
									$damageContainer = explode("-", $data['GL_ContainerDamage']);
								}
																				
								if (isset($damageTruck[0]) && (int)$damageTruck[0] > 0){ 
								
								?>
								<td><a href="#" data-damage-truck="<?php echo base_url().$class.'/damage/trucks/'.$data['GL_ID'].'/'.$data['GL_TruckDamage'];?>" class="damage-link"><?php echo $data['V_Number']; ?></a></td>
								<?php  
								} 
								else 
									echo "<td>".$data['V_Number']."</td>";
								
       							?>
								
								<?php if (isset($damageTrailer[0]) && (int)$damageTrailer[0] > 0){ ?>
								<td><a href="#" data-damage-truck="<?php echo base_url().$class.'/damage/trailers/'.$data['GL_ID'].'/'.$data['GL_TrailerDamage'];?>" class="damage-link"><?php echo $data['T_Number']; ?></a></td>
								<?php  
								} 
								else 
									echo "<td>".$data['T_Number']."</td>";
       							?>

								<td><?php echo $data['GL_UID']; ?></td>
								<td><?php echo ($data['T_Number']) ? $data['GL_Serial'] : ''; ?></td>
								<td><?php echo ($data['GL_Serial'] && $data['T_Number'] != 0 ?'Yes':($data['T_Number']) ? 'Empty' : ' '); ?></td>
								<td><?php echo $data['GL_Date']; ?></td>
								<td><?php echo $data['GL_Status']; ?></td>
								<td><?php echo $data['GL_Remarks']; ?></td>
			
							  </tr>
							<?php endforeach; ?>  
                        </tbody>
                    </table>                        
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6">

                            <nav>
                              <ul class="pagination pagination-lg">
							  <?php echo $pagination; ?>
                              </ul>
                            </nav>          
                        </div>
                        <div class="col-sm-6">  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="confirmation-panel">
            <div class="row">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-xs-12">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
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
