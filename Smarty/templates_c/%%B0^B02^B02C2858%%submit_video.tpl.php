<?php /* Smarty version 2.6.20, created on 2016-07-27 20:19:55
         compiled from submit_video.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array('p' => 'general')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '

<script type="text/javascript">

 var RecaptchaOptions = {

    theme : \'clean\',

	custom_theme_widget: \'recaptcha_widget\'

 };

 </script>

 '; ?>


    <div class="container-fluid" style="margin-top:-15px;">

      <div class="row-fluid">

        <div class="span12">

        <main id="main" role="main">

        

       	<section>

					<header class="heading">

						<h1>submit <mark>video</mark></h1>

					</header>

					<section class="submission-form-holder">

						<div class="text-holder">

							<h2>Video Submission</h2>

							<p>Thank you for submiting your video to our website. To ensure proper submission, please include in your submission the title, description, and the video URL. (Upload video to wetransfer.com or youtube.com). All video submissions will get proper credit if accepted.</p>

							<p>By submitting your video, you are representing to HoodClips that you have all necessary rights in the video to authorize our use and reuse of the audio and visual material it contains, and that you have read, understood and agreed to the terms and conditions of all HoodClips Policy Agreements.</
						</div>

					<form action="<?php echo @_URL; ?>
/vsent.php" method="POST" class="contact-form">

						<fieldset class=" ">

							<label for="video-title" class=" ">Title <mark>(required) -</mark></label>

							<input name="video-title" id="video-title" type="text" value="Title" class=" ">

                            <label for="email" class=" ">Email <mark>(required) -</mark></label>

                            <input name="email" id="email" type="text" value="username@domain.com" class=" ">

							<label>Video Type - <mark>(required)</mark></label>

							<select name="attention" class="jcf-hidden">

								<option></option>

								<option value="4">Music Video</option>

								<option value="5">Promotional Video</option>

								<option value="6">Fight / Vine / Funny Video</option>

								<option value="7">Other</option>

							</select>

							<label for="video-url">Video URL <mark>(Required, Read Video Submission) -</mark></label>

							<input name="video-url" id="video-url" type="text" value="http://we.tl/0as0bCysax">

							<label for="video-description">Video Description <mark>(required) -</mark></label>

							<textarea name="video-description" id="video-description" cols="3" rows="1">Description</textarea>

								

                                


<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="g-recaptcha" data-sitekey="6Le7KgkTAAAAAF9jXLZdRn5zXvJfc_7VOemxGY9Z"></div>



							<input type="submit" value="Submit Video" class="btn-submit">

							</fieldset>

						</form>

					</section>

				</section>

        

        </main>

        <!-- #content -->

        </div>

      </div><!-- .row-fluid -->

    </div><!-- .container-fluid -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>