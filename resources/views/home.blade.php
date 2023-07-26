<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
<head>
	<meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

	<title>Welcome</title>

	<!-- Standard Favicon -->
	<link rel="icon" type="image/x-icon" href="{{ asset('frontend') }}/assets/images/favicon.ico" />

	<!-- For iPhone 4 Retina display: -->
	<link rel="apple-touch-icon-precomposed" href="{{ asset('frontend') }}/assets/images/apple-touch-icon-114x114-precomposed.png">

	<!-- For iPad: -->
	<link rel="apple-touch-icon-precomposed" href="{{ asset('frontend') }}/assets/images/apple-touch-icon-72x72-precomposed.png">

	<!-- For iPhone: -->
	<link rel="apple-touch-icon-precomposed" href="{{ asset('frontend') }}/assets/images/apple-touch-icon-57x57-precomposed.png">

	<!-- Library - Google Font Familys -->
	<link href="https://fonts.googleapis.com/css?family=Bentham|Fira+Sans:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Montserrat:400,700|Noto+Serif:400,400i,700,700i|Oswald:200,300,400,500,600,700|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

	<!-- Library -->
    <link href="{{ asset('frontend') }}/assets/css/lib.css" rel="stylesheet">

	<!-- Custom - Common CSS -->
	<link href="{{ asset('frontend') }}/assets/css/plugins.css" rel="stylesheet">
	<link href="{{ asset('frontend') }}/assets/css/elements.css" rel="stylesheet">
	<link href="{{ asset('frontend') }}/assets/css/rtl.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/style.css">

	<!--[if lt IE 9]>
		<script src="js/html5/respond.min.js"></script>
    <![endif]-->

</head>

<body>

	<!-- Loader -->
	{{-- <div id="site-loader" class="load-complete">
		<div class="loader">
			<div class="loader-inner ball-clip-rotate">
				<div></div>
			</div>
		</div>
	</div> --}}
    <!-- Loader /- -->

	@include('frontend.layouts.header')

	<div class="main-container">

		<main class="site-main">

			<!-- Slider Section -->
			<div class="container-fluid no-left-padding no-right-padding slider-section2">
				<!-- Container -->
				<div class="container">
					<!-- Slider Block -->
					<div class="col-md-9 col-sm-12 col-xs-12 slider-block">
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							<!-- Wrapper for slides -->
							<div class="carousel-inner" role="listbox">
								<div class="item active">
									<div class="type-post color-7">
										<div class="entry-cover">
											<a href="#"><img src="{{ asset('frontend') }}/assets/images/slider2-slide.jpg" alt="Slide" /></a>
										</div>
										<div class="entry-content">
											<div class="post-category"><a href="#" title="Economic">Economic</a></div>
											<h3 class="entry-title"><a href="#">No, budget cuts aren't the reason we don't have an Ebola vaccine</a></h3>
											<div class="entry-footer">
												<span class="post-date"><a href="#">08 July, 2016</a></span>
												<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">356</a></span>
												<span class="post-view"><i class="fa fa-eye"></i><a href="#">589</a></span>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="type-post color-7">
										<div class="entry-cover">
											<a href="#"><img src="{{ asset('frontend') }}/assets/images/slider2-slide.jpg" alt="Slide" /></a>
										</div>
										<div class="entry-content">
											<div class="post-category"><a href="#" title="Economic">Economic</a></div>
											<h3 class="entry-title"><a href="#">No, budget cuts aren't the reason we don't have an Ebola vaccine</a></h3>
											<div class="entry-footer">
												<span class="post-date"><a href="#">08 July, 2016</a></span>
												<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">356</a></span>
												<span class="post-view"><i class="fa fa-eye"></i><a href="#">589</a></span>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Controls -->
							<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
								<span class="fa fa-angle-left"></span>
							</a>
							<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
								<span class="fa fa-angle-right"></span>
							</a>
						</div>
					</div><!-- Slider Block /- -->

					<!-- Post -->
					<div class="col-md-3 col-sm-12 col-xs-12 slide-post-block">
						<div class="col-md-12 col-xs-6 no-padding">
							<div class="type-post color-6">
								<div class="entry-cover">
									<a href="#"><img src="{{ asset('frontend') }}/assets/images/slider2-post1.jpg" alt="Post" /></a>
								</div>
								<div class="entry-content">
									<div class="entry-footer">
										<span class="post-date"><a href="#">15 Augest, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">127</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">756</a></span>
									</div>
									<h3 class="entry-title"><a href="#">Australian forces step up Iraq missions</a></h3>
									<a href="#" title="Read Now">READ NOW <i class="fa fa-angle-right"></i></a>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xs-6 no-padding">
							<div class="type-post">
								<div class="entry-cover">
									<a href="#"><img src="{{ asset('frontend') }}/assets/images/slider2-post2.jpg" alt="Post" /></a>
								</div>
								<div class="entry-content">
									<div class="entry-footer">
										<span class="post-date"><a href="#">15 Augest, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">127</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">756</a></span>
									</div>
									<h3 class="entry-title"><a href="#">Steenkamp's death ' <br>horrific'</a></h3>
									<a href="#" title="Read Now">READ NOW <i class="fa fa-angle-right"></i></a>
								</div>
							</div>
						</div>
					</div>
					<!-- Post /- -->
				</div><!-- Container /- -->
			</div><!-- Slider Section /- -->

			<!-- Recent Post -->
			<div class="container-fluid no-left-padding no-right-padding recent-post full-recent-post">
				<div class="section-header">
					<h3>RECENT POSTS</h3>
				</div>
				<!-- Row -->
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-6">
						<!-- Type Post -->
						<div class="type-post color-6">
							<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/recent-post-1-376x299.jpg" alt="Post" /></a></div>
							<div class="entry-content">
								<div class="post-category"><a href="#" title="TECHNOLOGY">TECHNOLOGY</a></div>
								<h3 class="entry-title"><a href="#">Boffins build boxes to  hold sketchy JavaScript</a></h3>
								<p>Reporter is one of the excellent magazine in the world.Newshub magazine reached many readers very soon.</p>
								<div class="entry-footer">
									<span class="post-date"><a href="#">13 November, 2016</a></span>
									<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
									<span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
								</div>
								<a href="#" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
							</div>
						</div><!-- Type Post /- -->
					</div>
					<div class="col-md-3 col-sm-6 col-xs-6">
						<!-- Type Post -->
						<div class="type-post color-1">
							<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/recent-post-2-376x299.jpg" alt="Post" /></a></div>
							<div class="entry-content">
								<div class="post-category"><a href="#" title="TECHNOLOGY">TECHNOLOGY</a></div>
								<h3 class="entry-title"><a href="#">Mahindra To Buy 51% Stake  In Peugeot Motorcycle</a></h3>
								<p>Reporter is one of the excellent magazine in the world.Newshub magazine reached many readers very soon.</p>
								<div class="entry-footer">
									<span class="post-date"><a href="#">15 Augest, 2016</a></span>
									<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">127</a></span>
									<span class="post-view"><i class="fa fa-eye"></i><a href="#">756</a></span>
								</div>
								<a href="#" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
							</div>
						</div><!-- Type Post /- -->
					</div>
					<div class="col-md-3 col-sm-6 col-xs-6">
						<!-- Type Post -->
						<div class="type-post color-2">
							<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/recent-post-3-376x299.jpg" alt="Post" /></a></div>
							<div class="entry-content">
								<div class="post-category"><a href="#" title="Sports">Sports</a></div>
								<h3 class="entry-title"><a href="#">Shane Watson will be Australia's No 3 in ODIs</a></h3>
								<p>Reporter is one of the excellent magazine in the world.Newshub magazine reached many readers very soon.</p>
								<div class="entry-footer">
									<span class="post-date"><a href="#">13 November, 2016</a></span>
									<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
									<span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
								</div>
								<a href="#" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
							</div>
						</div><!-- Type Post /- -->
					</div>
					<div class="col-md-3 col-sm-6 col-xs-6">
						<!-- Type Post -->
						<div class="type-post color-4">
							<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/recent-post-4-376x299.jpg" alt="Post" /></a></div>
							<div class="entry-content">
								<div class="post-category"><a href="#" title="ENTERTAINMENT">ENTERTAINMENT</a></div>
								<h3 class="entry-title"><a href="#">New 'smart' battery sends alerts before overheating </a></h3>
								<p>Reporter is one of the excellent magazine in the world.Newshub magazine reached many readers very soon.</p>
								<div class="entry-footer">
									<span class="post-date"><a href="#">13 November, 2016</a></span>
									<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
									<span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
								</div>
								<a href="#" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
							</div>
						</div><!-- Type Post /- -->
					</div>
				</div><!-- Row /- -->
			</div><!-- Recent Post /- -->

			<!-- Largest Post Block -->
			<div class="container-fluid no-left-padding no-right-padding largest-post-block full-largest-post">
				<!-- Section Header -->
				<div class="section-header">
					<h3>RECENT POSTS</h3>
				</div><!-- Section Header /- -->
				<!-- Row -->
				<div class="row">
					<div class="larg-post-full-container">
						<div class="col-md-3 col-sm-6 col-xs-6 post-box">
							<!-- Type Post -->
							<div class="type-post larg-post color-4">
								<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/largest-post-1-377x559.jpg" alt="Post" /></a></div>
								<div class="entry-content">
									<div class="post-category"><a href="#" title="ENTERTAINMENT">ENTERTAINMENT</a></div>
									<h3 class="entry-title"><a href="#">LG launches L Bello Android smartphone under its L Series</a></h3>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<div class="entry-footer">
										<span class="post-date"><a href="#">13 November, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
									</div>
									<a href="#" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
								</div>
							</div><!-- Type Post /- -->
						</div>

						<div class="col-md-3 col-sm-6 col-xs-6 post-box">
							<!-- Type Post -->
							<div class="type-post larg-post color-7">
								<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/largest-post-2-377x559.jpg" alt="Post" /></a></div>
								<div class="entry-content">
									<div class="post-category"><a href="#" title="ECONOMIC">ECONOMIC</a></div>
									<h3 class="entry-title"><a href="#">WTO ruling likely to increase US chicken exports to India</a></h3>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<div class="entry-footer">
										<span class="post-date"><a href="#">13 November, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
									</div>
									<a href="#" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
								</div>
							</div><!-- Type Post /- -->
						</div>

						<div class="col-md-3 col-sm-6 col-xs-6 post-box">
							<!-- Type Post -->
							<div class="type-post larg-post color-8">
								<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/largest-post-3-377x559.jpg" alt="Post" /></a></div>
								<div class="entry-content">
									<div class="post-category"><a href="#" title="WORLD">WORLD</a></div>
									<h3 class="entry-title"><a href="#">Magnitude 6.3 quake strikes northern Mexico</a></h3>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<div class="entry-footer">
										<span class="post-date"><a href="#">13 November, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
									</div>
									<a href="#" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
								</div>
							</div><!-- Type Post /- -->
						</div>

						<div class="col-md-3 col-sm-6 col-xs-6 post-box">
							<!-- Type Post -->
							<div class="type-post larg-post color-5">
								<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/largest-post-4-377x559.jpg" alt="Post" /></a></div>
								<div class="entry-content">
									<div class="post-category"><a href="#" title="POLICTICS">POLICTICS</a></div>
									<h3 class="entry-title"><a href="#">US drone strikes kill 14 militants in Pakistan</a></h3>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<div class="entry-footer">
										<span class="post-date"><a href="#">13 November, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
									</div>
									<a href="#" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
								</div>
							</div><!-- Type Post /- -->
						</div>

						<div class="col-md-3 col-sm-6 col-xs-6 post-box">
							<!-- Type Post -->
							<div class="type-post larg-post color-8">
								<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/largest-post-5-377x559.jpg" alt="Post" /></a></div>
								<div class="entry-content">
									<div class="post-category"><a href="#" title="WORLD">WORLD</a></div>
									<h3 class="entry-title"><a href="#">Why Vermont’s socialist senator may run for president</a></h3>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<div class="entry-footer">
										<span class="post-date"><a href="#">13 November, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
									</div>
									<a href="#" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
								</div>
							</div><!-- Type Post /- -->
						</div>

						<div class="col-md-3 col-sm-6 col-xs-6 post-box">
							<!-- Type Post -->
							<div class="type-post larg-post color-8">
								<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/largest-post-6-377x559.jpg" alt="Post" /></a></div>
								<div class="entry-content">
									<div class="post-category"><a href="#" title="SPORTS">SPORTS</a></div>
									<h3 class="entry-title"><a href="#">Hamas is not ISIS. Here's why Netanyahu says it is anyway.</a></h3>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<div class="entry-footer">
										<span class="post-date"><a href="#">13 November, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
									</div>
									<a href="#" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
								</div>
							</div><!-- Type Post /- -->
						</div>

						<div class="col-md-3 col-sm-6 col-xs-6 post-box">
							<!-- Type Post -->
							<div class="type-post larg-post color-7">
								<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/largest-post-7-377x559.jpg" alt="Post" /></a></div>
								<div class="entry-content">
									<div class="post-category"><a href="#" title="SPORTS">SPORTS</a></div>
									<h3 class="entry-title"><a href="#">TCS, HCL Tech wipe out nearly Rs 50000 crore investor wealth</a></h3>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<div class="entry-footer">
										<span class="post-date"><a href="#">13 November, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
									</div>
									<a href="#" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
								</div>
							</div><!-- Type Post /- -->
						</div>

						<div class="col-md-3 col-sm-6 col-xs-6 post-box">
							<!-- Type Post -->
							<div class="type-post small-post color-3">
								<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/small-post-1-379x266.jpg" alt="Post" /></a></div>
								<div class="entry-content">
									<div class="post-category"><a href="#" title="BUSINESS">BUSINESS</a></div>
									<h3 class="entry-title"><a href="#">Axis bank cuts base rate by 10 basis</a></h3>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<div class="entry-footer">
										<span class="post-date"><a href="#">13 November, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
									</div>
									<a href="#" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
								</div>
							</div><!-- Type Post /- -->
						</div>

						<div class="col-md-3 col-sm-6 col-xs-6 post-box">
							<!-- Type Post -->
							<div class="type-post small-post color-2">
								<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/small-post-2-379x266.jpg" alt="Post" /></a></div>
								<div class="entry-content">
									<div class="post-category"><a href="#" title="SPORTS">SPORTS</a></div>
									<h3 class="entry-title"><a href="#">WICB will only have dialogue with Players</a></h3>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<div class="entry-footer">
										<span class="post-date"><a href="#">13 November, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
									</div>
									<a href="#" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
								</div>
							</div><!-- Type Post /- -->
						</div>

						<div class="col-md-3 col-sm-6 col-xs-6 post-box">
							<!-- Type Post -->
							<div class="type-post small-post color-6">
								<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/small-post-3-376x299.jpg" alt="Post" /></a></div>
								<div class="entry-content">
									<div class="post-category"><a href="#" title="SPORTS">SPORTS</a></div>
									<h3 class="entry-title"><a href="#">First-generation Moto G back on Flipkart</a></h3>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<div class="entry-footer">
										<span class="post-date"><a href="#">13 November, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
									</div>
									<a href="#" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
								</div>
							</div><!-- Type Post /- -->
						</div>

						<div class="col-md-3 col-sm-6 col-xs-6 post-box">
							<!-- Type Post -->
							<div class="type-post small-post color-5">
								<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/small-post-4-376x299.jpg" alt="Post" /></a></div>
								<div class="entry-content">
									<div class="post-category"><a href="#" title="POLITICS">POLITICS</a></div>
									<h3 class="entry-title"><a href="#">Malaysia calls for SE Asian cooperation on IS threat</a></h3>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<div class="entry-footer">
										<span class="post-date"><a href="#">13 November, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
									</div>
									<a href="#" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
								</div>
							</div><!-- Type Post /- -->
						</div>

						<div class="col-md-3 col-sm-6 col-xs-6 post-box">
							<!-- Type Post -->
							<div class="type-post small-post color-2">
								<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/small-post-5-376x299.jpg" alt="Post" /></a></div>
								<div class="entry-content">
									<div class="post-category"><a href="#" title="SPORTS">SPORTS</a></div>
									<h3 class="entry-title"><a href="#">40 maps and charts that explain sports in America</a></h3>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<div class="entry-footer">
										<span class="post-date"><a href="#">13 November, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
									</div>
									<a href="#" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
								</div>
							</div><!-- Type Post /- -->
						</div>

						<div class="col-md-3 col-sm-6 col-xs-6 post-box">
							<!-- Type Post -->
							<div class="type-post small-post color-4">
								<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/small-post-6-376x299.jpg" alt="Post" /></a></div>
								<div class="entry-content">
									<div class="post-category"><a href="#" title="ENTERTAINMENT">ENTERTAINMENT</a></div>
									<h3 class="entry-title"><a href="#">Turkey Says It Will Aid Kurdish Forces</a></h3>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<div class="entry-footer">
										<span class="post-date"><a href="#">13 November, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
									</div>
									<a href="#" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
								</div>
							</div><!-- Type Post /- -->
						</div>

						<div class="col-md-3 col-sm-6 col-xs-6 post-box">
							<!-- Type Post -->
							<div class="type-post small-post color-2">
								<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/small-post-7-377x266.jpg" alt="Post" /></a></div>
								<div class="entry-content">
									<div class="post-category"><a href="#" title="SPORTS">SPORTS</a></div>
									<h3 class="entry-title"><a href="#">In the ISL we can learn more than in the I-League</a></h3>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<div class="entry-footer">
										<span class="post-date"><a href="#">13 November, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
									</div>
									<a href="#" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
								</div>
							</div><!-- Type Post /- -->
						</div>

						<div class="col-md-3 col-sm-6 col-xs-6 post-box">
							<!-- Type Post -->
							<div class="type-post small-post color-7">
								<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/small-post-8-377x266.jpg" alt="Post" /></a></div>
								<div class="entry-content">
									<div class="post-category"><a href="#" title="ECONOMIC">ECONOMIC</a></div>
									<h3 class="entry-title"><a href="#">Indigo placed orders 250 planes worth Rs 1.55 lakh</a></h3>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<div class="entry-footer">
										<span class="post-date"><a href="#">13 November, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
									</div>
									<a href="#" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
								</div>
							</div><!-- Type Post /- -->
						</div>

						<div class="col-md-3 col-sm-6 col-xs-6 post-box">
							<!-- Type Post -->
							<div class="type-post larg-post color-5">
								<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/largest-post-8-377x559.jpg" alt="Post" /></a></div>
								<div class="entry-content">
									<div class="post-category"><a href="#" title="POLITICS">POLITICS</a></div>
									<h3 class="entry-title"><a href="#">Growing federalism, rising middle-class to help shape economic</a></h3>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<div class="entry-footer">
										<span class="post-date"><a href="#">13 November, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
									</div>
									<a href="#" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
								</div>
							</div><!-- Type Post /- -->
						</div>

						<div class="col-md-3 col-sm-6 col-xs-6 post-box">
							<!-- Type Post -->
							<div class="type-post small-post color-6">
								<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/small-post-9-377x266.jpg" alt="Post" /></a></div>
								<div class="entry-content">
									<div class="post-category"><a href="#" title="TECHNOLOGY">TECHNOLOGY</a></div>
									<h3 class="entry-title"><a href="#">Import Ban on AnimaL tested Cosmetics</a></h3>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<div class="entry-footer">
										<span class="post-date"><a href="#">13 November, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
									</div>
									<a href="#" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
								</div>
							</div><!-- Type Post /- -->
						</div>

						<div class="col-md-3 col-sm-6 col-xs-6 post-box">
							<!-- Type Post -->
							<div class="type-post small-post color-4">
								<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/small-post-10-377x266.jpg" alt="Post" /></a></div>
								<div class="entry-content">
									<div class="post-category"><a href="#" title="ENTERTAINMENT">ENTERTAINMENT</a></div>
									<h3 class="entry-title"><a href="#">This smart battery warns you before catching fire</a></h3>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<div class="entry-footer">
										<span class="post-date"><a href="#">13 November, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
									</div>
									<a href="#" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
								</div>
							</div><!-- Type Post /- -->
						</div>

						<div class="col-md-3 col-sm-6 col-xs-6 post-box">
							<div class="newsletter-box text-center">
								<h5>Sign Up for the NEWSHUB newsletter and stay in the know</h5>
								<form>
									<input type="text" placeholder="Enter email address" class="form-control" />
									<input type="submit" value="SUBMIT" />
								</form>
							</div>
						</div>

						<div class="col-md-3 col-sm-6 col-xs-6 post-box">
							<!-- Type Post -->
							<div class="type-post small-post color-3">
								<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/small-post-11-377x266.jpg" alt="Post" /></a></div>
								<div class="entry-content">
									<div class="post-category"><a href="#" title="BUSINESS">BUSINESS</a></div>
									<h3 class="entry-title"><a href="#">Sensex trades marginally higher; M&M, Hero Moto </a></h3>
									<p>Reporter is one of the excellent magazine in the world.</p>
									<div class="entry-footer">
										<span class="post-date"><a href="#">13 November, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
									</div>
									<a href="#" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
								</div>
							</div><!-- Type Post /- -->
						</div>

					</div>

				</div><!-- Row -->
			</div><!-- Largest Post Block -->

			<!-- Latest Video -->
			<div class="container-fluid no-left-padding no-right-padding latest-video-block full-latest-video-block">
				<!-- Section Header -->
				<div class="section-header">
					<h3>LATEST VIDEOS</h3>
					<div class="lr-nav">
						<a href="javascript:void(0);" class="nav-left"><i class="fa fa-angle-left"></i></a>
						<a href="javascript:void(0);" class="nav-right"><i class="fa fa-angle-right"></i></a>
					</div>
				</div><!-- Section Header /- -->
				<!-- Row -->
				<div class="row">
					<div id="full_latest_video_block">

						<div class="col-xs-12">
							<!-- Type Post -->
							<div class="type-post format-video color-6">
								<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/full-latest-video-1.jpg" alt="Post" /></a></div>
								<div class="entry-content">
									<div class="post-format"><i class="fa fa-play"></i></div>
									<div class="post-category"><a href="#" title="Technology">Technology</a></div>
									<h3 class="entry-title"><a href="#">Grand Canyon Considers Changes to Back country</a></h3>
									<p>Reporter is one of the excellent magazine in the world.Newshub magazine reached many readers very soon.</p>
									<div class="entry-footer">
										<span class="post-date"><a href="#">15 Augest, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">127</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">756</a></span>
									</div>
									<a href="#" title="WATCH NOW">WATCH NOW <i class="fa fa-play"></i></a>
								</div>
							</div><!-- Type Post /- -->

							<!-- Type Post -->
							<div class="type-post format-video color-8">
								<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/full-latest-video-5.jpg" alt="Post" /></a></div>
								<div class="entry-content">
									<div class="post-format"><i class="fa fa-play"></i></div>
									<div class="post-category"><a href="#" title="Business">Business</a></div>
									<h3 class="entry-title"><a href="#">Grand Canyon Considers Changes to Back country</a></h3>
									<p>Reporter is one of the excellent magazine in the world.Newshub magazine reached many readers very soon.</p>
									<div class="entry-footer">
										<span class="post-date"><a href="#">7 September, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
									</div>
									<a href="#" title="WATCH NOW">WATCH NOW <i class="fa fa-play"></i></a>
								</div>
							</div><!-- Type Post /- -->
						</div>

						<div class="col-xs-12">
							<!-- Type Post -->
							<div class="type-post format-video color-1">
								<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/full-latest-video-2.jpg" alt="Post" /></a></div>
								<div class="entry-content">
									<div class="post-format"><i class="fa fa-play"></i></div>
									<div class="post-category"><a href="#" title="Sports">Sports</a></div>
									<h3 class="entry-title"><a href="#">Mahindra To Buy 51% Stake In Peugeot Motorcycle</a></h3>
									<p>Reporter is one of the excellent magazine in the world.Newshub magazine reached many readers very soon.</p>
									<div class="entry-footer">
										<span class="post-date"><a href="#">15 Augest, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">127</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">756</a></span>
									</div>
									<a href="#" title="WATCH NOW">WATCH NOW <i class="fa fa-play"></i></a>
								</div>
							</div><!-- Type Post /- -->

							<!-- Type Post -->
							<div class="type-post format-video color-6">
								<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/full-latest-video-6.jpg" alt="Post" /></a></div>
								<div class="entry-content">
									<div class="post-format"><i class="fa fa-play"></i></div>
									<div class="post-category"><a href="#" title="TECHNOLOGY">TECHNOLOGY</a></div>
									<h3 class="entry-title"><a href="#">Grand Canyon Considers Changes to Back country</a></h3>
									<p>Reporter is one of the excellent magazine in the world.Newshub magazine reached many readers very soon.</p>
									<div class="entry-footer">
										<span class="post-date"><a href="#">13 November, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
									</div>
									<a href="#" title="WATCH NOW">WATCH NOW <i class="fa fa-play"></i></a>
								</div>
							</div><!-- Type Post /- -->
						</div>

						<div class="col-xs-12">
							<!-- Type Post -->
							<div class="type-post format-video color-5">
								<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/full-latest-video-3.jpg" alt="Post" /></a></div>
								<div class="entry-content">
									<div class="post-format"><i class="fa fa-play"></i></div>
									<div class="post-category"><a href="#" title="Sports">Sports</a></div>
									<h3 class="entry-title"><a href="#">Grand Canyon Considers Changes to Back country</a></h3>
									<p>Reporter is one of the excellent magazine in the world.Newshub magazine reached many readers very soon.</p>
									<div class="entry-footer">
										<span class="post-date"><a href="#">28 Augest, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
									</div>
									<a href="#" title="WATCH NOW">WATCH NOW <i class="fa fa-play"></i></a>
								</div>
							</div><!-- Type Post /- -->

							<!-- Type Post -->
							<div class="type-post format-video color-2">
								<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/full-latest-video-7.jpg" alt="Post" /></a></div>
								<div class="entry-content">
									<div class="post-format"><i class="fa fa-play"></i></div>
									<div class="post-category"><a href="#" title="Science">Science</a></div>
									<h3 class="entry-title"><a href="#">Grand Canyon Considers Changes to Back country</a></h3>
									<p>Reporter is one of the excellent magazine in the world.Newshub magazine reached many readers very soon.</p>
									<div class="entry-footer">
										<span class="post-date"><a href="#">5 July, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
									</div>
									<a href="#" title="WATCH NOW">WATCH NOW <i class="fa fa-play"></i></a>
								</div>
							</div><!-- Type Post /- -->
						</div>

						<div class="col-xs-12">
							<!-- Type Post -->
							<div class="type-post format-video color-3">
								<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/full-latest-video-4.jpg" alt="Post" /></a></div>
								<div class="entry-content">
									<div class="post-format"><i class="fa fa-play"></i></div>
									<div class="post-category"><a href="#" title="Business">Business</a></div>
									<h3 class="entry-title"><a href="#">Grand Canyon Considers Changes to Back country</a></h3>
									<p>Reporter is one of the excellent magazine in the world.Newshub magazine reached many readers very soon.</p>
									<div class="entry-footer">
										<span class="post-date"><a href="#">28 Augest, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">127</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">756</a></span>
									</div>
									<a href="#" title="WATCH NOW">WATCH NOW <i class="fa fa-play"></i></a>
								</div>
							</div><!-- Type Post /- -->

							<!-- Type Post -->
							<div class="type-post format-video color-4">
								<div class="entry-cover"><a href="#"><img src="{{ asset('frontend') }}/assets/images/full-latest-video-8.jpg" alt="Post" /></a></div>
								<div class="entry-content">
									<div class="post-format"><i class="fa fa-play"></i></div>
									<div class="post-category"><a href="#" title="Entertainment">Entertainment</a></div>
									<h3 class="entry-title"><a href="#">Grand Canyon Considers Changes to Back country</a></h3>
									<p>Reporter is one of the excellent magazine in the world.Newshub magazine reached many readers very soon.</p>
									<div class="entry-footer">
										<span class="post-date"><a href="#">5 July, 2016</a></span>
										<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
										<span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
									</div>
									<a href="#" title="WATCH NOW">WATCH NOW <i class="fa fa-play"></i></a>
								</div>
							</div><!-- Type Post /- -->
						</div>
					</div>
				</div><!-- Row /- -->
				<div class="col-md-12 load-more">
					<a href="#" title="Load More">Load More</a>
				</div>
			</div><!-- Latest Video /- -->

		</main>

	</div>

	@include('frontend.layouts.footer')


	<!-- JQuery v1.12.4 -->
	<script src="{{ asset('frontend') }}/assets/js/jquery-1.12.4.min.js"></script>

	<!-- Library - Js -->
	<script src="{{ asset('frontend') }}/assets/js/lib.js"></script>

	<!-- Library - Theme JS -->
	<script src="{{ asset('frontend') }}/assets/js/functions.js"></script>

</body>
</html>
