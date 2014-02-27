<?php
include 'init.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title>QA App | PXL BROS</title>
		<link href="/style/fonts.css" rel="stylesheet">
		<link href="/style/format.css" rel="stylesheet">
	</head>
	
	<body>
		<div id="wrapper">
			<form action="/send.php" method="post" id="formyform">
				<input type="hidden" name="submit" value="1">

				<div class="projecttitle">
					<input class="title-input" type="text" name="project_title" id="project_title" value="Project Title">
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

				<!-- Submit Report Button -->
				<div class="sendreport">
					<input id="sendreportbutton" type="submit" value="Submit Report">
				</div>
			</form>
		</div>

		<script src="/includes/jquery.min.js"></script>
		<script src="/includes/javascript.js"></script>
	</body>
</html>