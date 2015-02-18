/**
 * Handles settings in the admin - (c) Greg Priday, freely distributable under the terms of the GPL 2.0 license.
 */

jQuery( function ( $ ) {
    
    if( typeof $.fn.wpColorPicker != 'undefined'){
        // Use the new color picker
        $('.color-field' ).wpColorPicker();
    }
    else{
        // Use the old
        $( '.colorpicker-wrapper' ).each( function () {
            var $$ = $( this );

            var picker = $.farbtastic( $$.find( '.farbtastic-container' ).hide() );

            picker.linkTo( function ( color ) {
                $$.find( 'input' ).val( color );
                $$.find( '.color-indicator' ).css( 'background', color );
            } );

            picker.setColor( $$.find( 'input' ).val() );

            $$.find( 'input' )
                .focus( function () {
                    $$.find( '.farbtastic-container' ).show()
                } )
                .blur( function () {
                    $$.find( '.farbtastic-container' ).hide()
                } );
        } );
    }

    // Handle the media uploader
    $('a.media-upload-button' ).click(function(event){
        var $$ = $(this);
        var $c = $(this ).closest('td');
        var frame = $(this ).data('frame');
        
        // If the media frame already exists, reopen it.
        if ( frame ) {
            frame.open();
            return false;
        }

        // Create the media frame.
        frame = wp.media({
            // Set the title of the modal.
            title: $$.data('choose'),

            // Tell the modal to show only images.
            library: {
                type: 'image'
            },

            // Customize the submit button.
            button: {
                // Set the text of the button.
                text: $$.data('update'),
                // Tell the button not to close the modal, since we're
                // going to refresh the page when the image is selected.
                close: false
            }
        });
        
        // Store the frame
        $$.data('frame', frame);

        // When an image is selected, run a callback.
        frame.on( 'select', function() {
            // Grab the selected attachment.
            var attachment = frame.state().get('selection').first().attributes;

            $c.find('.current .title' ).html(attachment.title);
            $c.find('input[type=hidden]' ).val(attachment.id).change();

            if(typeof attachment.sizes != 'undefined'){
                if(typeof attachment.sizes.thumbnail != 'undefined')
                    $c.find('.current .thumbnail' ).attr('src', attachment.sizes.thumbnail.url).fadeIn();
                else
                    $c.find('.current .thumbnail' ).attr('src', attachment.sizes.full.url).fadeIn();
            }
            else{
                $c.find('.current .thumbnail' ).attr('src', attachment.icon).fadeIn();
            }

            frame.close();
        });

        // Finally, open the modal.
        frame.open();
        
        return false;
    });
    
    $('.media-field-wrapper' )
        .mouseenter(function(){
            if($(this ).closest('td').find('input[type=hidden]' ).val() != '') $(this ).find('.media-remove-button').fadeIn('fast');
        })
        .mouseleave(function(){
            $(this ).find('.media-remove-button').fadeOut('fast');
        })
    
    $('.media-field-wrapper .current' )
        .mouseenter(function(){
            var t = $(this ).find('.title' );
            if( t.html() != ''){
                t.fadeIn('fast');
            }
        })
        .mouseleave(function(){
            $(this ).find('.title' ).clearQueue().fadeOut('fast');
        })
    
    $('a.media-remove-button' )
        .click(function(){
            var $$ = $(this ).closest('td');
            
            $$.find('.current .title' ).html('');
            $$.find('input[type=hidden]' ).val('').change();
            $$.find('.current .thumbnail' ).fadeOut('fast');
            $(this ).fadeOut('fast');
        });
    
    // We're going to use jQuery to transform the settings page into a tabbed interface
    var $optionsForm = $( 'form[action="options.php"]' );
    var tabs = $( '<h2></h2>' ).attr('id', 'siteorigin-settings-tab-wrapper').addClass( 'nav-tab-wrapper' ).prependTo( $optionsForm );

    $optionsForm.find( 'h3' ).each( function ( i, el ) {
        var h = $( el ).hide();
        var a = $( '<a href="#"></a>' ).addClass( 'nav-tab' ).html( h.html() ).appendTo( tabs );
        if ( i == 0 ) a.addClass( 'nav-tab-active' );

        var table = h.next().hide();
        a.click( function () {
            a.addClass( 'nav-tab-active' );
            setTimeout(function(){
                // We'll remove the active tab with a slight delay to prevent the pixel jump
                tabs.find( 'a').not(a).removeClass( 'nav-tab-active' );
            }, 50);

            // Change the tab we're displaying
            $optionsForm.find( '> table').hide();
            table.show();

            $( '#current-tab-field' ).val( i );
            
            // Set the tab for this user
            setUserSetting('siteorigin_settings_tab', i);
            
            return false;
        } );

        if ( i == getUserSetting('siteorigin_settings_tab', 0) || (i == 0 && getUserSetting('siteorigin_settings_tab', 0) > $optionsForm.find( 'h3' ).length) ) a.click();
    } );
    
    // Autofill
    $('.input-field-select')
        .change(function(){
            var c = $(this ).closest('td').find('input');
            c.val( $(this ).val() );
        });

    $('input.siteorigin-settings-has-options').keyup(function(){
        $(this ).closest('td').find('.input-field-select').val( $(this).val() );
    }).keyup();

    // Highlight the correct setting
    if(window.location.hash != ''){
        // Through a simple twist of fate, has is hash == the ID
        $(window.location.hash).each(function(){
            var $$ = $(this);

            var tr = $$.closest('tr');
            var table = $$.closest('table');
            if(!table.hasClass('form-table')) return;

            $('#siteorigin-settings-tab-wrapper > a').eq($('table.form-table').index(table)).click();
            tr.addClass('highlight');
            setTimeout(function(){
                tr.find('input,select').focus();
            }, 250);
        })

    }

    // When the user clicks on the select button, we need to display the gallery editing
    $('.so-settings-gallery-edit').on({
        click: function(e){
            e.preventDefault();

            // Make sure the media gallery API exists
            if ( typeof wp === 'undefined' || ! wp.media || ! wp.media.gallery ) return false;
            event.preventDefault();

            var $$ = $(this);

            var val = $$.siblings('input[type="text"]').val();
            if(val.indexOf('{demo') === 0 || val.indexOf('{default') === 0) val = '-'; // This removes the demo or default content
            if(val == '' && $('#post_ID' ).val() == null) val = '-';

            var frame = wp.media.gallery.edit('[gallery ids="' + val + '"]');

            // When the gallery-edit state is updated, copy the attachment ids across
            frame.state('gallery-edit').on( 'update', function( selection ) {
                var ids = selection.models.map(function(e){ return e.id });
                var val = $$.siblings('input[type="text"]').val(ids.join(','));
            });

            return false;
        }
    });

    // Handle the widget edit button
    $('.so-settings-widget-edit').on('click', function(e){
        e.preventDefault();

        var $$ = $(this);
        var widget_form = $$.closest('td').find('.so-settings-widget-form');
        widget_form.html( $$.data('form') );

        return false;
    }).click();

    // Hide the updated message
    setTimeout( function () {
        $( '#setting-updated' ).slideUp();
    }, 5000 );

    // Add a Go Premium button
    if( !siteoriginSettings.premium.isPremium && siteoriginSettings.premium.hasPremium ) {
        var upgradeLink = $('<div id="upgrade-to-premium" class="screen-meta-toggle"><a href="' + siteoriginSettings.premium.premiumUrl + '" target="_blank">' + siteoriginSettings.premium.name + '</a></div>');
        $('#screen-meta-links').append(upgradeLink);
    }

    // Now, lets handle the preview
    var previewModal;
    $('#siteorigin-settings-form .siteorigin-settings-preview-button').click( function(e){
        e.preventDefault();

        // Lets create the modal
        if( previewModal == null ) {
            previewModal = $( $('#settings-preview-modal-template').html()).appendTo('body');
        }
        else{
            previewModal.show();
        }


        // Submit the preview to the iframe
        var submitToIframe = function(){
            // And now submit the form to this iframe
            var $f = $('#siteorigin-settings-form');
            $f
                .attr({
                    'target': 'siteorigin-settings-preview-iframe',
                    'action' : previewModal.find('iframe').attr('src')
                });
            var $hidden = $('<input type="hidden" name="siteorigin_settings_is_preview" value="true" />').appendTo($f);
            $f.submit();
            $hidden.remove();
            $f
                .attr({
                    'target': '_self',
                    'action' : 'options.php'
                });
        }
        submitToIframe();

        // After the iframe has loaded, intercept all link clicks so we can continue the preview.
        previewModal.find('iframe').load(function(){
            var iframe = $(this);
            $(this).contents().find('a').click(function(e){
                e.preventDefault();

                // Ignore this click if it's going outside the current site.
                if( $(this).prop('href').indexOf( iframe.data('home') ) != 0) {
                    return false;
                }

                iframe.attr( 'src', $(this).prop('href') );
                submitToIframe();
            })
        });

        // Handle closing the modal
        previewModal.find('.siteorigin-settings-close').click(function(){
            previewModal.hide();
        });
    } );


} );