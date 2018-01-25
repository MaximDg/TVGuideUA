<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Moderna - Bootstrap 3 flat corporate template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="" />
	<!-- css -->
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/fancybox/jquery.fancybox.css') }}" rel="stylesheet">
	<link href="{{ asset('css/jcarousel.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/flexslider.css') }}" rel="stylesheet" />

<link rel="stylesheet" href="{{ asset('ui/jquery-ui.css') }}"> <!-- для поисковика -->

	<link href="{{ asset('css/style.css') }}" rel="stylesheet" />
	<!-- Theme skin -->
	<link href="{{ asset('skins/default.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" />
	
	<!-- =======================================================
    Theme Name: Moderna
    Theme URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
	======================================================= -->

</head>

<body>
	<div id="wrapper">
		<!-- start header -->
		<header>
			<div class="navbar navbar-default navbar-static-top background-header">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
						<a class="navbar-brand" href="/"><span>s</span>motri.<span>f</span>ilm</a>
					</div>
					<div class="navbar-collapse collapse ">
						<ul class="nav navbar-nav">
							<li><a href="{{ asset('/') }}">Домашняя</a></li>
							<li><a href="{{ asset('tv-films-all') }}">ТВ</a></li>
							<li><a href="{{ asset('cinema') }}">Кинопрокат</a></li>
							<li><a href="{{ asset('contact') }}">Обратная связь</a></li>
						</ul>
					</div>
				</div>
			</div>
		</header>





@yield('body')

		<footer>			
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="copyright">
								<p>&copy; Moderna Theme. All right reserved.</p>
								<div class="credits">
									<!--
                    All the links in the footer should remain intact.
                    You can delete the links only if you purchased the pro version.
                    Licensing information: https://bootstrapmade.com/license/
                    Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Moderna
                  -->
									<a href="https://bootstrapmade.com/">Free Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
								</div>
							</div>
						</div>

						<div class="col-lg-4">
							<div class="copyright">
								<p class="senk"><strong>Благодарим за сотрудничество:</strong></p>
								<a href="{{ asset('https://tv.i.ua') }}" target="_blank">Сайт tv.i.ua</a>
								<div class="credits">
									<a href="{{ asset('https://kinoafisha.ua/') }}" target="_blank">Сайт kinoafisha.ua</a>
								</div>
							</div>
						</div>
									<!--
									Благодарим за поддержку верхний блок
                  					-->						
						<div class="col-lg-4">
							<ul class="social-network">
								<li><a href="https://ru-ru.facebook.com" data-placement="top" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com" data-placement="top" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.linkedin.com/" data-placement="top" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="https://ru.pinterest.com/" data-placement="top" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a></li>
								<li><a href="https://plus.google.com" data-placement="top" title="Google plus" target="_blank"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
		</footer>
	</div>
	<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
	<!-- javascript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') }}"></script>  <!-- для поисковика -->
	<script src="{{ asset('ui/jquery-ui.js') }}"></script>  <!-- для поисковика -->
	<script src="{{ asset('js/jquery-ui.js') }}"></script>  <!-- для поисковика -->


	<script src="{{ asset('js/jquery.js') }}"></script>
	<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/jquery.fancybox.pack.js') }}"></script>
	<script src="{{ asset('js/jquery.fancybox-media.js') }}"></script>
	<script src="{{ asset('js/google-code-prettify/prettify.js') }}"></script>
	<script src="{{ asset('js/portfolio/jquery.quicksand.js') }}"></script>
	<script src="{{ asset('js/portfolio/setting.js') }}"></script>
	<script src="{{ asset('js/jquery.flexslider.js') }}"></script>
	<script src="{{ asset('js/animate.js') }}"></script>
	<script src="{{ asset('js/custom.js') }}"></script>
	<script src="{{ asset('js/script.js') }}"></script>




</body>

</html>
