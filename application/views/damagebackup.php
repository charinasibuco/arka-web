<?php
$links = array("front", "right", "back", "left", "bottom", "top", "interior"); 
$menu = str_split($parts[0]); 
foreach($menu as $key=>$value) {
	if($value){
		$marks = str_split($parts[$key+1]); 
		$default = $key;
		break;
	}
}
?>

<div class="container-fluid">
    <div class="panel panel-popup panel-popup-large">
        <form>
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="title"><?php echo $title; ?></div>
                    </div>
                    <div class="col-xs-6">
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="scroll-panel">
                            <div class="list-group" id="damage-list">
								<?php 
								foreach($menu as $key=>$value) {
									if($value){
										echo '<a href="#" class="list-group-item" data-damage-badge-control="'.$parts[$key+1].'" data-damage-img="'.base_url().'includes/damages/'.$title.'/'.$links[$key].'/'.$id.'.jpg">'.$title.' - '.$links[$key].'</a>';
										
									}
								}
								?>
							
                    
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="row">
							<div class="col-xs-12">
                                <div class="legend" style="display:none;">
                                    <div style="float:left;">
                                            <span class="damage-badge c-badge" title="cut">C<span class="light-text"> cut</span></span>
                                            <span class="damage-badge h-badge" title="hole">H<span class="light-text"> hole</span></span>
                                            <span class="damage-badge d-badge" title="damage">D<span class="light-text"> damage</span></span>
                                            <span class="damage-badge br-badge" title="broken">BR<span class="light-text"> broken</span></span>
                                            <span class="damage-badge m-badge" title="missing">M<span class="light-text"> missing</span></span>
                                            <span class="damage-badge s-badge" title="scratch">S<span class="light-text"> scratch</span></span>
                                            <span class="damage-badge p-badge" title="patch">P<span class="light-text"> patch</span></span>
                                    </div>
                                </div>
                                <div class="damage-img-container">
									<img id="damage-img-container" src="<?php echo base_url().'includes/damages/'.$title.'/'.$links[$default].'/'.$id.'.jpg'; ?>" width="100%">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="damage-badge-container">
                                    <span class="damage-badge c-badge <?php echo ($marks[0]?'':'hidden'); ?>" title="cut">C</span>
                                    <span class="damage-badge h-badge <?php echo ($marks[1]?'':'hidden'); ?>" title="hole">H</span>
                                    <span class="damage-badge d-badge <?php echo ($marks[2]?'':'hidden'); ?>" title="damage">D</span>
                                    <span class="damage-badge br-badge <?php echo ($marks[3]?'':'hidden'); ?>" title="broken">BR</span>
                                    <span class="damage-badge m-badge <?php echo ($marks[4]?'':'hidden'); ?>" title="missing">M</span>
                                    <span class="damage-badge s-badge <?php echo ($marks[5]?'':'hidden'); ?>" title="scratch">S</span>
                                    <span class="damage-badge p-badge <?php echo ($marks[6]?'':'hidden'); ?>" title="patch">P</span>
                                    <span class="damage-badge damage-badge-help" title="hover to view legend" id="view-legend">?</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-xs-12">
                        <button type="button" class="btn btn-default btn-lg right" id="close-damage">close</button>  
                    </div>
                </div>         
            </div>
        </form>
    </div>
</div>
