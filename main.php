<?php 
    session_start();
    require_once 'vendor/connect.php'; 
    require_once 'vendor/data_sql.php';
?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link href="style/style.css" rel="stylesheet">
		<link href="http://fonts.cdnfonts.com/css/bahnschrift" rel="stylesheet">
		<link href="style/toast.min.css" rel="stylesheet">
		<script src="style/toast.min.js"></script>
		<script src="style/main.js"></script>
		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js'></script>
		<title>POS Service Desk</title>
	</head>

	<body class="bg-light">
		<?php include('models/modal/add_task.php') ?>
		<?php include('models/modal/add_worker.php') ?>
		<?php include('models/modal/add_client.php') ?>
		<?php include('models/modal/add_city.php') ?>
		<?php include('models/modal/add_news.php') ?>
		<?php include('models/modal/add_categories.php') ?>

		<?php 
		if(isset($_GET['send']) && isset( $_SESSION['message'])) 
			echo "<script> new Tost({
			title: false,
			text: '".$_SESSION['message']."',
			theme: 'light',
			autohide: true,
			interval: 5000
			}); </script>"; 
		?>
		<header class="bg-green ">
			<div class="container d-flex justify-content-between align-items-center">
				<img src="img/logo_whte.png" class="m-3">
				<div class="d-flex">
				<a href="vendor/logout.php" class="btn btn-outline-light me-3">Выйти</a>
				<h6 class="text-white mt-3"> <?= $_SESSION['user']['name'] ?> </h6>
				</div>
			</div>
		</header>

		<main class="container">
			<div class="my-5 rounded">
				<div class="d-flex bg-white p-3 justify-content-between">
					<div class="d-flex">
						<h2 id="title"> РП <?= $_SESSION['user']['city'] ?></h2>
					</div>
					
					<div>
						<h5>Профиль пользователя: <?= $_SESSION['user']['profile'] ?></h5>
					</div>
				</div>

				<?php
				switch($_SESSION['user']['id_profile'])
				{
					case 1:
					include('models/administrator.php');
					break;
					
					case 2:
					include('models/Client.php');
					break;

					case 3:
					include('models/MPTO.php');
					break;
				}
				unset($_SESSION['message']);
				?>
			</div>
		</main>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</body>
</html>