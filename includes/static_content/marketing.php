<?php

function rad_marketing_page(){
	$imageurl = RAD_PLUGIN_IMAGE_DIR;
	$html = <<<BOH
				<div class="rad_act_scr_thank_you_area rad_act_scr_mode_thx_you">
    <div class="rad_act_thx_you_head">
        <div class="rad_act_thx_you_head_inner">
            <div class="rad_act_scr_logo_thx_you"><img src="$imageurl/logo.png" /></div>
            <div id="rad_act_scr_thx_you_tagline">
                <p>Thanks for Joining</p> <h2 class="rad_act_scr_thx_you_rapid">Rapidology</h2>
                <div class="rad_act_scr_gift">A Free <span><i>Gift</i></span> From <a href="http://www.leadpages.net?utm_campaign=rp-lp&utm_medium=wp-thank-you-screen" target="_blank">LeadPages<sup>&reg;</sup></a></div>
            </div>
        </div>
    </div>
    <div id="rad_act_thx_you_body">
        <div class="rad_act_thx_you_sec_1">
            <div class="rad_act_thx_you_sec_1_inner">
                <div class="section1_top">
                    <div class="section1_top_left">
                        <p style="font-weight:300; font-size:20px;">FREE LIVE TRAINING:</p>
                        <p style="font-weight:400; font-size:14px;">With LeadPages<sup>&reg;</sup> Conversion Expert Time Paige</p>
                        <h1>4 Steps to Grow Your List Without <br />Spending Your Time on Marketing</h1>
                    </div>
                    <div class="section1_top_right">
                        <div class="box">
                            <img src="$imageurl/tim-paige.png" />
                            <p style="padding:0; text-align: center">Host</p>
                            <p style="padding:0; color:#FF5E6E; text-align: center; font-weight:bold">Tim Paige</p>
                        </div>
                        <div class="box">
                            <img src="$imageurl/lp-logo.jpg" />
                            <p style="padding:0; text-align: center">Featuring Strategies by</p>
                            <p style="padding:0; color:#FF5E6E; text-align: center; font-weight:bold">LeadPages<sup>&reg;</sup></p>
                        </div>
                    </div>
                    <div style="clear:both;"></div>
                    <div class="rad_act_thx_you_sec_register" style="margin-top:20px;">
                        <a href="#webinars"> REGISTER ME FOR THE WEBINAR </a>  <img src="$imageurl/arrow-right.jpg" />
                    </div>
                    <a class="sign_up_text" href="#webinars"> Click here to sign up now </a>
                </div>
            </div>
            <div class="rad_act_thx_you_sec_1_bottom">
                <div class="bottom_arrow"></div>
            </div>
        </div>
        <div class="rad_act_thx_you_sec_2">
            <div class="rad_act_thx_you_sec_2_inner">
                <div style="text-align: center;"><h1 class="body-heading">Webinar Details</h1></div>
                <a name="webinars" id="webinars"></a>
                <div id="options">
                    <div class="option option1">
                        <div class="option-header"><p>Option #1</p></div>
                        <div class="option-text">
                            <div style="padding-top:20px; width: 390px; margin:auto;">
                                <img style ="float:left; margin-left:10px; margin-right:10px;" src="$imageurl/calendar.jpg" />
                                <div style="float:right; width:240px;">
                                    <h1 style="color:black; text-transform: none;">This Wednesday</h1>
                                    <ul class="webinar-list">
                                        <li>3pm Eastern (New York)</li>
                                        <li>2pm Central (Chicago)</li>
                                        <li>12pm Pacific (San Diego)</li>
                                    </ul>
                                </div>
                                <div style="clear:both"></div>
                                <div class="option-action">
                                    <a href="javascript:;" class="rad_act_scr_webinar_button rad_act_scr_webinar_button_wed" target="blank">SAVE MY SEAT</a>
                                    <a href="javascript:;" class="rad_act_scr_webinar_link rad_act_scr_webinar_button_wed" target="blank">Click here to register for Wednesday\'s webinar now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="option option2">
                        <div class="option-header"><p>Option #2</p></div>
                        <div class="option-text">
                            <div style="padding-top:20px; width: 390px; margin:auto;">
                                <img style ="float:left; margin-left:10px; margin-right:10px;" src="$imageurl/calendar.jpg" />
                                <div style="float:right; width:240px;">
                                    <h1 style="color:black; text-transform: none;">This Thursday</h1>
                                    <ul class="webinar-list">
                                        <li>3pm Eastern (New York)</li>
                                        <li>2pm Central (Chicago)</li>
                                        <li>12pm Pacific (San Diego)</li>
                                    </ul>
                                </div>
                                <div style="clear:both"></div>
                                <div class="option-action">
                                    <a href="javascript:;" class="rad_act_scr_webinar_button rad_act_scr_webinar_button_thu">SAVE MY SEAT</a>
                                    <a href="javascript:;" class="rad_act_scr_webinar_link rad_act_scr_webinar_button_thu">Click here to register for Thursdays\'s webinar now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <div class="description">
                    <div style="text-align: center;">
                        <h1 class="body-heading">During this free live training, you will learn:</h1>
                        <ul>
                            <li><span>
                                <strong>Why only three pages on your WordPress ste should receieve the bulk of your time, energy, and focus.</strong>
                                This is about focus. Pay attention to these three pages and you\'ll boost your leads and sales. Ignore them and you\'ll struggle.
                            </span>
                        </li>
                        <li>
                            <span>
                                <strong>How to turn your WordPress site into a lead generation machine.</strong>
                                Weather you\'re just starting out or you\'ve been in business for years, we\'ll show you 4 sinple steps you can take right now
                            to transform your site into a powerful lead-gen machine.</span>
                        </li>
                        <li>
                            <span>
                                <strong>The #1 biggest mistake that even the pros make on their sites.</strong>
                                Make this mistake on your site and you\'ll continually ignore your best, hottest leads. Avoid this mistake and you\'ll
                                turn this missed opportunity into an an entirely new sales channel for your business.(We\'ll show you how to avoid this critical error in five minutes.)
                            </span>
                        </li>
                    </ul>
                    <p style="display:block; width: 700px; margin-left:auto; margin-right:auto; text-align: left;"><span style="color:black; font-weight:bold;">WARNING:</span> Space is limited and these live trainings always fill up because they contain significantly
                        more valuable information than others charge hundreds or thousands for. Click below to reserve your seat.
                    </p>
                </div>


            </div>

        </div>
        <div id="final-teaser">
            <div id="final-teaser-inner">
                <h1 class="body-heading" style="padding-top:20px; color:#fff; font-size:30px;">This Training Is a Free Gift From LeadPage<sup>&reg;</sup></h1>
                <p style="font-weight:bold; color:#fff; font-size:20px;">Click below to save your seat.</p>
                <div class="rad_act_thx_you_sec_register" style="margin-top:50px;">
                        <a href="#webinars"> REGISTER ME FOR THE WEBINAR </a>  <img src="$imageurl/arrow-right.jpg" />
                    </div>
                    <a class="sign_up_text" href="#webinars"> Click here to sign up now </a>
            </div>
        </div>
    </div>
</div>
<div class="back-to-plugin">
    <a href="javascript:window.location.reload();">No thanks, take me to the Rapidology plugin!</a> | <a target="_blank" href="http://www.rapidology.com/privacy?utm_campaign=rp-rp&utm_medium=wp-thank-you-privacy">Privacy Policy</a>
</div>
</div>
BOH;
	echo $html;
}
rad_marketing_page();