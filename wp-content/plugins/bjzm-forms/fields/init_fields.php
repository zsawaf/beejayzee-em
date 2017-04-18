<?php

class Field {
	public function __construct($key, $title, $type, $class, $required, $options, $form_id = 'contact') {
		$this->key = $key;
		$this->title = $title;
		$this->type = $type;
		$this->class = $class;
		$this->required = $required;

		$this->options = $options;
	}

	public function get() {
		return ($this->type == "text" ? $this->input_html()  : $this->select_html());
	}

	public function input_html() {
		$html = "<div class='form__field ".($this->required ? 'required' : '')."'><label>$this->title</label><input type='text' name='".$this->key."' class='$this->class'></div>";
		return $html;
	}

	public function select_html() {
		$html = "<div class='form__field'><select name='sanitize_title_with_dashes($this->title)'>";
		foreach($this->options as $option) {
			$html .= "<option value='".sanitize_title_with_dashes($option)."'>$option</option>";
		}
		$html .= "</select></div>";
		return $html;
	}

	public function validate() {
		
	}

}