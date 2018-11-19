<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Puppies Shop</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon">
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="navbar-left">
					<a class="navbar-brand glyphicon glyphicon-home" href="/" ></a>
				</div>
				<div class="navbar-right">
					<a class="navbar-brand" href="/#">Vender</a>
					<a class="navbar-brand" href="/compra">Comprar</a>
					<a class="navbar-brand" href="/produto">Produtos</a>
				</div>
			</div>
		</div>
	</nav>
	<main>
		<section class="container-fluid central">
			@yield('content')
		</section>
	</main>
	<nav class="navbar navbar-default navbar-fixed-bottom">
		<div class="left">
			<h3 class="footer-text">Puppies Shop</small></h3>
		</div>
		<div class="right footer-text">
			© 2018 Alessandro Marvão. Todos os direitos reservados.
		</div>
	</nav>
	<script src="/js/app.js" charset="utf-8"></script>
	@stack('scripts')
</body>
</html>