<?php

class BJZM_Form {
	/**
	 * [BJZM forms]
	 * @param [string] $title        [Title of the form]
	 * @param [string] $confirmation [Success message after form has been submitted]
	 * @param [string] $output 		 [Where to save form data]
	 */
	
	public function __construct($id, $title, $fields, $confirmation, $output) {
		if (!isset($title)) {
			exit("BJZM Forms: can't instantiate a form without a title");
		}

		if (!isset($output)) {
			exit("BJZM Forms: can't instantiate a form without output defined");
		}

		$this->id = $id;

		$this->title = $title;
		$this->confirmation = $confirmation;
		$this->output = $output;

		$this->fields = array();
		$this->input_fields = $fields;

		$this->build_fields();


		// FOR AJAX 
		add_action( 'wp_ajax_nopriv_post_form', array($this, 'post_form' ));
		add_action( 'wp_ajax_post_form', array($this, 'post_form' ));

		$this->validated_data = array();
		$this->errors = false;
		$this->error = "";

	}

	/**
	 * Add Field to form
	 * @param [type] $field_title [this is what the label displays]
	 * @param [type] $field_type  [the field type]
	 * @param [type] $class       [description]
	 */
	public function add($field_title, $field_type, $class, $required, $options) {
		$field_key = $this->id . '-' . sanitize_title_with_dashes($field_title);
		$this->fields[$field_key] = new Field($field_key, $field_title, $field_type, $class, $required, $options);
		
	}

	public function get_field_by_key($field_key) {
		return $this->fields[$field_key];
	}

	public function build_fields() {
		foreach ($this->input_fields as $field) {
			$this->add($field['title'], $field['type'], $field['class'], $field['required'], $field['options']);
		}
	}


	/** Output form */
	public function output() {
		$html = '';
		$html .= '<form class="form '.sanitize_title_with_dashes($this->title).'">';
		foreach($this->fields as $field) {
			$html .= $field->get();
		}
		$html .= '<input type="hidden" id="form_id" name="form_id" value="'.$this->id.'">';
		$html .= '<div class="form__submit"><input type="submit" value="Submit"></div>';
		$html .= '</form><div class="form__response"><h4>'.$this->confirmation.'</h4></div>';		
		echo $html;
	}

	public function post_form() {
		$form_data = $_REQUEST['form_data'];

		$this->validate_form($form_data);
		$this->save_form();

		exit();
	}

	public function validate_form($form_data) {
		//check_ajax_referer( 'bjzm_nonce', 'security' ); // check the nonce

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if ($form_data['website'] != '') {
				$this->errors = true;
				$this->error = "Error submitting form.";
				echo $this->error; 
				exit();
			}
			foreach($form_data as $field => $value) {
				if (strlen($value) == 0) {
					$this->errors = true;
					$this->error = "Required fields cannot be empty"; 
					echo $this->error;
					exit();
				}

				if ($field == "email") {
					$email = $this->strip_input($value);
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						$this->errors = true;
						$this->error = "Invalid email format";
						echo $this->error; 
						exit();
					}
				}

				$this->validated_data[$field] = $this->strip_input($value);
			}
		}
	}

	public function save_form() {
		// create the new registration
		$entry = array(
			'post_title' => $this->validated_data['email'],
			'post_type' => $this->output,
			'post_status' => 'publish'
		);

		$post_id = wp_insert_post($entry);

		foreach($this->validated_data as $field_key => $field_value) {
			update_post_meta($post_id, $field_key, $field_value);
		}
		echo "200";
	}

	public function strip_input($input) {
		$input = trim($input);
		$input = stripslashes($input);
		$input = htmlspecialchars($input);
		return $input;
	}
}

/**
 * Wrapper class to BJZM Form
 */
class BJZM_Forms {
	protected static $bjzm_forms = NULL;

	public function __construct() {
		$this->forms_array = array();

		add_shortcode('print_form', array($this, 'print_form'));
	}

	/**
	 * Add form to array of forms
	 * @param [type] $args [description]
	 */
	public function add_form($args) {
		$this->forms_array[$args['id']] = new BJZM_Form($args['id'], $args['title'], $args['fields'], $args['confirmation'], $args['output']);
	}

	/**
	 * Output the form
	 * @param  [type] $args [description]
	 * @return [type]       [description]
	 */
	public function print_form($args) {
		$a = shortcode_atts( array(
			'id' => 1
		), $args, array($this, 'print_form'));

		$found_form = null;
		foreach ($this->forms_array as $form_id => $form) {
			if ($form_id == $a['id']) {
				$found_form = $form;
				break;
			}
		}

		if ($found_form === null) {
			exit("BJZM Error: No form found with given id");
		}

		$this->forms_array[$a['id']]->output();
	}

	public static function get_instance() {
		NULL === self::$bjzm_forms and self::$bjzm_forms = new self;
		return self::$bjzm_forms;
    }
}

function bjzm_add_form($args) {
	BJZM_Forms::get_instance()->add_form($args);
}


















