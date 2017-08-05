{include file='header.tpl' p="general"}

{literal}

<script type="text/javascript">

var RecaptchaOptions = {

theme : 'clean',

custom_theme_widget: 'recaptcha_widget'

};

</script>

{/literal}

<div class="container primary-content">

<div class="row">

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
    <header class="heading">
        <h1>submit <mark>video</mark></h1>
    </header>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<section class="submission-form-holder">
    <div class="text-holder">
        <h2>Video Submission</h2>
        <p>Thank you for submiting your video to our website. To ensure proper submission, please include in your submission the title, description, and the video URL. (Upload video to wetransfer.com or youtube.com). All video submissions will get proper credit if accepted.</p>
        <p>By submitting your video, you are representing to HoodClips that you have all necessary rights in the video to authorize our use and reuse of the audio and visual material it contains, and that you have read, understood and agreed to the terms and conditions of all HoodClips Policy Agreements.</p>
    </div>

<form action="{$smarty.const._URL}/vsent.php" method="POST" class="contact-form">

<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-padding">
    <label for="video-title" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Title <mark>(required) -</mark></label>
    <input name="video-title" required="" id="video-title" type="text" value="Title" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <label for="email" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Email <mark>(required) -</mark></label>
    <input name="email" required="" id="email" type="text" value="username@domain.com" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <label class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Video Type - <mark>(required)</mark></label>
    <select name="attention" class="jcf-hidden col-lg1-12 col-md-12 col-sm-12 col-xs-12" required="">
        <option value="">Select</option>
        <option value="4">Music Video</option>
        <option value="5">Promotional Video</option>
        <option value="6">Fight / Vine / Funny Video</option>
        <option value="7">Other</option>
    </select>
    <label for="video-url" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Video URL <mark>(required, read â€œVideo Submissionsâ€�) -</mark></label>
    <input class="col-lg-12 col-md-12 col-sm-12 col-xs-12" name="video-url" id="video-url" type="text" value="http://we.tl/0as0bCysax">
    <label class="col-lg-12 col-md-12 col-sm-12 col-xs-12" for="video-description">Video Description <mark>(required) -</mark></label>
    <textarea required="" name="video-description" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="video-description" cols="3" rows="1">Description</textarea>
    <div class="clearfix"></div>
    {$recaptcha}
<div id="recaptcha_widget" style="display:none" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div id="recaptcha_image"></div>
<div class="recaptcha_only_if_incorrect_sol" style="color:red">Incorrect please try again</div>
<span class="recaptcha_only_if_image">Enter the words above:</span>
<span class="recaptcha_only_if_audio">Enter the numbers you hear:</span>
<!-- <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" value="121"/>-->
<div>
    <a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
</div>
<div class="recaptcha_only_if_image">
    <a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a>
</div>
<div class="recaptcha_only_if_audio">
    <a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a>
</div>
<div>
    <a href="javascript:Recaptcha.showhelp()">Help</a>
</div>
</div>

<noscript>
<iframe src="http://www.google.com/recaptcha/api/noscript?k=6LcyKAkTAAAAAE22hG_Zh2DqoWZZCpds9N2LUxOz"
        height="300" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" frameborder="0"></iframe><br>
<textarea name="recaptcha_challenge_field" rows="3" cols="20"></textarea>
<input type="hidden" name="recaptcha_response_field" value="manual_challenge">

</noscript>
<br/>
<input type="submit" value="Submit Video" class="btn btn-submit">
</div>


{$recaptcha}
</form>

</section>

</div>
<!-- #content -->

</div>

</div><!-- .row-fluid -->

</div><!-- .container-fluid -->

{include file='footer.tpl'}
