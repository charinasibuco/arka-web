<?php session_start(); ?>
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
                <a href="<?php echo base_url();?>staff/view"><span class="fa fa-users"></span>&nbsp;&nbsp;staff</a>
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

        <div class="container-fluid">
            <div class="panel">
                <?php 
                    if(!isset($error))
                    {
                ?>
                        <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="title">
                                <?php echo strtoupper($class);?>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="item-count">
                                <?php echo $total_rows.' '.(($total_rows < 2)? 'item' : 'items')?> 

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                                    <?php 
                                    // $limit = $this->uri->segment(4, 0);

                                    echo $limit;?>&nbsp;
                                    <span class="caret"></span>
                                </button>
                                <label>records per page</label>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" href="<?php echo base_url().$class.'/'.$method.'/'.$search;?>/10">10</a>
                                    </li> 
                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" href="<?php echo base_url().$class.'/'.$method.'/'.$search;?>/20">20</a>
                                    </li>
                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" href="<?php echo base_url().$class.'/'.$method.'/'.$search;?>/30">30</a>
                                    </li>
                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" href="<?php echo base_url().$class.'/'.$method.'/'.$search;?>/40">40</a>
                                    </li>
                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" href="<?php echo base_url().$class.'/'.$method.'/'.$search;?>/50">50</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <form action="<?php echo base_url().$class.'/'.$method.'/'.(($search ==0)? '' : $search)?>" method="get"> 
                            <div class="item-search">
                                         <div class="input-group">
                                            <input type="text" name="search" class="form-control"  value="<?php if($search == '0') echo ''; else echo $search; ?>" placeholder="search" aria-describedby="basic-addon1">
                                            <span type="button" class="input-group-addon" id="basic-addon1">
                                                <span class="glyphicon glyphicon-search">
                                                </span>
                                             </span>
                                        </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                   <?php }?>
                
                
        
         