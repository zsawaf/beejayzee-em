<?php
/**
 * Create a theme options page. So far supports
 *
 * Instagram:
 * 	- required oauth credentials to call API.
 *
 * Twitter:
 * 	- required oauth credentials to call API.
 * 
 */
class MySettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    private $id_increment = 0;

    private $fields = array(
    	array(
    		'name' => 'ig_token',
    		'value' => 'Token'
    	),
    	array(
    		'name' => 'ig_user_id',
    		'value' => 'User ID'
    	),
    	array(
    		'name' => 'ig_count',
    		'value' => 'Count'
    	),
    	array(
    		'name' => 't_consumer_key',
    		'value' => 'Consumer Key'
    	),
    	array(
    		'name' => 't_consumer_secret',
    		'value' => 'Consumer Secret'
    	),
    	array(
    		'name' => 't_access_token',
    		'value' => 'Access Token'
    	),
    	array(
    		'name' => 't_token_secret',
    		'value' => 'Token Secret'
    	),
    	array(
    		'name' => 't_count',
    		'value' => 'Count'
    	),
    	array(
    		'name' => 't_screen_name',
    		'value' => 'Screen Name'
    	),
    );
    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_theme_settings' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_theme_settings()
    {
        // This page will be under "Settings"
        add_options_page(
            'BJZM Social Media', 
            'BJZM Social Media', 
            'manage_options', 
            'theme_settings', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'social_media' );
        ?>
        <div class="wrap">
            <h1>Theme Settings</h1>
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'social_media_group' );
                do_settings_sections( 'theme_settings' );
                submit_button();
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'social_media_group', // Option group
            'social_media', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'instagram_section', // ID
            'Instagram Credentials', // Title
            array( $this, 'print_section_info' ), // Callback
            'theme_settings' // Page
        );  

        add_settings_section(
        	'twitter_section', 
        	'Twitter Credentials', 
        	array( $this, 'print_section_info' ), 
        	'theme_settings'
        );

        /**
         * Instagram Fields
         */
        $fields = $this->fields;
        add_settings_field(
            $fields[0]['name'], // ID
            $fields[0]['value'], // Title 
            array( $this, 'id_number_callback' ), // Callback
            'theme_settings', // Page
            'instagram_section' // Section           
        );      

        add_settings_field(
            $fields[1]['name'],
            $fields[1]['value'],
            array( $this, 'id_number_callback' ), 
            'theme_settings', 
            'instagram_section'
        );   
        add_settings_field(
            $fields[2]['name'],
            $fields[2]['value'], 
            array( $this, 'id_number_callback' ), 
            'theme_settings', 
            'instagram_section'
        ); 

        /**
         * Twitter Fields
         */
        add_settings_field(
            $fields[3]['name'],
            $fields[3]['value'], 
            array( $this, 'id_number_callback' ), 
            'theme_settings', 
            'twitter_section'
        ); 
        add_settings_field(
            $fields[4]['name'],
            $fields[4]['value'], 
            array( $this, 'id_number_callback' ), 
            'theme_settings', 
            'twitter_section'
        ); 
        add_settings_field(
            $fields[5]['name'],
            $fields[5]['value'], 
            array( $this, 'id_number_callback' ), 
            'theme_settings', 
            'twitter_section'
        ); 
        add_settings_field(
            $fields[6]['name'],
            $fields[6]['value'], 
            array( $this, 'id_number_callback' ), 
            'theme_settings', 
            'twitter_section'
        ); 
        add_settings_field(
            $fields[7]['name'],
            $fields[7]['value'], 
            array( $this, 'id_number_callback' ), 
            'theme_settings', 
            'twitter_section'
        ); 
        add_settings_field(
            $fields[8]['name'],
            $fields[8]['value'], 
            array( $this, 'id_number_callback' ), 
            'theme_settings', 
            'twitter_section'
        ); 
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
		return $input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter theme settings below:';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function id_number_callback()
    {
    	$fields = $this->fields;
    	$id = $this->id_increment;
    	$value = isset( $this->options[$fields[$id]['name']] ) ? esc_attr( $this->options[$fields[$id]['name']]) : '';

    	echo "<input type='text' id='".$fields[$id]["name"]."' name='social_media[".$fields[$id]["name"]."]' value='".$value."' />";

        $this->id_increment += 1;
    }
}

if( is_admin() ) {
	$my_settings_page = new MySettingsPage();
}
    
