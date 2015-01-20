$(document).ready(function(){
    $('.well ul:first').addClass('nav nav-stacked menu').attr('id', 'sidebar');
    $('.well ul:not(:first)').hide();
    $('.link').click(function(){
        $(this).parent().find('ul:first').slideToggle();
    });
});