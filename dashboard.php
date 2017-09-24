<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ARKA - transportation tracking and management system</title>
        <link rel="shortcut icon" href="img/icon.ico">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/simple-sidebar.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/application.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;&nbsp;dashboard</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;users</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-plane"></span>&nbsp;&nbsp;vehicles</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp;visitors</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-alert"></span>&nbsp;&nbsp;damages</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;reports</a>
                    </li>
                </ul>
            </div>
            <div id="page-content-wrapper">
                <div id="navigation" class="navbar navbar-default navbar-top-fixed dash" role="navigation">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a href="#menu-toggle" class="navbar-toggle" id="menu-toggle">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </a>
                            <a class="navbar-brand" href="index.php">
                                <img src="img/arka-mini.png" alt="arka logo">
                            </a>
                            <div class="dropdown right">
                                <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                                    user&nbsp;
                                    <img src="img/user-icon-xs.png">
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="menu1">
                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" href="#">
                                            payment information
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" href="#">
                                            edit Account
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" href="#">
                                            logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="title">
                                        <span class="glyphicon glyphicon-user"></span>&nbsp;USERS
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="item-count">
                                        10 items
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                                            10&nbsp;
                                            <span class="caret"></span>
                                        </button>
                                        <label>records per page</label>
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                            <li role="presentation">
                                                <a role="menuitem" tabindex="-1" href="#">20</a>
                                            </li>
                                            <li role="presentation">
                                                <a role="menuitem" tabindex="-1" href="#">30</a>
                                            </li>
                                            <li role="presentation">
                                                <a role="menuitem" tabindex="-1" href="#">40</a>
                                            </li>
                                            <li role="presentation">
                                                <a role="menuitem" tabindex="-1" href="#">50</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="item-search">
                                         <div class="input-group">
                                            <input type="text" class="form-control" placeholder="search" aria-describedby="basic-addon1">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <span class="glyphicon glyphicon-search">
                                                </span>
                                             </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table user-table table-striped">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox"></th>
                                        <th>first name</th>
                                        <th>last name</th>
                                        <th>email</th>
                                        <th>address</th>
                                        <th>phone</th>
                                        <th>type</th>
                                        <th>qr code</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>john</td>
                                        <td>doe</td>
                                        <td>Lorem@exercitation.com</td>
                                        <td>street st. consequat, exercitation city</td>
                                        <td>09076324242</td>
                                        <td>security</td>
                                        <td>
                                            <button type="submit" class="btn btn-primary btn-sm qr-code-context" title="view QR code">
                                                <span class="glyphicon glyphicon-qrcode"></span> 
                                            </button>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-link btn-sm edit-user-context" title="edit">
                                                <span class="glyphicon glyphicon-cog"></span>
                                            </button>
                                            <button type="submit" class="btn btn-link btn-sm delete-user-btn" title="delete">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>exercitation</td>
                                        <td>doe</td>
                                        <td>reprehenderit @email.com</td>
                                        <td>street st. reprehenderit, cillum city</td>
                                        <td>09076387464</td>
                                        <td>dispatch</td>
                                        <td>
                                            <button type="submit" class="btn btn-primary btn-sm qr-code-context" title="view QR code">
                                                <span class="glyphicon glyphicon-qrcode"></span> 
                                            </button>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-link btn-sm edit-user-context" title="edit">
                                                <span class="glyphicon glyphicon-cog"></span>
                                            </button>
                                            <button type="submit" class="btn btn-link btn-sm delete-user-btn" title="delete">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>commodo</td>
                                        <td>cupidatatvelitnostrud</td>
                                        <td>voluptate@velit.com</td>
                                        <td>street st. address, bacolod city</td>
                                        <td>09076387464</td>
                                        <td>security</td>
                                        <td>
                                            <button type="submit" class="btn btn-primary btn-sm qr-code-context" title="view QR code">
                                                <span class="glyphicon glyphicon-qrcode"></span> 
                                            </button>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-link btn-sm edit-user-context" title="edit">
                                                <span class="glyphicon glyphicon-cog"></span>
                                            </button>
                                            <button type="submit" class="btn btn-link btn-sm delete-user-btn" title="delete">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>occaecat</td>
                                        <td>cupidatat</td>
                                        <td>commodo@email.com</td>
                                        <td>street st. reprehenderit, cillum city</td>
                                        <td>09076387464</td>
                                        <td>security</td>
                                        <td>
                                            <button type="submit" class="btn btn-primary btn-sm qr-code-context" title="view QR code">
                                                <span class="glyphicon glyphicon-qrcode"></span> 
                                            </button>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-link btn-sm edit-user-context" title="edit">
                                                <span class="glyphicon glyphicon-cog"></span>
                                            </button>
                                            <button type="submit" class="btn btn-link btn-sm delete-user-btn" title="delete">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>sed</td>
                                        <td>nostrud</td>
                                        <td>example@eiusmod.com</td>
                                        <td>street st. commodo, bacolod city</td>
                                        <td>09076387464</td>
                                        <td>dispatch</td>
                                        <td>
                                            <button type="submit" class="btn btn-primary btn-sm qr-code-context" title="view QR code">
                                                <span class="glyphicon glyphicon-qrcode"></span> 
                                            </button>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-link btn-sm edit-user-context" title="edit">
                                                <span class="glyphicon glyphicon-cog"></span>
                                            </button>
                                            <button type="submit" class="btn btn-link btn-sm delete-user-btn" title="delete">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>nostrud</td>
                                        <td>occaecat</td>
                                        <td>eiusmod@cupidatat.com</td>
                                        <td>street st. cupidatat, bacolod city</td>
                                        <td>09076387464</td>
                                        <td>dispatch</td>
                                        <td>
                                            <button type="submit" class="btn btn-primary btn-sm qr-code-context" title="view QR code">
                                                <span class="glyphicon glyphicon-qrcode"></span> 
                                            </button>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-link btn-sm edit-user-context" title="edit">
                                                <span class="glyphicon glyphicon-cog"></span>
                                            </button>
                                            <button type="submit" class="btn btn-link btn-sm delete-user-btn" title="delete">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>ting</td>
                                        <td>occaecat</td>
                                        <td>example@laborum.com</td>
                                        <td>laborum st. address, deserun city</td>
                                        <td>09076387464</td>
                                        <td>dispatch</td>
                                        <td>
                                            <button type="submit" class="btn btn-primary btn-sm qr-code-context" title="view QR code">
                                                <span class="glyphicon glyphicon-qrcode"></span> 
                                            </button>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-link btn-sm edit-user-context" title="edit">
                                                <span class="glyphicon glyphicon-cog"></span>
                                            </button>
                                            <button type="submit" class="btn btn-link btn-sm delete-user-btn" title="delete">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>charles</td>
                                        <td>Excepteur</td>
                                        <td>proident@email.com</td>
                                        <td>street st. address, proident city</td>
                                        <td>09076387464</td>
                                        <td>security</td>
                                        <td>
                                            <button type="submit" class="btn btn-primary btn-sm qr-code-context" title="view QR code">
                                                <span class="glyphicon glyphicon-qrcode"></span> 
                                            </button>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-link btn-sm edit-user-context" title="edit">
                                                <span class="glyphicon glyphicon-cog"></span>
                                            </button>
                                            <button type="submit" class="btn btn-link btn-sm delete-user-btn" title="delete">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>new</td>
                                        <td>occaecat</td>
                                        <td>labore@email.com</td>
                                        <td>street st. labore, bacolod city</td>
                                        <td>09076387464</td>
                                        <td>dispatch</td>
                                        <td>
                                            <button type="submit" class="btn btn-primary btn-sm qr-code-context" title="view QR code">
                                                <span class="glyphicon glyphicon-qrcode"></span> 
                                            </button>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-link btn-sm edit-user-context" title="edit">
                                                <span class="glyphicon glyphicon-cog"></span>
                                            </button>
                                            <button type="submit" class="btn btn-link btn-sm delete-user-btn" title="delete">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>po</td>
                                        <td>user</td>
                                        <td>example@labore.com</td>
                                        <td>street st. Excepteur, bacolod city</td>
                                        <td>09076387464</td>
                                        <td>security</td>
                                        <td>
                                            <button type="submit" class="btn btn-primary btn-sm qr-code-context" title="view QR code">
                                                <span class="glyphicon glyphicon-qrcode"></span> 
                                            </button>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-link btn-sm edit-user-context" title="edit">
                                                <span class="glyphicon glyphicon-cog"></span>
                                            </button>
                                            <button type="submit" class="btn btn-link btn-sm delete-user-btn" title="delete">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>                        
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-6">
                                    <nav>
                                      <ul class="pagination pagination-lg">
                                        <li>
                                          <a href="#">
                                            <span class="next-page"><span class="glyphicon glyphicon-backward"></span>
                                          </a>
                                        </li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li>
                                          <a href="#">
                                            <span class="next-page"><span class="glyphicon glyphicon-forward"></span>
                                          </a>
                                        </li>
                                        <li>
                                          <a href="#">
                                            <span class="next-page"><span class="glyphicon glyphicon-triangle-right"></span></span>
                                          </a>
                                        </li>
                                      </ul>
                                    </nav>          
                                </div>
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-default btn-lg right" id="add-user"><span class="glyphicon glyphicon-plus"></span> add user</button>
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
                                    <button class="btn btn-danger btn-lg right" id="continue-delete">continue</button>
                                    <button class="btn btn-link btn-lg right" id="cancel-confirmation">cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mask">
                    <div id="crud-panel">
                        <div class="container-fluid">
                            <div class="panel panel-popup">
                                <form>
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="title">ADD USER</div>
                                            </div>
                                            <div class="col-xs-6">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class='alert alert-danger' data-dismiss='alert'>
                                            some inputs are invalid. Fill the form corrently.
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="first name">
                                                    <span class="input-group-addon"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="last name">
                                                    <span class="input-group-addon"  id="email-addon1">
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="email address">
                                            <span class="input-group-addon" id="basic-addon1">                                                                                         <span class=" glyphicon glyphicon-envelope"></span>
                                            </span>
                                        </div>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="address">
                                            <span class="input-group-addon" id="basic-addon1">                                                                                         <span class=" glyphicon glyphicon-map-marker"></span>
                                            </span>
                                        </div>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="contact number">
                                            <span class="input-group-addon" id="basic-addon1">                                                                                         <span class="glyphicon glyphicon-earphone"></span>
                                            </span>
                                        </div>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="user type">
                                            <span class="input-group-addon" id="basic-addon1">                                                                                         <span class="glyphicon glyphicon-user"></span>
                                            </span>
                                        </div>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="qr code">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary" type="button">...</button>
                                                </span>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <button type="button" class="btn btn-primary btn-lg right" id="edit-user-btn">edit user</button>
                                                <button type="button" class="btn btn-primary btn-lg right" id="add-user-btn">add user</button>
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
                                    <img src="img/user/qr/qe-ex.png">
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
            </div>
        </div>
<?php include('includes/footer.php')?>