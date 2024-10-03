<!DOCTYPE HTML>
<html>
	<head>
		<?php include "header.php" ?>
	</head>
	<body>
		<div id="renderSmoke"></div>
		<div class="container loading-logo">
	  		<div id="includedContent"></div>
		</div>
		<main class="main after-loading">
		  <section class="section">
		    <div class="close-section">&times;</div>
		    <div class="demo-box">
		    	<h2>Wadi Kihel</h2>
		    	<div class="show-content">
		    		<div class="website-description" id="website-description"></div>
		    		<h3>Partners</h3>
		    		<div class="row fade-carousel"></div>
		    		<!-- Langage -->
		    		<h3>Skills</h3>
		    		<div id="wordCloud"></div>

		    	</div>
		    </div>
		    
		  </section>
		  <section class="section">
		    <div class="close-section">&times;</div>
		    <div class="demo-box">
				<h2>Innovations</h2>
		    	<div class="show-content">
		    		<div id="projects" class="grid"></div> 
		    	</div>
			</div>
		  </section>
		  <section class="section">
		    <div class="close-section">&times;</div>
		    <div class="demo-box">
		    	<h2>Contact</h2>
		    	<div class="show-content">
		    		<div class="container-mail">
		    			<form>
						    <label for="fname">Name</label>
						    <input type="text" id="lname" name="name" placeholder="Jimi Hendrix">

						    <label for="lmail">Email</label>
						    <input type="text" id="lmail" name="mail" placeholder="jhendrix@chicago.com">

						    <label for="lsubject">Subject</label>
						     <input type="text" id="lsubject" name="subject" placeholder="My website">

						    <label for="lmessage">Message</label>
						    <textarea id="lmessage" name="message" placeholder="Write something.." style="height:200px"></textarea>

						    <span id="sendMail">
						    	<i class="fas fa-paper-plane"></i>
						    </span>
						</form>
					</div>
		    	</div>
		    </div>
		  </section>
		  <section class="section">
		    <div class="close-section">&times;</div>
		    <div class="demo-box">
		    	<h2>Wajisan</h2>
		    	<div class="show-content">
		    		<h3>Tastes</h3>
		    		<div id="spotify-module"></div>
		    		<h3>Beatmaker</h3>
		    		<div id="soundcloud-module"></div>
		    	</div>
		    </div>
		  </section>
		</main>
		<!-- Scripts -->
		<?php include "footer.php" ?>

	</body>
</html>