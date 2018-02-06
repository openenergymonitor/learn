<?php global $path; ?>
<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="#44b3e2" name="theme-color">
	<title>Home | OpenEnergyMonitor</title>
	<link href="<?php echo $path; ?>theme/favicon.ico" rel="shortcut icon">
  <!-- Load font locally to enable full offline use, un comment below to load font remotely-->
  <!--<link href="https://fonts.googleapis.com/css?family=ubuntufont:300" rel="stylesheet" type="text/css">-->
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
	<link href="<?php echo $path; ?>theme/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $path; ?>theme/style.php" rel="stylesheet" type="text/css">
	<script src="<?php echo $path; ?>scripts/jquery-3.3.1.min.js"></script>
</head>
<body>
  <div class="oemblueBar">
    <div class="container">
      <div class="titleHolder">
        <i class="fa fa-navicon"></i>
        <a href="/">
        	<div class="titleIcon">
						<i aria-hidden="true" class="fa fa-home"></i>
					</div>
					<div class="thisTitle">
						<div class="thisTitle-top">
          		<b>Home</b>
						</div>
						<div class="thisTitle-bottom">
          		Open<b>EnergyMonitor</b>
						</div>
					</div>
				</a>
        <div class="blackOut"></div>
        <div id="siteLinks" class="navigation">
          <ul>
            <li title="you are here: the homepage of OpenEnergyMonitor" class="actoemLink">
              <a href="https://openenergymonitor.org">
                <i class="fa fa-home" aria-hidden="true"></i>&nbsp;Home
              </a>
            </li>
            <li title="a user guide for the OpenEnergyMonitor system">
              <a href="https://guide.openenergymonitor.org">
                <i class="fa fa-book" aria-hidden="true"></i>&nbsp;Guide
              </a>
            </li>
            <li title="general information about energy monitoring, diversion and sustainability">
              <a href="https://learn.openenergymonitor.org">
                <i class="fa fa-mortar-board" aria-hidden="true"></i>&nbsp;Learn
              </a>
            </li>
            <li title="a definitive list of resources for OpenEnergyMonitor hardware">
              <a href="https://guide.openenergymonitor.org/technical/resources/">
                <i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Resources
              </a>
            </li>
            <li title="the openenergymonitor forum">
              <a href="https://community.openenergymonitor.org">
                <i class="fa fa-comments" aria-hidden="true"></i>&nbsp;Community
              </a>
            </li>
            <li title="keep up with new developments at OpenEnergyMonitor">
              <a href="https://blog.openenergymonitor.org">
                <i class="fa fa-bullhorn" aria-hidden="true"></i>&nbsp;Blog
              </a>
            </li>
            <li title="the official OpenEnergyMonitor online store">
              <a href="https://shop.openenergymonitor.com">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Shop
              </a>
            </li>
	    <li title="search for something on OpenEnergyMonitor">
	      <a class="searchIcon">
	        <i aria-hidden="true" class="fa fa-search"></i>&nbsp;Search
	      </a>
	    </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="searchBox">
    <form target="_blank" id="searchform" action="https://www.google.com/cse">
      <div>
        <input type="hidden" name="cx" value="006198118389747886812:_nmxikw563w" />
        <input type="hidden" name="ie" value="UTF-8" />
        <input type="text" class="searchText" value="" name="q" id="q" autocomplete="off" />
        <input type="submit" id="searchsubmit" name="sa" value="Search" />
      </div>
    </form>
  </div>
  <div style="height:49px;top:0;">
  </div>
  <div class="container" style="text-align:left;padding:0 10px 0 10px;">
    <h2>About</h2>
    <p>The OpenEnergyMonitor project was founded out of a desire for open-source tools to help us relate to our use of energy, our energy systems and the challenge of sustainable energy.
    </p>
    <p>The next 20 years will see a revolution in our energy systems as we switch our energy systems away from fossil fuels to a zero carbon energy supply.
    </p>
    <p>By using energy monitoring, modelling and assessment tools we can take an informed approach to working out what are the best measures to apply. We can then check to ensure solutions meet their expected performance and continue to work well over time.
    </p>
    <p>To explore the OpenEnergyMonitor energy monitoring system see the <a href="https://guide.openenergymonitor.org" style="color:#44b3e2;">Guide</a>.
    </p>
    <p>To learn more about our research into zero carbon energy systems see the sustainable energy section of <a href="https://learn.openenergymonitor.org" style="color:#44b3e2;">Learn</a>.
    </p>
    <p>All of our work is open source (hardware & software). We believe open source is a better way of doing things where we can learn from and build upon each others work, creating better solutions to the challenges we face.
    </p>
    <h2>People</h2>
    <p>The Megni / OpenEnergyMonitor shop team (left to right): Gwil, Glyn, Trystan, Kate, Claire and Amy.
    </p>
    <img src="<?php echo $path; ?>images/megniteam.jpg" style="width:100%">
    <p><strong>Project founders and maintainers:</strong> Trystan Lea and Glyn Hudson.
    </p>
    <p><strong>We would like to give a special thank you to community forum moderators:</strong> Robert Wall, Paul Burnell (pb66), Bill Thomson, Jon Murphy, Paul Reed, Eric Wouters (bidouilleur) – for all of their hard work supporting the project and helping out on the <a href="https://community.openenergymonitor.org" style="color:#44b3e2;">forums</a>.
    </p>
    <h2>Eryri/Snowdonia</h2>
    <p>The OpenEnergyMonitor shop is based in Eryri (Snowdonia) North Wales. We are keen climbers, walkers and mountain bikers.
    </p>
  </div>
  <footer>
    <div class="footer-wrapper">
      <a href="/">
        <i class="fa fa-home" aria-hidden="true"></i>&nbsp;Home
      </a>
      <a href="https://twitter.com/Openenergymon">
        <i class="fa fa-twitter"></i>&nbsp;Twitter
      </a>
    </div>
  </footer>
  <script>
  var closeStatus = false;
  function openButton() {
      $("html, body").addClass("menuFreeze");
      $(".blackOut").show();
      $(".navigation").show();
      $(".navigation").animate({ width:'220' },"0.5s");
  }
  $(".fa-navicon").click(function() {
      openButton();
      closeStatus = true;
  });
  function closeButton() {
      $("html, body").removeClass("menuFreeze");
      $(".blackOut").hide();
      $(".navigation").animate({ width:'0' },"0.5s");
  }
  $(".blackOut").click(function() {
      closeButton();
      closeStatus = false;
  });
  $(window).resize(function(){
      if ($(window).width() > 1079 && closeStatus == true) {
          if (!$("html").hasClass("mobile-device")) {
              closeButton();
              closeStatus = false;
          }
      }
  });
	$(".searchIcon").click(function() {
	   $(".searchBox").css("display","flex");
	   $(".searchText").animate({width: "200px"});
     $(".searchText").focus();
	   $("html, body").addClass("menuFreeze");
	});
	$(".searchBox").click(function() {
	   $(".searchBox").css("display","none");
	   $(".searchText").blur();
	   $(".searchText").css("width","0");
	   closeButton();
	});
	$(".searchBox form").click( function(event) {
     event.stopPropagation();
  });
	</script>
</body>
</html>
