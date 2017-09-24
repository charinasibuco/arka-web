                <?php 
                    if(!isset($error))
                    {
                ?>
                <div class="panel-body">
                    <?php
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
                                    <th <?php if ($order_column == $field_name) echo "class=sort_$order_type" ?>>
                                        <?php echo anchor('vehicle/view/'.$search.'/'.$limit.'/'.$field_name.'/'.
                                        (($order_type == 'asc' && $order_column == $field_name ) ? 'desc' : 'asc') ,
                                        $field_display); ?>
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
                                        <?php echo $data[$field_name];?>
                                    </td>
                                <?php endforeach; ?>
								<td>
                                    <button type="button" data-qr-title="<?php echo $data['V_Type'].' Number - '.$data['V_Number']; ?>" class="btn btn-primary btn-sm qr-code-context" title="view QR code" data-qr-url="http://api.qrserver.com/v1/create-qr-code/?data=<?php echo $data['V_Type'].'-'.$data['V_ID']; ?>&size=100x100">
                                        <span class="glyphicon glyphicon-qrcode"></span> 
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-link btn-sm edit-user-context" title="edit" data-edit-user="<?php echo base_url().$class.'/edit/'.$data['V_ID'];?>">
                                        <span class="glyphicon glyphicon-cog"></span>
                                    </button>
                                    <button type="submit" class="btn btn-link btn-sm delete-user-btn" title="delete" data-delete-user="<?php echo base_url().$class.'/delete/'.$data['V_ID'];?>">
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

                            <nav>
                              <ul class="pagination pagination-lg">
							  <?php echo $pagination; ?>
                              </ul>
                            </nav>          
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-default btn-lg right" id="add-user" data-edit-user="<?php echo base_url().$class.'/edit/';?>">
                                <span class="glyphicon glyphicon-plus"></span> add vehicle
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
                
            </div>
            <div id="qr-code-panel">
                <div class="container-fluid">
                    <div class="panel panel-popup">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="title">VEHICLE QR CODE</div>
                                </div>
                                <div class="col-xs-6">
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <img src="<?php echo base_url();?>includes/img/user/qr/qe-ex.png">
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
