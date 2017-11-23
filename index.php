<?php
	if( !(isset($_GET['d'])) || (empty($_GET['d'])) || (strlen($_GET['d']) != 16) || !(ctype_xdigit($_GET['d'])))
	{
		header('Location: ./error.html', true, 302);
		//echo "<h1>Invalid Parameter#1</h1><br/>";
		//echo "<h1>". $_GET['d'] ."</h1>";
		exit(0);
	}
	else
	{
		$rawData = strtoupper($_GET['d']);
		$uid = substr($rawData, 0, 14);
		$flagTamper = substr($rawData, 14, 2);
		if($uid != '394930000833FB')
		{
			header('Location: ./error.html', true, 302);
			//echo "<h1>Invalid Parameter#2</h1><br/>";
		    //echo "<h1>". $_GET['d'] ."</h1>";
			exit(0);
		}
	}
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js"> <!--<![endif]-->
    <head>

        <!--- basic page needs
        ================================================== -->
        <meta charset="utf-8">
        <title>Implementation of applying NFC technology for product verification Prototype</title>
        <meta name="description" content="">
        <meta name="author" content="NFC Project">

        <!-- mobile specific metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- CSS
   ================================================== -->
        <link rel='stylesheet' href="css/bootstrap.css">
        <link rel="stylesheet" href="css/base.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/vendor.css">
        <link rel="stylesheet" href="css/comArch.css">


        <!-- script
        ================================================== -->
        <script src="js/modernizr.js"></script>


        <!-- favicons
             ================================================== -->

    </head>


    <body id="top" style="background-color: #363330">


        <!-- header
   ================================================== -->
        <header style="top: 0; background-color: #363330;">

            <div class="row">

                <nav id="main-nav-wrap">
                    <ul class="main-navigation" style="padding: 5px 0px 0px 42px;">
                        <li><a href="./about.html" title="">About</a></li>
                    </ul>
                </nav>

                <a class="menu-toggle" href="#"><span>Menu</span></a>

            </div>

        </header> <!-- /header -->

        <!-- Process Section
        ================================================== -->
        <section id="process" class="animation-element bounce-up" style="background-color: #ffffff; min-height: 90vh;">

            <div class="row section-intro">
                <div class="col-twelve with-bottom-line">

                    <h5 style="color: #363330;">NFC INFORMATION</h5>
                    <h1 style="color: #14171c;">Status</h1>

                    <?php
                    if($flagTamper == "AA") {
                      echo "<h3 style='color: red; margin-top: 25px;'>Torn</h3>";
                    }
                    else {
                      echo "<h3 style='color: lightgreen; margin-top: 25px;'>Sealed</h3>";
                    }
                    ?>

                    <p class="lead"></p>

                </div>

            </div>

            <div class="process-content ">

                <div class="col-sm-2  animation-element fade-in"></div>

            </div> <!-- /left-side -->

            <div class="col-sm-8 animation-element fade-in">

                <?php
                if($flagTamper == "AA") {
                  echo '<image src="./images/opened.png" style="    width: 45%; height: auto; margin-left: auto;
                    margin-right: auto; margin-bottom: 35px; display: block;"></image>';
                }
                else {
                  echo '<image src="./images/sealed.png" style="    width: 45%; height: auto; margin-left: auto;
                    margin-right: auto; margin-bottom: 35px; display: block;"></image>';
                }
                ?>

                <p style="color: #363330; margin-bottom: 0; font-family: 'pridi-light', sans-serif;
                  font-size: 2.4rem; text-align: center;">UID: <?php echo $uid?></p>

                <p style="color: #363330; margin-bottom: 0; font-family: 'pridi-light', sans-serif;
                  font-size: 2.4rem; text-align: center;">Tamper Status: <?php echo $flagTamper?></p>

                <p style="color: #363330; margin-bottom: 0; font-family: 'pridi-light', sans-serif;
                  font-size: 2.4rem; text-align: center;">Rolling code: </p>

                <p></p>
                <p></p>
                <p></p>
                <p><image src="./images/logo.png" style="    width: 40%; height: auto; margin-left: auto;
                    margin-right: auto; margin-bottom: 35px; display: block;"></image> </p>



            </div> <!-- /right-side -->



        </div> <!-- /process-content -->

    </section> <!-- /process-->

    <!-- footer
    ================================================== -->
    <footer>



        <div class="footer-bottom">

            <div class="row">

                <div class="col-twelve">
                    <div class="copyright">
                        <span>© Copyright One Night Miracle.co.ltd</span>
                        <span>Design by <a>Pao COE24</a></span>
                    </div>

                    <div id="go-top" style="display: block;">
                        <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon ion-android-arrow-up"></i></a>
                    </div>
                </div>

            </div> <!-- /footer-bottom -->

        </div>

    </footer>

    <div id="preloader">
        <div id="loader"></div>
    </div>

    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-1.11.3.min.js"></script>

    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.js"></script>

    <script>
        var $animation_elements = $('.animation-element');
        var $window = $(window);

        function check_if_in_view() {
            var window_height = $window.height();
            var window_top_position = $window.scrollTop();
            var window_bottom_position = (window_top_position + window_height);

            $.each($animation_elements, function () {
                var $element = $(this);
                var element_height = $element.outerHeight();
                var element_top_position = $element.offset().top;
                var element_bottom_position = (element_top_position + element_height);
                //check to see if this current container is within viewport
                if ((element_bottom_position >= window_top_position) &&
                        (element_top_position <= window_bottom_position)) {
                    $element.addClass('in-view');
                } else {
                    $element.removeClass('in-view');
                }
            });
        }

        $window.on('scroll resize', check_if_in_view);
        $window.trigger('scroll');
    </script>

</body>

</html>
