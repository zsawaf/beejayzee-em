<?php  
	/**
	 * MAKE SURE THE FORM NAMES MATCH THE CUSTOM FIELDS YOU CREATED FOR THE FORM, PRECISELY. 
	 */
?>
<div class="contact">
	<div class="contact__form">
		<div class="container">
			<div class="form__wrapper">
				<form class="contact__form form" accept-charset="utf-8">
					<div class="form__field required">
						<label for="first_name">First Name</label>
						<input type="text" name="first_name">
					</div>
					<div class="form__field required">
						<label for="last_name">Last Name</label>
						<input type="text" name="last_name">
					</div>
					<div class="form__field required">
						<label for="email">Email</label>
						<input type="email" name="email">
					</div>
					<div class="form__field">
						<label for="address">Address</label>
						<input type="text" name="address">
					</div>
					<div class="honeypot">
						<label for="website">Leave Blank</label>
						<input type="text" name="website">
					</div>
					<div class="submit__wrapper">
						<input class="submit_form" type="submit" name="" value="Submit">
					</div>
				</form>
				<div class="form__response"></div>
			</div>
		</div>
	</div>
</div>