<div class="panel login-panel">
<form name="form1" method="post" action="<?php echo base_url().'report/dashboard';?>" target="_blank">
<div class="input-group">
					<select name="driver" class="form-control block" >
					  <option value="" >Select Driver</option>
					  <?php
					  foreach ($view_user as $key => $data):
							  echo "<option value='".$data['U_ID']."'>".$data['U_ID']." - ".$data['U_LName'].",".$data['U_FName']."</option>";
								 
								
					  endforeach;
					  ?>
					  
					</select>
                    <span class="input-group-addon" id="basic-addon1">                                                                                         <span class="glyphicon glyphicon-user"></span>
                    </span>
</div>
<div class="input-group">
					<select name="vehicle" class="form-control block" >
					  <option value="" >Select Vehicle</option>
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
					<select name="trailer" class="form-control block" >
					  <option value="" >Select Trailer</option>
					  <?php
					  foreach ($view_trailer as $key => $data):
							  echo "<option value='".$data['T_ID']."'>Trailer Number - ".$data['T_ID']."</option>";
								 
								
					  endforeach;
					  ?>
					</select>
                    <span class="input-group-addon" id="basic-addon1">                                                                                         <span class="fa fa-dropbox"></span>
                    </span>
</div>
<div class="input-group">
                <input name="start" type="text" id="dt3"  class="form-control" placeholder="start date" aria-describedby="basic-addon1" >
                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
</div>
<div class="input-group">
                <input name="end" type="text" id="dt4" class="form-control" placeholder="end date" aria-describedby="basic-addon1" >
                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
</div>
<input type="submit" name="export" value="Download Gate Log" />
</form>
</div>
<div class="panel login-panel">
<form name="form1" method="post" action="<?php echo base_url().'report/visitor';?>" target="_blank">


<div class="input-group">
                <input name="search" type="text" class="form-control" placeholder="visitor name" aria-describedby="basic-addon1">
                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span> 
</div>
<div class="input-group">
                <input name="start" type="text" id="dt1"  class="form-control" placeholder="start date" aria-describedby="basic-addon1" >
                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
</div>
<div class="input-group">
                <input name="end" type="text" id="dt2" class="form-control" placeholder="end date" aria-describedby="basic-addon1" >
                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
</div>
<input type="submit" name="export" value="Download Visitor Log" />
</form>
</div>
<div class="input-group">
</div>
