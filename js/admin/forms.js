jQuery(document).ready(function ($)
{

    let apiUrl = 'http://api.centralhubb.com/';

    resetMailListForm();

    $( "#mailing_list_form" ).submit(function(e) {
        e.preventDefault();

        let data = {
            'first_name' : $('input[name^=\"central_hubb_facebook_plugin_mailing_list[first_name]\"]').val(),
            'last_name' : $('input[name^="central_hubb_facebook_plugin_mailing_list[last_name]"]').val(),
            'email' : $('input[name^="central_hubb_facebook_plugin_mailing_list[email]"]').val(),
            'country_code' : $('select[name^="central_hubb_facebook_plugin_mailing_list[country_code]"]').val(),
            'city' : $('input[name^="central_hubb_facebook_plugin_mailing_list[city]"]').val(),
            'timezone' : $('select[name^="central_hubb_facebook_plugin_mailing_list[timezone]"]').val(),
            'web_development_skill_level' : $('select[name^="central_hubb_facebook_plugin_mailing_list[web_development_skill_level]"]').val(),
            'graphic_design_skill_level' : $('select[name^="central_hubb_facebook_plugin_mailing_list[graphic_design_skill_level]"]').val(),
            'user_source' : $('select[name^="central_hubb_facebook_plugin_mailing_list[user_source]"]').val(),
        };

        $.ajax({
            method: 'POST',
            url: apiUrl + 'api/facebook-plugin/mailing-list',
            data: data
        }).done(function( response ) {

            $('#form-message-placeholder').html('');

            if(response.status && response.status === true) {
                $('#form-message-placeholder').append('<div class="notice notice-success is-dismissible" style="margin-top:10px;margin-bottom:0;font-weight:normal;">\n' +
                    '<p>You have been successfully added to the Mailing list.</p>\n' +
                    '</div>');

            }

            if(response.validation_exceptions) {
                let html = '';
                $.each(response.validation_exceptions, function( index, value ) {
                    html += '<p>' + value + '</p>';
                });

                $('#form-message-placeholder').append('<div class="notice notice-success is-dismissible" style="margin-top:10px;margin-bottom:0;font-weight:normal;">\n' + html + '</div>');

            }

            resetMailListForm();

        });
    });

    function resetMailListForm()
    {
        $('input[name^=\"central_hubb_facebook_plugin_mailing_list[first_name]\"]').val('');
        $('input[name^="central_hubb_facebook_plugin_mailing_list[last_name]"]').val('');
        $('input[name^="central_hubb_facebook_plugin_mailing_list[email]"]').val('');
        $('select[name^="central_hubb_facebook_plugin_mailing_list[country_code]"]').val('US');
        $('input[name^="central_hubb_facebook_plugin_mailing_list[city]"]').val('');
        $('select[name^="central_hubb_facebook_plugin_mailing_list[timezone]"]').val('America/New_York');
        $('select[name^="central_hubb_facebook_plugin_mailing_list[web_development_skill_level]"]').val('beginner');
        $('select[name^="central_hubb_facebook_plugin_mailing_list[graphic_design_skill_level]"]').val('beginner');
        $('select[name^="central_hubb_facebook_plugin_mailing_list[user_source]"]').val('not-specified');
    }

    $( "#refer_a_friend_form" ).submit(function(e) {
        e.preventDefault();

        let data = {
            'email' : $('input[name^="central_hubb_facebook_plugin_refer_a_friend[email]"]').val(),
        };

        $.ajax({
            method: 'POST',
            url: apiUrl + 'api/facebook-plugin/refer-a-friend',
            data: data
        }).done(function( response ) {

            $('#form-message-placeholder').html('');

            if(response.status && response.status === true) {
                $('#form-message-placeholder').append('<div class="notice notice-success is-dismissible" style="margin-top:10px;margin-bottom:0;font-weight:normal;">\n' +
                    '<p>A Message has been sent to your friend.</p>\n' +
                    '</div>');

                $('input[name^="central_hubb_facebook_plugin_refer_a_friend[email]"]').val('');

            }

            if(response.validation_exceptions) {
                let html = '';
                $.each(response.validation_exceptions, function( index, value ) {
                    html += '<p>' + value + '</p>';
                });

                $('#form-message-placeholder').append('<div class="notice notice-success is-dismissible" style="margin-top:10px;margin-bottom:0;font-weight:normal;">\n' + html + '</div>');

            }



        });
    });

});