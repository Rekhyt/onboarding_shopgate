<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">

		<title>Onboarding Shopgate</title>

		<meta name="description" content="A framework for easily creating beautiful presentations using HTML">
		<meta name="author" content="Timo Ebel">

		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">

		<link rel="stylesheet" href="reveal.js/css/reveal.css">
		<link rel="stylesheet" href="reveal.js/css/theme/shopgate.css" id="theme">

		<!-- Code syntax highlighting -->
		<link rel="stylesheet" href="reveal.js/lib/css/zenburn.css">

		<!-- Printing and PDF exports -->
		<script>
			var link = document.createElement( 'link' );
			link.rel = 'stylesheet';
			link.type = 'text/css';
			link.href = window.location.search.match(/reveal\.js\/print-pdf/gi) ? 'reveal.js/css/print/pdf.css' : 'reveal.js/css/print/paper.css';
			document.getElementsByTagName( 'head' )[0].appendChild( link );
		</script>

		<!--[if lt IE 9]>
		<script src="reveal.js/lib/js/html5shiv.js"></script>
		<![endif]-->
	</head>

	<body>

		<div class="reveal">
			<div class="header" style="display: none;">
				<div class="container">
					<div class="sectionname"></div>
					<div class="logo"><img src="images/logo.png" alt="Shopgate" /></div>
				</div>
				<hr />
			</div>
			
			<div class="footer" style="display: none;"><a href="http://www.shopgate.com" target="_blank">www.shopgate.com</a></div>

			<!-- Any section element inside of this container is displayed as a slide -->
			<div class="slides">
				<section>
					<img src="images/index.png" alt="title" class="clean" />
				</section>
				<section>
					<div style="z-index: 100;">
						<h2>Onboarding Shopgate</h2>
						<h4>As an External Developer</h4>
					</div>
					<img src="images/introduction.png" alt="title" class="clean" />
				</section>

				<section data-name="Introduction">
					<ul>
						<li>...</li>
					</ul>
				</section>

				<section data-name="Contents">
					<ul>
						<li>Which data will Shopgate need?</li>
						<li>Which data will Shopgate give?</li>
						<li>How will Shopgate get it?</li>
						<li>How will customers hit the mobile website?</li>
						<li>An example plugin implementation in PHP.</li>
						<li>Questions left?</li>
					</ul>
				</section>

				<section data-name="Which data does Shopgate need?">
					<ul>
							<li class="fragment">category data</li>
							<li class="fragment">product data</li>
							<li class="fragment">product reviews</li>
							<li class="fragment">a registered customer's data</li>
							<li class="fragment">live stock information</li>
					</ul>
					<br /><br />
					<div class="fragment">all of this depending on the desired level of integration</div>
				</section>

				<section data-name="Which data does Shopgate give?">
					<ul>
							<li class="fragment">customer data upon registration</li>
							<li class="fragment">updates on a registered customer's favourite list</li>
							<li class="fragment">incoming orders</li>
							<li class="fragment">order updates</li>
					</ul>
					<br /><br />
					<div class="fragment">again, all of this depending on the desired level of integration</div>
				</section>

				<section data-name="How will Shopgate get it?">
					<ul>
						<li>Shopgate XML file formats</li>
						<li>Shopgate Plugin API</li>
						<li>Shopgate Merchant API</li>
					</ul>
				</section>

				<section data-name="Shopgate XML file formats">
					<ul>
						<li class="fragment">preferredly on-the-fly generation (via Shopgate Plugin API)</li>
						<li class="fragment">
							formats specified by Shopgate for
							<ul>
								<li>category data</li>
								<li>product data</li>
								<li>product reviews</li>
							</ul>
						</li>
						<li class="fragment">for daily or more frequent imports of the complete catalog</li>
					</ul>
				</section>

				<section data-name="Shopgate Plugin API - 1">
					<ul>
						<li>enables on-the-fly exports of product data</li>
						<li>enables fetching real-time stock information</li>
						<li>enables real-time cart validation (stock, coupons)</li>
					</ul>
				</section>

				<section data-name="Shopgate Plugin API - 2">
					<ul>
						<li>enables pushing new order or order update notifications into your ERP</li>
						<li>enables fetching tax, shipping and payment settings from your ERP on a regular basis</li>
					</ul>
				</section>

				<section data-name="Shopgate Plugin API - 3">
					<ul>
						<li>enables pushing new customer registrations into your ERP</li>
						<li>enables logging in customers that already exist in your ERP</li>
						<li>enables customers to view all their orders in the shopping apps</li>
						<li>enables customers to use synchronized favourite list</li>
					</ul>
				</section>

				<section data-name="Shopgate Merchant API">
					<ul>
						<li>enables fetching new orders or order updates</li>
						<li>enables pushing shipping or cancellation notifications to Shopgate</li>
						<li>enables maintaining an up-to-date list of user agents that from mobile devices</li>
						<li>enables real-time updates of categories or products</li>
					</ul>
				</section>

				<section data-name="How will customers hit the mobile website or apps?">
					<ul>
						<li>let Google know there is an optimized version of every page</li>
						<li>redirect customers from a page on your desktop shop to the corresponding page on the mobile shop</li>
						<li>give users the option to view the desktop site if they choose to</li>
					</ul>
					<br /><br />
					<div class="fragment">All of this functionality already included in the Shopgate Library for PHP.</div>
				</section>

				<section data-name="An example plugin implementation in PHP">
					<p><img src="images/SHOW-ME-THE-CODE-.jpg" alt="SHOW ME THE CODE" title="SHOW ME THE CODE" /></p>
				</section>
			</div>
		</div>

		<script src="reveal.js/lib/js/head.min.js"></script>
		<script src="reveal.js/js/reveal.js"></script>

		<script>
			// Full list of configuration options available at:
			// https://github.com/hakimel/reveal.js#configuration
			Reveal.initialize({
				controls: true,
				progress: true,
				history: true,
				center: true,
				
				transition: 'slide', // none/fade/slide/convex/concave/zoom
				
				// Optional reveal.js plugins
				dependencies: [
					{ src: 'reveal.js/lib/js/classList.js', condition: function() { return !document.body.classList; } },
					{ src: 'reveal.js/plugin/markdown/marked.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
					{ src: 'reveal.js/plugin/markdown/markdown.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
					{ src: 'reveal.js/plugin/highlight/highlight.js', async: true, condition: function() { return !!document.querySelector( 'pre code' ); }, callback: function() { hljs.initHighlightingOnLoad(); } },
					{ src: 'reveal.js/plugin/zoom-js/zoom.js', async: true },
					{ src: 'reveal.js/plugin/notes/notes.js', async: true }
				]
			});
			
			var Shopgate = {
					toggleElement: function(query, hide) {
						document.querySelector(query).style.display = (hide
							? 'none'
							: 'block'
						);
					},
					
					toggleHeaderAndFooter: function(hide) {
						this.toggleElement('.reveal .header', hide);
						this.toggleElement('.reveal .footer', hide);
					},
					
					setTitle: function(title) {
						if (typeof(title) !== 'undefined') {
							document.querySelector('.reveal .header .container .sectionname').innerText = title;
						}
					}
			}
			
			Reveal.addEventListener('ready', function(event) {
				Shopgate.toggleHeaderAndFooter(event.indexh < 2);
				Shopgate.setTitle(event.currentSlide.dataset.name);
			});
			
			Reveal.addEventListener('slidechanged', function(event) {
				Shopgate.toggleHeaderAndFooter(event.indexh < 2);
				Shopgate.setTitle(event.currentSlide.dataset.name);
			});
			
		</script>

	</body>
</html>
