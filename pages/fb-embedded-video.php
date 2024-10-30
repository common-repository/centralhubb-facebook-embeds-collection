<?php $shortCodePrefix = !empty($_GET['short_code_prefix']) ? $_GET['short_code_prefix'] : null; ?>

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
                <h2>Facebook Embedded Video Plugin</h2>
            </td>
            <td style="text-align:right;">
                <a href="https://developers.facebook.com/docs/plugins/embedded-video-player" style="text-decoration:none;color:grey;" target="_blank">Facebook Documentation</a>
            </td>
        </tr>
        </tbody>
    </table>&nbsp;

    <br  />

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
            The absolute URL of the video.
        </td>
        <td>
            <input name="href" style="width:250px;" type="text" value="https://www.facebook.com/facebook/videos/10153231379946729/">
        </td>
    </tr>

    <tr>
        <td>
            Allow Full screen
        </td>
        <td>
            Allow the video to be played in full screen mode.
        </td>
        <td>
            <select name="allow_full_screen">
                <option value="true">True</option>
                <option value="false">False</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>
            Auto Play
        </td>
        <td>
            Automatically start playing the video when the page loads. The video will be played without sound (muted). People can turn on sound via the video player controls. This setting does not apply to mobile devices.
        </td>
        <td>
            <select name="auto_play">
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
            The width of the video container. Min. 220px.
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
            Set to true to include the text from the Facebook post associated with the video, if any. Only available for desktop sites.
        </td>
        <td>
            <select name="show_text">
                <option value="false">False</option>
                <option value="true">True</option>

            </select>
        </td>
    </tr>

    <tr>
        <td>
            Show Captions
        </td>
        <td>
            Set to true to show captions (if available) by default. Captions are only available on desktop.
        </td>
        <td>
            <select name="show_captions">
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
                    [<?php echo $shortCodePrefix; ?>-embedded-video href="<span id="short-code-href">https://www.facebook.com/facebook/videos/10153231379946729/</span>" allow-full-screen="<span id="short-code-allow-full-screen">true</span>" auto-play="<span id="short-code-auto-play">false</span>" width="<span id="short-code-width">500</span>" show-text="<span id="short-code-show-text">false</span>" show-captions="<span id="short-code-show-captions">false</span>"]
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
                <div id="live-preview" class="fb-video" data-href="https://www.facebook.com/facebook/videos/10153231379946729/" data-allowfullscreen="true" data-autoplay="false" data-width="500" data-show-text="false" data-show-captions="false"></div>
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

        $( "select[name=allow_full_screen]" ).change(function() {
            $('#short-code-allow-full-screen').html($(this).val());
            $('#live-preview').attr('data-allowfullscreen', $(this).val());
            FB.XFBML.parse();
        });

        $( "select[name=auto_play]" ).change(function() {
            $('#short-code-auto-play').html($(this).val());
            $('#live-preview').attr('data-autoplay', $(this).val());
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

        $( "select[name=show_captions]" ).change(function() {
            $('#short-code-show-captions').html($(this).val());
            $('#live-preview').attr('data-show-captions', $(this).val());
            FB.XFBML.parse();
        });
    });
</script>