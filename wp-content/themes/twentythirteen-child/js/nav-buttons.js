(function($) {
    $('#hoy-menunav').click(function() {
        $('#hoy-menu').show(function() {
            document.body.addEventListener('click', boxCloser, false);
        });
    });

    $('#hoy-searchnav').click(function(event) {
        event.preventDefault();
        toggle_visibility('search');
    });

    $('#hoy-socialnav').click(function(event) {
        event.preventDefault();
        toggle_visibility('hoy-social');
    });


    function boxCloser(e) {
        if(e.target.id != 'hoy-menu') {
            document.body.removeEventListener('click', boxCloser, false);
            $('#hoy-menu').hide();
        }
    }

    function toggle_visibility(id) {
        var e = document.getElementById(id);
        if(e.style.display == 'block')
            e.style.display = 'none';
        else
            e.style.display = 'block';
    }    
})(jQuery);