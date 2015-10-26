<?php

function rad_marketing_page(){
	$imageurl = RAD_PLUGIN_IMAGE_DIR;
	$html = <<<BOH
	<div class="marketing_header">
		<h1>NEED MORE HELP BUILDING OUT YOUR EMAIL LIST?</h1>
		<p>We have the resources to get the most out of your marketing efforts.</p>
	</div>
	<div class="marketing_wrapper">
	<div class="rapidology_marketing_main">
			<div id="video_course">
				<div class="box_header">
					<p>Download Our Free 9-Video Course</p>
				</div>
				<div class="rapidology_marketing_content">
					<img src="$imageurl/email-list-building-course.png" name="9_video_course" />
					<div>
						<p>The Ultimate Business Owner’s Guide to List-Building</p>
						<a href = "https://lp.leadpages.co/email-list-building-aff" target="_blank">Download</a>
					</div>
				</div>
			</div>

			<div id="live_training">
				<div class="box_header">
					<p>Check Out Our Free Live Training</p>
				</div>
				<div class="rapidology_marketing_content">
					<img src="$imageurl/free-live-training.png" name="live-training" />
					<div>
						<p>How to Grow Your List Without Spending All Your Time On Marketing</p>
						<a href = "https://lp.leadpages.co/ut-conversioncast-1-date-rapidology" target="_blank">Download</a>
					</div>
				</div>
			</div>

			<div id="free_images">
				<div class="box_header">
					<p>Download 10 Free Images Designed to Convert</p>
				</div>
				<div class="rapidology_marketing_content">
					<img src="$imageurl/10-free-images.png" name="free_images" />
					<div>
						<p>Grow Your List Faster By Testing These 10 Images On Your Popups</p>
						<a href = "https://lp.leadpages.co/10-images-rapidology" target="_blank">Download</a>
					</div>
				</div>
			</div>

			<div id="facebook_course">
				<div class="box_header">
					<p>See Our Free 11-Video Facebook Course</p>
				</div>
				<div class="rapidology_marketing_content">
					<img src="$imageurl/facebook-ad-course.png" name="facebook_course" />
					<div>
						<p>Use Facebook to Grow Your List with the Facebook Advertising System</p>
						<a href = "https://lp.leadpages.net/facebookadvertising-1/" target="_blank">Download</a>
					</div>
				</div>
			</div>
	</div>

	<div class="rapidology_marketing_sidebar">
		<div class="signup">
			<p class="header">DON'T MISS OUT</p>
			<p class="signup_tagline">Subscribe and receive regular updates on new releases, upgrades, fixes, list-building tips and more!</p>
			<div id="signup_container">
				<div class="rapidology_newsletter_form">
				<p class="error badresponse">Something went wrong please try again later</p>
				<p class='error email'>The email you entered appears to be invalid</p>
				<input type="text" name="email" class="newsletter_email" placeholder="   Enter your email..."/><br>
				<a class="newsletter_submit_button">Subscribe</a><span class="loader"><img src="$imageurl/ajax-loader.gif"/></span>
				</div>
				<div class="signup_thankyou">
					<p>You Signed up for our amazing plugin updates. Thank you!</p>
				</div>
			</div>
			<a class="privacy_link" href="https://www.rapidology.com/privacy" target="_blank">Privacy</a>
		</div>


		<div class="quick_links">
			<p class="header">Quick Links</p>
			<ul>
				<li class="quick_link"><a href="https://www.rapidology.com" target="_blank">Rapidology Home</a></li>
				<li class="quick_link"><a href="https://www.rapidology.com/support" target="_blank">Support</a></li>
				<li class="quick_link"><a href="https://www.rapidology.com/docs" target="_blank">Documentation</a></li>
				<li class="quick_link"><a href="http://blog.rapidology.com" target="_blank">Rapidology Blog</a></li>
				<li class="quick_link"><a href="https://github.com/LeadPages/rapidology-plugin" target="_blank">Github Repo</a></li>
				<li class="quick_link"><a href="https://www.rapidology.com/tou" target="_blank">Terms of Use</a></li>
			</ul>
		</div>
	</div>

</div>
BOH;
	echo $html;
}
rad_marketing_page();