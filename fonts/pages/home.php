<?php global $path; ?>
<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="#44b3e2" name="theme-color">
	<title>Home | OpenEnergyMonitor</title>
	<link href="<?php echo $path; ?>theme/favicon.ico" rel="shortcut icon">
	<!-- Load font locally to enable full offline use, un-comment below to load font remotely-->
	<!--<link href="https://fonts.googleapis.com/css?family=ubuntufont:300" rel="stylesheet" type="text/css">-->
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
	<link href="<?php echo $path; ?>theme/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $path; ?>theme/style.php?v=4.2.2" rel="stylesheet" type="text/css">
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
				<div class="navigation" id="siteLinks">
					<ul>
						<li class="actoemLink" title="you are here: the homepage of OpenEnergyMonitor">
							<a href="https://openenergymonitor.org">
							  <i aria-hidden="true" class="fa fa-home"></i>&nbsp;Home
							</a>
						</li>
						<li title="a user guide for the OpenEnergyMonitor system">
							<a href="https://guide.openenergymonitor.org">
							  <i aria-hidden="true" class="fa fa-book"></i>&nbsp;Guide
							</a>
						</li>
						<li title="general information about energy monitoring, diversion and sustainability">
							<a href="https://learn.openenergymonitor.org">
							  <i aria-hidden="true" class="fa fa-mortar-board"></i>&nbsp;Learn
							</a>
						</li>
						<li title="a definitive list of resources for OpenEnergyMonitor hardware">
							<a href="https://guide.openenergymonitor.org/technical/resources/">
							  <i aria-hidden="true" class="fa fa-list-alt"></i>&nbsp;Resources
							</a>
						</li>
						<li title="the openenergymonitor forum">
							<a href="https://community.openenergymonitor.org">
							  <i aria-hidden="true" class="fa fa-comments"></i>&nbsp;Community
							</a>
						</li>
						<li title="keep up with new developments at OpenEnergyMonitor">
							<a href="https://blog.openenergymonitor.org">
							  <i aria-hidden="true" class="fa fa-bullhorn"></i>&nbsp;Blog
							</a>
						</li>
						<li title="the official OpenEnergyMonitor online store">
							<a href="https://shop.openenergymonitor.com">
							  <i aria-hidden="true" class="fa fa-shopping-cart"></i>&nbsp;Shop
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
	<div style="background-color:#fff">
  	<div class="container">
  		<div class="inner tile">
  			<div class="cover" style="height:400px;background-image: url('<?php echo $path; ?>images/gwynt.jpg');">
  				<div class="oemName"><!-- Cover image -->
  					<div class="oemName-inner">
  						Open<strong>EnergyMonitor</strong>
  					</div>
  				</div>
  				<div class="oemDescription">
  					<div class="oemDescription-inner">
  						<strong>Open source monitoring for understanding energy</strong>
  						<br>
  						<div class="oemDescription-inner-second">
  							Exploring the context of renewable energy and zero carbon
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  		<div class="row">
  			<div class="column box2 left">
  				<a href="https://guide.openenergymonitor.org/applications/home-energy">
  				  <div class="inner tile homeenergy" style="background-image:url('<?php echo $path; ?>images/home.png');">
  					  <div style="padding:20px;">
  						  <img class="emoncmsappimg" src="<?php echo $path; ?>images/myelectric_app.png">
  						  <h3>Energy<br>Use</h3>
  						  <ul>
  							  <li>Monitor electricity, temperature and humidity</li>
  							  <li>View historic and real-time data</li>
  							  <li>Local and/or remote data logging</li>
  						  </ul>
  					  </div>
  				  </div>
  				</a>
  			</div>
  			<div class="column box2 right">
  				<a href="https://guide.openenergymonitor.org/applications/solar-pv">
  				  <div class="inner tile solar" style="background-image: url('<?php echo $path; ?>images/solar.jpg');">
  					  <div style="padding:20px">
  						  <img class="emoncmsappimg" src="<?php echo $path; ?>images/mysolar_app.png">
  						  <h3>Solar<br> PV</h3>
  						  <ul>
  							  <li>Explore solar PV generation</li>
  							  <li>Compare consumption</li>
  							  <li>Calculate on-site use</li>
  							  <li>Optimise demand matching</li>
  						  </ul>
  					  </div>
  				  </div>
  				</a>
  			</div>
  		</div>
  		<div style="clear:both"></div>
  		<div class="row">
  			<div class="column box2">
  				<a href="https://guide.openenergymonitor.org/integrations/openevse/">
    				<div class="inner tile openevse" style="background-image: url('<?php echo $path; ?>images/leaf_openevse2.jpg');">
    					<div style="padding:20px;">
    						<h3>OpenEVSE<br>
    						EV Charging</h3>
    						<ul>
    							<li>WiFi connectivity</li>
    							<li>Adjustable charge rate</li>
    							<li>Emoncms data logging</li>
    							<li>Open API</li>
    						</ul>
    					</div>
    				</div>
    			</a>
  			</div>
  			<div class="column box2">
  				<a href="https://heatpumpmonitor.org/">
    				<div class="inner tile heatpump" style="background-image: url('<?php echo $path; ?>images/heatpumpimage.jpg');">
    					<div style="padding:20px">
    						<h3>Heat Pump<br>
    						Monitoring</h3>
    						<ul>
    							<li>Electricity and heat monitoring</li>
    							<li>Track heat pump performance</li>
    							<li>Remote diagnostics</li>
    						</ul>
    					</div>
    				</div>
    			</a>
    		</div>
  		</div>
  		<div style="clear:both"></div>
  	</div>
	</div>
	<div>
		<div class="container">
			<div>
				<div class="row">
					<div class="inner">
						<h2 style="color:#000;margin-top:14px;">Introducing the OpenEnergyMonitor system</h2>
						<p>Pre-assembled open-hardware electricity, temperature and humidity monitoring units<br> based on the Arduino and Raspberry Pi platforms</p>
					</div>
					<div class="flexParent">
					  <a href="https://guide.openenergymonitor.org/setup/">
					    <div class="flexChild">
					      <div class="flexChild-inner tile">
  					      <div class="flexChild-inner-inner emonPi"></div>
  					      <div class="flexChild-inner-inner">
  					        <section>
  					          <h1>emonPi</h1>
  					          <ul>
  					            <li>2x CT Sensor inputs</li>
  					            <li>1x VRMS input</li>
  					            <li>1x Pulse input</li>
  					            <li>6 x Temperature</li>
  					            <li>Emoncms logging</li>
  					            <li>Node-RED & OpenHAB</li>
  					          </ul>
  					        </section>
  					      </div>
  					    </div>
					    </div>
					  </a>
					  <a href="https://guide.openenergymonitor.org/setup/emontx/">
					    <div class="flexChild">
					      <div class="flexChild-inner tile">
  					      <div class="flexChild-inner-inner emonTx"></div>
  					      <div class="flexChild-inner-inner">
  					        <section>
					          <h1>emonTx</h1>
					          <ul>
					            <li>4x CT Sensor inputs</li>
					            <li>1x VRMS input</li>
					            <li>1x Pulse input</li>
					            <li>6 x Temperature</li>
					            <li>Battery option</li>
  					          </ul>
  					        </section>
  					      </div>
  					    </div>
					    </div>
					  </a>
					  <a href="https://guide.openenergymonitor.org/setup/emonth/">
					    <div class="flexChild">
					      <div class="flexChild-inner tile">
  					      <div class="flexChild-inner-inner emonTH"></div>
  					      <div class="flexChild-inner-inner">
  					        <section>
					          <h1>emonTH</h1>
					          <ul>
					            <li>Internal temperature</li>
					            <li>Internal humidity</li>
					            <li>External temperature</li>
					            <li>Pulse input</li>
					            <li>Long battery life</li>
  					          </ul>
  					        </section>
  					      </div>
  					    </div>
					    </div>
					  </a>
					  <a href="https://emoncms.org/">
					    <div class="flexChild">
					      <div class="flexChild-inner tile">
  					      <div class="flexChild-inner-inner Emoncms"></div>
  					      <div class="flexChild-inner-inner">
  					        <section>
					          <h1>EmonCMS</h1>
					          <ul>
					      	    <li>Web application</li>
					      	    <li>Data storage</li>
					      	    <li>Data processing</li>
					      	    <li>Data visualisation</li>
					      	    <li>Cloud or self-hosted</li>
  					          </ul>
  					        </section>
  					      </div>
  					    </div>
					    </div>
					  </a>
					</div>
					<div style="clear:both"></div>
					<div class="buttonLink" style="padding-top:7px">
						<div class="guideShop">
							All products are available to buy from the
							<a href="https://shop.openenergymonitor.com">
								<div class="guideShop-buttons">
									Shop
									<i aria-hidden="true" class="fa fa-shopping-cart"></i>
								</div>
							</a>
						</div>
						<div class="guideShop">
							Get more information on how to set up an OpenEnergyMonitor system from the
							<a href="https://guide.openenergymonitor.org">
								<div class="guideShop-buttons">
									Guide
									<i aria-hidden="true" class="fa fa-book"></i>
								</div>
							</a>
						</div>
					</div>
					<div style="clear:both"></div>
				</div>
			</div>
		</div>
		<div style="margin:14px;"></div>
	</div>
	<div style="background-color: #44b3e2; padding: 20px;">
		<div class="container" style="color:#fff; background-color:#44b3e2;">
			<div class="learnDesc">
				<div class="learnDesc-book">
				  <img src="<?php echo $path; ?>images/book.png" style="float:left; width:80px; padding:10px">
				</div>
				<div class="learnDesc-desc">
					<h2 class="learnDesc-desc-header">Learn</h2>
					<p>
					  An in-depth look at the basic principles of electricity
					  monitoring, sustainable energy and more.
					</p>
				</div>
			</div>
			<div class="column box3">
				<div class="inner learnP">
					<a href="https://learn.openenergymonitor.org/electricity-monitoring/ac-power-theory/introduction">
					  <div class='learnpageIcons'>
						  <i class='fa fa-bolt fa-3x'></i>
						  <div class='iconCircle'></div>
					  </div>
					  <h2>Electricity<br>Monitoring</h2>
					  <p>
					    Learn all about the basics of electricity monitoring, from AC power theory to
					    designing and building your own monitoring system.
					  </p>
					</a>
				</div>
			</div>
			<div class="column box3">
				<div class="inner learnP">
					<a href="https://learn.openenergymonitor.org/sustainable-energy/energy/introduction">
					  <div class='learnpageIcons'>
						  <i class='fa fa-globe fa-3x'></i>
						  <div class='iconCircle'></div>
					  </div>
					  <h2>Sustainable<br>Energy</h2>
					  <p>
					    Exploring the context of energy, renewable supply, energy efficiency
					    and zero carbon energy systems.
					  </p>
					</a>
				</div>
			</div>
			<div class="column box3">
				<div class="inner learnP">
					<a href="https://learn.openenergymonitor.org/pv-diversion/introduction/choosing-an-energy-diverter">
					  <div class='learnpageIcons'>
						  <i class='fa fa-random fa-3x' style="padding: 10px 0 0 5px"></i>
						  <div class='iconCircle'></div>
					  </div>
					  <h2>PV<br>Diversion</h2>
					  <p>
					    Learn how to build a solar PV diverter to
					    make use of excess energy.
					  </p>
					</a>
				</div>
			</div>
		</div>
	</div>
	<footer>
		<div class="footer-wrapper">
			<a href="about">
			  <i aria-hidden="true" class="fa fa-info-circle"></i>&nbsp;About Us
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
	   $(".navigation").animate({ width:'180' },"0.5s");
	}
	$(".fa-navicon").click(function() {
	   openButton();
	   closeStatus = true;
	});
	function closeButton() {
	   $("html, body").removeClass("menuFreeze");
	   $(".blackOut").hide();
	   $(".navigation").animate({ width:'0'},"0.5s");
	}
	$(".blackOut").click(function() {
	   closeButton();
	   closeStatus = false;
	});
	$(window).resize(function() {
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
