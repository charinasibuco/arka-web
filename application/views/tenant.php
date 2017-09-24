                <div class="panel-body">
                    <table class="table user-table table-striped">
                        <thead>
                            <tr>
                                <?php foreach ($fields as $field_name => $field_display): ?>
                                    <th <?php if ($order_column == $field_name) echo "class=sort_$order_type " ?>>
                                        <?php echo anchor('tenant/view/'.$search.'/'.$limit.'/'.$field_name.'/'.
                                        (($order_type == 'asc' && $order_column == $field_name ) ? 'desc' : 'asc') ,
                                        $field_display); ?>
                                    </th>
                                <?php endforeach; ?>
                                <th>qr code</a></th>
                            </tr>
                        </thead>
						
                        <tbody>
							<?php foreach ($view_data as $key => $data): ?>
							  <tr>
								<td><?php echo $data['U_ID'].' - '.$data['U_LName'].', '.$data['U_FName']; ?></td>
								<td><?php echo $data['TL_UID']; ?></td>
								<td><?php echo $data['TL_IN']; ?></td>
								<td><?php echo $data['TL_OUT']; ?></td>
                               <!--  <?php foreach ($fields as $field_name => $field_display): ?>
                                    <td>
                                        <?php echo $data[$field_name] ; ?>
                                    </td>
                                <?php endforeach; ?> -->

								<td>
                                    <button type="button" data-qr-title="<?php echo $data['U_ID'].' - '.$data['U_LName'].', '.$data['U_FName']; ?>" class="btn btn-primary btn-sm qr-code-context" title="view QR code" data-qr-url="http://api.qrserver.com/v1/create-qr-code/?data=<?php echo 'Tenant-'.$data['T_ID']; ?>&size=100x100">
                                        <span class="glyphicon glyphicon-qrcode"></span> 
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
                                    <div class="title">VISITOR QR CODE</div>
                                </div>
                                <div class="col-xs-6">
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <img src="" style="max-width:100%;">
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
