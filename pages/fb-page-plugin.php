<?php $config = new CentralHubbFacebookPluginConfig(); ?>

<div class="wrap" style="max-width:800px;">

    <table style="width:100%;">
        <tbody>
        <tr>
            <td style="vertical-align: middle;width:55px;"><img src="<?php echo $config->getPluginPathUrl(); ?>img/social-icons/facebook.png" style="width:50px;"></td>
            <td style="vertical-align: middle;">
                <h2>Facebook Page Plugin</h2>
            </td>
            <td style="text-align:right;">
                <a href="https://developers.facebook.com/docs/plugins/page-plugin" style="text-decoration:none;color:grey;" target="_blank">Facebook Documentation</a>
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
            The URL of the Facebook Page.
        </td>
        <td>
            <input name="href" style="width:250px;" type="text" value="https://www.facebook.com/arianagrande/">
        </td>
    </tr>

    <tr>
        <td>
            Width
        </td>
        <td>
            The pixel width of the plugin. Min. is 180px & Max. is 500px.
        </td>
        <td>
            <input name="width" style="width:60px;" type="text" value="340"> px
        </td>
    </tr>

    <tr>
        <td>
            Height
        </td>
        <td>
            The pixel height of the plugin. Min. is 70px
        </td>
        <td>
            <input name="height" style="width:60px;" type="text" value="500"> px
        </td>
    </tr>

    <tr>
        <td>
            Tabs
        </td>
        <td>
            Tabs to render. Use a comma-separated list to add multiple tabs, i.e. timeline, events.
        </td>
        <td>
            <input name="tabs" style="width:250px;" type="text" value="timeline, events, messages">
        </td>
    </tr>

    <tr>
        <td>
            Hide Cover
        </td>
        <td>
            Hide cover photo in the header.
        </td>
        <td>
            <select name="hide_cover">
                <option value="false">False</option>
                <option value="true">True</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>
            Show Face Pile
        </td>
        <td>
            Show profile photos when friends like this.
        </td>
        <td>
            <select name="show_face_pile">
                <option value="true">True</option>
                <option value="false">False</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>
            Hide CTA
        </td>
        <td>
            Hide the custom call to action button (if available).
        </td>
        <td>
            <select name="hide_cta">
                <option value="false">False</option>
                <option value="true">True</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>
            Small Header
        </td>
        <td>
            Use the small header instead.
        </td>
        <td>
            <select name="small_header">
                <option value="false">False</option>
                <option value="true">True</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>
            Adapt Container Width
        </td>
        <td>
            Try to fit inside the container width.
        </td>
        <td>
            <select name="adapt_container_width">
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
                    [<?php echo $config->getShortCodePrefix(); ?>-page-plugin href="<span id="short-code-href">https://www.facebook.com/arianagrande/</span>" width="<span id="short-code-width">340</span>" height="<span id="short-code-height">500</span>" tabs="<span id="short-code-tabs">timeline, events, messages</span>" hide-cover="<span id="short-code-hide-cover">false</span>" show-face-pile="<span id="short-code-show-face-pile">true</span>" hide-cta="<span id="short-code-hide-cta">false</span>" small-header="<span id="short-code-small-header">false</span>" adapt-container-width="<span id="short-code-adapt-container-width">true</span>"]
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
                    <div id="live-preview" class="fb-page"
                         data-href="https://www.facebook.com/arianagrande/"
                         data-width=""
                         data-height=""
                         data-tabs="timeline"
                         data-hide-cover="false"
                         data-show-facepile="true"
                         data-hide-cta="false"
                         data-small-header="false"
                         data-adapt-container-width="true"
                         ></div>
                    <?php
                } else {
                    ?>
                    <div id="live-preview" class="fb-page"
                         href="https://www.facebook.com/arianagrande/"
                         width=""
                         height=""
                         tabs="timeline"
                         hide_cover="false"
                         show_facepile="true"
                         hide_cta="false"
                         small_header="false"
                         adapt_container_width="true"
                    ></div>
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

        $( "input[name=width]" ).keyup(function() {
            $('#short-code-width').html($(this).val());
            $('#live-preview').attr('data-width', $(this).val());
            $('#live-preview').attr('width', $(this).val());
            FB.XFBML.parse();
        });

        $( "input[name=height]" ).keyup(function() {
            $('#short-code-height').html($(this).val());
            $('#live-preview').attr('data-height', $(this).val());
            $('#live-preview').attr('height', $(this).val());
            FB.XFBML.parse();
        });

        $( "input[name=tabs]" ).keyup(function() {
            $('#short-code-tabs').html($(this).val());
            $('#live-preview').attr('data-tabs', $(this).val());
            $('#live-preview').attr('tabs', $(this).val());
            FB.XFBML.parse();
        });

        $( "select[name=hide_cover]" ).change(function() {
            $('#short-code-hide-cover').html($(this).val());
            $('#live-preview').attr('data-hide-cover', $(this).val());
            $('#live-preview').attr('hide_cover', $(this).val());
            FB.XFBML.parse();
        });

        $( "select[name=show_face_pile]" ).change(function() {
            $('#short-code-show-face-pile').html($(this).val());
            $('#live-preview').attr('data-show-facepile', $(this).val());
            $('#live-preview').attr('show_facepile', $(this).val());
            FB.XFBML.parse();
        });

        $( "select[name=hide_cta]" ).change(function() {
            $('#short-code-hide-cta').html($(this).val());
            $('#live-preview').attr('data-hide-cta', $(this).val());
            $('#live-preview').attr('hide_cta', $(this).val());
            FB.XFBML.parse();
        });

        $( "select[name=small_header]" ).change(function() {
            $('#short-code-small-header').html($(this).val());
            $('#live-preview').attr('data-small-header', $(this).val());
            $('#live-preview').attr('small_header', $(this).val());
            FB.XFBML.parse();
        });

        $( "select[name=adapt_container_width]" ).change(function() {
            $('#short-code-adapt-container-width').html($(this).val());
            $('#live-preview').attr('data-adapt-container-width', $(this).val());
            $('#live-preview').attr('adapt-container-width', $(this).val());
            FB.XFBML.parse();
        });
    });
</script>
