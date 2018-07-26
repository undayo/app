<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!DOCTYPE html>
<html class=''>
<head>
  <script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script>
  <script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script>
  <script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script>
  <meta charset='UTF-8'>
  <meta name="robots" content="noindex">
  <link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
  <link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" />
  <link rel="canonical" href="https://codepen.io/Koziuk-S/pen/jbJydJ?limit=all&page=85&q=form" />
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css')}}">
</head><body>
<!-- https://dribbble.com/shots/2358349-Daily-Shmaily-UI-1-Game-Login -->
<div class="wrapper">
    <div class="container">
        <div class="stencil">
            <div class="line">
                <div class="line"></div>
            </div>
        </div>
        <div class="border-triangle"></div>
        <div class="content-triangle"></div>
        <div class="enter-triangle-one"></div>
        <div class="enter-triangle-two"></div>
        <form onsubmit="return false" method="post" id="form">
            <div class="title">
                <label>LOG INTO</label>
                <label>RSMART</label>
            </div>
            <div class="input-inform">
                <input type="email" name="email" id="email" placeholder="EMAIL..." />
                <input type="password" name="password" id="password" placeholder="PASSWORD..." />
                <input type="button" value="FORGOT PASSWORD?" id="forgot-pas"/>
            </div>
            <div class="enter">
                <label for="enter"></label>
                <input type="submit" name="submit" value="ENTER" id="enter"/>
            </div>
        </form>    
    </div>
</div>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
<script >document.getElementById('enter').onclick = function() {
    valid(document.getElementById('form'));
}

function valid(form) {
    var fail = false,
        email = form.email.value.trim(),
        password = form.password.value.trim();
    console.log();
    
    if (!email)
        fail = 'You have not entered the email';
    else if (!password)
        fail = 'You have not entered the password';
    if (fail)
        alert(fail);
    else
        alert('You are connected');
}
//# sourceURL=pen.js
</script><script src="//production-assets.codepen.io/assets/editor/live/check-c263eb37bf3a3d49b8311c096168b478f5750c61a1166ea2cc660498870d671f.js"></script>
</body></html>