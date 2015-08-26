<?php
$examplePluginBare = <<<'EXAMPLE'
<?php
include('shopgate_library/shopgate.php');

class MyShopgatePlugin extends MyShopgatePlugin {}
EXAMPLE;
?>
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
				<div class="hr"></div>
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
					<ol>
						<li>The Shopgate Infra Structure</li>
						<li>The Shopgate Plugin API Actions</li>
						<li>Plugin API Example: Exporting Products</li>
						<li>What is the Shopgate Library?</li>
						<li>Implementing the Plugin API using the Shopgate Library</li>
						<li>How will customers hit the mobile website?</li>
						<li>An example plugin implementation in PHP.</li>
						<li>Questions left?</li>
					</ol>
				</section>

				<section data-name="The Shopgate Infra-Structure">
					<img src="http://developer.shopgate.com/img/requirements/overview.png" style="border: none;" />
				</section>
				
				<section data-name="The Shopgate Plugin API Actions">
					<ul style="margin-right: 3em;">
						<li class="fragment">get_categories</li>
						<li class="fragment">get_items</li>
						<li class="fragment">get_reviews</li>
						<li class="fragment">register_customer</li>
						<li class="fragment">get_customer</li>
						<li class="fragment">check_stock</li>
					</ul>
					<ul style="margin-left: 3em;">
						<li class="fragment">check_cart</li>
						<li class="fragment">redeem_coupons</li>
						<li class="fragment">add_order</li>
						<li class="fragment">update_order</li>
						<li class="fragment">get_orders</li>
						<li class="fragment">sync_favourite_list</li>
					</ul>
				</section>
				
				<section data-name="Plugin API Example: Exporting Products">
					<div class="overview spa">
						<div class="shopgate">
							<div>Shopgate</div>
						</div>
						<div class="pluginapi">
							<div>Plugin API</div>
						</div>
						<div class="cart">
							<div>Shopping Cart</div>
						</div>
						<div class="fragment">
							<div class="request">
								<div>Request</div>
								POST /shopgate/api.php HTTP/1.1<br />
								<br />
								X-Shopgate-Auth-User: 12345-1329146130<br />
								X-Shopgate-Auth-Token: b83e778fb008e0b006a4094787aba2d9543d6d25<br />
								<br />
								action=get_items&amp;shop_number=11413<br />
								&amp;offset=1000&amp;limit=5000&amp;trace_id=sma-5694<br />
							</div>
							<div class="arrow-sg-spa"><div class="tip"></div><div class="line"></div></div>
						</div>
						<div class="fragment arrow-spa-cart"><div class="tip-left"></div><div class="line"></div><div class="tip-right"></div></div>
						<div class="fragment">
							<div class="arrow-spa-sg"><div class="line"></div><div class="tip"></div></div>
							<div class="response">
								<div>Response</div>
								HTTP/1.0 200 OK<br />
								Content-Type: application/xml<br />
								<br />
								&lt;items&gt;<br />
								&nbsp;&nbsp;&nbsp;&nbsp;&lt;item uid="123"&gt;&lt;name&gt;Awesome Product&lt;/name&gt;...&lt;/item&gt;<br />
								...<br />
								&lt;items&gt;
							</div>
						</div>
					</div>
				</section>
				
				<section data-name="What is the Shopgate Library?">
					<ul>
						<li class="fragment">an abstraction layer for
							<ul>
								<li class="fragment">the Shopgate Plugin API</li>
								<li class="fragment">communication with the Shopgate Merchant API</li>
								<li class="fragment">executing the Shopgate Mobile Redirect</li>
							</ul>
						</li>
						<li class="fragment">an SDK and base for a Shopgate Plugin</li>
						<li class="fragment">available for PHP >= 5.3</li>
					</ul>
				</section>
				
				<section data-name="Implementing the Plugin API using the Shopgate Library">
					<ul>
						<li class="fragment">
							Extend the ShopgatePlugin class:
							<div class="fragment" style="margin-top: .5em;"><?php highlight_string($examplePluginBare)?></div>
						</li>
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
		<script src="reveal.js/js/jquery-2.1.4.min.js"></script>

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
						if (hide) {
							$(query).slideUp();
						} else {
							$(query).slideDown();
						}
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
