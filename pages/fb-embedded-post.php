<?php

$config = new CentralHubbFacebookPluginConfig();
$shortCodePrefix = $config->getShortCodePrefix();

?>

<div class="wrap" style="max-width:800px;">

    <table style="width:100%;">
        <tbody>
        <tr>
            <td style="vertical-align: middle;width:55px;"><img src="<?php echo $config->getPluginPathUrl(); ?>img/social-icons/facebook.png" style="width:50px;"></td>
            <td style="vertical-align: middle;">
                <h2>Facebook Embedded Posts Plugin</h2>
            </td>
            <td style="text-align:right;">
                <a href="https://developers.facebook.com/docs/plugins/embedded-posts" style="text-decoration:none;color:grey;" target="_blank">Facebook Documentation</a>
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
            The absolute URL of the post.
        </td>
        <td>
            <input name="href" style="width:250px;" type="text" value="https://www.facebook.com/20531316728/posts/10154009990506729/">
        </td>
    </tr>

    <tr>
        <td>
            Width
        </td>
        <td>
            The width of the post. Min. 350 pixels to Max. 750 pixels. Leave empty to use fluid width.
        </td>
        <td>
            <input name="width" style="width:60px;" type="text" value="500"> px
        </td>
    </tr>

    <tr>
        <td>
            Show Text
        </td>
        <td>
            Applied to photo post. Set to true to include the text from the Facebook post, if any.
        </td>
        <td>
            <select name="show_text">
                <option value="false">False</option>
                <option value="true">True</option>
            </select>
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
            <td>

            <p>You can use this wordpress short code in any page or post.</p>
            <div class="code-container">
                [<?php echo $shortCodePrefix; ?>-embedded-post href="<span id="short-code-href">https://www.facebook.com/20531316728/posts/10154009990506729</span>" width="<span id="short-code-width">500</span>" show-text="<span id="short-code-show-text">false</span>"]
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

    <table class="wp-list-table widefat fixed striped">
        <thead>
        <tr>
            <th>Live Preview</th>
        </tr>
        </thead>

        <tbody>

        <tr>
            <td>

                <div id="live-preview" class="fb-post" data-href="https://www.facebook.com/20531316728/posts/10154009990506729/" data-width="500" data-show-text="true"></div>
            </td>
        </tr>

        </tbody>
        <tfoot>&nbsp;</tfoot>

    </table>



</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function( $ ) {
        $( "input[name=href]" ).keyup(function() {
            $('#short-code-href').html($(this).val());
            $('#live-preview').attr('data-href', $(this).val());
            FB.XFBML.parse();
        });

        $( "input[name=width]" ).keyup(function() {
            $('#short-code-width').html($(this).val());
            $('#live-preview').attr('data-width', $(this).val());
            FB.XFBML.parse();
        });

        $( "select[name=show_text]" ).change(function() {
            $('#short-code-show-text').html($(this).val());
            $('#live-preview').attr('data-show-text', $(this).val());
            FB.XFBML.parse();
        });
    });
</script>