<?php
$examplePluginTop = <<<'EXAMPLE'
<?php
include('shopgate_library/shopgate.php');

class MyShopgatePlugin extends ShopgatePlugin {}
EXAMPLE;

$examplePluginMethods = <<<'EXAMPLE'
<?php
class MyShopgatePlugin extends ShopgatePlugin {
	public function startup() {}
	protected function createCategories(...) {}
	protected function createItems(...) {}
	protected function createReviews(...) {}
	public function checkStock(...) {}
	public function registerCustomer(...) {}
	public function getCustomer(...) {}
	public function checkCart(...) {}
	public function redeemCoupons(...) {}
	public function addOrder(...) {}
	public function updateOrder(...) {}
	public function getOrders(...) {}
	public function syncFavouriteList(...) {}
	public function cron(...) {}
	public function getSettings() {}
}
EXAMPLE;

$examplePluginStartup = <<<'EXAMPLE'
<?php
class MyShopgatePlugin extends ShopgatePlugin {
	public function startup() {
		$this->config = new ShopgateConfig();
		$this->config->setShopNumber('12345');
		$this->config->setCustomerNumber('12345');
		$this->config->setApiKey('01234567890abcdef');
	}
	
	// ...
}
EXAMPLE;

$examplePluginEntryPoint = <<<'EXAMPLE'
<?php
$plugin = new MyShopgatePlugin();
$plugin->handleRequest($_POST);
EXAMPLE;

$examplePluginGetCategories = <<<'EXAMPLE'
<?php
class MyShopgatePlugin extends ShopgatePlugin {
	protected function createCategories($limit = null, $offset = null, array $uids = array()) {
		// instantiate
		$categoryItem = new Shopgate_Model_Catalog_Category();
		
		// set values
		$categoryItem->setUid(10);
		$categoryItem->setName('Example Category');
		$categoryItem->setParentUid(4);
		$categoryItem->setIsActive(true);
		$categoryItem->setDeeplink('http://my-shop.com/category/id/10');
		$categoryItem->setSortOrder(10);
		
		// add to output buffer
		$this->addCategoryModel($categoryItem);
	}
}
EXAMPLE;

$examplePluginGetShopgateMobileRedirect = <<<'EXAMPLE'
<?php
include('shopgate_library/shopgate.php'):

$shopgateBuilder = new ShopgateBuilder();
$shopgateRedirect = $builder->buildRedirect();
EXAMPLE;

$examplePluginBuildRedirectScript = <<<'EXAMPLE'
<?php
if (!empty($productID)) {
	$shopgateMobileRedirect = $redirect->buildScriptItem($productID);
} elseif (!empty($categoryID)) {
	$shopgateMobileRedirect = $redirect->buildScriptCategory($categoryID);
} elseif ($currentTemplate == 'welcome') {
	$shopgateMobileRedirect = $redirect->buildScriptShop();
} else {
	$shopgateMobileRedirect = $redirect->buildScriptDefault();
}
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
				
				<section data-name="Contents">
					<ol>
						<li>The Shopgate Infra Structure</li>
						<li>The Shopgate Plugin API Actions</li>
						<li>Plugin API Example: Exporting Products</li>
						<li>What is the Shopgate Library?</li>
						<li>Implementing the category export using the Shopgate Library</li>
						<li>The Shopgate Mobile Redirect</li>
						<li>Implementing the Mobile Redirect by using the Shopgate Library</li>
					</ol>
				</section>
				
				<section data-name="The Shopgate Infra-Structure">
					<div class="overview infra-structure">
						<div class="shopgate">
							<div>Shopgate</div>
						</div>
						<div class="pluginapi">
							<div>Plugin</div>
						</div>
						<div class="cart">
							<div>Shopping Cart</div>
						</div>
						<div class="mobile-website">
							<div>Mobile Website</div>
						</div>
						<div class="apps">
							<div>Apps</div>
						</div>
						<div>
							<div class="spa">Shopgate Plugin API</div>
							<div class="arrow-sg-spa"><div class="tip"></div><div class="line"></div></div>
						</div>
						<div class="arrow-spa-cart"><div class="tip-left"></div><div class="line"></div><div class="tip-right"></div></div>
						<div>
							<div class="arrow-spa-sg"><div class="line"></div><div class="tip"></div></div>
							<div class="sma">Shopgate Merchant API</div>
						</div>
						<div class="arrow-sg-mobile-website"><div class="tip-left"></div><div class="line"></div><div class="tip-right"></div></div>
						<div class="arrow-sg-apps"><div class="tip-left"></div><div class="line"></div><div class="tip-right"></div></div>
						<div>
							<div class="mobile-redirect">Mobile Redirect</div>
							<div class="arrow-spa-mobile-website"><div class="line"></div><div class="tip"></div></div>
						</div>
					</div>
				</section>
				
				<section data-name="The Shopgate Plugin API Actions">
					<ul class="fragment" style="margin-right: 3em;">
						<li>get_categories</li>
						<li>get_items</li>
						<li>get_reviews</li>
						<li>register_customer</li>
						<li>get_customer</li>
						<li>check_stock</li>
					</ul>
					<ul class="fragment" style="margin-left: 3em;">
						<li>check_cart</li>
						<li>redeem_coupons</li>
						<li>add_order</li>
						<li>update_order</li>
						<li>get_orders</li>
						<li>sync_favourite_list</li>
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
				
				<section data-name="Implementing the category export using the Shopgate Library">
					<div>
						Extend the ShopgatePlugin class:
						<div style="margin-top: .5em;"><?php highlight_string($examplePluginTop) ?></div>
					</div>
				</section>
				
				<section data-name="Implementing the category export using the Shopgate Library">
					<div style="margin-top: 2em;">
						Add the abstract callback methods from ShopgatePlugin:
						<div style="margin-top: .5em;"><?php highlight_string($examplePluginMethods) ?></div>
					</div>
				</section>
				
				<section data-name="Implementing the category export using the Shopgate Library">
					<div>
						Use the startup() callback to initialize the configuration:
						<div style="margin-top: .5em;"><?php highlight_string($examplePluginStartup) ?></div>
					</div>
				</section>
				
				<section data-name="Implementing the category export using the Shopgate Library">
					<div style="margin-top: 2em;">
						Provide an API entry point where you instantiate your plugin class and pass the request:
						<div style="margin-top: .5em;"><?php highlight_string($examplePluginEntryPoint) ?></div>
					</div>
				</section>
				
				<section data-name="Implementing the category export using the Shopgate Library">
					<div style="margin-top: 2em;">
						Add the category exporting logic:
						<div style="margin-top: .5em;"><?php highlight_string($examplePluginGetCategories) ?></div>
					</div>
				</section>
				
				<section data-name="The Shopgate Mobile Redirect">
					<ul>
						<li class="fragment">redirects smartphone users to the mobile website</li>
						<li class="fragment">
							displays a smartbanner for smartphone users<br />
							<img src="images/mobile_header.png" style="border: none; border-radius: .2em;" />
						</li>
						<li class="fragment">
							lets search engines know there is an optimized version for mobile devices by placing a link tag
							<div>
								<code style="margin-top: .5em; font-size: .475em;"><span style="color: #000080; font-weight: bold">&lt;link</span> <span style="color: #FF0000">rel=</span><span style="color: #0000FF">&quot;alternate&quot;</span> <span style="color: #FF0000">media=</span><span style="color: #0000FF">&quot;only screen and (max-width: 640px)&quot;</span> <span style="color: #FF0000">href=</span><span style="color: #0000FF">&quot;http://m.my-shop.com&quot;</span> <span style="color: #000080; font-weight: bold">/&gt;</span></code>
							</div>
						</li>
					</ul>
				</section>
				
				<section data-name="Implementing the Mobile Redirect by Using the Shopgate Library">
					<div>
						Start off at a point in your code where you can determine what kind of page has been requested, e.g.
						<ul>
							<li class="fragment">in a controller where view variables are set</li>
							<li class="fragment">at the point where views are generated</li>
							<li class="fragment">at the point where the HTML header is put out</li>
							<li class="fragment">in your templates</li>
						</ul>
					</div>
				</section>
				
				<section data-name="Implementing the Mobile Redirect by Using the Shopgate Library">
					<div>
						Get an instance of the ShopgateMobileRedirect class:
						<div style="margin-top: .5em;"><?php highlight_string($examplePluginGetShopgateMobileRedirect) ?></div>
					</div>
				</section>
				
				<section data-name="Implementing the Mobile Redirect by Using the Shopgate Library">
					<div>
						Determine the page type to call the correct method:
						<div style="margin-top: .5em;"><?php highlight_string($examplePluginBuildRedirectScript) ?></div>
					</div>
				</section>
				
				<section data-name="Implementing the Mobile Redirect by Using the Shopgate Library">
					<div>
						Place the generated HTML code in yout HTML header:
						<code style="margin-top: .5em; font-size: .475em;">
							<span style="color: #000080; font-weight: bold">&lt;html&gt;</span><br />
							&nbsp;&nbsp;<span style="color: #000080; font-weight: bold">&lt;head&gt;</span><br />
							&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #000080; font-weight: bold">&lt;title&gt;</span>My Shop<span style="color: #000080; font-weight: bold">&lt;/title&gt;</span><br />
							&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #008080">&lt;?php</span> <span style="color: #000080; font-weight: bold">echo</span> $shopgateMobileRedirect; <span style="color: #008080">?&gt;</span><br />
							&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #008800; font-style: italic">&lt;!-- ... --&gt;</span><br />
							&nbsp;&nbsp;<span style="color: #000080; font-weight: bold">&lt;/head&gt;</span><br />
							&nbsp;&nbsp;<span style="color: #000080; font-weight: bold">&lt;body&gt;</span><br />
							&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #008800; font-style: italic">&lt;!-- ... --&gt;</span><br />
							&nbsp;&nbsp;<span style="color: #000080; font-weight: bold">&lt;/body&gt;</span><br />
							<span style="color: #000080; font-weight: bold">&lt;/html&gt;</span>
						</code>
					</div>
				</section>
				
				<section data-name="Currently Supported Redirect Methods">
					<ul>
						<li class="fragment"><b>buildScriptShop():</b><br />to the shop's welcome page</li>
						<li class="fragment"><b>buildScriptItem():</b><br />to a product by "item number" - usually a product ID</li>
						<li class="fragment"><b>buildScriptItemPublic():</b><br />to a product by "item number public" - usually an SKU</li>
						<li class="fragment"><b>buildScriptCategory():</b><br />to a product by category number</li>
					</ul>
				</section>
				
				<section data-name="Currently Supported Redirect Methods">
					<ul>
						<li class="fragment"><b>buildScriptCms():</b><br />to a content page on a mobile website</li>
						<li class="fragment"><b>buildScriptBrand():</b><br />to a list of products of a certain brand</li>
						<li class="fragment"><b>buildScriptSearch():</b><br />by a search term</li>
					</ul>
				</section>
				
				<section data-name="&nbsp;">
					Thank you for attending.<br /><br />Any questions left?
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
