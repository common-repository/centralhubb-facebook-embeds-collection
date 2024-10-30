<?php
    $config = new CentralHubbFacebookPluginConfig();
    $options = get_option($config->getDbSettingsKey());

?>

<div class="wrap" style="max-width:800px;">

    <table style="width:100%;">
        <tbody>
        <tr>
            <td style="vertical-align: middle;width:55px;"><img src="<?php echo $config->getPluginPathUrl(); ?>/img/social-icons/facebook.png" style="width:50px;"></td>
            <td style="vertical-align: middle;">
                <h2>Facebook Javascript SDK</h2>
            </td>
            <td style="text-align:right;">
                <a href="https://developers.facebook.com/docs/javascript/quickstart" style="text-decoration:none;color:grey;" target="_blank">Facebook Documentation</a>
            </td>
        </tr>
        </tbody>
    </table>&nbsp;
    <table class="wp-list-table widefat fixed striped">
        <thead>
        <tr>
            <th>Wordpress Shortcode</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <p>This is required for any of the facebook short codes within this plugin to work.</p>

                <p>Please add the (facebook javascript sdk) short code below to your template once.
                    Below the <?php echo htmlentities('<body>'); ?> tag. <br />
                    The <?php echo htmlentities('<body>'); ?> tag is most commonly located inside your {theme-folder}/header.php</p>
                <p>
                    The code below will contain your correct (Application ID) set inside this plugins (Facebook Settings) page<br />
                </p>

                <p>If the app_id below is blank please update the plugin -> facebook settings and set your application id correctly.</p>

                <div class="code-container">
                    <?php
                    $appId = !empty($options['app_id']) ? $options['app_id'] : '';
                    echo htmlentities('<?php echo do_shortcode(\'['.$config->getShortCodePrefix().'-javascript-sdk app_id="'.$appId.'"]\'); ?>');
                    ?>
                </div>
            </td>
        </tr>
        </tbody>
        <tfoot></tfoot>
    </table><br>
</div>

