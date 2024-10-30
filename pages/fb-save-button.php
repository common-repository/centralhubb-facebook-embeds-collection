<?php $config = new CentralHubbFacebookPluginConfig(); ?>

<div class="wrap" style="max-width:800px;">

    <table style="width:100%;">
        <tbody>
        <tr>
            <td style="vertical-align: middle;width:55px;"><img src="<?php echo $config->getPluginPathUrl(); ?>img/social-icons/facebook.png" style="width:50px;"></td>
            <td style="vertical-align: middle;">
                <h2>Facebook Save Button</h2>
            </td>
            <td style="text-align:right;">
                <a href="https://developers.facebook.com/docs/plugins/save" style="text-decoration:none;color:grey;" target="_blank">Facebook Documentation</a>
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
            Href
        </td>
        <td>
            The absolute link of the page that will be saved.
        </td>
        <td>
            <input name="href" style="width:250px;" type="text" value="https://www.instagram.com/facebook">
        </td>
    </tr>

    <tr>
        <td>
            Size
        </td>
        <td>
            You can set the size to small or large.
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
                    [<?php echo $config->getShortCodePrefix(); ?>-save-button href="<span id="short-code-href">https://www.instagram.com/facebook</span>" size="<span id="short-code-size">large</span>"]
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
                        <div id="live-preview" class="fb-save" data-uri="http://www.your-domain.com/your-page.html" data-size="large"></div>
                        <?php
                    } else {
                        ?>
                        <div id="live-preview" class="fb-save" uri="http://www.your-domain.com/your-page.html" size="large"></div>
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
            $('#live-preview').attr('data-uri', $(this).val());
            $('#live-preview').attr('uri', $(this).val());
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
