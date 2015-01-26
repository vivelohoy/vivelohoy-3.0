jQuery(function($){
    // This is the part where we move the panels box into a tab of the content editor

    $( '#wp-content-editor-tools' )
        .prepend(
        $( '<a id="content-panels" target="_blank" class="hide-if-no-js wp-switch-editor switch-panels"></a>' )
            .html(panelsLiteTeaser.tab)
            .attr('href', panelsLiteTeaser.installUrl)
            .css('text-decoration', 'none')
            .click( function () {
                if(!confirm(panelsLiteTeaser.confirm)) return false;

                $('form[name=post]').before('<div id="message" class="updated below-h2"><p>' + panelsLiteTeaser.message + '</p></div>');
            } )
    );
});