<div id="wrapper">
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
            </li>
            <li>
                <a href="<?php echo base_url();?>dashboard/view"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;&nbsp;dashboard</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>user/view"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;users</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>vehicle/view"><span class="fa fa-truck"></span>&nbsp;&nbsp;vehicles</a>
            </li>
			<li>
                <a href="<?php echo base_url();?>trailer/view"><span class="fa fa-cube"></span>&nbsp;&nbsp;trailers</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>visitor/view"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp;visitors</a>
            </li>
			<li>
                <a href="<?php echo base_url();?>tenant/view"><span class="fa fa-users"></span>&nbsp;&nbsp;tenants</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>report/view"><span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;reports</a>
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
                    <a class="navbar-brand" href="<?php echo base_url();?>">
                        <img src="<?php echo base_url();?>includes/img/arka-mini.png" alt="arka logo">
                    </a>
                    <div class="dropdown right">
                        <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                            <?php echo $this->session->userdata('user_name');?>&nbsp;
                            <img src="<?php echo base_url();?>includes/img/user-icon-xs.png">
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="menu1">
                            
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="<?php echo base_url();?>user/logout">
                                    logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        
            