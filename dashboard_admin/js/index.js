
$(document).ready(function(){
    $('#entrar').click(function(){
        $('#modalLoginForm').modal('show');  // show modal
        var notification = alertify.notify('Olá', 'success', 5, function(){  console.log('dismissed'); });
    });
    $('#registro').click(function(){
        $('#modalRegisterForm').modal('show');  // show modal
        var notification = alertify.notify('Olá2', 'success', 5, function(){  console.log('dismissed'); });
    });
    jQuery(window).load(function () {
        setTimeout(function(){
            jQuery('#loading').hide();
        },1500);
    });
});





