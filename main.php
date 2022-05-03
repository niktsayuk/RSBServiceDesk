<?php 
    session_start();
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
        <title>POS Service Desk</title>
	</head>

  <body class="bg-light">
    <footer class="bg-green ">
        <div class="container d-flex justify-content-between align-items-center">
            <img src="img/logo_whte.png" class="m-3">
            <div class="d-flex">
              <a href="vendor/logout.php" class="btn btn-outline-light me-3">Выйти</a>
              <h6 class="text-white mt-3"> <?= $_SESSION['user']['name'] ?> </h6>
            </div>
        </div>
    </footer>

    <main class="container">
        <div class="my-5 rounded">
            <div class="d-flex bg-white p-3 justify-content-between">
                <div class="d-flex">
                    <h2>РП Хабаровск</h2>
                    <button class="btn rounded text-green px-3">изменить</button>
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