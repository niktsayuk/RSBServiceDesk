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
        <title>POS Service Desk</title>
	</head>

    <body class="bg-light">
        <footer class="bg-green ">
            <div class="container">
                <img src="img/logo_whte.png" class="m-3">
            </div>
        </footer>

        <main class="container" style="width: 1200px;">
            <div class="bg-white my-5 p-5 rounded">
                <h2 class="my-5 text-center">Авторизация</h2>
                <form action="signin.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    <div class="mt-3 text-center">
                        <label class="form-label">Логин</label> 
                        <input class="form-control" type="text" name="login" >
                    </div>
                    
                    <div class="mt-5 text-center">
                        <label class="form-label">Пароль</label> 
                        <input  class="form-control" type="password" name="password">
                    </div>
                    <?php
                        if (isset($_SESSION['message'])) {
                            echo '<p class="msg text-center text-danger pt-3"> '.$_SESSION['message'].' </p>';
                        }
                        unset($_SESSION['message']);
                    ?>
                    <div class="d-flex align-items-center mt-5">
                        <button type="submit" class="btn bg-green rounded text-white px-3">Войти</button>
                    </div>
                </form>
            </div>
        </main>

        
    </body>
</html>