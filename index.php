<?php
$types = array
(
	array
	(
		'name' => 'Mac Chrome',
		'class' => 'mac-1'
	),
	array
	(
		'name' => 'Mac Safari',
		'class' => 'mac-2'
	),
	array
	(
		'name' => 'Mac Firefox',
		'class' => 'mac-3'
	),
	array
	(
		'name' => 'PC Chrome',
		'class' => 'pc-1'
	),
	array
	(
		'name' => 'PC Firefox',
		'class' => 'pc-2'
	),
	array
	(
		'name' => 'PC IE11',
		'class' => 'pc-3'
	),
	array
	(
		'name' => 'PC IE10',
		'class' => 'pc-4'
	),
	array
	(
		'name' => 'PC IE09',
		'class' => 'pc-5'
	),
	array
	(
		'name' => 'PC IE08',
		'class' => 'pc-6'
	),
	array
	(
		'name' => 'Nexus Portrait',
		'class' => 'nexus-1'
	),
	array
	(
		'name' => 'Nexus Landscape',
		'class' => 'nexus-2'
	),
	array
	(
		'name' => 'iPad Portrait',
		'class' => 'ipad-1'
	),
	array
	(
		'name' => 'iPad Landscape',
		'class' => 'ipad-2'
	),
	array
	(
		'name' => 'iPad2 Portrait',
		'class' => 'ipad2-1'
	),
	array
	(
		'name' => 'iPad2 Landscape',
		'class' => 'ipad2-2'
	),
	array
	(
		'name' => 'iPhone Portrait',
		'class' => 'iphone-1'
	),
	array
	(
		'name' => 'iPhone Landscape',
		'class' => 'iphone-2'
	)
);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,700,100' rel='stylesheet' type='text/css'>
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title>QA App | PXL BROS</title>
		<link href="style/format.css" rel="stylesheet">
	</head>
	
	<body>
		<div id="wrapper">
			<form action="/includes/save.php" method="post" id="formyform">
				<div class="projecttitle">
					<input class="title-input" type="text" name="title" value="Project Title">
				</div>

				<?php foreach ( $types as $index => $type ): ?>
					<div class="accordionButton <?= $type['class'] ?>">
						<h4><?= $type['name'] ?></h4>
						<h4 class="plus">+</h4>
					</div>

					<div class="accordionContent">
						<?php include 'includes/form.php' ?>
					</div>
				<?php endforeach ?>

				<div class="sendreport">
					<input id="sendreportbutton" name="submit" type="submit" value="Submit Report">
				</div>
			</form>
		</div>
		<script src="includes/jquery.min.js"></script>
		<script src="includes/javascript.js"></script>
	</body>

</html>