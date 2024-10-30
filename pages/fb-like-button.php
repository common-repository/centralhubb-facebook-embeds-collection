<?php $config = new CentralHubbFacebookPluginConfig(); ?>

<div class="wrap" style="max-width:800px;">

    <table style="width:100%;">
        <tbody>
        <tr>
            <td style="vertical-align: middle;width:55px;"><img src="<?php echo $config->getPluginPathUrl(); ?>img/social-icons/facebook.png" style="width:50px;"></td>
            <td style="vertical-align: middle;">
                <h2>Facebook Like Button</h2>
            </td>
            <td style="text-align:right;">
                <a href="https://developers.facebook.com/docs/plugins/like-button" style="text-decoration:none;color:grey;" target="_blank">Facebook Documentation</a>
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
            Action
        </td>
        <td>
            The verb to display on the button.
        </td>
        <td>
            <select name="action">
                <option value="like">Like</option>
                <option value="recommend">Recommend</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>
            Color Scheme
        </td>
        <td>
            The color scheme used by the plugin for any text outside of the button itself.
        </td>
        <td>
            <select name="color_scheme">
                <option value="light">Light</option>
                <option value="dark">Dark</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>
            Href
        </td>
        <td>
            The absolute URL of the page that will be liked.
        </td>
        <td>
            <input name="href" style="width:250px;" type="text" value="https://www.facebook.com/arianagrande">
        </td>
    </tr>

    <tr>
        <td>
            Kid Directed Site
        </td>
        <td>
            If your web site or online service, or a portion of your service, is directed to children under 13 you must enable this.
        </td>
        <td>
            <select name="kid_directed_site">
                <option value="false">False</option>
                <option value="true">True</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>
            Layout
        </td>
        <td>
            Selects one of the different layouts that are available for the plugin.
        </td>
        <td>
            <select name="layout">
                <option value="standard">Standard</option>
                <option value="button_count">Button Count</option>
                <option value="button">Button</option>
                <option value="box_count">Box Count</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>
            Ref
        </td>
        <td>
            A label for tracking referrals which must be less than 50 characters and can contain alphanumeric characters and some punctuation (currently +/=-.:_).
        </td>
        <td>
            <input name="ref" style="width:250px;" type="text" value="">
        </td>
    </tr>

    <tr>
        <td>
            Share
        </td>
        <td>
            Specifies whether to include a share button beside the Like button.
        </td>
        <td>
            <select name="share">
                <option value="false">False</option>
                <option value="true">True</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>
            Show Faces
        </td>
        <td>
            Specifies whether to display profile photos below the button (standard layout only). You must not enable this on child-directed sites.
        </td>
        <td>
            <select name="show_faces">
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
            The button is offered in 2 sizes.
        </td>
        <td>
            <select name="size">
                <option value="large">Large</option>
                <option value="small">Small</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>
            Width
        </td>
        <td>
            The width of the plugin (standard layout only), which is subject to the minimum and default width.
        </td>
        <td>
            <input name="width" style="width:60px;" type="text" value="" placeholder="Auto"> px
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
            <td style="background-color:white;">
                <p>You can use this wordpress short code in any page or post.</p>
                <div class="code-container">
                    [<?php echo $config->getShortCodePrefix(); ?>-like-button action="<span id="short-code-action">like</span>" color-scheme="<span id="short-code-color-scheme">light</span>" href="<span id="short-code-href">https://www.facebook.com/arianagrande</span>" kid-directed-site="<span id="short-code-kid-directed-site">false</span>" layout="<span id="short-code-layout">standard</span>" ref="<span id="short-code-ref"></span>" share="<span id="short-code-share">false</span>" show-faces="<span id="short-code-show-faces">false</span>" size="<span id="short-code-size">large</span>" width="<span id="short-code-width"></span>"]
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
                    if($config->getShortCodeFormat() == 'html5x') {
                        ?>
                        <div id="live-preview" class="fb-like"
                             data-action="like"
                             data-colorscheme="light"
                             data-href="https://www.facebook.com/arianagrande"
                             data-kid-directed-site="false"
                             data-layout="standard"
                             data-ref=""
                             data-share="false"
                             data-show-faces="false"
                             data-size="large"
                             data-width=""
                        >
                        </div>
                        <?php
                    } else {
                        ?>
                        <div id="live-preview" class="fb-like"
                             action="like"
                             colorscheme="light"
                             href="https://www.facebook.com/arianagrande"
                             kid_directed_site="false"
                             layout="standard"
                             ref=""
                             share="false"
                             show_faces="false"
                             size="large"
                             width=""
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

        $( "select[name=action]" ).change(function() {
            $('#short-code-action').html($(this).val());
            $('#live-preview').attr('data-action', $(this).val());
            $('#live-preview').attr('action', $(this).val());
            FB.XFBML.parse();
        });

        $( "select[name=color_scheme]" ).change(function() {
            $('#short-code-color-scheme').html($(this).val());
            $('#live-preview').attr('data-colorscheme', $(this).val());
            $('#live-preview').attr('colorscheme', $(this).val());
            FB.XFBML.parse();
        });

        $( "input[name=href]" ).keyup(function() {
            $('#short-code-href').html($(this).val());
            $('#live-preview').attr('data-href', $(this).val());
            $('#live-preview').attr('href', $(this).val());
            FB.XFBML.parse();
        });

        $( "select[name=kid_directed_site]" ).change(function() {
            $('#short-code-kid-directed-site').html($(this).val());
            $('#live-preview').attr('data-kid-directed-site', $(this).val());
            $('#live-preview').attr('kid_directed_site', $(this).val());
            FB.XFBML.parse();
        });

        $( "select[name=layout]" ).change(function() {
            $('#short-code-layout').html($(this).val());
            $('#live-preview').attr('data-layout', $(this).val());
            $('#live-preview').attr('layout', $(this).val());
            FB.XFBML.parse();
        });

        $( "input[name=ref]" ).keyup(function() {
            $('#short-code-ref').html($(this).val());
            $('#live-preview').attr('data-ref', $(this).val());
            $('#live-preview').attr('ref', $(this).val());
            FB.XFBML.parse();
        });

        $( "select[name=share]" ).change(function() {
            $('#short-code-share').html($(this).val());
            $('#live-preview').attr('data-share', $(this).val());
            $('#live-preview').attr('share', $(this).val());
            FB.XFBML.parse();
        });

        $( "select[name=show_faces]" ).change(function() {
            $('#short-code-show-faces').html($(this).val());
            $('#live-preview').attr('data-show-faces', $(this).val());
            $('#live-preview').attr('show_faces', $(this).val());
            FB.XFBML.parse();
        });

        $( "select[name=size]" ).change(function() {
            $('#short-code-size').html($(this).val());
            $('#live-preview').attr('data-size', $(this).val());
            $('#live-preview').attr('size', $(this).val());
            FB.XFBML.parse();
        });

        $( "input[name=width]" ).keyup(function() {
            $('#short-code-width').html($(this).val());
            $('#live-preview').attr('data-width', $(this).val());
            $('#live-preview').attr('width', $(this).val());
            FB.XFBML.parse();
        });

    });
</script>
</div>
