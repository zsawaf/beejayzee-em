<?php  
/**
 * This file handles all social media APIs on the backend.
 *
 * Front end communicates with this file. 
 */
class BJZM_SocialMedia {

	/**
	 * Define all private variables
	 */
	private $twitter_auth = array(
		'oauth_consumer_key' => '',
		'oauth_nonce' => '',
		'oauth_signature_method' => '',
		'oauth_token' => '',
		'oauth_timestamp' => '',
		'oauth_version' => ''
	);

	private $twitter_request = array(
		'count' => 0,
		'screen_name' => ''
	);

	private $instagram_auth = array(
		'token' => '',
		'user_id' => '',
		'count' => 0
	);

	private $instagram_feed = array();
	private $twitter_feed = array();

	private $social_media_options = array();

	public function __construct() {

		// get all relevant data from bjzm
		$this->social_media_options = get_option( 'social_media' );

		// populate social media arrays
		$this->set_socialmedia_auth();

		// add shortcodes
		add_action( 'wp_ajax_nopriv_get_instagram', array($this, 'get_instagram' ));
		add_action( 'wp_ajax_get_instagram', array($this, 'get_instagram' ));

		add_action( 'wp_ajax_nopriv_get_twitter', array($this, 'get_twitter' ));
		add_action( 'wp_ajax_get_twitter', array($this, 'get_twitter' ));
	}

	/**
	 * Set Instagram and Twitter private arrays to be used for API calls. 
	 */
	private function set_socialmedia_auth() {
		$this->_set_twitter_auth(); // setup twitter curl
		$this->_set_instagram_auth(); // setup instagram curl
	}
	/**
	 * Call instagram API
	 */
	public function get_instagram() {
		// $token is our unique credential for accessing the Instagram API
		$token = $this->instagram_auth['token'];
	
		// $baseURL is where we are making the call to, we'll add on the appropriate endpoints below
		$baseUrl = 'https://api.instagram.com/v1/';
		$user_id = $this->instagram_auth['user_id'];
		$count = $this->instagram_auth['count'];

		$url = "";
		$url .= $baseUrl;
		/*https://smashballoon.com/instagram-feed/find-instagram-user-id/*/
		$url .= "users/".$user_id."/media/recent/";
		$url .= '?count='.$count;
		$url .= '&access_token='.$token;


		// get the contents of the url --> They will be returned as a JSON string
		$data = file_get_contents($url);
		// Now return that JSON string to the callback in our $.ajax call
		echo $data;
		exit();
	}

	/**
	 * Call twitter API
	 */
	public function get_twitter() {
		$request = $this->twitter_request;
		$screen_name = $request['screen_name'];
		$oauth = $this->twitter_auth;

		// combine request and oauth in one array
		$oauth = array_merge($oauth, $request);
		 
		// make base string
		$baseURI="https://api.twitter.com/1.1/statuses/$screen_name.json";
		$method="GET";
		$params=$oauth;
		 
		$r = array();
		ksort($params);
		foreach($params as $key=>$value){
		    $r[] = "$key=" . rawurlencode($value);
		}
		$base_info = $method."&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
		$composite_key = rawurlencode($this->social_media_options['t_consumer_key']) . '&' . rawurlencode($this->social_media_options['t_token_secret']);
		 
		// get oauth signature
		$oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
		$oauth['oauth_signature_method'] = $oauth_signature;

		// make request
		// make auth header
		$r = 'Authorization: OAuth ';
		 
		$values = array();
		foreach($oauth as $key=>$value){
		    $values[] = "$key=\"" . rawurlencode($value) . "\"";
		}
		$r .= implode(', ', $values);
		 
		// get auth header
		$header = array($r, 'Expect:');
		 
		// set cURL options
		$options = array(
		    CURLOPT_HTTPHEADER => $header,
		    CURLOPT_HEADER => false,
		    CURLOPT_URL => "https://api.twitter.com/1.1/statuses/user_timeline.json?". http_build_query($request),
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_SSL_VERIFYPEER => true
		);

		$feed = curl_init();
		curl_setopt_array($feed, $options);
		$json = curl_exec($feed);
		print_r($json);
		curl_close($feed);
		 
		// decode json format tweets
		$tweets=json_decode($json, true);

		exit();
	}


	/**
	 * HELPER METHODS
	 */
	
	
	/**
	 * Set twitter array to be accessed in twitter API call.
	 */
	private function _set_twitter_auth() {
		$this->twitter_auth['oauth_consumer_key'] = $this->social_media_options['t_consumer_key'];
		$this->twitter_auth['oauth_nonce'] = time();
		$this->twitter_auth['signature_method'] = 'HMAC-SHA1';
		$this->twitter_auth['oauth_version'] = '1.0';
		$this->twitter_auth['oauth_timestamp'] = time();
		$this->twitter_auth['oauth_token'] = $this->social_media_options['t_token'];

		$this->twitter_request['count'] = $this->social_media_options['t_count'];
		$this->twitter_request['screen_name'] = $this->social_media_options['t_screen_name'];
	}

	/**
	 * Set instagram private array to be accessed in Instagram API call.
	 */
	private function _set_instagram_auth() {
		$this->instagram_auth['token'] = $this->social_media_options['ig_token'];
		$this->instagram_auth['user_id'] = $this->social_media_options['ig_user_id'];
		$this->instagram_auth['count'] = $this->social_media_options['ig_count'];
	}
}



$social_media = new BJZM_SocialMedia();