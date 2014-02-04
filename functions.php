<?php
//Function mailing

function ajax_form() {
	if(!empty($_POST)) {
		if ( !wp_verify_nonce( $_POST['verify'], 'contact' ) ) die ( 'Security check' );

		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$comments = $_POST['comments'];
		$admin_mail = 'and_drie69@yahoo.com'; 
		
		if($_POST['status'] == 'contact') {
		$subject = 'Message information';

		$message = '<html><body>';
		$message .= '<p>Your message was successfully sent , and this is your messages.</p><br />';
		$message .= '<h1>Your message</h1>';
		$message .= '<table>';
		$message .= '<tr><td width="100px">Name</td><td>'.$name.'</td></tr>';
		$message .= '<tr><td>Email</td><td>'.$email.'</td></tr>';
		$message .= '<tr><td>Subject</td><td>'.$phone.'</td></tr>';
		$message .= '<tr><td>Message</td><td>'.$comments.'</td></tr>';
		$message .= '</table>';
		$message .= '<br />';
		$message .= '<p>Thanks you for yor message, and then please wait for replay message from admin anddrie.com</p>';
		$message .='</body></html>';

		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'To:' . $name . ' <' . $email . '>' . "\r\n";
		$headers .= 'From: Flight Plan Administrator <' .$admin_mail. '>' . "\r\n";	


		$a_subject = 'Incoming messages';

		$a_message = '<html><body>';
		$a_message .= '<p>Someone who sent message in CareerFlightPlan.com , please check his personal data and immediately send the message confirmation, because maybe he is going to become your customers. This is her message.</p> <br />';
		$a_message .= '<table>';
		$a_message .= '<tr><td width="100px">Name</td><td>'.$name.'</td></tr>';
		$a_message .= '<tr><td>Email</td><td>'.$email.'</td></tr>';
		$a_message .= '<tr><td>Subject</td><td>'.$phone.'</td></tr>';
		$a_message .= '<tr><td>Message</td><td>'.$comments.'</td></tr>';
		$a_message .= '</table>';
		$a_message .='</body></html>';

		$a_headers = 'MIME-Version: 1.0' . "\r\n";
		$a_headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$a_headers .= 'To: Flight Plan Management <' . $admin_mail . '>' . "\r\n";
		$a_headers .= 'From: ' . $name . ' <' . $email . '>' . "\r\n";


		$mail = wp_mail($email, $subject, $message, $headers);

		if($email) {
		wp_mail( $admin_mail, $a_subject, $a_message, $a_headers );
		echo '<span class="success">Thank you for leaving a message.</span>';
		}
		die();
		} else {
		echo '<span class="error">' . $error . '</span>';
		die();
		}
	}
}
add_action('wp_ajax_forms', 'ajax_form');
add_action('wp_ajax_nopriv_forms', 'ajax_form');
