<?php

require("../serve.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?=$_ENV['APP_NAME']." - ".$_GET['p']?></title>
	<?php
		$cssClases->show();
	?>
</head>
<body>
	<?php
		$navbar->show();
		$head->show();
	?>

	<main class="container-fluid">
		<?php
            $ruta->route();
        ?>
    </main>
	
	<?php 
		$footer->show($_ENV['APP_NAME']);	
	?>

	<!-- Bootstra -->
	<script src="<?=$_ENV['PAGE_SERVE']?>/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	
</body>
</html>