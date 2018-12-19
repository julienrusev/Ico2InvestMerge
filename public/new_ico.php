<?php include '../include/header.php'; ?>

	<script type="text/javascript" src="../resources/scripts/icoSubmit.js"> </script>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
	$(function () {

		$('#mail_form').on('submit', function (e) {

		  	e.preventDefault();

		  	$.ajax({
		        type: 'post',
		        url: '../include/sendmail.php',
		        data: $('#mail_form').serialize(),
		        success: function () {
		          	$("#btnRegister").after(
		          	"<div class='green'>Thank you! Your message has been sent successfully.</div>"
		          	)
			        $("form").trigger("reset");
		        },
		        error: function () {
					$("#btnRegister").after(
						"<div class='red'>Your message was not send!</div>"
						)
					$("form").trigger("reset");
		        },
			});
		});
		
	});
    </script>
	<div class="main_page_wrapper">
		<div class="submitPage">
			<h3 class="submitPage_heading">This form allows you to submit a brand new ICO to be listed on our site.</h3>
			<div class="row">
				<div class="col-12 col-lg-4">
					<hr class="submitPage_hr">
				</div>
				<div class="col-12 col-lg-4">
					<h3 class="submitPage_heading3">Contact Information</h3>
				</div>
				<div class="col-12 col-lg-4">
					<hr class="submitPage_hr">
				</div>
			</div>
			<p class="submitPage_tеxt"><span class="submitPage_required">* </span>Required fields</p>
			<form class="submitPage_form" method="POST" name="contactform" id="mail_form">
				<p class="submitPage_text"><span class="submitPage_required">*</span>Contact Email</p>
				<input class="submitPage_input" type="email hidden" id="email" name="email" required>
				<p class="submitPage_text"><span class="submitPage_required">*</span>Confirm Contact Email</p>
				<input class="submitPage_input" type="email" id="confemail" onblur="confirmEmail()" required>
				<p class="submitPage_text"><span class="submitPage_required">*</span>First Name</p>
				<input class="submitPage_input" type="name" name="fname" required>
				<p class="submitPage_text">Last Name</p>
				<input class="submitPage_input" type="name" name="lname">
				<div class="submitPage_ico_info">
						<div class="row">
							<div class="col-12 col-lg-4">
								<hr class="submitPageIco_hr">
							</div>
							<div class="col-12 col-lg-4">
								<h3 class="submitPage_heading3">ICO and Project Information</h3>
							</div>
							<div class="col-12 col-lg-4">
								<hr class="submitPageIco_hr">
							</div>
						</div>
				</div>
				<p class="submitPage_text"><span class="submitPage_required">*</span>ICO Name</p>
				<input class="submitPage_input" type="name" name="ico_name" required>
				<p class="submitPage_text"><span class="submitPage_required">*</span>Website</p>
				<p class="_text">Must be full URL (eg. http://example.com)</p>
				<input class="submitPage_input" type="url" name="website" required>
				<p class="submitPage_text"><span class="submitPage_required">*</span>Short Description of Project</p>
				<input class="submitPage_input" name="message" type="text" required>
				<p class="submitPage_text">Long Description of Project</p>
				<textarea class="submitPage_textarea" name="description"></textarea>
				<div class="submitPage_button_align send">
					<input type="submit" class="submitPage_button" value="SUBMIT ICO" id="btnRegister">
				</div>
			</form>
		</div>
		<div class="submitPage_details">
			<h1 class="submitPage_heading">view ICO details in</h1>
			<div class="submitPage_images">
				<a href="https://icobench.com/"><img class="_images_padding icoImages" src="../resources/media/bench.png"></a>
				<a href="https://www.coinist.io/"><img class="_images_padding icoImages" src="../resources/media/coinist.png"></a>
				<a href="https://icorating.com/"><img class="icoImages" src="../resources/media/icorating.png"></a>
			</div>
		</div>
	</div>
<?php include '../include/footer.php'; ?>