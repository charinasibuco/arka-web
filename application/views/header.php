<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo (isset($title)) ? $title : "My CI Site" ?> </title>
        <link rel="shortcut icon" href="<?php echo base_url();?>includes/img/icon.ico">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>includes/css/normalize.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>includes/css/bootstrap.css">
		<link rel="stylesheet" href="<?php echo base_url();?>includes/css/simple-sidebar.css">
        <link rel="stylesheet" href="<?php echo base_url();?>includes/css/style.css">
        <script src="<?php echo base_url();?>includes/js/jquery-2.1.4.min.js"></script>
        <script src="<?php echo base_url();?>includes/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="<?php echo base_url();?>includes/js/application.js"></script>
		
		<script>
		$(document).ready(function () {
		
		$('#frm').submit(function(){
	
		$.post($('#frm').attr('action'), $('#frm').serialize(), function( data ) {
		if(data.st == 0)
			{
			 $('#validation-error').html(data.msg);
			 $( "#validation-error" ).removeClass( "hidden" );
			}
					
			else
			{
				window.location.reload(true);
			}
					
		}, 'json');
		return false;			
	   });
		
		$('#frmuser').submit(function(){
	
		$.post($('#frmuser').attr('action'), $('#frm').serialize(), function( data ) {
		if(data.st == 0)
			{
			 $('#validation-erroru').html(data.msg);
			 $( "#validation-erroru" ).removeClass( "hidden" );
			}
					
			else
			{
				window.location.reload(true);
			}
					
		}, 'json');
		return false;			
	   });
		
		
        $("#dt1").datepicker({
            dateFormat: "yy-mm-dd",
            //minDate: 0,
            onSelect: function (date) {
                var dt2 = $('#dt2');
                var startDate = $(this).datepicker('getDate');
                var minDate = $(this).datepicker('getDate');
                dt2.datepicker('setDate', minDate);
                //startDate.setDate(startDate.getDate() + 30);
                //sets dt2 maxDate to the last day of 30 days window
                //dt2.datepicker('option', 'maxDate', startDate);
                dt2.datepicker('option', 'minDate', minDate);
                //$(this).datepicker('option', 'minDate', minDate);
            }
        });
        $('#dt2').datepicker({
            dateFormat: "yy-mm-dd"
        });
		$("#dt3").datepicker({
            dateFormat: "yy-mm-dd",
            //minDate: 0,
            onSelect: function (date) {
                var dt4 = $('#dt4');
                var startDate = $(this).datepicker('getDate');
                var minDate = $(this).datepicker('getDate');
                dt4.datepicker('setDate', minDate);
                startDate.setDate(startDate.getDate() + 30);
                //sets dt2 maxDate to the last day of 30 days window
                dt4.datepicker('option', 'maxDate', startDate);
                dt4.datepicker('option', 'minDate', minDate);
                //$(this).datepicker('option', 'minDate', minDate);
            }
        });
        $('#dt4').datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
	</script>
    </head>
    <body>
        