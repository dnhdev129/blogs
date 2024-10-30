<div class="banner_bottom">
	<div class="container">
		<!---728x90--->
		<div class="mail_form">
			<h3 class="tittle-w3ls">Send Us a Message</h3>
			<!---728x90--->

			<div class="inner_sec_info_wthree_agile">
				<form action="#" method="post"  onsubmit="mailC();">
					<span class="input input--chisato">
					<input class="input__field input__field--chisato" name="Name" type="text" id="name" placeholder=" " required="" />
					<label class="input__label input__label--chisato" for="name">
						<span class="input__label-content input__label-content--chisato" data-content="Name">Name</span>
					</label>
					</span>
					<span class="input input--chisato">
					<input class="input__field input__field--chisato" name="Email" type="email" id="email" placeholder="  " required="" />
					<label class="input__label input__label--chisato" for="email">
						<span class="input__label-content input__label-content--chisato" data-content="Email">Email</span>
					</label>
					</span>
					<span class="input input--chisato">
					<input class="input__field input__field--chisato" name="Subject" type="text" id="subject" placeholder=" " required="" />
					<label class="input__label input__label--chisato" for="subject">
						<span class="input__label-content input__label-content--chisato" data-content="Subject">Subject</span>
					</label>
					</span>
					<textarea name="Message" id="message" placeholder="Your comment here..." required=""></textarea>
					<input type="submit" value="Submit">
				</form>
				 <p id="contact_send" class="mt-3"></p> <!-- Thẻ để hiển thị thông báo -->

			</div>
		</div>
		<div class="inner_sec_info_wthree_agile">
       	<div class="col-md-12 map">
				<?php echo $settings->site_map ?>
			</div>
		</div>
	</div>
</div>