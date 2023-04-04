<?php

require_once 'getRandom.php';
require_once 'getSort.php';
$data = getRandom(3, 10);

?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<title>Задание #4</title>
		<meta charset="utf-8">
    	<link rel="stylesheet" href="css/reset.css">
    	<link rel="stylesheet" href="css/style.css">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<div style="margin: 20px" class="wrap">
			<div class="wrap-elem">
			<?php
			echo "Исходный массив: ";		
				echo '<pre>';
				print_r($data);
				echo '</pre>';
			?>
			</div>
			<div class="wrap-elem">
			<?php
			echo "Отсортированный массив: ";		
			echo '<pre>';
				for($i = 0; $i < count($data); $i++) {
					$data[$i] = getSort($data[$i]);
				}
				print_r($data);
			echo '</pre>';
			?>
			</div>
		</div>
	</body>
</html>