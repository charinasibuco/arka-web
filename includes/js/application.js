$(document).ready(function() {

    if($('li').hasClass('active'))
        {
            $('li.active a').removeAttr('href');
        }
    if($('li.active').hover(function(){
      
            $('li.active a').addClass('disable');
    }));
    
    $editUpdateUserBtn = $('#add-update-user-btn');
    
    $deleteUser = $('.delete-user-btn');
    $addUser = $('#add-user');
    $editUser = $('.edit-user-context');
    $editPassword = $('#edit-user-pass');
    
    $qrCodePanelCloseBtn = $('#close-qrcode-panel');
    $qrCodeContext = $('.qr-code-context');
    $qrImagePanel = $("#qr-code-panel img");
	$qrTitle = $("#qr-code-panel .title");
    
    $continueDelete = $('#continue-delete');
    $cancelConfirmation = $('#cancel-confirmation');
    $cancelAddUser = $('#cancel-add-user');    
    $cancelEditPass = $('#cancel-edit-user-pass');    

    $confirmationPanel = $('.confirmation-panel');
    $mask = $('.mask');
    $crudPanel = $('#crud-panel');
    $crudPanelTitle = $('#crud-panel .title');
    $qrCodePanel = $('#qr-code-panel'); 
    
    $damageLink = $('.damage-link');
    $visitorImageContext = $('.visitor-image-context');
    
    //datepicker
    $('#datepicker').datepicker({
            dateFormat: "yy-mm-dd",
            onSelect: function (date) {
                $dt2 = $('#dt2');
                var startDate = $(this).datepicker('getDate');
                var minDate = $(this).datepicker('getDate');
                $dt2.datepicker('setDate', minDate);
                $dt2.datepicker('option', 'minDate', minDate);
            }
        });    $('#menu-toggle').click(function(e) {
        e.preventDefault();
        $('#wrapper').toggleClass('toggled');
    });
    
    $('#dt2').datepicker({
        dateFormat: "yy-mm-dd"
    });
    //end datepicker
    
    function showConfirmation() {
        $confirmationPanel.addClass('toggled');
    }
    function hideConfirmation() {
        $confirmationPanel.removeClass('toggled');
    }
    function showForm() {
        $crudPanel.show();
        $(window).scrollTop(0);
    }
    function hideForm() {
        $crudPanel.hide();
    }
    function showUserQr() {
        $qrCodePanel.show();
        $(window).scrollTop(0);
    } 
    function hideFormQr() {
        $qrCodePanel.hide();
    }  
    
    var notifTimeout = setTimeout(function() {
            $(".notification").addClass('toggled');
    }, 5000);
    
    $mask.height($(document).height());
    $(window).resize(function() {
        $mask.height($(document).height());
    });
    
    //confirmation panel
    $cancelConfirmation.on('click', function() {
        hideConfirmation();
    });
    $continueDelete.on('click', function() {
        hideConfirmation();
    }); 
    //item details context
    $deleteUser.on('click', function() {
        showConfirmation();
        $continueDelete.attr("href", $(this).data("delete-user"));
    });
    $addUser.on('click', function() {
        $mask.show();
        $mask.height($(document).height());
        showForm();
        hideFormQr();
        $("#crud-panel").load($(this).data("edit-user"), function() {
            
            $('#cancel-add-user').on('click', function () {
                $mask.hide();
                hideForm();
                showUserQr();
            });
            
            $('#edit-user-btn').on('click', function () {
                $mask.hide();
                hideForm();
                showUserQr();
            });
        });
    });
    
    $editUser.on('click', function() {
        $mask.show();
        $mask.height($(document).height());
        showForm();
        hideFormQr();
        $("#crud-panel").load($(this).data("edit-user"), function() {
            
            $('#cancel-add-user').on('click', function () {
                $mask.hide();
                hideForm();
                showUserQr();
            });
            
            $('#edit-user-btn').on('click', function () {
                $mask.hide();
                hideForm();
                showUserQr();
            });
        });
    });
    
    $cancelAddUser.on('click', function () {
        $mask.hide();
        hideForm();
        showUserQr();
    });
    
    $cancelEditPass.on('click', function () {
        $mask.hide();
        hideForm();
        showUserQr();
    });
    
    //this is for the qr code option
    $qrCodeContext.on('click', function() {
        $mask.show();
        $mask.height($(document).height());
        hideForm();
        showUserQr();
        $qrImagePanel.attr("src", $(this).data("qr-url"));
		$qrTitle.text($(this).data("qr-title"));
    });
    
    $qrCodePanelCloseBtn.on('click', function() {
        $mask.hide();
        hideFormQr();
    });
    
    //changing password for the current user
    $editPassword.on('click', function() {
        $mask.show();
        $mask.height($(document).height());
        hideFormQr();
        showForm();
        
        $("#crud-panel").load($editPassword.data("edit-pass"), function() {
            $('#cancel-edit-pass').on('click', function () {
                $mask.hide();
                hideForm();
                showUserQr();
            });
            
            $('#edit-user-pass').on('click', function () {
               
                
            });
        });
    });
    
    $visitorImageContext.on('click', function() {
        $visitorImg = $(this).data("visitor-img");
        $mask.show();
        $mask.height($(document).height());
        showForm();
        hideFormQr();
        
        $("#crud-panel").load($(this).data("visitor-img-link"), function() {
            alert($(this).data("visitor-img") + "");
            $("#visitor-img-panel img").attr("src", $visitorImg);
            $('#close-vistor-img-panel').on('click', function () {
                $mask.hide();
                hideForm();
                showUserQr();
            });
        });
    });
    
    $visitorImageContext.on('click', function() {
        $mask.show();
        $mask.height($(document).height());
        hideForm();
        showUserQr();
        $qrImagePanel.attr("src", $(this).data("visitor-img"));
    });
    
    //once they click the option in the damage list
    $damageLink.on('click', function() {
        $mask.show();
        $mask.height($(document).height());
        showForm();
        hideFormQr();
        
        $("#crud-panel").load($(this).data("damage-truck"), function() {
            
            $damageListLink = $('#damage-list > a');
            $damageImgContainer = $('#damage-img-container');
            $damageBadgeContainer = $('.damage-badge-container');
            
            $('#close-damage').on('click', function () {
                $mask.hide();
                hideForm();
                showUserQr();
            });
            //display img and badge
            $damageListLink.on('click', function() {
                $damageImgContainer.attr("src", $(this).data("damage-img"));
                var damageControlText = $(this).data("damage-badge-control") + "";
                var x = 0;
                var dmgCtrl = damageControlText.length;
                
                while(x <= dmgCtrl) {
                    
                    if(damageControlText.charAt(x) == "0") {
                        $damageBadgeContainer.find('span').eq(x).addClass("hidden");
                    }
                    else {
                        $damageBadgeContainer.find('span').eq(x).removeClass("hidden");
                    }
                    x++;
                }
            });
            
            //display legend
            $viewLegend = $('#view-legend');
            $legend = $('.legend');
            
            $viewLegend.mouseenter( function() {
                $legend.show();
            });
            $viewLegend.mouseleave( function() {
                $legend.hide();
            });    
        });
    }); 
    
    //notification
    $(".notification").mouseleave( function() {
        console.log('start');
        notifTimeout = setTimeout(function() {
                $(".notification").addClass('toggled');
        }, 5000);
    });
    
    $(".notification").mouseenter(function() {
        console.log('stop');
        clearTimeout(notifTimeout);
    });
    //end notification
    
    //patches
    $('.panel-body').has($('.table')).addClass('with-table');
    $('.table > tbody > tr > td:first-child').css('padding-left', '40px');


   
});
