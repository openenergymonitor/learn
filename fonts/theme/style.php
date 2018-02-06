<?php global $path; ?>

<?php

  header("Content-type: text/css; charset: UTF-8");

  $oemBlue = "#44b3e2";
  $oemDarkBlue = "#368fb4";
  $oemGray = "#e3e3e3";
  $oemDarkGray = "#333333";
  $oemWhite = "#ffffff";
  $oemBlack = "#000000";
  $oemFont = "Ubuntu-OEM";
  $oemTileShadow = "0 0 5px 2px rgba(0,0,0,.35);";

?>

@font-face {
  font-family: <?php echo $oemFont; ?>;
  src: url(<?php echo $path; ?>../fonts/Ubuntu-OEM-Light.ttf)
}

@font-face {
  font-family: <?php echo $oemFont; ?>;
  src: url(<?php echo $path; ?>../fonts/Ubuntu-OEM-Bold.ttf)
  font-weight: bold;
}

@font-face {
  font-family: <?php echo $oemFont; ?>;
  src: url(<?php echo $path; ?>../fonts/Ubuntu-OEM-LightItalic.ttf)
  font-style: italic;
}

@font-face {
  font-family: <?php echo $oemFont; ?>;
  src: url(<?php echo $path; ?>../fonts/Ubuntu-OEM-BoldItalic.ttf)
  font-weight: bold;
  font-style: italic;
}

html, body {
  margin: 0; height: 100vh;
}

html {
  min-height: 100vh;
}

body {
  font-family: <?php echo $oemFont; ?>, sans-serif;
  padding: 0;
  background-color: <?php echo $oemWhite; ?>;
  color: <?php echo $oemDarkGray; ?>;
  width: 100%;
  text-align: center;
}

.container {
  box-sizing: border-box;
  margin: 0 auto;
  width: 1080px;
  overflow: hidden;
}

.box {
  width: 233px;
  float: left;
  background-color: <?php echo $oemGray; ?>;
  text-align: left;
  height: 300px;
}

.homeenergy, .solar, .openevse, .heatpump {
  background-size: cover;
  min-height: 400px;
  color: <?php echo $oemWhite; ?>;
  text-align: left;
}

@media (max-width: 620px) {
  .homeenergy, .solar, .openevse, .heatpump {
    min-height: 250px;
  }
}

@media (min-width: 800px) {
  .homeenergy, .solar, .openevse, .heatpump {
    min-height: 300px;
  }
}

.zerocarbon {
  background-size: cover;
  color: <?php echo $oemWhite; ?>;
}

.cover {
  background: <?php echo $oemWhite; ?> no-repeat left center;
  background-size: cover;
}

.halfbox {
  width: 480px;
  float: left;
}

h3 {
  font-size: 30px;
}

a {
  text-decoration: none;
  color: <?php echo $oemWhite; ?>;
}

a:visited {
  text-decoration: none;
  color: <?php echo $oemWhite; ?>;
}

a:hover {
  text-decoration: none;
  color: <?php echo $oemWhite; ?>;
}

.fa {
  text-shadow: 2px 2px 2px rgba(150,150,150,0.5)
}

.box4 a {
  text-decoration: none;
  color: <?php echo $oemWhite; ?>;
  cursor: pointer;
}

.box4 a:visited {
  text-decoration: none;
  color: <?php echo $oemBlack; ?>;
}

.box4 a:hover {
  text-decoration: none;
  color: <?php echo $oemDarkGray; ?>;
}

.emoncmsappimg {
  float: right;
  width: 250px
}

.oemheading {
  color: <?php echo $oemBlue; ?>;
  font-size: 30px;
  font-weight: bold;
  font-family:  <?php echo $oemFont; ?>, sans-serif;
}

.oemheading2 {
  color: <?php echo $oemWhite; ?>;
  padding-top: 80px;
  padding-bottom: 20px;
  font-size: 45px;
  font-weight: bold;
}

.column,
.columns {
  width: 100%;
  float: left;
  text-align: left;
  box-sizing: border-box; }

.b4img {
  width: 100%;
  min-height: 130px;
}

.b4dsc {
  box-sizing: border-box;
  width: 100%;
  height: 135px;
  overflow: auto;
  padding-top: 0;
}

@media (max-width: 900px) {
  .b4dsc li {
    font-size: 12px;
  }
}

.box2 {
  overflow: hidden;
}

.box2 ul {
  padding-left: 15px;
}

@media (max-width: 619px) {
  .b4dsc {
    width: 50%;
    float: right;
    padding-top: 0;
    height: 130px;
  }
}

@media (max-width: 619px) {
  .container {
    width: 100%;
  }

  .emoncmsappimg {
    width: 200px
  }

  .oemheading { font-size: 30px; }
  .oemheading2 { padding-top: 30px; font-size: 27px; }
  .b4img {width: 50%;float: left;}
}

@media (min-width: 620px) and (max-width: 799px) {
  .container {
    width: 100%;
  }

  .box2 { width: 50%; }
  .box3 { width: 33%; }
  .box4 { width: 25%; }
  .b4dsc {min-height: 15px;}
}

@media (min-width: 800px) and (max-width: 1079px) {
  .container {
    width: 100%;
      /*width: 100%;*/
  }

  .emoncmsappimg {
    width: 200px
  }

  .box2 { width: 50%; }
  .box3 { width: 33%; }
  .box4 { width: 25%; }
}

@media (min-width: 1080px) {
  .container {
    width: 1080px;
  }

  .box2 { width: 50%; }
  .box3 { width: 33%; }
  .box4 { width: 25%; }
}

.inner { margin: 7px;}
.tile {box-shadow: <?php echo $oemTileShadow; ?>}
.box3 { text-align: center; }

/*---------------------------------------------------------------------/
// Cover image
/*--------------------------------------------------------------------*/

.oemName {
  color: <?php echo $oemWhite; ?>;
  width: 100%;
  height: 50%;
  display: table;
}

.oemName-inner {
  display: table-cell;
  vertical-align: middle;
  font-size: 42px;
  padding: 10px;
}

.oemDescription {
  color: <?php echo $oemWhite; ?>;
  width: 100%;
  height: 50%;
  display: table;
  text-shadow: 0 0 20px rgba(0,0,0,0.1);
}

.oemDescription-inner {
  display: table-cell;
  vertical-align: middle;
  font-size: 24px;
  padding: 10px;
}

.oemDescription-inner-second {
  font-size: 20px;
  margin: 5px auto;
}

@media (max-width: 500px) {
  .oemName-inner {
    font-size: 30px;
  }

  .oemDescription-inner {
    font-size: 16px;
    padding: 20px;
  }

  .oemDescription-inner-second {
    font-size: 14px;
    max-width: 200px;
  }
}

@media (min-width: 500px) and (max-width: 799px) {
  .oemName-inner {
    font-size: 40px;
  }
}

@media (min-width: 800px) {
  .oemName-inner {
    font-size: 50px;
  }
}

/*---------------------------------------------------------------------/
// System
/*--------------------------------------------------------------------*/

.flexParent {
  display: flex;
  width: 100%;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: space-evenly;
}

.flexParent a {
  color: black;
}

.flexChild {
  height: 280px;
  width: 220px;
  margin: 10px;
}

@media (max-width: 480px) {
  .flexChild {
    width: 100vw;
  }
}

.flexChild-inner {
  margin: 7px;
}

.flexChild-inner-inner {
	height: 140px;
	font-size: 14px;
	text-align: center;
	background-color: #eeeeee;
	margin: 0;
}

.flexChild-inner-inner ul {
  display: inline-block;
  width: 180px;
  margin: 0;
  padding: 5px 0 0 0;
  text-align: left;
  list-style-position: inside;
}

.flexChild-inner-inner h1 {
  margin: 0;
  padding-top: 5px;
}

.emonPi {
  background-image: url("<?php echo $path; ?>../images/emonpi.jpg");
  background-size: cover;
}

.emonTx {
  background-image: url("<?php echo $path; ?>../images/emontx.jpg");
  background-size: cover;
}

.emonTH {
  background-image: url("<?php echo $path; ?>../images/emonth.png");
  background-size: cover;
}

.Emoncms {
  background-image: url("<?php echo $path; ?>../images/emoncms.png");
  background-size: cover;
}

.guideShop {
  margin: 20px;
}

.guideShop-buttons {
  display: inline-block;
  font-weight: bold;
  white-space: nowrap;
  width: 72px;
  margin: 2px;
  background-color: <?php echo $oemBlue; ?>;
  color: <?php echo $oemWhite; ?>;
  padding: 5px;
  border-radius: 5px;
  box-shadow: <?php echo $oemTileShadow; ?>;
  cursor: pointer;
}

/*---------------------------------------------------------------------/
// Learn
/*--------------------------------------------------------------------*/

.learnDesc {
  width: 600px;
  height: 100px;
  margin: 0 auto;
  box-sizing: border-box;
}

.learnDesc-book {
  box-sizing: border-box;
  display: inline-block;
}

.learnDesc-desc {
  box-sizing: border-box;
  display: inline-block;
  width: 400px;
  vertical-align: top;
  height: 120px;
  padding: 18px 0 10px 0;
  overflow: auto;
}

.learnDesc-desc-header {
  text-align: left;
  margin: 0;
}

.learnDesc-desc p {
  text-align: left;
  margin: 0;
}

@media (max-width: 600px) {
  .learnDesc {
    width: 100%;
    height: 200px;
  }
  .learnDesc-desc {
    width: 50%;
    height: 200px;
    overflow: hidden;
  }
}

.learnP {
  padding: 0 5px 0 5px;
}

.learnpageIcons {
  width: 180px;
  height: 180px;
  box-sizing: border-box;
  border: 8px solid <?php echo $oemBlue; ?>;
  display: table;
  background-color: <?php echo $oemWhite; ?>;
  color: <?php echo $oemWhite; ?>;
  box-shadow: none;
  transition: 0.3s ease-in-out;
  margin: 0 auto;
	padding: 0;
	font-size: 30px;
	text-align: center;
	line-height: 48px;
  border-radius: 50%;
}

.learnpageIcons i {
  display: table-cell;
  vertical-align: middle;
  text-align: center;
  text-shadow: none;
  color: <?php echo $oemBlue; ?>;
}

/*--------------------------------------------
    custom header...
--------------------------------------------*/

.oemblueBar {
  position: fixed;
  width: 100%;
  top: 0;
  height: 42px;
  background-color: <?php echo $oemBlue; ?>;
  -webkit-box-shadow: 0 -2px 4px 2px <?php echo $oemBlack; ?>;
  -moz-box-shadow: 0 -2px 4px 2px <?php echo $oemBlack; ?>;
  box-shadow: 0 -2px 4px 2px <?php echo $oemBlack; ?>;
}

@media screen and (max-width: 400px) {
  .oemWrap {
    display: none;
  }
}

.fa-navicon {
  display: none;
  cursor: pointer;
  font-size: 30px;
  line-height: 42px;
  position: absolute;
  left: 0;
  color: <?php echo $oemWhite; ?>;
  padding-left: 12px;
  z-index: 1;
}

@media screen and (max-width: 1079px) {
  .fa-navicon {
    display: inline-block;
  }
}

.titleHolder {
  position: relative;
  top: 0;
  width: 100%;
  height: 42px;
  background-color: <?php echo $oemBlue; ?>;
  overflow: hidden;
}

.titleIcon {
  position: absolute;
  display: inline-block;
  left: 0;
  height: 42px;
  padding: 0 0 0 7px;
  text-align: center;
  line-height: 42px;
  color: <?php echo $oemWhite; ?>;
}

  .titleIcon i {
    vertical-align: middle;
    font-size: 32px;
  }

.thisTitle {
  position: absolute;
  display: inline-block;
  box-sizing: border-box;
  left: 42px;
  right: 0;
  height: 42px;
  padding: 5px 0 5px 0;
  text-align: left;
  color: <?php echo $oemWhite; ?>;
}

  .thisTitle a {
    color: <?php echo $oemWhite; ?>;
  }

@media screen and (max-width: 1079px) {
  .titleIcon {
    left: auto;
    right: 0;
    padding: 0 7px 0 0;
  }

  .thisTitle {
    right: 42px;
    left: 0;
    text-align: right;
  }

    .thisTitle a {
      padding-right: 0;
    }
}

.thisTitle-top {
  top: 0;
  height: 60%;
  font-size: 18px;
}

.thisTitle-bottom {
  bottom: 0;
  height: 40%;
  font-size: 12px;
}

/*--------------------------------------------
    site links on larger screens...
--------------------------------------------*/

.navigation {
  position: absolute;
  display: inline-block;
  top: 0;
  right: 0;
  height: 42px;
  min-width: 774px;
  overflow: visible;
  padding-right: 7px;
}

  .navigation ul {
    float: right;
    list-style-type: none;
    top: 0;
    margin: 0;
    padding: 0;
    height: 100%;
  }

  .navigation ul li {
    float: left;
    background-color: <?php echo $oemBlue; ?>;
  }

  .navigation ul li a {
    display: block;
    line-height: 42px;
    font-family:  <?php echo $oemFont; ?>, sans-serif;
    font-size: 16px;
    text-align: center;
    padding-left: 10px;
    padding-right: 10px;
    color: <?php echo $oemWhite; ?>;
  }

@media screen and (min-width: 1080px) {
  .navigation ul li:nth-child(1) {
    width: 88px;
  }
  .navigation ul li:nth-child(2) {
    width: 86px;
  }
  .navigation ul li:nth-child(3) {
    width: 92px;
  }
  .navigation ul li:nth-child(4) {
    width: 123px;
  }
  .navigation ul li:nth-child(5) {
    width: 133px;
  }
  .navigation ul li:nth-child(6) {
    width: 76px;
  }
  .navigation ul li:nth-child(7) {
    width: 80px;
  }
  .navigation ul li:nth-child(8) {
    width: 96px;
  }
}

/*--------------------------------------------
    site links on smaller screens...
--------------------------------------------*/

.menuFreeze {
  height: 100%;
  overflow: hidden;
}

@media screen and (max-width: 1079px) {
.navigation {
  position: fixed;
  display: none;
  top: 0;
  left: 0;
  height: 100vh;
  margin: 0;
  width: 0;
  font-size: 20px;
  background-color: <?php echo $oemBlue; ?>;
  color: <?php echo $oemWhite; ?>;
  box-sizing: border-box;
  overflow: auto;
  min-width: 0;
  padding-right: 0;
  z-index: 3;
}

  .navigation ul {
    list-style-type: none;
    margin: 0;
    padding-top: 0;
  }

  .navigation ul li a {
    box-sizing: border-box;
    font-family:  <?php echo $oemFont; ?>, sans-serif;
    font-size: 20px;
    display: block;
    color: <?php echo $oemWhite; ?>;
    padding: 0 20px 0 20px;
    height: 12.5vh;
    line-height: 12.5vh;
    min-width: 180px;
    text-align: left;
  }

  .navigation ul li .fa {
    min-width: 25px;
  }
}

@media (max-width: 1079px) and (min-height: 550px) {
  .navigation ul li a {
    height: 68.75px;
    line-height: 68.75px;
  }
}

@media (max-width: 1079px) and (max-height: 200px) {
  .navigation ul li a {
    height: 25px;
    line-height: 25px;
  }
}

/*--------------------------------------------
    grayed out overlay when menu is active...
--------------------------------------------*/

.blackOut {
  position: fixed;
  display: none;
  top: 0;
  right: 0;
  height: 100vh;
  width: 100vw;
  background-color: rgba(0,0,0,0.5);
  overflow: hidden;
  cursor: pointer;
  z-index: 2;
}

/*--------------------------------------------
    highlight active link...
--------------------------------------------*/

.actoemLink {
  background-color: <?php echo $oemDarkBlue; ?> !important;
}

  .actoemLink a {
    color: <?php echo $oemWhite; ?> !important;
  }

/*--------------------------------------------
    footer...
--------------------------------------------*/

footer {
  position: relative;
  background-color: <?php echo $oemDarkBlue; ?>;
  width: 100%;
  height: 50px;
}

.footer-wrapper {
  height: 100%;
}

.footer-wrapper a {
  display: inline-block;
  height: 100%;
  line-height: 50px;
  cursor: pointer;
  margin: 0 20px 0 20px;
  font-size: 16px;
}

/*--------------------------------------------
    search...
--------------------------------------------*/

.searchBox {
  width: 100%;
  height: 100%;
  position: absolute;
  background-color: rgba(0,0,0,0.8);
  color: <?php echo $oemWhite; ?>;
  display: none;
  cursor: pointer;
}

.searchBox form {
  margin: auto;
}

.searchBox input[type=submit] {
  cursor: pointer;
  padding: 10px;
  font-size: 20px;
  font-weight: bold;
  background-color: <?php echo $oemBlue; ?>;
  color: <?php echo $oemWhite; ?>;
  border: none;
  -webkit-transition: background-color 500ms linear;
  -ms-transition: background-color 500ms linear;
  transition: background-color 500ms linear;
  -webkit-appearance: none;
}

.searchBox input[type=text] {
  padding: 10px;
  font-size: 20px;
  border: none;
}

.searchText {
  width: 0;
}

.searchIcon {
  cursor: pointer;
}
