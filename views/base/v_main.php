<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$title?></title>
	<link rel="canonical" href="<?=$canonical?>">
	<link rel="stylesheet" href="<?=BASE_URL?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=BASE_URL?>/assets/css/main.css">
</head>
<body>
	
	<nav class="site-nav">
		<div class="container">
			
			<ul class="nav">
				<div class="row">
					<li class="nav-item">
						<a class="nav-link" href="<?=BASE_URL?>">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=BASE_URL?>/articles/add">Add</a>
					</li>
			
					<li class="nav-item">
						<a class="nav-link" href="<?=BASE_URL?>/categories/all">All categories</a>
					</li>
					<li style="margin-right : 700px;"></li>		
					<?if($isAuth):?>
							<li class="nav-item">
								<span class="nav-link"><?=$user['login']?></span>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?=BASE_URL?>auth/logout">logout</a>
							</li>
					<?else:?>
						<li class="nav-item">
							<a class="nav-link" href="<?=BASE_URL?>auth/login">login</a>
						</li>
					<?endif;?>
					<li class="nav-item">
						   <a class="nav-link" href="<?=BASE_URL?>auth/register">register</a>
					</li>
				</div>
			</ul>
		</div>
	</nav>
	<div class="site-content">
		<div class="container">
			<?=$content?>
		</div>
	</div>
	<footer class="site-footer">
		<div class="container">
			&copy; site about all
		</div>
	</footer>
</body>
</html>