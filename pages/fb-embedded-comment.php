<?php $config = new CentralHubbFacebookPluginConfig(); ?>

<div class="wrap" style="max-width:800px;">

    <table style="width:100%;">
        <tbody>
        <tr>
            <td style="vertical-align: middle;width:55px;"><img src="<?php echo $config->getPluginPathUrl(); ?>img/social-icons/facebook.png" style="width:50px;"></td>
            <td style="vertical-align: middle;">
                <h2>Facebook Embedded Comments Plugin</h2>
            </td>
            <td style="text-align:right;">
                <a href="https://developers.facebook.com/docs/plugins/embedded-comments" style="text-decoration:none;color:grey;" target="_blank">Facebook Documentation</a>
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
            The absolute URL of the comment.
        </td>
        <td>
            <input name="href" style="width:250px;" type="text" value="https://www.facebook.com/zuck/posts/10102577175875681?comment_id=1193531464007751&reply_comment_id=654912701278942">
        </td>
    </tr>

    <tr>
        <td>
            Width
        </td>
        <td>
            The width of the embedded comment container. Min. 220px.
        </td>
        <td>
            <input name="width" style="width:60px;" type="text" value="560"> px
        </td>
    </tr>

    <tr>
        <td>
            Include Parent
        </td>
        <td>
            Set to true to include parent comment (if URL is a reply).
        </td>
        <td>
            <select name="include_parent">
                <option value="true">True</option>
                <option value="false">False</option>
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
    [<?php echo $config->getShortCodePrefix(); ?>-embedded-comment href="<span id="short-code-href">https://www.facebook.com/zuck/posts/10102577175875681?comment_id=1193531464007751&reply_comment_id=654912701278942</span>" width="<span id="short-code-width">560</span>" include-parent="<span id="short-code-include-parent">false</span>"]
</div>

<p>To use this shortcode in a php template file please wrap it in php like this.</p>
<div class="code-container">
    <?php echo htmlentities('<?php echo do_shortcode(\'[shortcode]\'); ?>'); ?>
</div>

</div>

</td>
</tr>
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
                    <div id="live-preview" class="fb-comment-embed"
                         data-href="https://www.facebook.com/zuck/posts/10102735452532991?comment_id=1070233703036185"
                         data-width="500" data-include-parent="true" style="background-color:white;"></div>
                    <?php
                } else {
                    ?>
                    <div id="live-preview" class="fb-comment-embed"
                         href="https://www.facebook.com/zuck/posts/10102735452532991?comment_id=1070233703036185"
                         width="500" include_parent="true" style="background-color:white;"></div>
                    <?php
                }
            ?>
        </td>
    </tr>
</table>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function( $ ) {
        $( "input[name=href]" ).keyup(function() {
            $('#short-code-href').html($(this).val());
            $('#live-preview').attr('data-href', $(this).val());
            $('#live-preview').attr('href', $(this).val());
            FB.XFBML.parse();
        });

        $( "input[name=width]" ).keyup(function() {
            $('#short-code-width').html($(this).val());
            $('#live-preview').attr('data-width', $(this).val());
            $('#live-preview').attr('width', $(this).val());
            FB.XFBML.parse();
        });

        $( "select[name=include_parent]" ).change(function() {
            $('#short-code-include-parent').html($(this).val());
            $('#live-preview').attr('data-include-parent', $(this).val());
            $('#live-preview').attr('include_parent', $(this).val());
            FB.XFBML.parse();
        });
    });
</script>

