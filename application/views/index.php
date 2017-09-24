<?php include('includes/header.php')?>
<div class="container">
    <div class="panel login-panel">
        <div class="user-icon">
            <img src="img/user-icon.png">
        </div>
        <h4>login into your account</h4>
        <form action="dashboard.php">
            <div class='alert alert-danger hidden' data-dismiss='alert'>
                email or password is invalid. Try Again.
            </div>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="email or phone" aria-describedby="basic-addon1">
                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
            </div>
            <div class="input-group">
                <input type="password" class="form-control" placeholder="password or pin" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-lock"></span></span>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">login</button>
        </form>
    </div>
</div>
<?php include('includes/footer.php')?>