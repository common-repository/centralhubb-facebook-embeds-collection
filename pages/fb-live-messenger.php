<?php
    $config = new CentralHubbFacebookPluginConfig();

    $pluginPathUrl = $config->getPluginPathUrl();
    $shortCodePrefix = $config->getShortCodePrefix();
?>


<div class="wrap" style="max-width:800px;">

    <table style="width:100%;">
        <tbody>
        <tr>
            <td style="vertical-align: middle;width:55px;"><img src="<?php echo $pluginPathUrl; ?>img/social-icons/facebook.png" style="width:50px;"></td>
            <td style="vertical-align: middle;">
                <h2>Facebook Live Messenger Plugin</h2>
            </td>
            <td style="text-align:right;">
                <a href="https://developers.facebook.com/docs/messenger-platform/discovery/customer-chat-plugin" style="text-decoration:none;color:grey;" target="_blank">Facebook Documentation</a>
            </td>
        </tr>
        </tbody>
    </table>&nbsp;

    <table class="wp-list-table widefat fixed striped">
        <thead>
        <tr>
            <th style="width:120px;">Setting</th>
            <th style="width:200px;">Description</th>
            <th style="width:210px;">Options</th>
        </tr>
        </thead>

        <tbody>

        <tr>
            <td>
                Page ID
            </td>
            <td>
                The ID of the Facebook Page.
            </td>
            <td>
                <input type="text" name="page_id" placeholder="" style="width:250px;">
            </td>
        </tr>

        <tr>
            <td>
                Theme Color
            </td>
            <td>
                Optional. The color to use as a theme for the plugin, including the background color of the customer chat plugin icon and the background color of any messages sent by users. Supports any hexadecimal color code with a leading number sign (e.g. #0084FF), except white. We highly recommend you choose a color that has a high contrast to white.
            </td>
            <td>
                <input type="text" name="theme_color" placeholder="#4768AD" style="width:80px;">
            </td>
        </tr>

        <tr>
            <td>
                Logged In Greeting
            </td>
            <td>
                Optional. The greeting text that will be displayed if the user is currently logged in to Facebook. Maximum 80 characters.
            </td>
            <td>
                <input type="text" name="logged_in_greeting" style="width:250px;">
            </td>
        </tr>

        <tr>
            <td>
                Logged Out Greeting
            </td>
            <td>
                Optional. The greeting text that will be displayed if the user is currently not logged in to Facebook. Maximum 80 characters.
            </td>
            <td>
                <input name="logged_out_greeting" type="text" style="width:250px;">
            </td>
        </tr>

        <tr>
            <td>
                Greeting Dialog Display
            </td>
            <td>
                Optional. Sets how the greeting dialog will be displayed.
            </td>
            <td>
                <select name="greeting_dialog_display">
                    <option value="show">Show</option>
                    <option value="hide">Hide</option>
                    <option value="fade">Fade</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>
                Greeting Dialog Delay
            </td>
            <td>
                Optional. Sets the number of seconds of delay before the greeting dialog is shown after the plugin is loaded. This can be used to customize when you want the greeting dialog to appear.
            </td>
            <td>
                <input name="greeting_dialog_delay" type="text" style="width:80px;" placeholder="0">
            </td>
        </tr>

        <tr>
            <td>
                Ref
            </td>
            <td>
                Optional. You may pass an optional ref parameter if you wish to include additional context to be passed back in the webhook event. This can be used for many purposes, such as tracking which page the user started the conversation on, directing the user to specific content or features available within the bot, or tying a Messenger user to a session or account on the website.
            </td>
            <td>
                <input name="ref" style="width:250px;" type="text" value="">
            </td>
        </tr>

        </tbody>
        <tfoot>&nbsp;</tfoot>

    </table>

    <table class="wp-list-table widefat fixed striped">
        <thead>
        <tr>
            <th>Required Facebook Settings</th>
        </tr>
        </thead>

        <tbody>

        <tr>
            <td style="background-color:white;">
                <p>Note: To use this plugin you must do the following:</p>

                <p>1) Whitelist your domain within your (facebook page) settings</p>
                <img src="<?php echo $pluginPathUrl; ?>/img/live-messenger/setup-1.png" style="height:50px;"><br />
                <img src="<?php echo $pluginPathUrl; ?>/img/live-messenger/setup-2.png" style="height:180px;"><br />

                <div style="border-bottom:1px solid lightgrey;margin:10px 0 10px 0;"></div>

                <p>2) Run Initial Customer chat setup within your (facebook page) settings</p>
                <img src="<?php echo $pluginPathUrl; ?>/img/live-messenger/setup-3.png" style="height:100px;"><br />

                <div style="border-bottom:1px solid lightgrey;margin:10px 0 10px 0;"></div>

                <p>
                    3) Ensure you use one of your own facebook page ids or this plugin will not display<br />
                    When this plugin is setup correctly with shortcode embedded in your template you will see this icon
                </p>

                <img src="<?php echo $pluginPathUrl; ?>/img/live-messenger/setup-4.png" style="height:70px;">


            </td>
        </tr>


        </tbody>
        <tfoot>&nbsp;</tfoot>

    </table>

    <table class="wp-list-table widefat fixed striped">
        <thead>
        <tr>
            <th>Wordpress Shortcode</th>
        </tr>
        </thead>

        <tbody>

        <tr>
            <td style="background-color:white;">
                <p>You can use this wordpress short code in any page or post.</p>
                <div class="code-container">
                    [<?php echo $shortCodePrefix; ?>-live-messenger page-id="<span id="short-code-page-id">123456789</span>" theme-color="<span id="short-code-theme-color"></span>" logged-in-greeting="<span id="short-code-logged-in-greeting"></span>" logged-out-greeting="<span id="short-code-logged-out-greeting"></span>" greeting-dialog-display="<span id="short-code-greeting-dialog-display">show</span>" greeting_dialog_delay="<span id="short-code-greeting-dialog-delay"></span>" ref="<span id="short-code-ref"></span>"]
                </div>

                <p>To use this shortcode in a php template file please wrap it in php like this.</p>
                <div class="code-container">
                    <?php echo htmlentities('<?php echo do_shortcode(\'[shortcode]\'); ?>'); ?>
                </div>
            </td>
        </tr>


        </tbody>
        <tfoot>&nbsp;</tfoot>

    </table>


<!--    <br />-->
<!--    <div style="text-align:right;">-->
<!--        <a href="https://developers.facebook.com/docs/messenger-platform/discovery/customer-chat-plugin" target="_blank" style="text-decoration:none;color:grey;">Facebook Documentation</a>-->
<!--    </div>-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function( $ ) {

            $( "input[name=page_id]" ).keyup(function() {
                $('#short-code-page-id').html($(this).val());
            });

            $( "input[name=theme_color]" ).keyup(function() {
                $('#short-code-theme-color').html($(this).val());
            });

            $( "input[name=logged_in_greeting]" ).keyup(function() {
                $('#short-code-logged-in-greeting').html($(this).val());
            });

            $( "input[name=logged_out_greeting]" ).keyup(function() {
                $('#short-code-logged-out-greeting').html($(this).val());
            });

            $( "select[name=greeting_dialog_display]" ).change(function() {
                $('#short-code-greeting-dialog-display').html($(this).val());
            });

            $( "input[name=greeting_dialog_delay]" ).keyup(function() {
                $('#short-code-greeting-dialog-delay').html($(this).val());
            });

            $( "input[name=ref]" ).keyup(function() {
                $('#short-code-ref').html($(this).val());
            });

        });
    </script>
</div>

