<?php
	session_start();
	require_once 'vendor/connect.php';
	require_once 'vendor/data_sql.php';
?>

<div>
	<?php include('models/modal/add_worker.php') ?>
	<?php include('models/modal/add_city.php') ?>
	<?php include('models/modal/add_news.php') ?>
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

	<div class="d-flex bg-white p-3 mb-3">
		<a class="btn rounded btn-green mx-2" data-bs-toggle="modal" data-bs-target="#add_worker">Добавить сотрудника</a>
		<a class="btn rounded btn-green mx-2" data-bs-toggle="modal" data-bs-target="#add_city">Добавить город</a>
		<a class="btn rounded btn-green mx-2" data-bs-toggle="modal" data-bs-target="#add_categories">Добавить категории</a>
		<a class="btn rounded btn-green mx-2" data-bs-toggle="modal" data-bs-target="#add_news">Добавить новость</a>
	</div>

	<div class="accordion" id="accordionExample">

		<div class="accordion-item">
			<h1 class="accordion-header" id="headingOne">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
					Список зарегистрированных сотрудников
				</button>
			</h1>
			<div id="collapse1" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
				<div class="accordion-body">
					<table class="table table-borderless">
						<thead>
							<tr>
								<th scope="col">Номер</th>
								<th scope="col">Профиль</th>
								<th scope="col">ФИО</th>
								<th scope="col">Город</th>
								<th scope="col">Логин</th>
								<th scope="col">Пароль</th>
								<th scope="col">Телефон</th>
								<th scope="col">Действие</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$list_user = mysqli_query($connect, $_SELECT_USER_PROFILE);

								while($user = mysqli_fetch_assoc($list_user))
									echo '<tr>
											<td>'.$user['id'].'</td>
											<td>'.$user['name'].'</td>
											<td>'.$user['full_name'].'</td>
											<td>'.$user['region_city'].'</td>
											<td>'.$user['login'].'</td>
											<td>'.$user['password'].'</td>
											<td>'.$user['phone'].'</td>
											<td>
												<form action="vendor/delete_user.php" method="post">
													<input type="hidden" name="ID" value="'.$user['id'].'">
													<button type="submit" class=" btn btn-outline-danger"> Удалить </button>
												</form>
											</td>
										</tr>';
								
							?>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="accordion-item mt-3">
			<h1 class="accordion-header" id="headingTwo">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
					Список зарегистрированных клиентов
				</button>
			</h1>
			<div id="collapse2" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
				<div class="accordion-body">
					<table class="table table-borderless">
						<thead>
							<tr>
								<th scope="col">Номер</th>
								<th scope="col">Профиль</th>
								<th scope="col">ФИО</th>
								<th scope="col">Город</th>
								<th scope="col">Логин</th>
								<th scope="col">Телефон</th>
								<th scope="col">Действие</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$list_client = mysqli_query($connect, $_SELECT_CLIENT_PROFILE);

								while($client = mysqli_fetch_assoc($list_client))
									echo '<tr>
											<td>'.$client['id'].'</td>
											<td>'.$client['name'].'</td>
											<td>'.$client['full_name'].'</td>
											<td>'.$client['region_city'].'</td>
											<td>'.$client['login'].'</td>
											<td>'.$client['phone'].'</td>
											<td>
												<form action="vendor/delete_user.php" method="post">
													<input type="hidden" name="ID" value="'.$client['id'].'">
													<button type="submit" class=" btn btn-outline-danger"> Удалить </button>
												</form>
											</td>
										</tr>';
								
							?>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="accordion-item mt-3">
			<h1 class="accordion-header" id="headingTwo">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
					Новости платформы
				</button>
			</h1>
			<div id="collapse3" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
				<div class="accordion-body">
					<table class="table table-borderless">
						<thead>
							<tr>
								<th scope="col" >Номер</th>
								<th scope="col" >Тема</th>
								<th scope="col" >Описание</th>
								<th scope="col" >Дата</th>
								<th scope="col" >Действие</th>
							</tr>
						</thead>
						<tbody>
							<?php 

								$list_news = mysqli_query($connect, "SELECT * FROM `news` ORDER BY id DESC");
								while($news = mysqli_fetch_assoc($list_news))
								{
									echo '<tr>
										<td>'.$news['id'].'</td>
										<td>'.$news['title'].'</td>
										<td>'.$news['description'].'</td>
										<td>'.$news['date'].'</td>

										<td class="d-flex">
											<form action="vendor/delete_news.php" method="post">
												<input type="hidden" name="ID" value="'.$news['id'].'">
												<button type="submit" class="mx-2 btn btn-danger"> Удалить </button>
											</form>
										</td>
									</tr>';
								}  
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="accordion-item mt-3">
			<h1 class="accordion-header" id="headingTwo">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
					Список городов
				</button>
			</h1>
			<div id="collapse4" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
				<div class="accordion-body">
					<table class="table table-borderless">
						<thead>
							<tr>
								<th scope="col" >Номер</th>
								<th scope="col" >Региональный центр</th>
								<th scope="col" >Региональный пункт</th>
								<th scope="col" >Действие</th>
							</tr>
						</thead>
						<tbody>
							<?php 

								$list_city = mysqli_query($connect, "SELECT * FROM `city` ORDER BY id DESC");
								while($city = mysqli_fetch_assoc($list_city))
								{
									echo '<tr>
										<td>'.$city['id'].'</td>
										<td>'.$city['region_center'].'</td>
										<td>'.$city['region_city'].'</td>

										<td class="d-flex">
											<form action="vendor/delete_city.php" method="post">
												<input type="hidden" name="ID" value="'.$city['id'].'">
												<button type="submit" class="mx-2 btn btn-danger"> Удалить </button>
											</form>
										</td>
									</tr>';
								}  
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="accordion-item mt-3">
			<h1 class="accordion-header" id="headingTwo">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
					Список категорий
				</button>
			</h1>
			<div id="collapse5" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
				<div class="accordion-body">
					<table class="table table-borderless">
						<thead>
							<tr>
								<th scope="col" >Номер</th>
								<th scope="col" >Название категории</th>
								<th scope="col" >Действие</th>
							</tr>
						</thead>
						<tbody>
							<?php 

								$list_categories = mysqli_query($connect, "SELECT * FROM `categories` ORDER BY id DESC");
								while($categories = mysqli_fetch_assoc($list_categories))
								{
									echo '<tr>
										<td>'.$categories['id'].'</td>
										<td>'.$categories['name'].'</td>

										<td class="d-flex">
											<form action="vendor/delete_categories.php" method="post">
												<input type="hidden" name="ID" value="'.$categories['id'].'">
												<button type="submit" class="mx-2 btn btn-danger"> Удалить </button>
											</form>
										</td>
									</tr>';
								}  
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
