<div class="container">
    <div class="panel login-panel">
        <div class="user-icon">
            <img src="<?php echo base_url();?>/includes/img/user-icon.png">
        </div>
        <h4>login into your account</h4>
        <form id="frm" method = "POST" action="<?php echo base_url();?>user/login">
            <div class='alert alert-danger hidden'  id="validation-error">
                
            </div>
            <div class="input-group">
                <input name="username" type="email" class="form-control" placeholder="email" aria-describedby="basic-addon1" required>
                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
            </div>
            <div class="input-group">
                <input name="password" type="password" class="form-control" placeholder="password" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-lock"></span></span>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">login</button>
        </form>
    </div>
</div>
