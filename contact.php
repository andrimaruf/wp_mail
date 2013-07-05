<div class="form-contact">
	<div id="node"></div>
	<form name="contact-form" id="form-contact" method="POST">
		<textarea name="message" id="message" placeholder="Message . . ."></textarea>
		<input type="text" name="name" id="name" placeholder="Your Name . . .">
		<input type="text" name="email" id="email" placeholder="Your Email . . .">
		<input type="text" name="subject" id="subject" placeholder="Subject . . ."><br />
		<input type="hidden" name="action" value="contact-form">
		<input type="hidden" name="verify" value="<?php echo wp_create_nonce( 'andri' ); ?>">
		<input id="submit-contact" type="submit" value="SUBMIT">
	</form>
</div>
