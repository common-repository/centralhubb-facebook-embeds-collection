<?php

/**
 * Class CentralHubbFacebookPluginTablesVideoTutorials
 *
 */
class CentralHubbFacebookPluginTablesVideoTutorials extends \WP_List_Table {

    /** @var CentralHubbFacebookPluginConfig $config */
    public $config = null;

    /** @var null $thickBoxUrl */
    public $thickBoxUrl = null;

    /** Class constructor */
    public function __construct() {

        parent::__construct();

        $this->config = new CentralHubbFacebookPluginConfig();

        add_action('admin_head', array($this, 'get_css_styles'));
    }

    /**
     * get_css_styles.
     */
    public function get_css_styles() {
        echo '
        <style type="text/css">
                .tablenav.top {
                    display:none;
                }
                .column-preview_image { text-align: left; width:120px !important;}
                .column-title { text-align: left; width:200px !important; }
                .preview-image {
                    width:120px;
                    height:120px;
                    border:1px solid lightgrey;
                }
                .code-container {
                    background-color:#F5F5F5;
                    border: 1px solid #CCCCCC;
                    -webkit-border-radius: 5px;
                    -moz-border-radius: 5px;
                    border-radius: 5px;
                    padding:10px;
                }
            </style>
        ';
    }

    /**
     * column_default.
     *
     * @param object $item
     * @param string $column_name
     * @return mixed
     */
    public function column_default( $item, $column_name ) {
        return $item[ $column_name ];
    }

    /**
     * get_columns.
     *
     * @return array
     */
    function get_columns() {

        $columns = [
            'preview_image' => __( 'Video Tutorial', 'sp' ),
            'title' => __( 'Title', 'sp' ),
            'description' => __( 'Description', 'sp' ),
            'short_code_generate' => __( '', 'sp' ),
        ];

        return $columns;
    }

    /**
     * prepare_items
     */
    public function prepare_items() {
        $this->_column_headers = $this->get_column_info();
        $this->items = $this->get_table_results();
    }

    /**
     * get_table_results.
     *
     * @return array
     */
    public function get_table_results() {

        add_thickbox();

        $this->thickBoxUrl = $this->config->getPluginPathUrl().'ajax/video-tutorial.php?width=800&height=600';

        return [
            [
                'preview_image' => $this->getYoutubeThumbnail('nwLLVgFgTEI'),
                'title' => 'Tutorial Video: How to install Mamp and Wordpress',
                'description' => '',
                'short_code_generate' => '<a name="" href="'.$this->thickBoxUrl.'&video_id=nwLLVgFgTEI" class="thickbox"><button class="button button-info">Watch Tutorial Video</button></a>',
            ],
            [
                'preview_image' => $this->getYoutubeThumbnail('vDKk-ekB7HI'),
                'title' => 'Tutorial Video : How to install wordpress plugins',
                'description' => '',
                'short_code_generate' => '<a name="" href="'.$this->thickBoxUrl.'&video_id=vDKk-ekB7HI" class="thickbox"><button class="button button-info">Watch Tutorial Video</button></a>',
            ],
            [
                'preview_image' => $this->getYoutubeThumbnail('2cbvZf1jIJM'),
                'title' => 'Tutorial Video : How to make a wordpress website in 24 easy steps',
                'description' => '',
                'short_code_generate' => '<a name="" href="'.$this->thickBoxUrl.'&video_id=2cbvZf1jIJM" class="thickbox"><button class="button button-info">Watch Tutorial Video</button></a>',
            ],
            [
                'preview_image' => $this->getYoutubeThumbnail('oTRZYnYQlmo'),
                'title' => 'Tutorial Video : WordPress 101 - Part 1: Create a Theme from Scratch',
                'description' => '',
                'short_code_generate' => '<a name="" href="'.$this->thickBoxUrl.'&video_id=oTRZYnYQlmo" class="thickbox"><button class="button button-info">Watch Tutorial Video</button></a>',
            ],
            [
                'preview_image' => $this->getYoutubeThumbnail('NF6r3Ejpris'),
                'title' => 'Tutorial Video : WordPress 101 - Part 2: How to properly include CSS and JS files',
                'description' => '',
                'short_code_generate' => '<a name="" href="'.$this->thickBoxUrl.'&video_id=NF6r3Ejpris" class="thickbox"><button class="button button-info">Watch Tutorial Video</button></a>',
            ],
            [
                'preview_image' => $this->getYoutubeThumbnail('Sz0z-Gyp3nA'),
                'title' => 'Tutorial Video : WordPress 101 - Part  3: How to create custom menus',
                'description' => '',
                'short_code_generate' => '<a name="" href="'.$this->thickBoxUrl.'&video_id=Sz0z-Gyp3nA" class="thickbox"><button class="button button-info">Watch Tutorial Video</button></a>',
            ],
            [
                'preview_image' => $this->getYoutubeThumbnail('pJ4NTBdvyj4'),
                'title' => 'Tutorial Video : WordPress 101 - Part 4: How to use the Post Loop and custom body class',
                'description' => '',
                'short_code_generate' => '<a name="" href="'.$this->thickBoxUrl.'&video_id=pJ4NTBdvyj4" class="thickbox"><button class="button button-info">Watch Tutorial Video</button></a>',
            ],
            [
                'preview_image' => $this->getYoutubeThumbnail('aUxDz7vXilQ'),
                'title' => 'Tutorial Video : WordPress 101 - Part 5: How to create Custom and Specialized Page Templates',
                'description' => '',
                'short_code_generate' => '<a name="" href="'.$this->thickBoxUrl.'&video_id=aUxDz7vXilQ" class="thickbox"><button class="button button-info">Watch Tutorial Video</button></a>',
            ],
            [
                'preview_image' => $this->getYoutubeThumbnail('ghmdq1hEm14'),
                'title' => 'Tutorial Video : WordPress 101 - Part 6: How to add Theme Features with add_theme_support',
                'description' => '',
                'short_code_generate' => '<a name="" href="'.$this->thickBoxUrl.'&video_id=ghmdq1hEm14" class="thickbox"><button class="button button-info">Watch Tutorial Video</button></a>',
            ],
            [
                'preview_image' => $this->getYoutubeThumbnail('ut5b0gSpV1w'),
                'title' => 'Tutorial Video : WordPress 101 - Part 7: How to add and create Post Formats',
                'description' => '',
                'short_code_generate' => '<a name="" href="'.$this->thickBoxUrl.'&video_id=ut5b0gSpV1w" class="thickbox"><button class="button button-info">Watch Tutorial Video</button></a>',
            ],
            [
                'preview_image' => $this->getYoutubeThumbnail('aSXitOevqA0'),
                'title' => 'Tutorial Video : WordPress 101 - Part 8: How to create Sidebar and Widgets areas',
                'description' => '',
                'short_code_generate' => '<a name="" href="'.$this->thickBoxUrl.'&video_id=aSXitOevqA0" class="thickbox"><button class="button button-info">Watch Tutorial Video</button></a>',
            ],
            [
                'preview_image' => $this->getYoutubeThumbnail('GA--ROatgYM'),
                'title' => 'Tutorial Video : WordPress 101 - Part 9: Edit the query_posts with WP_Query',
                'description' => '',
                'short_code_generate' => '<a name="" href="'.$this->thickBoxUrl.'&video_id=GA--ROatgYM" class="thickbox"><button class="button button-info">Watch Tutorial Video</button></a>',
            ],
            [
                'preview_image' => $this->getYoutubeThumbnail('e8nJMopiH2Q'),
                'title' => 'Tutorial Video : WordPress 101 - Part 10: Filter the WP_Query with categories',
                'description' => '',
                'short_code_generate' => '<a name="" href="'.$this->thickBoxUrl.'&video_id=e8nJMopiH2Q" class="thickbox"><button class="button button-info">Watch Tutorial Video</button></a>',
            ],
            [
                'preview_image' => $this->getYoutubeThumbnail('CUefAciz5m8'),
                'title' => 'Tutorial Video : WordPress 101 - Part 11: The single.php file, tags, edit links and comment template',
                'description' => '',
                'short_code_generate' => '<a name="" href="'.$this->thickBoxUrl.'&video_id=CUefAciz5m8" class="thickbox"><button class="button button-info">Watch Tutorial Video</button></a>',
            ],
            [
                'preview_image' => $this->getYoutubeThumbnail('8Hn3k6Zsp9g'),
                'title' => 'Tutorial Video : WordPress 101 - Part 12: Create a custom search form and manage the search results page',
                'description' => '',
                'short_code_generate' => '<a name="" href="'.$this->thickBoxUrl.'&video_id=8Hn3k6Zsp9g" class="thickbox"><button class="button button-info">Watch Tutorial Video</button></a>',
            ],
            [
                'preview_image' => $this->getYoutubeThumbnail('xEA2zviCakw'),
                'title' => 'Tutorial Video : WordPress 101 - Part 13: Create and manage the Pagination in your blog loop',
                'description' => '',
                'short_code_generate' => '<a name="" href="'.$this->thickBoxUrl.'&video_id=xEA2zviCakw" class="thickbox"><button class="button button-info">Watch Tutorial Video</button></a>',
            ],
            [
                'preview_image' => $this->getYoutubeThumbnail('ArEmwJV6M7s'),
                'title' => 'Tutorial Video : WordPress 101 - Part 14: Edit the menu with the Walker Class - Part 1',
                'description' => '',
                'short_code_generate' => '<a name="" href="'.$this->thickBoxUrl.'&video_id=ArEmwJV6M7s" class="thickbox"><button class="button button-info">Watch Tutorial Video</button></a>',
            ],
            [
                'preview_image' => $this->getYoutubeThumbnail('bTp3Pt_RQmA'),
                'title' => 'Tutorial Video : WordPress 101 - Part 15: Edit the menu with the Walker Class - Part 2',
                'description' => '',
                'short_code_generate' => '<a name="" href="'.$this->thickBoxUrl.'&video_id=\'bTp3Pt_RQmA" class="thickbox"><button class="button button-info">Watch Tutorial Video</button></a>',
            ],
            [
                'preview_image' => $this->getYoutubeThumbnail('wGJ0AgceWS4'),
                'title' => 'Tutorial Video : WordPress 101 - Part 16: How to print the Blog Info',
                'description' => '',
                'short_code_generate' => '<a name="" href="'.$this->thickBoxUrl.'&video_id=wGJ0AgceWS4" class="thickbox"><button class="button button-info">Watch Tutorial Video</button></a>',
            ],
            [
                'preview_image' => $this->getYoutubeThumbnail('5NdoDjukAVQ'),
                'title' => 'Tutorial Video : WordPress 101 - Part 17: How to create a custom Archive and 404 page',
                'description' => '',
                'short_code_generate' => '<a name="" href="'.$this->thickBoxUrl.'&video_id=5NdoDjukAVQ" class="thickbox"><button class="button button-info">Watch Tutorial Video</button></a>',
            ],
            [
                'preview_image' => $this->getYoutubeThumbnail('vSM7w3zzlSU'),
                'title' => 'Tutorial Video : WordPress 101 - Part 18: How to create Custom Post Type - Part 1',
                'description' => '',
                'short_code_generate' => '<a name="" href="'.$this->thickBoxUrl.'&video_id=vSM7w3zzlSU" class="thickbox"><button class="button button-info">Watch Tutorial Video</button></a>',
            ],
            [
                'preview_image' => $this->getYoutubeThumbnail('vVgr1YTQiLY'),
                'title' => 'Tutorial Video : WordPress 101 - Part 19: How to create Custom Post Type - Part 2',
                'description' => '',
                'short_code_generate' => '<a name="" href="'.$this->thickBoxUrl.'&video_id=vVgr1YTQiLY" class="thickbox"><button class="button button-info">Watch Tutorial Video</button></a>',
            ],
            [
                'preview_image' => $this->getYoutubeThumbnail('KPy8a5bHGuo'),
                'title' => 'Tutorial Video : WordPress 101 - Part 20: How to create Custom Taxonomies - Part 1',
                'description' => '',
                'short_code_generate' => '<a name="" href="'.$this->thickBoxUrl.'&video_id=KPy8a5bHGuo" class="thickbox"><button class="button button-info">Watch Tutorial Video</button></a>',
            ],
            [
                'preview_image' => $this->getYoutubeThumbnail('HGJCS-qxEkA'),
                'title' => 'Tutorial Video : WordPress 101 - Part 21: How to create Custom Taxonomies - Part 2',
                'description' => '',
                'short_code_generate' => '<a name="" href="'.$this->thickBoxUrl.'&video_id=HGJCS-qxEkA" class="thickbox"><button class="button button-info">Watch Tutorial Video</button></a>',
            ],
            [
                'preview_image' => $this->getYoutubeThumbnail('XikY24y0wtU'),
                'title' => 'Tutorial Video : WordPress 101 - Part 22: Custom Taxonomy link and user capabilities',
                'description' => '',
                'short_code_generate' => '<a name="" href="'.$this->thickBoxUrl.'&video_id=XikY24y0wtU" class="thickbox"><button class="button button-info">Watch Tutorial Video</button></a>',
            ],
        ];
    }

    /**
     * getYoutubeVideo.
     *
     * @param $videoId
     * @return string
     */
    public function getYoutubeVideo($videoId)
    {
        return '<iframe width="120" height="120" src="https://www.youtube.com/embed/'.$videoId.'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
    }

    /**
     * getYoutubeThumbnail.
     *
     * @param $videoId
     * @return string
     */
    public function getYoutubeThumbnail($videoId = null)
    {
        $html = '';
        $html .= '<a href="'.$this->thickBoxUrl.'&video_id='.$videoId.'" class="thickbox">';
        $html .= '<img src="https://img.youtube.com/vi/'.$videoId.'/default.jpg">';
        $html .= '</a>';

        return $html;
    }

}


