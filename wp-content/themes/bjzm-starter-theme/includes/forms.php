<?php
/**
 * Custom forms plugin.
 *
 * For now, need to go to save_form and update fields.
 */
// class BJZM_Forms {

// 	public function __construct() {
// 		add_action( 'wp_ajax_nopriv_post_form', array($this, 'post_form' ));
// 		add_action( 'wp_ajax_post_form', array($this, 'post_form' ));

// 		$this->validated_data = array();
// 		$this->errors = false;
// 		$this->error = "";
// 	}

// 	public function post_form() {
// 		$form_data = $_REQUEST['form_data'];

// 		$this->validate_form($form_data);
// 		$this->save_form();

// 		exit();
// 	}

// 	public function validate_form($form_data) {
// 		check_ajax_referer( 'bjzm_nonce', 'security' ); // check the nonce

// 		if ($_SERVER["REQUEST_METHOD"] == "POST") {
// 			if ($form_data['website'] != '') {
// 				$this->errors = true;
// 				$this->error = "Error submitting form.";
// 				echo $this->error; 
// 				exit();
// 			}
// 			foreach($form_data as $field => $value) {
// 				if (strlen($value) == 0) {
// 					$this->errors = true;
// 					$this->error = "Required fields cannot be empty"; 
// 					echo $this->error;
// 					exit();
// 				}

// 				if ($field == "email") {
// 					$email = $this->strip_input($value);
// 					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
// 						$this->errors = true;
// 						$this->error = "Invalid email format";
// 						echo $this->error; 
// 						exit();
// 					}
// 				}

// 				$this->validated_data[$field] = $this->strip_input($value);
// 			}
// 		}
// 	}

// 	public function save_form() {
// 		// create the new registration
// 		$registration_post = array(
// 			'post_title' => $this->validated_data['email'],
// 			'post_type' => 'registrations',
// 			'post_status' => 'publish'
// 		);

// 		$post_id = wp_insert_post($registration_post);

// 		update_field("field_58ebcaf32c052", $this->validated_data['first_name'], $post_id);
// 		update_field("field_58ebcb012c053", $this->validated_data['last_name'], $post_id);
// 		update_field("field_58ebcb072c054", $this->validated_data['email'], $post_id);
// 		update_field("field_58ebcb0c2c055", $this->validated_data['address'], $post_id);

// 		echo "200";
// 	}

// 	public function strip_input($input) {
// 		$input = trim($input);
// 		$input = stripslashes($input);
// 		$input = htmlspecialchars($input);
// 		return $input;
// 	}
// }