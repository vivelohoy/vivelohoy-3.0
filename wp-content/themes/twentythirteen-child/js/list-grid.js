(function($) {
$(document).ready(function(){
        $('#toggle-grid').click(function(){
                $('#grid').show();
                $('#list').hide();
        });
        $('#toggle-list').click(function(){
                $('#list').show();
                $('#grid').hide();
        });
    });
})(jQuery);