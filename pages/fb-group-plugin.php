<?php $config = new CentralHubbFacebookPluginConfig(); ?>

<div class="wrap" style="max-width:800px;">

    <table style="width:100%;">
        <tbody>
        <tr>
            <td style="vertical-align: middle;width:55px;"><img src="<?php echo $config->getPluginPathUrl(); ?>img/social-icons/facebook.png" style="width:50px;"></td>
            <td style="vertical-align: middle;">
                <h2>Facebook Group Plugin</h2>
            </td>
            <td style="text-align:right;">
                <a href="https://developers.facebook.com/docs/plugins/group-plugin" style="text-decoration:none;color:grey;" target="_blank">Facebook Documentation</a>
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
            Show Social Context
        </td>
        <td>
            Show the number of friends who are members of the group.
        </td>
        <td>
            <select name="show_social_context">
                <option value="true">True</option>
                <option value="false">False</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>
            Href
        </td>
        <td>
            The absolute URL of the group.
        </td>
        <td>
            <input name="href" style="width:250px;" type="text" value="https://www.facebook.com/groups/ayearofrunning/">
        </td>
    </tr>

    <tr>
        <td>
            Show Metadata
        </td>
        <td>
            Shows other metadata about the group, e.g., Description.
        </td>
        <td>
            <select name="show_metadata">
                <option value="false">False</option>
                <option value="true">True</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>
            Width
        </td>
        <td>
            Set the plugin width in pixels. The minimum width is 180 and the maximu width is 500 pixels.
        </td>
        <td>
            <input name="width" style="width:60px;" type="text" value="280"> px
        </td>
    </tr>

    <tr>
        <td>
            Skin
        </td>
        <td>
            Sets the color theme for the plugin content.
        </td>
        <td>
            <select name="skin">
                <option value="light">Light</option>
                <option value="dark">Dark</option>
            </select>
        </td>
    </tr>

    </tbody>
    <tfoot>&nbsp;</tfoot>

</table>

    <br />

    <table class="wp-list-table widefat fixed striped">
        <thead>
        <tr>
            <th>Required Facebook Settings</th>
        </tr>
        </thead>

        <tbody>

        <tr>
            <td style="background-color:white;">
                <p>Note: You must these two options below setup in your facebook application settings for the group plugin to display</p>

                <img style="height:80px;" src="<?php echo $config->getPluginPathUrl(); ?>img/example-app-domains.png">

                <div style="border-bottom:1px solid lightgrey;margin:10px;"></div>

                <img style="height:100px;" src="<?php echo $config->getPluginPathUrl(); ?>img/example-website.png">

                <div style="border-bottom:1px solid lightgrey;margin:10px;"></div>
            </td>
        </tr>
        </tbody>
    </table>

    <br />

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
                    [<?php echo $config->getShortCodePrefix(); ?>-group-plugin href="<span id="short-code-href">https://www.facebook.com/groups/ayearofrunning/</span>" show-social-context="<span id="short-code-show-social-context">true</span>" show-metadata="<span id="short-code-show-metadata">false</span>" width="<span id="short-code-width">280</span>" width="<span id="short-code-skin">light</span>"]
                </div>

                <p>To use this shortcode in a php template file please wrap it in php like this.</p>
                <div class="code-container">
                    <?php echo htmlentities('<?php echo do_shortcode(\'[shortcode]\'); ?>'); ?>
                </div>
            </td>
        </tr>
        </tbody>
    </table>

        <br />

        <table class="wp-list-table widefat fixed striped">
            <thead>
            <tr>
                <th>Live Preview</th>
            </tr>
            </thead>

            <tbody>

            <tr>
                <td style="background-color:white;">

                    <?php
                        if($config->getShortCodeFormat() == 'html5') {
                            ?>
                            <div id="live-preview" class="fb-group"
                                 data-href="https://www.facebook.com/groups/ayearofrunning/"
                                 data-width="280"
                                 data-show-social-context="true"
                                 data-show-metadata="false"
                                 data-skin="light">
                            </div>

                            <?php
                        } else {
                            ?>
                            <div id="live-preview" class="fb-group"
                                 href="https://www.facebook.com/groups/ayearofrunning/"
                                 width="280"
                                 show_social_context="true"
                                 show_metadata="false"
                                 skin="light">
                            </div>
                            <?php
                        }
                    ?>



                </td>
            </tr>
            </tbody>
        </table>


</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function( $ ) {

        $( "select[name=show_social_context]" ).change(function() {
            $('#short-code-show-social-context').html($(this).val());
            $('#live-preview').attr('data-show-social-context', $(this).val());
            $('#live-preview').attr('show_social_context', $(this).val());
            FB.XFBML.parse();
        });

        $( "input[name=href]" ).keyup(function() {
            $('#short-code-href').html($(this).val());
            $('#live-preview').attr('data-href', $(this).val());
            $('#live-preview').attr('href', $(this).val());
            FB.XFBML.parse();
        });

        $( "select[name=show_metadata]" ).change(function() {
            $('#short-code-show-metadata').html($(this).val());
            $('#live-preview').attr('data-show-metadata', $(this).val());
            $('#live-preview').attr('show_metadata', $(this).val());
            FB.XFBML.parse();
        });

        $( "input[name=width]" ).keyup(function() {
            $('#short-code-width').html($(this).val());
            $('#live-preview').attr('data-width', $(this).val());
            $('#live-preview').attr('width', $(this).val());
            FB.XFBML.parse();
        });

        $( "select[name=skin]" ).change(function() {
            $('#short-code-skin').html($(this).val());
            $('#live-preview').attr('data-skin', $(this).val());
            $('#live-preview').attr('skin', $(this).val());
            FB.XFBML.parse();
        });

    });
</script>