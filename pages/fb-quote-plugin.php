<?php $config = new CentralHubbFacebookPluginConfig(); ?>

<div class="wrap" style="max-width:800px;">

    <table style="width:100%;">
        <tbody>
        <tr>
            <td style="vertical-align: middle;width:55px;"><img src="<?php echo $config->getPluginPathUrl(); ?>img/social-icons/facebook.png" style="width:50px;"></td>
            <td style="vertical-align: middle;">
                <h2>Facebook Quote Plugin</h2>
            </td>
            <td style="text-align:right;">
                <a href="https://developers.facebook.com/docs/plugins/quote" style="text-decoration:none;color:grey;" target="_blank">Facebook Documentation</a>
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
            The absolute URL of the page that will be quoted.
        </td>
        <td>
            <input name="href" style="width:250px;" type="text" value="https://www.instagram.com/facebook">
        </td>
    </tr>

    <tr>
        <td>
            Layout
        </td>
        <td>
            quote: On text selection, a button with a blue Facebook icon and "Share Quote" text is shown as an overlay.
            When a person clicks it, it will open a share dialog with the highlighted text as a quote.<br /><br />
            button: Behaves the same as the "quote" option but has just a blue Facebook icon in the button.
        </td>
        <td>
            <select name="layout">
                <option value="quote">Quote</option>
                <option value="button">Button</option>
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
            <th>Extra Information</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="background-color:white;">

                <p>
                    Note: To view this plugin you must highlight some text on your page or post like the example below:<br />
                    Or you can switch to layout="button" for a small facebook icon to show instead.
                </p>

                <img style="height:100px;" src="<?php echo $config->getPluginPathUrl(); ?>/img/example-quote.png">
                <img style="height:100px;" src="<?php echo $config->getPluginPathUrl(); ?>/img/example-quote-2.png">
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
            <td>

                <p>You can use this wordpress short code in any page or post.</p>
                <div class="code-container">
                    [<?php echo $config->getShortCodePrefix(); ?>-quote-plugin href="<span id="short-code-href">https://www.instagram.com/facebook</span>" layout="<span id="short-code-layout">quote</span>"]
                </div>

                <p>To use this shortcode in a php template file please wrap it in php like this.</p>
                <div class="code-container">
                    <?php echo htmlentities('<?php echo do_shortcode(\'[shortcode]\'); ?>'); ?>
                </div>

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
        });

        $( "select[name=layout]" ).change(function() {
            $('#short-code-layout').html($(this).val());
        });
    });
</script>
