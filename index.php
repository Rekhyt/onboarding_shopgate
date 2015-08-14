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
			link.href = window.location.search.match( reveal\.js/print-pdf/gi ) ? 'reveal.js/css/print/pdf.css' : 'reveal.js/css/print/paper.css';
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
						<li>How does Shopgate get it?</li>
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

				<section data-name="How does Shopgate get the data?">
					<h4>Cate</h4>
					<ul>
						<li>Overwritten in Shopgate_Model_XmlResultObject.</li>
						<li>Used in every XML model.</li>
					</ul>
					<br /><br />
					<div class="fragment">
						<h4>XMLWriter</h4>
						<p>Works with startElement() and endElement() methods. This requires the whole process to work more recursively.</p>
					</div>

					<div class="fragment">
						<h4>Conclusion</h4>
						<p>Huge refactoring needed, might be impossible without breaking compatibility.</p>
					</div>
				</section>

				<section>
					<h3>Chapter 5</h3>
					<h4>SimpleXMLElement::addAttribute()</h4>
					<p>Overwritten and in every XML model.</p>

					<div class="fragment">
						<h4>XMLWriter</h4>
						<p>Works with startAttribute() and endAttribute() methods.</p>
					</div>

					<div class="fragment">
						<h4>Conclusion</h4>
						<p>Huge refactoring needed. Might be impossible without breaking compatibility.</p>
					</div>
				</section>

				<section>
					<h3>Chapter 6</h3>
					<h4>Shopgate_Model_AbstractExport::asXml()</h4>
					<ul>
						<li>Defined abstract, implemented by the model classes.</li>
						<li>Responsible for putting child elements together correctly.</li>
						<li>Does not actually return XML as a string.</li>
					</ul>
					<br /><br />
					<div class="fragment">
						<h4>XMLWriter</h4>
						<p>A third class using XMLWriter would be needed. Alternatively pass the XMLWriter around to every model, let them modify it to their needs.
						</p>
					</div>

					<div class="fragment">
						<h4>Conclusion</h4>
						<p>Huge refactoring needed. Might be impossible without breaking compatibility.</p>
					</div>
				</section>

				<section>
					<h3>Chapter 7</h3>
					<p class="fragment">We should not convert to DOMDocument.</p>
					<p class="fragment">We should convert to XMLWriter, but:</p>
					<ul>
						<li class="fragment">refactoring will take quite some time</li>
						<li class="fragment">it's unclear if it can be done without breaking compatibility</li>
					</ul>
					<div class="fragment"><p class="fragment highlight-red">This is something for Shopgate Library 3.x.</p></div>
				</section>

				<section>
					<p><img src="images/discuss.jpg" alt="Discuss" title="Discuss" /></p>
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
			
			Reveal.addEventListener('ready', function(event) {
				document.querySelector('.reveal .footer').style.display = ((event.indexh < 2)
					? 'none'
					: 'block'
				);
				
				document.querySelector('.reveal .header').style.display = ((event.indexh < 2)
					? 'none'
					: 'block'
				);
				
				if (typeof(event.currentSlide.dataset.name) !== 'undefined') {
					document.querySelector('.reveal .header .container .sectionname').innerText = event.currentSlide.dataset.name;
				}
			});
			
			Reveal.addEventListener('slidechanged', function(event) {
				document.querySelector('.reveal .footer').style.display = ((event.indexh < 2)
					? 'none'
					: 'block'
				);
				
				document.querySelector('.reveal .header').style.display = ((event.indexh < 2)
					? 'none'
					: 'block'
				);
			});
			
			Reveal.addEventListener('slidechanged', function(event) {
				if (typeof(event.currentSlide.dataset.name) !== 'undefined') {
					document.querySelector('.reveal .header .container .sectionname').innerText = event.currentSlide.dataset.name;
				}
			});
		</script>

	</body>
</html>
