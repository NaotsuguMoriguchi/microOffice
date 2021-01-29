<!DOCTYPE html>
<html>
<head>
    <!-- Meta and Title -->
<?php include("assets/css.php");?>

<?php
    include("config.php");

    $sql = "SELECT * FROM site_title";
    $result = $conn -> query($sql); 
    $siteTitle = "";      
    while ($row = $result -> fetch_row()) { 
        $siteTitle = $row[1];
    }

?>
<title><?=$siteTitle?></title>
</head>
<body class="utility-page sb-l-c sb-r-c">
<!-- Body Wrap -->
<script type="text/javascript">
    function loginsite(){
        location = "server/login.php?user="+$("#username").val()+"&pass="+$("#password").val();
    }
</script>

<script src="https://www.paypal.com/sdk/js?client-id=ASffNEJ6YfyAhn-gajqjK0YzZBAxaw7sCLdBZPo9zT6fq58mOx2mufDOTfXtHNwm9SgWahFvWl9PVhju"></script>
<script>paypal.Buttons().render('dddddd');</script>
<dddddd></dddddd>
<div id="main" class="animated fadeIn">
    <!-- Main Wrapper -->
    <section id="content_wrapper">
        <div id="canvas-wrapper">
            <canvas id="demo-canvas"></canvas>
        </div>
        <!-- Content -->
        <section id="content">
            <!-- Login Form -->
            <div class="allcp-form theme-primary mw320" id="login">
                <div class="bg-primary mw600 text-center mb20 br3 pt15 pb10">
                    <!-- <img src="assets/img/logo.png" alt=""/> -->
                    <div class="logo-widget">
                        <a class="logo-image mtn" href="index.html">
                            <!-- <img src="assets/img/logo.png" alt="" class="img-responsive"> -->
                        </a>
                        

                        <div class="logo-slogan mtn">
                            <div><?=$siteTitle?><span class="text-info"></span></div>
                        </div>
                    </div>
                </div>
                <div class="panel mw320">
                    <form method="post" action="/" id="form-login">
                        <div class="panel-body pn mv10">
                            <div class="section">
                                <label for="username" class="field prepend-icon">
                                    <input type="text" name="username" id="username" class="gui-input"
                                           placeholder="Username or Useremail"/>
                                    <span class="field-icon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </label>
                            </div>
                            <!-- /section -->
                            <div class="section">
                                <label for="password" class="field prepend-icon">
                                    <input type="password" name="password" id="password" class="gui-input"
                                           placeholder="Password"/>
                                    <span class="field-icon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </label>
                            </div>
                            <!-- /section -->
                            <div class="section">
                                <div class="bs-component pull-left pt5">
                                    <div class="radio-custom radio-primary mb5 lh25">
                                        <input type="radio" id="remember" name="remember"/>
                                        <label for="remember">Remember me</label>
                                    </div>
                                </div>
                                <button type="button" onclick="loginsite()" class="btn btn-bordered btn-primary pull-right">Log in</button>
                            </div>
                            
                            <!-- /section -->
                        </div>
                        <div style="width: '100%'; cursor: pointer; font-size: 14px; text-align: center; padding-top: 15px">                              
                            <a href="register.php">- Register User -</a>
                        </div>
                        <!-- /Form -->
                    </form>
                </div>
                <!-- /Panel -->
            </div>
            <!-- /Spec Form -->
        </section>
        <!-- /Content -->
    </section>
    <!-- /Main Wrapper -->
</div>
<!-- /Body Wrap  -->
<!-- Scripts -->
<!-- jQuery -->
<script src="assets/js/jquery/jquery-1.12.3.min.js"></script>
<script src="assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>
<!-- AnimatedSVGIcons -->
<script src="assets/fonts/animatedsvgicons/js/snap.svg-min.js"></script>
<script src="assets/fonts/animatedsvgicons/js/svgicons-config.js"></script>
<script src="assets/fonts/animatedsvgicons/js/svgicons.js"></script>
<script src="assets/fonts/animatedsvgicons/js/svgicons-init.js"></script>
<!-- Scroll -->
<script src="assets/js/utility/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- HighCharts Plugin -->
<script src="assets/js/plugins/highcharts/highcharts.js"></script>
<!-- CanvasBG JS -->
<script src="assets/js/plugins/canvasbg/canvasbg.js"></script>
<!-- Theme Scripts -->
<script src="assets/js/utility/utility.js"></script>
<script src="assets/js/demo/demo.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/demo/widgets_sidebar.js"></script>
<script src="assets/js/pages/dashboard_init.js"></script>
<!-- /Scripts -->
</body>
</html>
