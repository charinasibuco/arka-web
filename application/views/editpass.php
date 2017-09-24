<div class="container-fluid">
    <div class="panel panel-popup">
        <form action="<?php echo base_url().'user/savepass';?>" method="POST">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="title">edit password</div>
                    </div>
                    <div class="col-xs-6">
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="input-group">
                    <input name = "pass" type="password" class="form-control" placeholder="new password">
                    <span class="input-group-addon" id="basic-addon1">                                                                                         <span class="glyphicon glyphicon-file"></span>
                    </span>
                </div>
                 <div class="input-group">
                    <input name = "repass" type="password" class="form-control" placeholder="retype new password">
                    <span class="input-group-addon" id="basic-addon1">                                                                                         <span class="glyphicon glyphicon-file"></span>
                    </span>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-lg right" id="edit-user-pass">edit</button>
                        <button type="button" class="btn btn-default btn-lg right" id="cancel-edit-pass">cancel</button>  
                    </div>
                </div>         
            </div>
        </form>
    </div>
</div>
