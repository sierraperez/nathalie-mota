
$( document ).ready(function() {
    $('.popup-overlay').hide(); 
    console.log('Test');
    $('.btn-contact').first().click(function(){
        $('.popup-overlay').show();
    });
    $('.popup-close').click(function(){
        $('.popup-overlay').hide();
    })

});