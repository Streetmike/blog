<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$this->title?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" href="/styles/main.css">

</head>
<body>
<div class="container">
	<header class="blog-header py-3">
		<div class="row flex-nowrap justify-content-between align-items-center">
			<div class="col-4 text-center">
				<a class="blog-header-logo text-dark" href="/">My Test Task For Job</a>
			</div>
		</div>
	</header>
</div>
<main role="main" class="container">
	<div class="row">
		<?php include $this->basePath.$tplName.'.php'?>
	</div>
</main>
<footer id="footer" class="footer">
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="float-left">Copyright © 2019</p>
                <p class="float-right">Максим Яворский</p>
            </div>
        </div>
    </div>
</footer>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="/scripts/main.js"></script>
</html>
