<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
	<head>  
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  

		<link rel="stylesheet" href="/videos/application/views/default/style.css" type="text/css" media="screen" />  

		<title>Mega Drop Down Menu</title>  
	</head>  

	<body>  

		<ul id="menu">  
			<li><a href="/" class="drop">Script and Scroll</a></li>
			<li><a href="#" class="drop">News articles</a>  

				<div class="dropdown_1column">  

					<div class="col_1">  

						<ul >  
							<li><a href="#">Apple</a></li>  
							<li><a href="#">Facebook</a></li>  
							<li><a href="#">Windows</a></li>  
							<li><a href="#">Google</a></li>  
							<li><a href="#">Microsoft</a></li>  
							<li><a href="#">Games</a></li>  
						</ul>     
					</div>  
				</div>  
			</li>  
			<li><a href="/videos/" class="drop">Videos</a><!-- Begin Home Item -->  

				<div class="dropdown_2columns"><!-- Begin 2 columns container -->  
					<div class="col_2">  
						<a href="/videos/auth/" class="drop">Sign up/Login</a> 
					</div>  
				</div>

			</li><!-- End Home Item -->  

			<li><a href="#" class="drop">Video Categories</a><!-- Begin 5 columns Item -->  

				<div class="dropdown_5columns"><!-- Begin 5 columns container -->  

					<div class="col_5">  
						<h2>Technology giants...</h2>  
					</div>  

					<div class="col_1">  
						<p class="black_box">Apple</p>  
					</div>  

					<div class="col_1">  
						<p class="black_box">Facebook</p>  
					</div>  

					<div class="col_1">  
						<p class="black_box">Google</p>  
					</div>  

					<div class="col_1">  
						<p class="black_box">Microsoft</p>  
					</div>  

					<div class="col_1">  
						<p class="black_box">Twitter</p>  
					</div>  

					<div class="col_5">  
						<h2>Technologies</h2>  
					</div>  

					<div class="col_1">  
						<p class="black_box">Android</p>  
					</div>  
					<div class="col_1">  
						<p class="black_box">IPhone</p>  
					</div>  
					<div class="col_1">  
						<p class="black_box">Tablets</p>  
					</div>  
					<div class="col_1">  
						<p class="black_box">Kindle</p>  
					</div>  
					<div class="col_1">  
						<p class="black_box">Windows</p>  
					</div>  
				</div><!-- End 5 columns container -->  

			</li><!-- End 5 columns Item -->  

			<li><a href="#" class="drop">Tags</a><!-- Begin 4 columns Item -->  

				<div class="dropdown_4columns"><!-- Begin 4 columns container -->  

					<div class="col_4">  
						<h2>Interesting tags</h2>  
					</div>  

					<div class="col_1">  

						<h3>Today</h3>  
						<ul>  
							<li><a href="#">Tag 1</a></li>  
							<li><a href="#">Tag 2</a></li>  
							<li><a href="#">Tag 3</a></li>  
							<li><a href="#">Tag 4</a></li>  
							<li><a href="#">Tag 5</a></li>  
						</ul>     

					</div>  

					<div class="col_1">  

						<h3>This week</h3>  
						<ul>  
							<li><a href="#">Tag 1</a></li>  
							<li><a href="#">Tag 2</a></li>  
							<li><a href="#">Tag 3</a></li>  
							<li><a href="#">Tag 4</a></li>  
							<li><a href="#">Tag 5</a></li>  
						</ul>     

					</div>  

					<div class="col_1">  

						<h3>This month</h3>  
						<ul>  
							<li><a href="#">Tag 1</a></li>  
							<li><a href="#">Tag 2</a></li>  
							<li><a href="#">Tag 3</a></li>  
							<li><a href="#">Tag 4</a></li>  
							<li><a href="#">Tag 5</a></li>  
						</ul>     

					</div>  
				</div><!-- End 4 columns container -->  

			</li><!-- End 4 columns Item -->  
			<li>
				<form action="/videos/search">
					<input name="q" placeholder="Search videos"/>
					<input type="submit" value="Search"/>
				</form>
			</li>  
		</ul>  

	</body>  

</html>  