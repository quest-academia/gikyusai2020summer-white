<!doctype html>
<html lang="ja">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--  fontawesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/challenges.css">
	<title>作ってみた!</title>
</head>

<body>
	<div id="app">
		<header>header</header>

		<main>
			<!--検索フォーム -->
			<!-- ! データ -->
			<div id="form1" class="text-center">
				<form class="py-2" name="search" action="#" method="POST">
					<input type="text" placeholder="&#xf002;" class="fas">
					<button type="submit" class="btn">検索</button>
				</form>
			</div>

			<!-- アワード -->
			<!-- ! データ -->
			<nav class="navbar navbar-expand navbar-light bg-white">
				<ul class="navbar-nav justify-content-around w-100">
					<li class="nav-item">
						<h5 class="font-weight-bold mt-2 text-nowrap">いいねランキング</h5>
					</li>
					<li class="nav-item">
						<img src="/img/king1.png" width="10%" alt="">
						<a href="#">1位〇〇</a>
					</li>
					<li class="nav-item d-none d-sm-block">
						<img src="/img/king2.png" width="10%" alt="">
						<a href="#">2位〇〇</a>
					</li>
					<li class="nav-item d-none d-sm-block">
						<img src="/img/king3.png" width="10%" alt="">
						<a href="#">3位〇〇</a>
					</li>
				</ul>
			</nav>

			<div class="container-fluid">
				<div class="row my-4 ml-3">
					<h4 class="whiteline font-weight-bold">みんなのつくってみた</h4>
				</div>

				<!-- 作ってみた下 -->
				<div class="row justify-content-around pb-5">

					<!-- 作ったメニュー -->
					<div class="col-10 col-md-7 firstborder">
						<div class="row text-center justify-content-center">
							<div class="col-10  col-md-10 h-75 mt-4">

								<!-- ! データ -->
								<h3><span class="mr-5">〇〇〇の</span><span>△△△△</span></h3>
								<img class="mt-3" src="/img/3416847_s.jpg" alt="NO IMAGE" style="width: 80%; height: 50%;">
								<p class="text-justify mt-4"><span class="comment">参考にして作ってみました。
										個人的に辛いのが好きなので、七味をかけてもおいしかったです、あああああああああああああああああああああああああああああああああああ</span></p>

								<div class="reaction text-right">
									<favorite></favorite>
									<p class="text-left small font-weight-lighter">〇件のコメント▼</p>
								</div>
								<!-- ! Vue:slack風にしたい -->
							</div>
						</div>
					</div>

					<!-- 参考レシピ -->
					<!-- ! データ -->
					<div class="col-10 mt-5 col-md-3 h-75 secondborder">
						<!-- 中身 -->
						<div class="row justify-content-center">
							<div class="col-md-10 h-75 mt-4">
								<p>参考レシピ</p>
								<img class="card-img-top" src="/img/3416847_s.jpg" alt="NO IMAGE" style="width: 100%; height: 60%;">
								<p class="text-center mt-4">〇〇〇</p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</main>

		<footer class="bg-warning">footer</footer>
	</div>
	<script src="{{ mix('js/app.js') }}"></script>
</body>

</html>