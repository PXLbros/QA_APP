<?php
include 'init.php';

$result = array
(
	'error' => ''
);

if ( filter_input(INPUT_POST, 'submit') )
{
	// Include SwiftMailer
	include LIBS_PATH . 'SwiftMailer/swift_required.php';

	if ( isset($_POST['page']) )
	{
		// Title
		$project_title = trim($_POST['project_title']);

		// Generate mail
		$mail_html = '<style>';
		$mail_html .= 'body { font-family: Arial }';
		$mail_html .= 'h1 { text-align: center }';
		$mail_html .= 'caption { font-weight: bold; font-size: 16px; margin-bottom: 6px }';
		$mail_html .= 'table { margin-bottom: 14px; background-color: #EEE; border-radius: 3px; padding: 10px 14px }';
		$mail_html .= 'th, td { text-align: left }';
		$mail_html .= 'th { width: 150px }';
		$mail_html .= 'hr { background-color: #000; color: #000; height: 1px; border: none }';
		$mail_html .= 'td.separator { height: 30px }';
		$mail_html .= '</style>';
		$mail_html .= '<h1>' . $project_title . '</h1>';

		$mail_plain = '# ' . $project_title . ' #' . PHP_EOL . PHP_EOL;

		$_POST = array_reverse($_POST);
		$_POST['page'] = array_reverse($_POST['page']);
		$_POST['description'] = array_reverse($_POST['description']);
		$_POST['steps_to_reproduce'] = array_reverse($_POST['steps_to_reproduce']);

		foreach ( $_POST['page'] as $index => $field )
		{
			$mail_html .= '<table style="width:100%">';

			$num = count($field);

			foreach ( $field as $j => $value )
			{
				$type_name = $types[$index]['name'];

				if ( $j === 0 )
				{
					$mail_html .= '<caption>' . $type_name . '</caption>';
					$mail_plain .= '~ ' . $type_name . ' ~' . PHP_EOL . PHP_EOL;
				}

				$page = trim($_POST['page'][$index][$j]);
				$description = trim($_POST['description'][$index][$j]);
				$steps_to_reproduce = trim($_POST['steps_to_reproduce'][$index][$j]);

				$mail_html .= '<tr>';
				$mail_html .= '<th>Page:</th>';
				$mail_html .= '</tr>';
				$mail_html .= '<tr>';
				$mail_html .= '<td>' . $page . '</td>';
				$mail_html .= '</tr>';
				$mail_html .= '<tr>';
				$mail_html .= '<th>Description:</th>';
				$mail_html .= '</tr>';
				$mail_html .= '<tr>';
				$mail_html .= '<td>' . $description . '</td>';
				$mail_html .= '</tr>';
				$mail_html .= '<tr>';
				$mail_html .= '<th colspan="3">Steps to Reproduce:</th>';
				$mail_html .= '</tr>';
				$mail_html .= '<tr>';
				$mail_html .= '<td colspan="3" class="separator">' . nl2br($steps_to_reproduce) . '</td>';
				$mail_html .= '</tr>';

				$mail_plain .= 'Page: ' . $page . PHP_EOL;
				$mail_plain .= 'Description: ' . $description . PHP_EOL;
				$mail_plain .= 'Steps to Reproduce:' . PHP_EOL . $steps_to_reproduce;

				if ( $num > 0 && ($j < ($num - 1)) )
				{
					$mail_html .= '<tr><td colspan="3"><hr></td></tr>';
					$mail_plain .= PHP_EOL . PHP_EOL . '------------------------------' . PHP_EOL . PHP_EOL;
				}
			}

			$mail_html .= '</table>';
			$mail_plain .= PHP_EOL . PHP_EOL;// . '############################################################' . PHP_EOL . PHP_EOL;
		}

		// Send
		try
		{
			$message = Swift_Message::newInstance()
				->setSubject('QA - ' . $project_title)
				->setFrom(FROM_EMAIL)
				->setTo(TO_EMAIL)
				->setBody($mail_plain)
				->addPart($mail_html, 'text/html');

			$mailer = Swift_Mailer::newInstance(Swift_MailTransport::newInstance());

			$send_result = $mailer->send($message);

			if ( $send_result !== 1 )
			{
				$result['error'] = 'Could not send your message right now!';
			}
		}
		catch ( Swift_RfcComplianceException $e )
		{
			$result['error'] = 'Could not send your message! Make sure your e-mail is correct.';
		}
	}
	else
	{
		$result['error'] = 'No bugs added.';
	}
}
else
{
	$result['error'] = 'Missing POST data.';
}

// Response
header('Content-Type: application/json');

die(json_encode($result));