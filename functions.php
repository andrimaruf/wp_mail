<?php
//Function mailing

function ajax_contact() {
    if(!empty($_POST)) {
		if ( !wp_verify_nonce( $_POST['verify'], 'andri' ) ) die ( 'Security check' );
		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$msg = $_POST['message'];
		$subjects = $_POST['subject'];
		$admin_mail = 'anddrie@gmail.com';
		$error = "";
		if(!$name) {
			$error .= "Please tell us your name<br/>";
		}
		if(!$email) {
			$error .= "Please tell us your E-Mail address<br/>";
		}
		if(!$msg) {
			$error .= "Please add a message";
		}
		if(empty($error)) {
			$subject = 'Message information';
			
			$message = '<html><body>';
			$message .= '<p>Your message was successfully sent , and this is your messages.</p><br />';
			$message .= '<h1>Your message</h1>';
			$message .= '<table>';
			$message .= '<tr><td width="100px">Name</td><td>'.$name.'</td></tr>';
			$message .= '<tr><td>Email</td><td>'.$email.'</td></tr>';
			$message .= '<tr><td>Subject</td><td>'.$subjects.'</td></tr>';
			$message .= '<tr><td>Message</td><td>'.$msg.'</td></tr>';
			$message .= '</table>';
			$message .= '<br />';
			$message .= '<p>Thanks you for yor message, and then please wait for replay message from admin anddrie.com</p>';
			$message .='</body></html>';

			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'To:' . $name . ' <' . $email . '>' . "\r\n";
			$headers .= 'From: Anddrie Administrator <' .$mailku. '>' . "\r\n";	
				
			
			$a_subject = 'Incoming messages';

			$a_message = '<html><body>';
			$a_message .= '<p>Someone who sent message in raffrey.com , please check his personal data and immediately send the message confirmation, because maybe he is going to become your customers. This is her message.</p> <br />';
			$a_message .= '<table>';
			$a_message .= '<tr><td width="100px">Name</td><td>'.$name.'</td></tr>';
			$a_message .= '<tr><td>Email</td><td>'.$email.'</td></tr>';
			$a_message .= '<tr><td>Subject</td><td>'.$subjects.'</td></tr>';
			$a_message .= '<tr><td>Message</td><td>'.$msg.'</td></tr>';
			$a_message .= '</table>';
			$a_message .='</body></html>';

			$a_headers = 'MIME-Version: 1.0' . "\r\n";
			$a_headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$a_headers .= 'To: Anddrie Management <' . $mailku . '>' . "\r\n";
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
add_action('wp_ajax_contact-form', 'ajax_contact');
add_action('wp_ajax_nopriv_contact-form', 'ajax_contact');
