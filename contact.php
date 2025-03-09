<?php
$title = "Contact";
include("config/connection.php");
include("public/header.php");
?>

<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-150" style="background-image: url('images/banner_7_1739367253.jpeg');">
	<h2 class="ltext-105 cl0 txt-center">
		Contact
	</h2>
</section>

<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
	<div class="container">
		<div class="flex-w flex-tr">
			<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
				<form action="contact_mail.php" method="post">
					<h4 class="mtext-105 cl2 txt-center p-b-30">
						Send Us A Message
					</h4>
					<div class="bor8 m-b-20 how-pos4-parent">
						<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email"
							placeholder="Your Email Address">
						<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
					</div>
					<div class="bor8 m-b-30">
						<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg"
							placeholder="How Can We Help?"></textarea>
					</div>
					<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
						Submit
					</button>
				</form>
			</div>

			<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
				<div class="flex-w w-full p-b-42">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="lnr lnr-map-marker"></span>
					</span>
					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							Address
						</span>
						<p class="stext-115 cl6 size-213 p-t-18">
							<a
								href="https://www.google.com/maps/place/MC+Brother/@23.6049844,72.3902888,20.5z/data=!4m6!3m5!1s0x395c439e88b59605:0xafd70ecff94b4d5d!8m2!3d23.6050487!4d72.3904921!16s%2Fg%2F11m64ybpvr?entry=tts&g_ep=EgoyMDI1MDMwNC4wIPu8ASoASAFQAw%3D%3D">
								17/18, Mahatma Gandhi Shopping Center, Rajmahal Road, Mahesana, Gujarat, India
							</a>
						</p>
					</div>
				</div>
				<div class="flex-w w-full p-b-42">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="lnr lnr-phone-handset"></span>
					</span>
					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							Lets Talk
						</span>
						<p class="stext-115 cl1 size-213 p-t-18">
							<a href="tel:+918264434965">+91 82644 34965</a>
						</p>
					</div>
				</div>
				<div class="flex-w w-full">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="lnr lnr-envelope"></span>
					</span>
					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							Sale Support
						</span>
						<p class="stext-115 cl1 size-213 p-t-18">
							<a href="mailto:chintan73210@gmail.com">chintan73210@gmail.com</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- Map -->
<section class="bg0 p-t-104 p-b-116">
	<div class="container">
		<div class="map">
			<iframe
				src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d323.14619338535516!2d72.39028879459502!3d23.60498442082901!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395c439e88b59605%3A0xafd70ecff94b4d5d!2sMC%20Brother!5e0!3m2!1sen!2sin!4v1741452491444!5m2!1sen!2sin"
				width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
				referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
	</div>
</section>

<?php
include("public/footer.php");
?>