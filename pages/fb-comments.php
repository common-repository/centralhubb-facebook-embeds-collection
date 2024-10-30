<?php $config = new CentralHubbFacebookPluginConfig(); ?>

<div class="wrap" style="max-width:800px;">

    <table style="width:100%;">
        <tbody>
        <tr>
            <td style="vertical-align: middle;width:55px;"><img src="<?php echo $config->getPluginPathUrl(); ?>img/social-icons/facebook.png" style="width:50px;"></td>
            <td style="vertical-align: middle;">
                <h2>Facebook Comments Plugin</h2>
            </td>
            <td style="text-align:right;">
                <a href="https://developers.facebook.com/docs/plugins/comments" style="text-decoration:none;color:grey;" target="_blank">Facebook Documentation</a>
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
            <td>Color Scheme</td>
            <td>The color scheme used by the comments plugin.</td>
            <td><select name="color_scheme">
                    <option value="light">
                        Light
                    </option>
                    <option value="dark">
                        Dark
                    </option>
                </select></td>
        </tr>
        <tr>
            <td>Href</td>
            <td>The absolute URL that comments posted in the plugin will be permanently associated with. This allows any website url.</td>
            <td><input name="href" style="width:250px;" type="text" value="https://developers.facebook.com/docs/plugins/comments"></td>
        </tr>
        <tr>
            <td>Mobile</td>
            <td>A boolean value that specifies whether to show the mobile-optimized version or not.</td>
            <td><select name="mobile">
                    <option value="true">
                        True
                    </option>
                    <option value="false">
                        False
                    </option>
                </select></td>
        </tr>
        <tr>
            <td>Num Posts</td>
            <td>The number of comments to show by default. The minimum value is 1.</td>
            <td><input name="num_posts" style="width:60px;" type="text" value="10"></td>
        </tr>
        <tr>
            <td>Order By</td>
            <td>The order to use when displaying comments.</td>
            <td><select name="order_by">
                    <option value="social">
                        Social
                    </option>
                    <option value="time">
                        Time
                    </option>
                    <option value="reverse_time">
                        Reverse Time
                    </option>
                </select></td>
        </tr>
        <tr>
            <td>Width</td>
            <td>The width of the comments plugin on the webpage.</td>
            <td><input name="width" placeholder="Auto" style="width:60px;" type="text"> px</td>
        </tr>
        </tbody>
        <tfoot></tfoot>
    </table><br>
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
                    [<?php echo $config->getShortCodePrefix(); ?>-comments color-scheme="<span id="short-code-color-scheme">light</span>" href="<span id="short-code-href">https://developers.facebook.com/docs/plugins/comments</span>" mobile="<span id="short-code-mobile">true</span>" num-posts="<span id="short-code-num-posts">10</span>" order-by="<span id="short-code-order-by">social</span>" width="<span id="short-code-width"></span>"]
                </div>
                <p>To use this shortcode in a php template file please wrap it in php like this.</p>
                <div class="code-container">
                    <?php echo htmlentities('<?php echo do_shortcode(\'[shortcode]\'); ?>'); ?>
                </div>
            </td>
        </tr>
        </tbody>
    </table><br>
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
                        <div class="fb-comments" data-colorscheme="light" data-href="https://developers.facebook.com/" data-mobile="" data-numposts="5" data-order_by="time" data-width="" id="live-example"></div>
                        <?php
                    } else {
                        ?>
                        <div class="fb-comments" colorscheme="light" href="https://developers.facebook.com/" mobile="" num_posts="5" order_by="time" width="" id="live-example"></div>
                        <?php
                    }
                ?>
            </td>
        </tr>
        </tbody>
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            $("select[name=color_scheme]").change(function () {
                $('#short-code-color-scheme').html($(this).val());
                //$('#live-example').attr('data-colorscheme', $(this).val());
                FB.XFBML.parse();
            });

            $("input[name=href]").keyup(function () {
                $('#short-code-href').html($(this).val());
                $('#live-example').attr('data-href', $(this).val());
                $('#live-example').attr('href', $(this).val());
                FB.XFBML.parse();
            });

            $("select[name=mobile]").change(function () {
                $('#short-code-mobile').html($(this).val());
                $('#live-example').attr('data-mobile', $(this).val());
                $('#live-example').attr('mobile', $(this).val());
                FB.XFBML.parse();
            });

            $("input[name=num_posts]").keyup(function () {
                $('#short-code-num-posts').html($(this).val());
                $('#live-example').attr('data-numposts', $(this).val());
                $('#live-example').attr('num_posts', $(this).val());
                FB.XFBML.parse();
            });

            $("select[name=order_by]").change(function () {
                $('#short-code-order-by').html($(this).val());
                $('#live-example').attr('data-order_by', $(this).val());
                $('#live-example').attr('order_by', $(this).val());
                FB.XFBML.parse();
            });

            $("input[name=width]").keyup(function () {
                $('#short-code-width').html($(this).val());
                $('#live-example').attr('data-width', $(this).val());
                $('#live-example').attr('width', $(this).val());
                FB.XFBML.parse();
            });
        });
    </script>
</div>