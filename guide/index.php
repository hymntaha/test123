<!doctype html>
<html lang="en">
<head>
	<?php 
		$company_name = "Joy Cone";
		$company_url = "joycone.com";
	?>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo $company_name; ?> | CMS Training Guide</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	<link rel="shortcut icon" href="/misc/favicon.ico" />
	<!-- google fonts -->
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/jquery.fancybox.css">
	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<script type="text/javascript" src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body id="top">
	<noscript><style>a.fancybox{display:none;}ul.mobile-nav{display:block;}</style></noscript>
	<div id="wrapper">
		<!-- mobile menu -->
		<header id="mobile-menu">
			<div class="mobile-menu-button"><a href="#">open/close</a></div>
				<ul class="mobile-nav">
					<li><a href="#wrapper">table of contents</a></li>
					<li><a href="#intro">intro</a></li>
					<li><a href="#drupal-basics">drupal basics</a></li>
					<li><a href="#header-nav">header/navigation</a></li>
					<li><a href="#front-page">front page</a></li>
					<li><a href="#store-locator">store locator</a></li>
					<li><a href="#sliders">sliders</a></li>
					<li><a href="#footer">footer</a></li>
					<li><a href="#about-us">about us</a></li>
					<li><a href="#kids">kids</a></li>
					<li><a href="#promotions">promotions</a></li>
					<li><a href="#products">products</a></li>
					<li><a href="#food-service">Food Service</a></li>
					<li><a href="#typography">typography</a></li>
					<li class="important"><a href="#important">important info</a></li>
					<li><a href="#resources">resources</a></li>
				</ul>
		</header>
		<aside id="menu">
			<!-- desktop menu -->
			<header id="header">
				<h1><a href="/"><img src="./images/joy_logo.png" alt="<?php echo $company_name; ?>"></a></h1>
				<ul class="nav">
					<li><a href="#wrapper">table of contents</a></li>
					<li><a href="#intro">intro</a></li>
					<li><a href="#drupal-basics">drupal basics</a></li>
					<li><a href="#header-nav">header/navigation</a></li>
					<li><a href="#front-page">front page</a></li>
					<li><a href="#store-locator">store locator</a></li>
					<li><a href="#sliders">sliders</a></li>
					<li><a href="#footer">footer</a></li>
					<li><a href="#about-us">about us</a></li>
					<li><a href="#kids">kids</a></li>
					<li><a href="#promotions">promotions</a></li>
					<li><a href="#products">products</a></li>
					<li><a href="#food-service">Food Service</a></li>
					<li><a href="#typography">typography</a></li>
					<li class="important"><a href="#important">important info</a></li>
					<li><a href="#resources">resources</a></li>
				</ul>
			</header>
		</aside>
		<article id="main">
			<section id="table-of-contents">
				<h2>Table of Contents</h2>
				<br/>
				<ul class="table-of-contents">
					<li><a href="#wrapper">table of contents</a></li>
					<li><a href="#intro">intro</a>
						<ul>
							<li><a href="#logging-in">logging in</a></li>
						</ul>
					</li>
					<li><a href="#drupal-basics">drupal basics</a>
						<ul>
							<li><a href="#which-is-what">which is what</a>
							<li><a href="#navigation-menus">navigation menus</a>
							<li><a href="#blocks">blocks</a>
							<li><a href="#menus">menus</a>
							<li><a href="#content">content</a>
							<li><a href="#users">users</a>
						</ul>
					</li>
					<li><a href="#header-nav">header/navigation</a>
						<ul>
							<li><a href="#header-menu">header menu</a></li>
              <li><a href="#header-promo">header promotion</a></li>
              <li><a href="#header-hook">header hook</a></li>
              <li><a href="#header-social">header social</a></li>
						</ul>
					</li>
					<li><a href="#front-page">front page</a>
						<ul>
							<!--<li><a href="#top-slider">top slider</a></li>-->
             	<li><a href="#food-service-front">food service</a></li>
							<li><a href="#bring-joy-home">bring joy home</a></li>
							<li><a href="#create-joy">create joy</a></li>
							<!--<li><a href="#bottom-slider">bottom slider</a></li>
							<li><a href="#store-locator-block">store locator block</a></li>-->
						</ul>
					</li>
					<li><a href="#store-locator">store locator</a></li>
					<li><a href="#sliders">sliders</a>
						<ul>
							<li><a href="#top-slider">top sliders</a></li>
							<li><a href="#bottom-slider">bottom sliders</a></li>
						</ul>
					</li>
					<li><a href="#footer">footer</a>
						<ul>
							<li><a href="#newsletter">newsletter</a></li>
							<li><a href="#footer-menu">menu</a></li>
						</ul>
					</li>
					<li><a href="#about-us">about us</a>
					</li>
					<li><a href="#kids">kids</a>
						<ul>
							<li><a href="#contest-image">contest image</a></li>
							<li><a href="#kids-image">kids image</a></li>
							<li><a href="#winner-images">winner image</a></li>
						</ul>
					</li>
					<li><a href="#promotions">promotions</a>
						<ul>
							<li><a href="#create-promo">create promotion</a></li>
						</ul>
					</li>
					<li><a href="#products">products</a>
						<ul>
							<li><a href="#product-images">product images</a></li>
							<li><a href="#special-products">tax-exempt and free shipping products</a></li>
						</ul>
					</li>
					<li><a href="#food-service">Food Service</a>
						<ul>
							<li><a href="#cone-compare">Cone Compare</a></li>
							<li><a href="#food-service-shop">Shop</a></li>
							<li><a href="#food-service-packaging">Packaging</a></li>
							<li><a href="#food-service-posters">Posters</a></li>
							<li><a href="#cone-compare-order">Cone Compare Order</a></li>
						</ul>
					</li>
					<li><a href="#typography">typography</a></li>
					<li><a href="#important">important info</a></li>
					<li><a href="#resources">resources</a></li>
				</ul>
				<br/>
				<a class="fancybox" href="images/joycone_homepage.jpg"><img class="lazy" data-original="images/joycone_homepage.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/joycone_homepage.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>
		
			<section id="intro">
				<h2>Introduction</h2>
				<p><?php echo $company_url; ?> is built upon the <strong>Drupal</strong> Content Management system.  <strong>Drupal</strong> allows for easy management of nearly all sections of the site.</p>
                <br>
			</section>
			
			<section id="logging-in">
				<h3>Logging In</h3>
				<p>In order to edit any portion of the site, the user must be logged in.</p>
				<ol>
					<li>Navigate your browser to &nbsp;<a href="/user/login" target="_blank"><?php echo $company_url; ?>/user/login</a></li>
					<li>Enter your <strong>Username</strong> and <strong>Password</strong>
				</ol>
				<a class="fancybox" href="images/admin_login.jpg"><img class="lazy" data-original="images/admin_login.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/admin_login.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The admin menu on the top of the browser window means that you're logged in as a user to Drupal.</p>
				<a class="fancybox" href="images/admin_loggedin01.jpg"><img class="lazy" data-original="images/admin_loggedin01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/admin_loggedin01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>
			
			<section id="drupal-basics">
				<h2>Drupal Basics</h2>
				<p>From the <strong>Drupal</strong> user login, all portions of the site can be accessed by top menu that appears.  This portion of the CMS is referred to as the <strong>Admin Menu</strong></p>
				<a class="fancybox" href="images/admin_drupal.jpg"><img class="lazy" data-original="images/admin_drupal.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/admin_drupal.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The most important areas of the system are as follows:</p>
				<ol>
					<li><strong>Content management > Content</strong></li>
					<li><strong>Content management > Create content</strong></li>
					<li><strong>Site building > Blocks</strong></li>
					<li><strong>Site building > Menus</strong></li>
				</ol>
				<p>This guide will walk through how to edit each.  As you will see, much of Drupal is laid out in a similar manner and uses the same adding, deleting, editing, saving, etc. conventions.</p>
			</section>
			
			<section id="which-is-what">
				<h3>Which is What?</h3>
				<p>You are now ready to edit <?php echo $company_url; ?>, but how do you know what part of the site is what?  The guide details both the <strong>Admin Pages</strong> and the front end website they relate to, by showing images of both.</p>
				<br/>
			</section>
			
			<section id="navigation-menus">
				<h2>Navigation Menus</h2>
				<p>The Main Navigation menu on <?php echo $company_url; ?> is on the under the <?php echo $company_name; ?> logo.</p>
				<a class="fancybox" href="images/navigation_menu.jpg"><img class="lazy" data-original="images/navigation_menu.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/navigation_menu.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The Footer Navigation menu is on the bottom of the site.</p>
				<a class="fancybox" href="images/footer_navigation.jpg"><img class="lazy" data-original="images/footer_navigation.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/footer_navigation.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>
			
			<section id="blocks">
				<h2>Blocks</h2>
				<p>Many of the elements and content of <?php echo $company_name; ?>.com (Front Page, Header, etc.) are <strong>Drupal</strong> content management items.  In order to access the <strong>Blocks</strong> navigate to <strong>Site Building</strong> and click <strong>Blocks.</strong></p>
				<a class="fancybox" href="images/admin_blocks01.jpg"><img class="lazy" data-original="images/admin_blocks01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/admin_blocks01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The <strong>Blocks Page</strong> has a list of the <strong>Block Name</strong>, <strong>Block Location(Where Block Appears),</strong> and <strong>Configure(Editing Block).</strong></p>
				<a class="fancybox" href="images/admin_blocks02.jpg"><img class="lazy" data-original="images/admin_blocks02.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/admin_blocks02.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>All of the <strong>Blocks</strong> have a <strong>WYSIWYG editor</strong>(What You See Is What You Get.) where you enter the content for the blocks. The <strong>Block Name</strong> displays on the <strong>Block Page</strong>. The <strong>Block Content</strong> will let you edit the HTML, make sure you have <strong>PHP code</strong> selected on the bottom.</p>
				<a class="fancybox" href="images/admin_blocks03.jpg"><img class="lazy" data-original="images/admin_blocks03.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/admin_blocks03.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="menus">
				<h2>Navigation Menus</h2>
				<p>The <strong>Menus</strong> for Drupal are located in the Admin Menu portion and are used across the site in various aspects, this site uses links for the header and footer navigation.</p>
				<a class="fancybox" href="images/admin_menus01.jpg"><img class="lazy" data-original="images/admin_menus01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/admin_menus01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The <strong>Menus Page</strong> has a list of the menus, this site only utilizes <strong>Primary Links(Header) and Secondary Links(Footer)</strong>. Clicking on them will bring you to their respective pages.</p>
				<a class="fancybox" href="images/admin_menus02.jpg"><img class="lazy" data-original="images/admin_menus02.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/admin_menus02.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>This list of menus has all the menu items for the navigation, you will be able to reposition them, edit and enable. <strong>Repositioning</strong> changes the order of the menus, after you change the order make sure to <strong>Save Configuration.</strong> Selecting <strong>Edit</strong> will let you change the URL of the menu.</p>
				<a class="fancybox" href="images/admin_menus03.jpg"><img class="lazy" data-original="images/admin_menus03.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/admin_menus03.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The <strong>Path</strong> is the link for the menu item. The <strong>Menu Link Title</strong> is the name of the menu item. These are the only two options you should use, after any changes click <strong>Save.</strong></p>
				<a class="fancybox" href="images/admin_menus04.jpg"><img class="lazy" data-original="images/admin_menus04.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/admin_menus04.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>
			
			<section id="content">
				<h2>Content</h2>
				<p>Hover <strong>Content Management</strong> in the admin menu on top and look for <strong>Content</strong>. Select it to go to the <strong>Content</strong>.</p>
				<a class="fancybox" href="images/admin_content01.jpg"><img class="lazy" data-original="images/admin_content01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/admin_content01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The <strong>Content List</strong> has a large collection of content across the site. You can narrow you search by selecting a <strong>Category</strong> and <strong>Filtering</strong> the list. Example: Selecting <strong>Cake Cups</strong> will give you all the Cake Cup products to edit.</p>
				<a class="fancybox" href="images/admin_content02.jpg"><img class="lazy" data-original="images/admin_content02.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/admin_content02.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The filtered list makes it easier to find content, the main areas to focus is <strong>category is Sugar Cones</strong> this area tells you how your search is filtered. The <strong>Reset</strong> button let's you restart your search from scratch. <strong>Refine</strong> adds another filter to the search to narrow it down further. <strong>Edit</strong> let's you change the content, specifics can be located further in the guide for the different areas of the website.</p>
				<a class="fancybox" href="images/admin_content03.jpg"><img class="lazy" data-original="images/admin_content03.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/admin_content03.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="users">
				<h2>Users</h2>
				<p>Hover on <strong>User Management</strong> for the drop down menu and click <strong>Users.</strong></p>
				<a class="fancybox" href="images/admin_users01.jpg"><img class="lazy" data-original="images/admin_users01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/admin_users01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The <strong>User Page</strong> has a list of users and what their permissions are, you can edit <strong>Roles</strong> and update a user's information from here.</p>
				<a class="fancybox" href="images/admin_users02.jpg"><img class="lazy" data-original="images/admin_users02.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/admin_users02.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>You can update the <strong>Username, E-mail, Password and Role.</strong></p>
				<a class="fancybox" href="images/admin_users03.jpg"><img class="lazy" data-original="images/admin_users03.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/admin_users03.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="header-nav">
				<h2>Header/Navigation</h2>
				<p>The <strong>Header</strong> and <strong>Navigation</strong> is located on the top of the site.</p>
				<a class="fancybox" href="images/header-nav01.jpg"><img class="lazy" data-original="images/header-nav01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/header-nav01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="header-menu">
				<h2>Header Menu</h2>
				<p>The <strong><a href="#menu">Menu</a></strong> area covers how to access and edit the menus, these should have the same number of menu items or it will overwhelm the area.</p>
				<a class="fancybox" href="images/header-nav01.jpg"><img class="lazy" data-original="images/header-nav01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/header-nav01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="header-promo">
				<h2>Header Promotion</h2>
				<p>The header promotion will not appear on the <strong>Food Service Site</strong> and links to the recipes site.</p>
				<a class="fancybox" href="images/header-promo01.jpg"><img class="lazy" data-original="images/header-promo01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/header-promo01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="header-hook">
				<h2>Header Hook</h2>
				<p>The <strong>Header Hook</strong> is just below the navigation menu and to the left. You can update it in the <strong><a href="#blocks">Block</a></strong> area of Drupal.</p>
				<a class="fancybox" href="images/header-hook01.jpg"><img class="lazy" data-original="images/header-hook01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/header-hook01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The admin page for the <strong>Header Hook</strong> controls the copy and should only be updated with proper HTML formatting and appropriate copy.</p>
				<a class="fancybox" href="images/header-hook02.jpg"><img class="lazy" data-original="images/header-hook02.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/header-hook02.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="header-social">
				<h2>Header Social</h2>
				<p>The <strong>Header Social</strong> is just below the navigation menu and to the right. You can update it in the <strong><a href="#blocks">Block</a></strong> area of Drupal.</p>
				<a class="fancybox" href="images/header_social01.jpg"><img class="lazy" data-original="images/header_social01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/header_social01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>Navigate to the <strong>Social Block</strong> by using <a href="#blocks">Block Guide</a>. You should select the configure to edit the content.</p>
				<a class="fancybox" href="images/header_social02.jpg"><img class="lazy" data-original="images/header_social02.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/header_social02.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The admin page for the <strong>Header Social</strong> controls the copy and should only be updated with proper HTML formatting and appropriate copy. If you can't see any copy, click <strong>Disable rich-text</strong> in the <strong>Block Body</strong>.</p>
				<a class="fancybox" href="images/header_social03.jpg"><img class="lazy" data-original="images/header_social03.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/header_social03.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="front-page">
				<h3>Front Page</h3>
				<p><strong>The Front Page</strong> is constructed using <strong><a href="#blocks">Blocks</a></strong> you can edit them by following the guide for blocks. This list will show you how to update each block item and how.</p>
				<a class="fancybox" href="images/front-page01.jpg"><img class="lazy" data-original="images/front-page01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/front-page01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The <strong>Block</strong> page will have a list of the content areas you can update </p>
				<a class="fancybox" href="images/front-page02.jpg"><img class="lazy" data-original="images/front-page02.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/front-page02.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<!--<section id="top-slider">
				<h3>Top Slider</h3>
			</section>-->

			<section id="food-service-front">
				<h3>Food Service Block</h3>
				<p>The <strong>Food Service Block</strong> is located in the <strong><a href="#blocks">Blocks</a></strong> page, shown in the image for <strong>Front Page</strong>.</p>
				<a class="fancybox" href="images/front-page02.jpg"><img class="lazy" data-original="images/front-page02.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/front-page02.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The <strong>Food Service Block</strong> allows you to adjust the HTML for that content area.</p>
				<a class="fancybox" href="images/food_service01.jpg"><img class="lazy" data-original="images/food_service01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/food_service01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="bring-joy-home">
				<h3>Bring Joy Home Block</h3>
				<p>The <strong>Bring Joy Home Block</strong> is located in the <strong><a href="#blocks">Blocks</a></strong> page, shown in the image for <strong>Front Page</strong>.</p>
				<a class="fancybox" href="images/front-page02.jpg"><img class="lazy" data-original="images/front-page02.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/front-page02.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The <strong>Bring Joy Home Block</strong> allows you to adjust the HTML for that content area.</p>
				<a class="fancybox" href="images/bring_joy01.jpg"><img class="lazy" data-original="images/bring_joy01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/bring_joy01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="create-joy">
				<h3>Create Joy</h3>
				<p>The <strong>Create Joy Block</strong> is located in the <strong><a href="#blocks">Blocks</a></strong> page, shown in the image for <strong>Front Page</strong>.</p>
				<a class="fancybox" href="images/front-page02.jpg"><img class="lazy" data-original="images/front-page02.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/front-page02.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The <strong>Create Joy Block</strong> allows you to adjust the HTML for that content area.</p>
				<a class="fancybox" href="images/create_joy01.jpg"><img class="lazy" data-original="images/create_joy01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/create_joy01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="sliders">
				<h3>Sliders</h3>
				<p>The website sliders are located in <strong>Content Management > Content</strong> are of the <strong>Admin Menu</strong>. You can filter the results by <strong>Bottom Home Slider</strong> or <strong>Top Home Slider</strong> to edit them.</p>
				<a class="fancybox" href="images/sliders01.jpg"><img class="lazy" data-original="images/sliders01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/sliders01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>You'll select <strong>Edit</strong> to update the slider and it will take you to the edit slider page.</p>
				<a class="fancybox" href="images/sliders02.jpg"><img class="lazy" data-original="images/sliders02.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/sliders02.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>
	
			<section id="top-slider">
				<h3>Top Slider</h3>
				<p>Navigate to the top <strong>Top Slider</strong> from the content page by selecting the category <strong>Top Home Slider</strong> and clicking <strong>Filter.</strong></p>
				<a class="fancybox" href="images/sliders06.jpg"><img class="lazy" data-original="images/sliders06.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/sliders06.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The <strong>Top Home Slider</strong> page filters the results, select <strong>Edit</strong> to update the specific banner you want.</p>
				<a class="fancybox" href="images/sliders07.jpg"><img class="lazy" data-original="images/sliders07.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/sliders07.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The <strong>Title</strong> for <strong>Top Home Slider</strong> appears in the code for the <strong>ALT</strong> attribute, the user will never see but helps reference the item for search engines. The <strong>Image:*</strong> will appear in the front-end of the site. The dimensions should be <strong>593x459 pixels</strong>.</p>
				<a class="fancybox" href="images/sliders08.jpg"><img class="lazy" data-original="images/sliders08.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/sliders08.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<a class="fancybox" href="images/sliders09.jpg"><img class="lazy" data-original="images/sliders09.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/sliders09.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="bottom-slider">
				<h3>Bottom Slider</h3>
				<p>The edit page for the <strong>Bottom Slider</strong> let's you enter a <strong>Title, Body and Image</strong>. The <strong>Title</strong> is used for internal reference but the <strong>Body</strong> copy will appear on the front-end. Select <strong>Input format</strong> and <strong>PHP code</strong> this will remove any unnecessary HTML tags.</p>
				<a class="fancybox" href="images/sliders03.jpg"><img class="lazy" data-original="images/sliders03.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/sliders03.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The <strong>Image</strong> appears on the front-end and has specific dimensions are <strong>295x195 pixels</strong>, this has to be exact to retain design consistency. Select <strong>Bottom Home Slider</strong> as the <strong>Slider Type:*</strong> and when completed save the content.</p>
				<a class="fancybox" href="images/sliders04.jpg"><img class="lazy" data-original="images/sliders04.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/sliders04.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The <strong>Image</strong> and <strong>Body</strong> are displayed and highlighted.</p>
				<a class="fancybox" href="images/sliders05.jpg"><img class="lazy" data-original="images/sliders05.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/sliders05.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="store-locator">
				<h3>Store Locator</h3>
				<p>Navigate to the admin menu at the top and go to <strong>Site Building > Upload Store List</strong>.</p>
				<a class="fancybox" href="images/store_list01.jpg"><img class="lazy" data-original="images/store_list01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/store_list01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The <strong>Store Locator</strong> page has a <strong>Download current store list</strong> link in the top right. This will give you a CSV to update and upload to Drupal.</p>
				<a class="fancybox" href="images/store_list02.jpg"><img class="lazy" data-original="images/store_list02.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/store_list02.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The <strong>Store Locator</strong> list must retain it's current structure for the header. Updating the list will add to the database, if the list is empty it will <strong>NOT</strong> delete your current store list. Deleting anything from the list requires an X in front of the ID.</p>
				<a class="fancybox" href="images/store_list03.jpg"><img class="lazy" data-original="images/store_list03.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/store_list03.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>You'll need to choose the file you updated from it's directory. After selecting the file you'll <strong>Upload store list.</strong></p>
				<a class="fancybox" href="images/store_list04.jpg"><img class="lazy" data-original="images/store_list04.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/store_list04.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<a class="fancybox" href="images/store_list05.jpg"><img class="lazy" data-original="images/store_list05.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/store_list05.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>After you update the list you can check the store locator page and select <strong>List View.</strong></p>
				<a class="fancybox" href="images/store_list06.jpg"><img class="lazy" data-original="images/store_list06.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/store_list06.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="footer">
				<h3>Footer</h3>
				<p>The <strong>Footer</strong> is on the bottom of the website and holds an expanded navigation to other pages.</p>
				<a class="fancybox" href="images/footer01.jpg"><img class="lazy" data-original="images/footer01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/footer01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="newsletter">
				<h3>Sign Up Link Banner</h3>
				<p>The Sign Up Link can be updated as a <strong><a href="#blocks">Block.</a></strong> You can navigate to it from the Admin Menu.</p>
				<a class="fancybox" href="images/admin_blocks01.jpg"><img class="lazy" data-original="images/admin_blocks01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/admin_blocks01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p><strong>The Footer Banner</strong> has the <strong>Sign Up Link Banner</strong> that you can <strong>Configure</strong> and update the HTML.</p>
				<a class="fancybox" href="images/sign_up_footer01.jpg"><img class="lazy" data-original="images/sign_up_footer01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/sign_up_footer01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The <strong>Block Body</strong> allows you to update the HTML, this should only be updated by someone familiar with HTML structure.</p>
				<a class="fancybox" href="images/sign_up_footer02.jpg"><img class="lazy" data-original="images/sign_up_footer02.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/sign_up_footer02.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="about-us">
				<h3>About Us</h3>
				<p><strong>About Us</strong> page can be updated from <strong><a href="#content">Content</a></strong> -> <strong>Content Management.</strong></p>
				<p>While on the <strong>Content Page</strong> you'll need to filter by <strong>type</strong> and select <strong>About Us Page</strong>. This will give you the content you'll need to <strong>edit</strong> to make changed on the page. Make sure you select <strong>edit</strong> on the right of the <strong>About Us</strong> title.</p>
				<a class="fancybox" href="images/about_us01.jpg"><img class="lazy" data-original="images/about_us01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/about_us01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>When editing the content you'll be updating the <strong>Body</strong>. It has the copy that's displayed on the page.</p>
				<a class="fancybox" href="images/about_us02.jpg"><img class="lazy" data-original="images/about_us02.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/about_us02.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="kids">
				<h3>Kids</h3>
				<p>The <strong>Kids</strong> page has three content types to manage and each will be covered.</p>
				<p>When <strong>Creating Content</strong> you'll need follow the guide and update each portion of the page.</p>
				<a class="fancybox" href="images/kids-content01.jpg"><img class="lazy" data-original="images/kids-content01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/kids-content01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="contest-image">
				<h3>Kids Contest Image</h3>
				<p>After you select <strong>Create Content > Kids Contest Image</strong> you'll go to the content page.</p><br>
				<ul>
					<li>The <strong>Image</strong> appears in the frame of the <strong>Kids Page</strong> and should have a dimension of 500 by 610 pixels.</li>
					<li>The Print PDF is a higher quality version of the website image, for the user to color.</li>
					<li>The Title is for finding the contest on Drupal and is not seen by the user.</li>
					<li>Scheduling options let's you put in the date/time for when the contest will start and end on.</li>
				</ul>
				<a class="fancybox" href="images/kids-contest01.jpg"><img class="lazy" data-original="images/kids-contest01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/kids-contest01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The front-end displays the Image and Print PDF.</p>
				<a class="fancybox" href="images/kids-contest02.jpg"><img class="lazy" data-original="images/kids-contest02.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/kids-contest02.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="kids-image">
				<h3>Kids Image</h3>
				<p>After you select <strong>Create Content > Kids Image</strong> it will take you to a similar page as <strong>Kids Contest Image</strong> but this is an archiving of old coloring contests that can also be printed up.</p>
				<a class="fancybox" href="images/kids-image01.jpg"><img class="lazy" data-original="images/kids-image01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/kids-image01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The front-end displays the information, test the PDF and check the image.</p>
				<a class="fancybox" href="images/kids-image02.jpg"><img class="lazy" data-original="images/kids-image02.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/kids-image02.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="winner-images">
				<h3>Kids Winner Image</h3>
				<p>The Kids Winner Image allows the administrator to add a Title, Facebook Link, Images(age groups) and Scheduling Options.</p><br>
				<ul>
					<li>You can add the image for the winner.</li>
					<li>The name of the winner.</li>
					<li>The location of the winner.</li>
				</ul>
				<a class="fancybox" href="images/kids-winner01.jpg"><img class="lazy" data-original="images/kids-winner01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/kids-winner01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The front end display the information by rotating the winner's image and updating the copy for the current scheduled winners, which the administrator has to define.</p>
				<a class="fancybox" href="images/kids-winner02.jpg"><img class="lazy" data-original="images/kids-winner02.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/kids-winner02.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="promotions">
				<h3>Promotions</h3>
				<p>The <strong>Promotions Page</strong> has the current promotions.</p>
				<a class="fancybox" href="images/promo01.jpg"><img class="lazy" data-original="images/promo01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/promo01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="create-promo">
				<h3>Create Promotions</h3>
				<p>The <strong>Promotions</strong> are created using <strong>Promotion Blocks.</strong> To create a <strong>Promotion</strong> you'll need to navigate to <strong>Content Management > Create Content > Promotion Block. (Create Promotion)</strong></p>
				<a class="fancybox" href="images/create-promo01.jpg"><img class="lazy" data-original="images/create-promo01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/create-promo01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>When selecting a <strong>Layout</strong> you need to have a 1/3 width block and a 2/3 block or the space will appear empty.</p>
				<p>The <strong>Promotions Block</strong> page has a list of choices to select for the design of the promotion. An image that displays the back-end and front-end shows how the information translates.</p>
				<a class="fancybox" href="images/create-promo02.jpg"><img class="lazy" data-original="images/create-promo02.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/create-promo02.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<a class="fancybox" href="images/create-promo03.jpg"><img class="lazy" data-original="images/create-promo03.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/create-promo03.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="products">
				<h3>Products</h3>
				<p>The products page has can be controlled from the <strong>content</strong> page and filtered by type of item. Navigate to <strong>Content Management > Content</strong> and select the category then the dropdown to the right to filter your results.</p>
				<a class="fancybox" href="images/products01.jpg"><img class="lazy" data-original="images/products01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/products01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The information that's posted on the product page is laid out in the image and can be referenced by the front-end screenshot.</p>
				<a class="fancybox" href="images/products02.jpg"><img class="lazy" data-original="images/products02.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/products02.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<a class="fancybox" href="images/products03.jpg"><img class="lazy" data-original="images/products03.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/products03.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="product-images">
				<h3>Product Images</h3>
				<p>In order to upload an <strong>Image</strong> you can click <strong>Choose File</strong> and select the image you want to upload.</p>
				<p>Keeping the image at a low file size is preferred, also known as <strong>optimized.</strong></p>
				<a class="fancybox" href="images/product-images01.jpg"><img class="lazy" data-original="images/product-images01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/product-images01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="special-products">
				<h3>Tax-Exempt and Free Shipping Products</h3>
				<p>In order to mark a product as <strong>tax-exempt</strong>, select <strong>Tax-Exempt</strong> in the category list (under Meta Categories) in addition to the product's actual category (hold down Ctrl while clicking)</p>
				<p>In order to mark a product as having <strong>free shipping</strong>, set its <strong>weight</strong> to <strong>0</strong>.</p>
				<a class="fancybox" href="images/special-products.png"><img class="lazy" data-original="images/special-products.png" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/special-products.png" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>To edit the actual tax rates, navigate to <strong>Store administration > Configuration > Tax rates and settings</strong> to edit any individual tax rate (just like in the old site)</p>
				<a class="fancybox" href="images/tax-rates.png"><img class="lazy" data-original="images/tax-rates.png" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/tax-rates.png" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>
			
			<section id="food-service">
				<h3>Food Service</h3>
				<p>This section covers updating certain areas of the Food Service pages.</p>
				<a class="fancybox" href="images/food_service02.jpg"><img class="lazy" data-original="images/food_service02.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/food_service02.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="cone-compare">
				<h3>Cone Compare</h3>
				<p>The front-end page for <strong>Cone Comparisions</strong> has the transcribed information from the previous <strong>Food Service</strong> site. The image is outlined with the information and where it is displayed from the admin page.</p>
				<a class="fancybox" href="images/cone_compare01.jpg"><img class="lazy" data-original="images/cone_compare01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/cone_compare01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<a class="fancybox" href="images/cone_compare02.jpg"><img class="lazy" data-original="images/cone_compare02.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/cone_compare02.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="food-service-shop">
				<h3>Food Service Shop</h3>
				<p>The <strong>Food Service Shop</strong> products have callouts for related content in the admin section that displays on this front-end page.</p>
				<a class="fancybox" href="images/food_service_shop01.jpg"><img class="lazy" data-original="images/food_service_shop01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/food_service_shop01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The <strong>Admin Page</strong> for <strong>Food Service Shop</strong> product has the basic information and back-end information the user won't see. The <strong>Warehouse</strong> an item is shipped from is not displayed to the user.</p>
				<a class="fancybox" href="images/food_service_shop02.jpg"><img class="lazy" data-original="images/food_service_shop02.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/food_service_shop02.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<a class="fancybox" href="images/food_service_shop04.jpg"><img class="lazy" data-original="images/food_service_shop04.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/food_service_shop04.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="food-service-packaging">
				<h3>Food Service Packaging</h3>
				<p>The packaging list can be updated <a href="/node/25/edit?destination=admin%2Fcontent%2Fnode%3Fpage%3D53">here</a> in the WYSIWYG.</p>
				<a class="fancybox" href="images/food_service_packaging02.jpg"><img class="lazy" data-original="images/food_service_packaging02.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/food_service_packaging02.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<a class="fancybox" href="images/food_service_packaging01.jpg"><img class="lazy" data-original="images/food_service_packaging01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/food_service_packaging01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="food-service-posters">
				<h3>Food Service Posters</h3>
				<p>The <strong>Food Service Posters</strong> can be updated by navigating to <strong>Content Management > Webforms</strong> taking you to the <strong>Webforms</strong> page and selecting <strong>Edit</strong>.</p>
				<a class="fancybox" href="images/food_service_poster01.jpg"><img class="lazy" data-original="images/food_service_poster01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/food_service_poster01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>In the <strong>Admin Menu</strong> is <strong>Webform</strong> this will let you change and update <strong>Poster Fields</strong> in Food Service site.</p>
				<a class="fancybox" href="images/food_service_poster02.jpg"><img class="lazy" data-original="images/food_service_poster02.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/food_service_poster02.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>This page will show you a list of <strong>Posters</strong> that are currently displaying on the front-end page. Select <strong>Edit</strong> to update the items.</p>
				<a class="fancybox" href="images/food_service_poster03.jpg"><img class="lazy" data-original="images/food_service_poster03.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/food_service_poster03.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The top one with the numbers is the displayed information pulled from the original <strong>Food Service Site</strong>. Editing this page is referenced in the callouts in the image below.</p>
				<a class="fancybox" href="images/food_service_poster04.jpg"><img class="lazy" data-original="images/food_service_poster04.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/food_service_poster04.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The product item number is related to the field the user enters.</p>
				<a class="fancybox" href="images/food_service_poster05.jpg"><img class="lazy" data-original="images/food_service_poster05.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/food_service_poster05.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>This will display how the administrated pages are presented to the consumer with callouts for where the information is populated.</p>
				<a class="fancybox" href="images/food_service_poster07.jpg"><img class="lazy" data-original="images/food_service_poster07.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/food_service_poster07.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="cone-compare-order">
				<h3>Cone Compare Order</h3>
				<p>The <strong>Cone Compare</strong> page has a list of products for Food Service and covers ordering the nodes.</p>
				<a class="fancybox" href="images/compare_order01.jpg"><img class="lazy" data-original="images/compare_order01.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/compare_order01.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>Navigate to <strong>Content Management > Taxonomy</strong> and select <strong>List Terms</strong>.</p>
				<a class="fancybox" href="images/compare_order02.jpg"><img class="lazy" data-original="images/compare_order02.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/compare_order02.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>Select <strong>order nodes</strong> on the <strong>List Terms</strong> page and select <strong>order nodes</strong> in the new page.</p>
				<a class="fancybox" href="images/compare_order03.jpg"><img class="lazy" data-original="images/compare_order03.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/compare_order03.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<a class="fancybox" href="images/compare_order04.jpg"><img class="lazy" data-original="images/compare_order04.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/compare_order04.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>The <strong>Order Nodes</strong> page allows you to adjust the ordering of products for <strong>Cone Comparison</strong>. Click and hold the cross icon and you can reorder the items.</p>
				<a class="fancybox" href="images/compare_order05.jpg"><img class="lazy" data-original="images/compare_order05.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/compare_order05.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
				<p>After you change the order click the <strong>Save Order</strong> button at the bottom of the screen.</p>
				<a class="fancybox" href="images/compare_order06.jpg"><img class="lazy" data-original="images/compare_order06.jpg" src="images/grey.gif" alt="<?php echo $company_name; ?>" /></a>
				<noscript><img src="images/compare_order06.jpg" alt="<?php echo $company_name; ?> Guide"></noscript>
			</section>

			<section id="typography">
				<h2>Typography</h2>
				<p><?php echo $company_name; ?> typography uses the Google Font family <strong>raleway</strong> <a href="http://www.google.com/fonts/specimen/Raleway" target="_blank">google.com/fonts/specimen/Raleway</a>
				<br/>
				Default font-size:  14px
				<br/>
				Default line-height: 1.25em or 20px
				<br/>
				Hexidecimal color values:
				<br/>
				<ul>
					<li style="color:black;background:#3592c7;padding:0 6px;">#3592c7</li>
					<li style="color:black;background:#61b4db;padding:0 6px;">#61b4db</li>
					<li style="color:black;background:#016baf;padding:0 6px;">#016baf</li>
					<li style="color:black;background:#e21d38;padding:0 6px;">#e21d38</li>
					<li style="color:black;background:#fcee22;padding:0 6px;">#fcee22</li>
					<li style="color:black;background:#fff9ae;padding:0 6px;">#fff9ae</li>
				</ul>
			</section>

			<section id="important">
				<h2>Important Information</h2>
				<p class="alert">Use <strong>Save</strong> button to save the item you are editing so you don't lose your update.</p>
				<p class="alert">Do not <strong>DELETE</strong> any item, simply <strong>Unpublish</strong> it instead.</p>
				<p>For <strong>Product Description</strong>, in the <strong>WYSIWYG editor</strong> you will be able to format the copy according to conventional HTML tags.  A Paragraph is your standard text.</p>
			</section>
			
			<section id="resources">
				<h2>Resources</h2>
				<p>The following is a list of resources to reference when searching for a particular area of the site (most of these you will be able to navigate from from Drupal's <strong>Admin Menu</strong>):</p>
				<ul>
					<li>Login:  <a href="/user/login" target="_blank"><?php echo $company_url; ?>/user/login</a></li>
					<li>Products/SKUs:  <strong> Content Management > Content</strong></li>
					<li>Drupal's website <a href="https://drupal.org/">https://drupal.org/</a></li>
				</ul>
			</section>
		</article>
	</div>
	
	<div id="back-to-top">
		<a href="#" id="to-top">back to top &uarr;</a>
	</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
<script src="js/jquery.smooth-scroll.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/lazyload.js"></script>
<script src="js/script.js"></script>
<!-- google analytics -->
<script>
	var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
</body>
</html>