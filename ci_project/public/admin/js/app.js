$(document).ready(function(){

    window.alert = function(message){
        $(document.createElement('div'))
            .attr({'title' : 'Alert', 'class' : 'alert'})
            .html(message)
            .dialog({
                buttons: {OK: function(){$(this).dialog('close');}},
                close: function(){$(this).remove();},
                draggable: true,
                modal: true,
                resizable: false,
                width: 'auto'
             });
    };

    $('#add_categories').click(function(){
        $('#category').slideToggle();
    });

    $("#category #fsubmit").click(function(){
        parentid = $("#fparent").val();
        category = $("#fname").val();

        if (category === '') {
            $('.my_error').html('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><li>Please enter category name.</li>');
            $('.my_error').removeClass('hideinit');
        } else {
            $.ajax({
                "url" : baseUrl + "admin/categories/add",
                "type" : 'post',
                'data' : "fname="+category + '&fparent=' + parentid,
                'async' : true,
                'success' : function(html){
                    if (html === '1'){
                        $('.my_error').html('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><li>Please enter category name.</li>');
                        $('.my_error').removeClass('hideinit');
                    } else {
                        alert(html);
                        $('#category').fadeOut(500);
                        $(".my_error").html('').addClass('hideinit');
                        clear_form();
                        reload_data();
                    }
                }
            });
        }

        return false;
    });
});

function confirm_delete(err){
    if(!window.confirm(err)) {
        return false;
    }
}

function clear_form()
{
    $("form :input").not(":submit").val('');
}

function reload_data()
{
    $("#categorylist").load(baseUrl + "admin/categories/reload");
}