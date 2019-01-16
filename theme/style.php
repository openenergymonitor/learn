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

/*--------------------------------------------
HTML,Body...
--------------------------------------------*/

html, body {
  font-family: <?php echo $oemFont; ?>, sans-serif;
  margin: 0;
  height: 100vh;
  overflow-wrap: break-word;
  word-wrap: break-word;
}

html {
  min-height: 100vh;
}

body {
  font-family: <?php echo $oemFont; ?>, sans-serif;
  font-size: 100%;
  margin: 0;
  padding: 0;
  text-align: center;
  background-color: #f5f5f5;
}

:target:before { /* anchor link repositioning fix for fixed top bar */
  content: "";
  display: block;
  height: 50px; /* fixed header height*/
  margin: -50px 0 0; /* negative fixed header height */
}

/*--------------------------------------------
Navigation...
--------------------------------------------*/

.navigationBig {
  position: relative;
  display: inline-block;
  float: right;
  top: 0;
  right: 0;
  margin: 0;
  height: 42px;
  min-width: 750px;
  overflow: visible;
  padding-right: 7px;
  box-sizing: content-box;
}

.navigationBig ul {
  list-style-type: none;
  float: right;
  top: 0;
  margin: 0;
  padding: 0;
  height: 100%;
  display: block;
}

.navigationBig ul li {
  float: left;
  background-color: #44b3e2;
}

.navigationBig ul li a {
  display: block;
  line-height: 42px;
  font-family: <?php echo $oemFont; ?>, sans-serif;
  font-size: 16px;
  text-align: center;
  padding-left: 10px;
  padding-right: 10px;
  color: #ffffff;
}

@media screen and (max-width: 1079px) {
  .navigationBig {
    display: none;
  }
}

.navigation {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  height: 100vh;
  max-height: 100vh;
  width: 0;
  margin: 0;
  font-size: 20px;
  background-color: #44b3e2;
  color: #ffffff;
  box-sizing: border-box;
  overflow: auto;
  min-width: 0;
  padding-right: 0;
  z-index: 9999;
}
  
.navigation ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
  
.navigation ul li a {
  box-sizing: border-box;
  font-family: <?php echo $oemFont; ?>, sans-serif;
  font-size: 20px;
  display: block;
  color: #ffffff;
  padding: 0 20px 0 40px;
  height: 12.5vh;
  line-height: 12.5vh;
  min-width: 100px;
  text-align: left;
}
  
.navigation ul li .fa {
  min-width: 25px;
}

@media screen and (min-width: 1080px) {
  .navigation {
    display: none;
  }
}

.menuFreeze {
  height: 100%;
  overflow: hidden;
}

/*--------------------------------------------
length of Oem site links...
--------------------------------------------*/

.navigationBig ul li:nth-child(1) {
  width: 88px;
}
.navigationBig ul li:nth-child(2) {
  width: 86px;
}
.navigationBig ul li:nth-child(3) {
  width: 92px;
}
.navigationBig ul li:nth-child(4) {
  width: 123px;
}
.navigationBig ul li:nth-child(5) {
  width: 133px;
}
.navigationBig ul li:nth-child(6) {
  width: 76px;
}
.navigationBig ul li:nth-child(7) {
  width: 80px;
}
.navigationBig ul li:nth-child(8) {
  width: 96px;
}

/*---------------------------------------------------------------------/
//  OEM common bar search...
/*---------------------------------------------------------------------*/

.searchBox {
  width: 100%;
  height: 100%;
  top: 0;
  position: absolute;
  background-color: rgba(0,0,0,0.8);
  color: #fff;
  display: none;
  cursor: pointer;
  z-index: 9999999999;
}

.searchBox form {
  margin: auto;
}

.searchBox input[type=submit] {
  cursor: pointer;
  padding: 10px;
  font-size: 20px;
  font-weight: bold;
  background-color: #44b3e2;
  color: #fff;
  border: none;
  -webkit-transition: background-color 500ms linear;
  -ms-transition: background-color 500ms linear;
  transition: background-color 500ms linear;
  -webkit-appearance: none;
}

.searchBox input[type=submit]:hover {
  background-color: #77c8ea;
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

/*---------------------------------------------------------------------/
//  Layout...
/*---------------------------------------------------------------------*/

.container {
  min-height: 100%;
  text-align: left;
  margin-top: 42px;
}

#rightpanel {
  width: 100%;
  text-align: left;
}

#rightpanel-inner {
  padding: 20px;
}

.row {
  padding: 15px 20px 20px 20px;
  max-width:960px;
  box-sizing: border-box;
  background-color: #ffffff;
}

@media (max-width: 450px) {
  .container {
    width: 100%;
  }
}

@media (min-width: 450px) and (max-width: 960px) {
  .container {
    width: 100%;
  }
}

@media (min-width: 1080px) {
  .container {
    width: 960px;
    margin-left: 300px;
  }
}

/*---------------------------------------------------------------------/
//  Pages...
/*---------------------------------------------------------------------*/

.title {
  font-size: 42px;
  padding: 20px;
}

.description {
  font-size: 22px;
}

.visnavblock {
  color: #44b3e2;
  font-size: 18px;
}

.visnav {
  margin-right: 4px;
  padding-left: 8px;
  padding-right: 8px;
  min-width: 20px;
  background-color: rgba(6, 153, 250, 0.1);
  line-height: 28px;
  float: left;
  text-align: center;
}

.visnav:hover {
  color: #44b3e2;
  cursor: pointer;
}

.login-box {
  text-align: center;
  background-color: rgba(255, 255, 255, 0.2);
  width: 300px;
  margin: 0 auto;
  border-radius: 15px;
  padding: 10px;
}

#register-open {
  cursor: pointer;
}

#register-open:hover {
  color: rgba(255, 255, 255, 0.8);
}

#register-cancel {
  cursor: pointer;
}

#register-cancel:hover {
  color: rgba(255, 255, 255, 0.8);
}

#alert {
  font-size: 14px;
  padding-top: 15px;
  padding-bottom: 5px;
}

.icon-alert {
  display: inline-block;
  width: 18px;
  height: 18px;
  background-size: contain;
  background-repeat: no-repeat;
  margin-bottom: -3px;
  padding-right: 5px;
  background-image: url('alert-icon.png');
}

#config-error {
  display: none;
  background-color: rgba(226, 50, 50, 1.0);
  padding: 10px;
}

.bluenav {
  float: right;
  display: block;
  border-left: 1px solid rgba(255, 255, 255, 0.5);
  font-weight: bold;
  font-size: 14px;
  padding: 11px;
  cursor: pointer;
  min-width: 30px;
  text-align: center;
}

.bluenav:hover {
  background-color: rgba(255, 255, 255, 0.2);
}

.menu {
  padding-bottom: 0;
}

.appendix-section {
  background-color: #ecf5ff;
}

.appendix-section .title {
  background-color: #86bdf4;
  padding: 10px;
  color: #fff;
  font-size: 14px
}

.appendix-section .content {
  padding: 0 10px 10px 10px;
}

/*---------------------------------------------------------------------/
//  Google search...
/*---------------------------------------------------------------------*/

.mainmenuColor {background-color: #ffffff;
  color: #44b3e2;
}

@media screen and (min-width: 1080px) {
  .mainmenuColor {
    color: #ffffff;
    background-color: #44b3e2;
  }
}

.searchContainer {
  box-sizing: border-box;
  width: 200px;
  margin: 0 auto;
  padding: 0;
  height: 50px;
  text-align: center;
}

@media screen and (max-width: 1079px) {
  .searchContainer {
    display: none;
  }
}

.searchContainer input[type=text]{
  margin-top: 10px;
  float:left;
  box-sizing: border-box;
  padding: 5px;
  height: 30px;
  width: 170px;
  border: none;
}

.searchContainer input[type=submit]{
  margin-top: 10px;
  float: right;
  box-sizing: border-box;
  font-family: "FontAwesome";
  padding: 5px;
  cursor: pointer;
  height: 30px;
  width: 30px;
  border: none;
  color: #fff;
  background-color: #777777;
}

/*---------------------------------------------------------------------/
//  Github edit link...
/*---------------------------------------------------------------------*/

.editGit {
  margin-top: -12px;
  margin-right: -15px;
  float: right;
}

.editGit a {
  background-color: #c4c4c4;
  padding: 5px 10px 5px 10px;
  color: #ffffff;
  border-bottom-left-radius: 6px;
  border-bottom-right-radius: 6px;
  transition: 0.3s;
}

.editGit a:hover {
  background-color: #dcdcdc;
}

@media screen and (max-width: 650px) {
  .editGit {
    display:none;
  }
}

/*---------------------------------------------------------------------/
//  Next & previous links on page...
/*---------------------------------------------------------------------*/

.nextPrev {
  box-sizing: border-box;
  border-top: 2px solid #000000;
  padding: 10px 0 0 0;
  width: 100%;
  color: black;
  font-size: 100%;
  text-align: center;
}

.next {
  display: inline-block;
  width: 50%;
  vertical-align:top;
}

.prev {
  display: inline-block;
  width: 50%;
  vertical-align:top;
}

.next i, .prev i {
  text-shadow: none;
}

.next a, .prev a {
  font-weight: bold;
  color: #44b3e2;
  max-width: 100px ;
}

/*---------------------------------------------------------------------/
// Warning, notice & note...
/*--------------------------------------------------------------------*/

.warning {
  padding: 0 10px 0 10px;
}

.warning p {
  padding: 10px;
  color: #ffffff;
  background-color: #b23535;
}

.notice {
  padding: 0;
}

.notice p {
  padding: 15px;
  color: #000;
  background-color: #f9ff9f;
}

.note {
  padding: 0 10px 0 10px;
}

.note p {
  padding: 10px;
  color: #ffffff;
  background-color: #44b3e2;
}

.note a {
color: #ffffff;
font-weight: bold;
}

/*---------------------------------------------------------------------/
// Topnav...
/*--------------------------------------------------------------------*/

.communityWrapper {
  position: relative;
  box-sizing: border-box;
  margin: 0 auto;
  width: 100%;
  height: 42px;
}

@media (min-width: 1080px) {
  .communityWrapper {
    width: 1080px;
  }
}

@media screen and (max-width: 400px) {
  .oemWrap {
    display: none;
  }
}

.fa-navicon {
  display: none !important;
  cursor: pointer;
  font-size: 30px !important;
  line-height: 42px !important;
  position: absolute;
  left: 0;
  color: #ffffff;
  padding-left: 12px;
  z-index: 999;
}

@media screen and (max-width: 1079px) {
  .fa-navicon {
    display: inline-block !important;
  }
}

.titleHolder {
  position: fixed;
  top: 0;
  width: 100%;
  height: 42px;
  background-color: #44b3e2;
  overflow: hidden;
  box-shadow: 0 -2px 4px 2px #000;
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
    font-size: 24px;
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
.navname {
  line-height: 42px;
}

@media screen and (max-width: 1079px) {
  .navname {
    display:none;
  }
}

.actoemLink {
  background-color: #368fb4 !important;
}

.actoemLink a {
  color: #ffffff !important;
}

.blackOut {
  position: fixed;
  display: none;
  top: 0;
  right: 0;
  height: 100vh;
  width: 100%;
  background-color: rgba(0,0,0,0.5);
  overflow: hidden;
  cursor: pointer;
}

/*---------------------------------------------------------------------/
// Table
/*--------------------------------------------------------------------*/

.container table {
  width:100%;
  border-collapse: collapse;
}

.container table th {
  text-align:left;
  border: 1px solid #ddd;
  padding:6px 13px;
  background-color: #777;
  color: #ffffff;
  font-weight: bold;
}

.container table td {
  text-align:left;
  border: 1px solid #ddd;
  padding:6px 13px;
}

.xaxiswrapper {
  overflow-x: auto;
  background-color: transparent;
}

/*---------------------------------------------------------------------/
//  Webkit scrollbar
/*---------------------------------------------------------------------*/

.xaxiswrapper::-webkit-scrollbar {
  width: 12px;
}

.xaxiswrapper::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
  background-color: #ffffff;
}

.xaxiswrapper::-webkit-scrollbar-thumb {
  background: #777777;
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);
}

pre::-webkit-scrollbar {
  width: 12px;
}

pre::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
  background-color: #ffffff;
}

pre::-webkit-scrollbar-thumb {
  background: #777777;
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);
}

.sidenav::-webkit-scrollbar {
  width: 12px;
}

.sidenav::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
  background-color: #4eb7e3;
}

.sidenav::-webkit-scrollbar-thumb {
  background: #1b84b0;
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);
}

/*---------------------------------------------------------------------/
//  Sidenav
/*---------------------------------------------------------------------*/

.sidenav {
  width: 300px;
  margin-top: 42px;
  max-height: 100vh;
  min-height: 100vh;
  overflow-x: hidden;
  overflow-y: auto;
  position: fixed;
  display: block;
  top: 0;
  left: 0;
  color:#ffffff;
  float: left;
  text-align:left;
  background-color: #ffffff;
  -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

@media screen and (min-width: 1080px) {
  .sidenav {
    background-color: #44b3e2;
    max-height: calc(100vh - 42px);
    min-height: calc(100vh - 42px);
  }
}

.sidenav a  {
  padding: 8px 8px 0 0;
  text-decoration: none;
  color: #44b3e2;
  display: block;
}

@media screen and (min-width: 1080px) {
  .sidenav a  {
    color: #ffffff;
  }
}

.sidenav table td {
  border: none;
}

@media screen and (max-height: 450px) {
  .sidenav a {font-size: 18px;
  }
}

.sidenav_inner {
  box-sizing: border-box;
  padding: 0;
  width: 300px;
}

.titleWrapper {
  width: 100%;
  height: 42px;
  cursor: pointer;
  white-space: nowrap;
}

.menuTitle {
  line-height: 42px;
  padding: 0 15px 0 15px;
  box-sizing: border-box;
  position: absolute;
  width: 100%;
  min-width: 300px;
  height: 42px;
  background-color: #777;
}

.menuSelect {
  float: right;
  margin-right: 7px;
  font-size: 1.4em;
}

.lowermenuWrapper {
  background-color: #368fb4;
}

@media screen and (max-width: 1079px) {
  .sidenav {
    display: none;
    width: 0;
    margin-top: 0;
  }
  .lowermenuWrapper {
    padding-top: 0;
  }
}

.toplevelhead {
  box-sizing: border-box;
  cursor: pointer;
  padding: 25px 15px 5px 15px;
  font-size: 18px;
}

.toplevelhead:hover > .topIcons {
  border: 4px solid #ffffff;
  background-color: #777777;
  color: #ffffff;
}

.sublevelhead {
  cursor: pointer;
  padding: 15px 0 15px 35px;
}

.sublevelhead:hover {
  font-weight: bold;
}

.sublevel {
  padding: 0 0 0 60px;
}

.sublevel ul {
  list-style-type: circle;
  margin: 0;
  padding: 0;
}

.sublevel ul li {
  max-width: 230px;
  margin-right: 30px;
}

.sublevel ul li a {
  padding: 16px;
}

.sublevel ul li:hover a {
  font-weight: bold;
}

.sublevel ul li:hover {
  list-style-type: disc;
}

.sublevel ul li a:first-child {
  padding-top: 5px;
}

.clickedOnce {
  font-weight: bold;
}

.active {
  font-weight: bold;
  list-style-type: disc;
}

li.active a {
  font-weight: bold;
}

.menuLinks {
  line-height: 42px;
}

.menuLinks span {
  font-weight: bold;
}

.topIcons, .learnpageIcons {
  display: inline-block;
  width: 48px;
  height: 48px;
  margin: 0;
  padding: 0;
  font-size: 30px;
  text-align: center;
  line-height: 48px;
  border: 4px solid #44b3e2;
  box-shadow: 2px 2px 2px rgba(150, 150, 150, 0.5);
  border-radius: 50%;
  transition: background-color 0.3s;
}

@media (min-width: 1080px) {
  .topIcons, .learnpageIcons {
    border: 4px solid #ffffff;
  }
}

.topIcons.clickedOnce {
  border: 4px solid #ffffff;
  background-color: #777777;
  color: #ffffff;
}

.toplevelname {
  display: inline-block;
  line-height: 56px;
  text-align: center;
}

/*---------------------------------------------------------------------/
//  'Copy to Clipboard' Header Links...
/*---------------------------------------------------------------------*/

#holdLink {
  position: absolute;
  left: -9999px;
}

h1, h2, h3, h4, h5, h6 {
  cursor: default;
}

.row h1:hover .copyLink,
.row h2:hover .copyLink,
.row h3:hover .copyLink,
.row h4:hover .copyLink,
.row h5:hover .copyLink,
.row h6:hover .copyLink {
  display: inline;
}

.copyLink {
  box-sizing: border-box;
  display: none;
  cursor:pointer;
  color: <?php echo $oemBlue; ?>;
  text-shadow: none;
  padding: 2px;
  font-size: 14px;
  line-height: 16px;
  border-radius: 3px;
}

.copyLink:hover {
  background-color: <?php echo $oemBlue; ?>;
  color: <?php echo $oemWhite; ?>;
}

.anchorLink {
  position: absolute;
  margin-top: -60px;
}

/*---------------------------------------------------------------------/
//  General...
/*---------------------------------------------------------------------*/

.fa {
  text-shadow: 2px 2px 2px rgba(150, 150, 150, 0.5);
}

a {
  font-size: 14px;
  text-decoration: none;
  color: #44b3e2;
}

p {
  color: #333;
  font-size: 14px
}

p a {
  word-wrap: break-word;
}

h2 {
  margin: 0;
  margin-bottom: 10px;
  color: #333;
}

h3 {
  padding: 2px 0 2px 0;
  margin: 10px 0 10px 0;
}

h4 {
  padding: 2px 0 2px 5px;
  font-size: 14px;
  background-color: #333;
  color: #ffffff;
}

pre {
  border: 1px solid #ffffff;
  background-color: #eee;
  padding: 20px;
  overflow-x: auto;
  text-align: left;
}

ol {
  color: #333;
  font-size: 14px;
  padding-left: 15px;
}

li {
  font-size: 14px;
}

img {
  max-width: 100%;
}

hr {
  border: 0;
  height: 1px;
  background: #ccc;
  margin: 0;
  padding:0;
}

small a {
  font-size: 12px;
}
