<?php $config = new CentralHubbFacebookPluginConfig(); ?>

<div class="wrap" style="max-width:800px;">

    <table style="width:100%;">
        <tbody>
        <tr>
            <td style="vertical-align: middle;width:55px;"><img src="<?php echo $config->getPluginPathUrl(); ?>img/social-icons/facebook.png" style="width:50px;"></td>
            <td style="vertical-align: middle;">
                <h2>Facebook Share Button</h2>
            </td>
            <td style="text-align:right;">
                <a href="https://developers.facebook.com/docs/plugins/share-button" style="text-decoration:none;color:grey;" target="_blank">Facebook Documentation</a>
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
            href
        </td>
        <td>
            The absolute URL of the page that will be shared.The absolute URL of the page that will be shared.
        </td>
        <td>
            <input name="href" style="width:250px;" type="text" value="https://developers.facebook.com/docs/plugins/">
        </td>
    </tr>

    <tr>
        <td>
            Layout
        </td>
        <td>
            Selects one of the different layouts that are available for the plugin
        </td>
        <td>
            <select name="layout">
                <option value="box_count">Box Count</option>
                <option value="button_count">Button Count</option>
                <option value="button">Button</option>
                <option value="icon_link">Icon Link</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>
            Mobile Iframe
        </td>
        <td>
            If set to true, the share button will open the share dialog in an iframe (instead of a popup) on top of
            your website on mobile. This option is only available for mobile, not desktop.
        </td>
        <td>
            <select name="mobile_iframe">
                <option value="false">False</option>
                <option value="true">True</option>
            </select>
        </td>
    </tr>


    <tr>
        <td>
            Size
        </td>
        <td>
            The button is offered in 2 sizes i.e. large and small.
        </td>
        <td>
            <select name="size">
                <option value="large">Large</option>
                <option value="small">Small</option>
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
            <th>Wordpress Shortcode</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <p>You can use this wordpress short code in any page or post.</p>
                <div class="code-container">
                    [<?php echo $config->getShortCodePrefix(); ?>-share-button href="<span id="short-code-href">https://developers.facebook.com/docs/plugins/</span>" layout="<span id="short-code-layout">box_count</span>" mobile-iframe="<span id="short-code-mobile-iframe">false</span>" size="<span id="short-code-size">large</span>"]
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
            <td>
                <?php
                    if($config->getShortCodeFormat() == 'html5') {
                        ?>
                        <div id="live-preview" class="fb-share-button"
                             data-href="https://www.your-domain.com/your-page.html"
                             data-layout="box_count"
                             data-mobile_iframe="false"
                             data-size="large"
                        >
                        </div>
                        <?php
                    } else {
                        ?>
                        <div id="live-preview" class="fb-share-button"
                             href="https://www.your-domain.com/your-page.html"
                             layout="box_count"
                             mobile_iframe="false"
                             size="large"
                        >
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
        $( "input[name=href]" ).keyup(function() {
            $('#short-code-href').html($(this).val());
            $('#live-preview').attr('data-href', $(this).val());
            $('#live-preview').attr('href', $(this).val());
            FB.XFBML.parse();
        });

        $( "select[name=layout]" ).change(function() {
            $('#short-code-layout').html($(this).val());
            $('#live-preview').attr('data-layout', $(this).val());
            $('#live-preview').attr('layout', $(this).val());
            FB.XFBML.parse();
        });

        $( "select[name=mobile_iframe]" ).change(function() {
            $('#short-code-mobile-iframe').html($(this).val());
            $('#live-preview').attr('data-mobile_iframe', $(this).val());
            $('#live-preview').attr('mobile_iframe', $(this).val());
            FB.XFBML.parse();
        });

        $( "select[name=size]" ).change(function() {
            $('#short-code-size').html($(this).val());
            $('#live-preview').attr('data-size', $(this).val());
            $('#live-preview').attr('size', $(this).val());
            FB.XFBML.parse();
        });
    });
</script>
