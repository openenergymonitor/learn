<!DOCTYPE html>
<html lang="en">
  <meta charset="utf-8">
  <head>
    <?php
      global $path, $session, $github_url;
      $apikey = $session['apikey_read'];
      $q = "";
      if (isset($_GET['q'])) $q = $_GET['q'];
    ?>
    <script>
      var path = "<?php print $path; ?>";
      var session = JSON.parse('<?php echo json_encode($session); ?>');
      var apikey = "<?php print $apikey; ?>";
    </script>
    <title>Learn | OpenEnergyMonitor</title>
    <link rel="icon" href="<?php echo $path; ?>theme/favicon.ico" />
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta name="theme-color" content="#44b3e2" />
    <link rel="stylesheet" type="text/css" href="<?php echo $path; ?>theme/style.php?v=3.2.0" />
    <link rel="stylesheet" href="<?php echo $path; ?>theme/font-awesome.min.css" />
    <script type="text/javascript" src="<?php echo $path; ?>lib/jquery-3.3.1.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
          <?php
          echo "<div class='editGit'><a href=".$github_url.">Edit&nbsp;<i class='fa fa-github' aria-hidden='true'></i></a></div>";
          global $redirected,$redirecterror;
          if ($redirected) echo "<div class='notice'><p><b>Redirect:</b> You have been redirected from Building Block Resources to our new documentation site Learn.</p></div>";
          if ($redirecterror) echo "<div class='warning'><p><b>Redirect error:</b> You have been redirected from Building Blocks Resources to our new documentation site Learn. Sorry we cannot find the page you requested please email support@openenergymonitor.zendesk.com</p></div>";
          echo $content;
          ?>
        <div class="nextPrev">
          <div class="prev"></div><div class="next"></div> <!--important! no white-space-->
        </div>
        <div class = "chapterPage">
          <h2 class="chapterHeading headerIgnore"></h2>
          <hr>
          <p>In this Chapter:</p>
          <div class="chapterContent">
          </div>
        </div>
      </div>
    </div>
    <div id="rightpanel">
      <div id="rightpanel-inner"></div>
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
    <div class="titleHolder">
      <div class="communityWrapper">
        <i class="fa fa-navicon"></i>
  			<a href="/">
        	<div class="titleIcon">
  					<i aria-hidden="true" class="fa fa-mortar-board"></i>
  				</div>
  				<div class="thisTitle">
  					<div class="thisTitle-top">
          		<b>Learn</b>
  					</div>
  					<div class="thisTitle-bottom">
          		Open<b>EnergyMonitor</b>
  					</div>
  				</div>
  			</a>
        <div class="navigationBig">
          <ul>
            <li title="the homepage of OpenEnergyMonitor">
              <a href="https://openenergymonitor.org">
                <i class="fa fa-home" aria-hidden="true"></i><span class="navname">&nbsp;Home</span>
              </a>
            </li>
            <li title="a user guide for the OpenEnergyMonitor system">
              <a href="https://guide.openenergymonitor.org">
                <i class="fa fa-book" aria-hidden="true"></i><span class="navname">&nbsp;Guide</span>
              </a>
            </li>
            <li title="you are here: general information about energy monitoring, diversion and sustainability" class="actoemLink">
              <a href="https://learn.openenergymonitor.org">
                <i class="fa fa-mortar-board" aria-hidden="true"></i><span class="navname">&nbsp;Learn</span>
              </a>
            </li>
            <li title="a definitive list of resources for OpenEnergyMonitor hardware">
              <a href="https://guide.openenergymonitor.org/technical/resources/">
                <i class="fa fa-list-alt" aria-hidden="true"></i><span class="navname">&nbsp;Resources</span>
              </a>
            </li>
            <li title="the openenergymonitor forum">
              <a href="https://community.openenergymonitor.org">
                <i class="fa fa-comments" aria-hidden="true"></i><span class="navname">&nbsp;Community</span>
              </a>
            </li>
            <li title="keep up with new developments at OpenEnergyMonitor">
              <a href="https://blog.openenergymonitor.org">
                <i class="fa fa-bullhorn" aria-hidden="true"></i><span class="navname">&nbsp;Blog</span>
              </a>
            </li>
            <li title="the official OpenEnergyMonitor online store">
              <a href="https://shop.openenergymonitor.com">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="navname">&nbsp;Shop</span>
              </a>
            </li>
            <li title="search for something on OpenEnergyMonitor">
      				<a class="searchIcon">
      					<i aria-hidden="true" class="fa fa-search"></i><span class="navname">&nbsp;Search</span>
      				</a>
      			</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="blackOut"></div>
    <div id="mySidenav" class="sidenav">
      <div class="sidenav_inner">
        <div class="lowermenuWrapper">
          <div class="searchContainer">
            <form method="get" action="https://www.google.com/search">
              <div>
                <input type="hidden" name="sitesearch" value="https://learn.openenergymonitor.org" />
                <input type="text" name="q" size="15" />
                <input type="submit" name="sa" value="&#xf002;" />
              </div>
            </form>
          </div>
          <div class="mainmenuColor">
            <?php
            $menu = json_decode(file_get_contents("menu.json"));
            foreach ($menu as $mk1=>$mv1)
            {
              echo "<div class='toplevelhead'>
              <div class='topIcons'><div class='iconCircle'></div></div><div class='toplevelname'>&nbsp;&nbsp;".$mv1->nicename."</div></div>";
              echo "<div class='toplevel' name='$mk1'>";
              foreach ($mv1->chapters as $mk2=>$mv2)
              {
                echo "<div class='sublevelhead'>
                <span>
                <i id='subIcon' class='fa fa-plus-circle' aria-hidden='true'></i>
                </span>&nbsp;".$mv2->nicename."</div>";
                
                echo "<div class='sublevel' name='$mk2'><ul>";
                foreach ($mv2->pages as $mk3=>$mv3)
                {
                  echo "<li class='menu' name='$mk3'><a href='".$path.$mv3->url."'>".$mv3->nicename."</a></li>";
                }
                
                $chapter_url = explode('/', $path.$mv3->url);
                array_pop($chapter_url);
                $chapter_url = implode('/', $chapter_url);

                echo  "<p class='copyLink copy_url chapterCopy' name='$chapter_url' title='Copy link to clipboard'>
                      <i class='fa fa-clone' aria-hidden='true'></i> URL</p>
                      <p class='copyLink copy_hyperlink chapterCopy'  name='$chapter_url' title='Copy embedded link to clipboard'>
                      <i class='fa fa-clone' aria-hidden='true'></i> Embed</p>";
                
                echo "</div>";
              }
              echo "</div>";
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <div id="siteLinks" class="navigation">
      <ul>
        <li title="the homepage of OpenEnergyMonitor">
          <a href="https://openenergymonitor.org">
            <i class="fa fa-home" aria-hidden="true"></i><span class="navname">&nbsp;Home</span>
          </a>
        </li>
        <li title="a user guide for the OpenEnergyMonitor system">
          <a href="https://guide.openenergymonitor.org">
            <i class="fa fa-book" aria-hidden="true"></i><span class="navname">&nbsp;Guide</span>
          </a>
        </li>
        <li title="you are here: general information about energy monitoring, diversion and sustainability" class="actoemLink">
          <a href="https://learn.openenergymonitor.org">
            <i class="fa fa-mortar-board" aria-hidden="true"></i><span class="navname">&nbsp;Learn</span>
          </a>
        </li>
        <li title="a definitive list of resources for OpenEnergyMonitor hardware">
          <a href="https://guide.openenergymonitor.org/technical/resources/">
            <i class="fa fa-list-alt" aria-hidden="true"></i><span class="navname">&nbsp;Resources</span>
          </a>
        </li>
        <li title="the openenergymonitor forum">
          <a href="https://community.openenergymonitor.org">
            <i class="fa fa-comments" aria-hidden="true"></i><span class="navname">&nbsp;Community</span>
          </a>
        </li>
        <li title="keep up with new developments at OpenEnergyMonitor">
          <a href="https://blog.openenergymonitor.org">
            <i class="fa fa-bullhorn" aria-hidden="true"></i><span class="navname">&nbsp;Blog</span>
          </a>
        </li>
        <li title="the official OpenEnergyMonitor online store">
          <a href="https://shop.openenergymonitor.com">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="navname">&nbsp;Shop</span>
          </a>
        </li>
        <li title="search for something on OpenEnergyMonitor">
  				<a class="searchIcon">
  					<i aria-hidden="true" class="fa fa-search"></i><span class="navname">&nbsp;Search</span>
  				</a>
  			</li>
      </ul>
    </div>
    <input id="holdLink" value="error" />
    <div id="slideNotification">
      <span class="slideNotification-text">Copied to Clipboard</span>
    </div>
  </body>
</html>

<script>

// ----------------------------------------------------------------------------------------
// OEM common bar search...
// ----------------------------------------------------------------------------------------

  $(".searchIcon").click(function() {
    $(".searchBox").css("display","flex");
    $(".searchText").animate({width: "200px"});
    $(".searchText").focus();
    $("html, body").addClass("menuFreeze");
  });
  
  $(".searchBox").click(function() {
    $(".searchBox").hide();
    $(".searchText").css("width","0");
    $("html, body").removeClass("menuFreeze");
    closeNav()
  });
  
  $(".searchBox form").click( function(event) {
     event.stopPropagation();
  });

// ----------------------------------------------------------------------------------------
// No padding if no content in right panel...
// ----------------------------------------------------------------------------------------

  $(window).ready(function(){
    if ($("#rightpanel-inner").html().length === 0){
      $("#rightpanel-inner").css("padding","0")
    }
  });

// ----------------------------------------------------------------------------------------
// Append icons to the top level of the side-bar menu...
// ----------------------------------------------------------------------------------------

  $(".topIcons:eq(0)").append(
   "<i class='fa fa-bolt'></i>");
  $(".topIcons:eq(1)").append(
   "<i class='fa fa-globe'></i>");
  $(".topIcons:eq(2)").append(
   "<i class='fa fa-random' style='padding:10px 0 0 2px;'></i>");
  $(".topIcons:eq(3)").append(
   "<i class='fa fa-bath' style='padding:10px 0 0 2px;'></i>");

// ----------------------------------------------------------------------------------------
// Enable sidebar...
// ----------------------------------------------------------------------------------------

  var fixsidebar = false;
  sidebar_resize(); // Set correct size on loading
  $(".container").css('background-color','#fff');
  $(".sublevel").hide();
  $(".toplevel").hide();

// ----------------------------------------------------------------------------------------
// Show/hide OpenEnergyMonitor site links...
// ----------------------------------------------------------------------------------------

  $(".titleWrapper").click(function(){
    open_topmenu()
  });

  function open_topmenu(){
    $(".navigation").slideToggle("fast");
    $(".titleWrapper").find('#menuSelect').toggleClass('fa-plus-circle fa-minus-circle');
  };

// ----------------------------------------------------------------------------------------
// Display current page link in menu...
// ----------------------------------------------------------------------------------------

  var q = "<?php echo $q; ?>";
  q = q.split("/");
  
  if (q[0] && q[1] != ("")) {
    sl = $(".sublevel[name="+q[1]+"]");
    tl = $(".toplevel[name="+q[0]+"]");
    tl.show();
    tl.prev().addClass("toplevelhead");
    tl.prev().addClass("activeLink_clickedOnce");
    tl.prev().addClass("clickedOnce");
    tl.prev().children(".topIcons").addClass("clickedOnce");
    sl.show();
    sl.prev().addClass("clickedOnce");
    sl.prev().addClass("activeLink_clickedOnce");
    sl.prev().children().find('#subIcon').toggleClass('fa-plus-circle fa-minus-circle');
  
  $("a[href='" + window.location.href.replace(location.hash,"") + "']").parent().addClass("active");
  
  $(window).on('hashchange', function(e){
    $(".menu a").parent().removeClass("active");
    $(".menu a[href='" + window.location.href + "']").parent().addClass("active");
    $('.nextPrev > .next').empty();
    $('.nextPrev > .prev').empty();
    pageLinks();
    $(".chapterPage").css("display","none");
    });
  }

// ----------------------------------------------------------------------------------------
// Open and close top level of menu...
// ----------------------------------------------------------------------------------------

  $(".toplevelhead").click(function() {
    $("#subIcon.fa-minus-circle").toggleClass('fa-minus-circle fa-plus-circle');
    $(".sublevel").slideUp("fast");
    $(".sublevelhead.clickedOnce").removeClass("clickedOnce");
    var sibling = $(this).siblings(".toplevel");
    var siblingHead = $(this).siblings(".toplevelhead");
    if ($(this).hasClass("clickedOnce")) {
      var topLevel = $(this).next();
      topLevel.slideUp("fast");
      $(this).children(".topIcons").removeClass("clickedOnce");
      $(this).removeClass("clickedOnce");
    }
    else {
      siblingHead.next().slideUp("fast");
      siblingHead.removeClass("clickedOnce");
      siblingHead.children(".topIcons").removeClass("clickedOnce");
      $(this).children(".topIcons").addClass("clickedOnce");
      $(this).addClass("clickedOnce");
      var topLevel = $(this).next();
      topLevel.slideDown("fast");
      $("#menuSelect.fa-minus-circle").toggleClass('fa-plus-circle fa-minus-circle');
    }
  });

// ----------------------------------------------------------------------------------------
// Open and close lower level of sidebar...
// ----------------------------------------------------------------------------------------

  $(".sublevelhead").click(function() {
    $(this).find('#subIcon').toggleClass('fa-plus-circle fa-minus-circle');
    var sibling = $(this).siblings(".sublevel");
    var siblingHead = $(this).siblings(".sublevelhead");
    if ($(this).hasClass("clickedOnce")) {
      var sublevel = $(this).next();
      sublevel.slideUp("fast");
      $(this).removeClass("clickedOnce");
    }
    else {
      sibling.slideUp("fast");
      siblingHead.removeClass("clickedOnce");
      siblingHead.find("#subIcon.fa-minus-circle").toggleClass('fa-minus-circle fa-plus-circle');
      $(this).addClass("clickedOnce");
      var sublevel = $(this).next();
      sublevel.slideDown("fast");
      $("#menuSelect.fa-minus-circle").toggleClass('fa-plus-circle fa-minus-circle');
    }
  });

// ----------------------------------------------------------------------------------------
// Open sidebar...
// ----------------------------------------------------------------------------------------

  $(".fa-navicon").click(function(){
    fixsidebar = true;
    $(".sidenav").css("width","0");
    $(".sidenav").show();
    $(".navigation").css("width","0");
    $(".navigation").show();
    $(".navigation").animate({ width:'100' },"0.5s");
    $(".blackOut").show();
    $(".sidenav").delay("slow").show().animate({ width:'300' },"0.5s");
    $("html, body").addClass("menuFreeze");
    $(".lowermenuWrapper").css("margin-left","100px");
    $(".topIcons").css({"display":"block","margin":"0 auto"});
    $(".toplevelname").css({"width":"100%","font-size":"14px"});
    $(".sublevelhead").css("padding-left","10px");
    $(".sublevel").css("padding-left","10px");
    $(".sublevel ul").css("list-style-type","none");
  });

// ----------------------------------------------------------------------------------------
// Close sidebar...
// ----------------------------------------------------------------------------------------

  $(".blackOut").click(function() {
    closeNav();
  });
  
  function closeNav() {
    if ( fixsidebar === true ) {
      fixsidebar = false;
      $("#menuSelect.fa-minus-circle").toggleClass('fa-plus-circle fa-minus-circle');
      $(".blackOut").hide();
      $(".sidenav").hide();
      $(".sidenav").css("width","300px");
      $(".navigation").css("width","0");
      $("html, body").removeClass("menuFreeze");
      $(".lowermenuWrapper").css("margin-left","0");
      $(".topIcons").css({"display":"inline-block","margin":"0"});
      $(".toplevelname").css({"width":"auto","font-size":"18px"});
      $(".sublevelhead").css("padding-left","35px");
      $(".sublevel").css("padding-left","60px");
      $(".sublevel ul").css("list-style-type","circle");
    }
  };

// ----------------------------------------------------------------------------------------
//  Next & previous links on page...
// ----------------------------------------------------------------------------------------

  function pageLinks() {
    var previous = $("li.active").prev('li').html();
    var psLocate = $("li.active").closest(".sublevel").prevAll().eq(2);
    var prevSection = psLocate.text();
    var psLink = psLocate.next().find('a:first').attr('href');
    var next = $("li.active").next('li').html();
    var nsLocate = $("li.active").closest(".sublevel").nextAll().eq(0);
    var nextSection = nsLocate.text();
    var nsLink = nsLocate.next().find('a:first').attr('href');
    var nextCheck = 0;
    var prevCheck = 0;
    if (next != null) {
      $('.nextPrev > .next').append("Next:&nbsp;<br>" + next);
    }
    else if (nsLink != null) {
      $('.nextPrev > .next').append("Next Chapter:<a href=" + nsLink + "><br>" + nextSection + "</a>");
    }
    else if (nsLink == null && next == null) {
      $('.nextPrev > .next').append("Return to:<br><a href='/'>Main Menu</a>");
      nextCheck = 1;
    }
    if (previous != null) {
      $('.nextPrev > .prev').append("Previous:<br>" + previous);
    }
    else if (psLink != null) {
      $('.nextPrev > .prev').append("Previous Chapter:<a href=" + psLink + "><br>" + prevSection + "</a>");
    }
    else if (psLink == null && previous == null) {
      $('.nextPrev > .prev').append("Return to:<br><a href='/'>Main Menu</a>");
      prevCheck = 1;
    }
    if ((prevCheck == 1) && (nextCheck == 1)) {
      $('.nextPrev').css("display","none");
    }
  }
  
  pageLinks();

// ----------------------------------------------------------------------------------------
//  Responsive sidebar...
// ----------------------------------------------------------------------------------------

  function sidebar_resize() {
    var width = $(window).width();
    var height = $(window).height();
    if (width<1080) {
      if (fixsidebar===false) {
        $(".navigation").css("width","0");
      }
      else {
        $(".blackOut").show();
      }
      $(".container").css("margin","42px auto 0");
      }
    else {
      $(".sidenav").css("width","300px");
      $(".container").css("margin-left","300px");
      $(".blackOut").hide();
      $(".navigation").show();
      }
    if (width<1080) { //  Responsive right hand panel
      $("#rightpanel").css("margin","0 auto");
      $("#rightpanel").css("width","100%");
      $(".container").css("float","none");
      $("#rightpanel").css("float","none");
      $(".sidenav").hide();
    }
    else if (width<1260) {
      $("#rightpanel").css("margin-left","300px");
      $("#rightpanel").css("width","100%");
      $(".container").css("float","none");
      $("#rightpanel").css("float","none");
      $(".sidenav").show();
    }
    else if (width<(1260+400)) {
      $("#rightpanel").css("margin-left","300px");
      $("#rightpanel").css("margin-top","42px");
      $("#rightpanel").css("width","960px");
      $(".container").css("float","none");
      $("#rightpanel").css("float","none");
      $(".sidenav").show();
    }
    else {
      var rightwidth = width - 300 - 960 - 20;
      $("#rightpanel").css("margin-left","0px");
      $("#rightpanel").css("margin-top","42px");
      $("#rightpanel").css("width",rightwidth+"px");
      $(".container").css("float","left");
      $("#rightpanel").css("float","left");
      $(".sidenav").show();
    }
  }
  
  var inputFocus = false; // fix resize bug on input
  
  $(".searchContainer :input").focus(function(){
    inputFocus = true;
  });
  
  $(".searchContainer :input").blur(function(){
    inputFocus = false;
  });
  
  var xsize = 0;
  
  $(window).on('load', function(){
    xsize = $( window ).width();
  });
  
  $(window).resize(function() {
    setTimeout(function() {
      if (xsize != $( window ).width()) {
        closeNav();
        sidebar_resize();
        xsize = $( window ).width();
      }
    }, 500);
  });

// ----------------------------------------------------------------------------------------
//  'Copy to Clipboard' Header Links...
// ----------------------------------------------------------------------------------------

  function anchorAttach() {
    $("h1, h2, h3, h4, h5, h6").each(function() {
        var hyphenated = $(this).text().replace(/ /g, '-');
        var hyphenated = hyphenated.toLowerCase();
        var anchorDiv='<a class="anchorLink" name="' + hyphenated + '"></a>';
        $(this).append(anchorDiv);
      }
    );
    
    $("h1, h2, h3, h4, h5, h6").each(function(){
      if (!$(this).hasClass("headerIgnore")) {
        $(this).append(
          "&nbsp;&nbsp;<p class='copyLink copy_url copyLink_hover' title='Copy link to clipboard'>" +
          "<i class='fa fa-clone' aria-hidden='true'></i> URL</p>" +
          "&nbsp;&nbsp;<p class='copyLink copy_hyperlink copyLink_hover' title='Copy embedded link to clipboard'>" +
          "<i class='fa fa-clone' aria-hidden='true'></i> Embed</p>"
        );
      }
    });
  }
  
  anchorAttach();
  
// ----------------------------------------------------------------------------------------
  
  $(document).ready(function() {
    $(".copyLink").click(function() {
      if ($(this).hasClass("copy_url")) {
        var holdLink  = $("#holdLink");
        var this_link = "";
        var url       = "";
        if ($(this).hasClass("chapterCopy")) {
          url       =  $(this).attr('name');
          this_link = url;
        }
        else {
          url            = window.location.href.replace(location.hash,"");
          var parent_id  = $(this).prev('a[name]').attr('name');
          this_link      = url + "#" + parent_id;
        }
        holdLink.val(this_link);
        holdLink.select();
        document.execCommand("copy");
        $("#slideNotification").css("right","0");
        setTimeout(function(){
          $("#slideNotification").css("right","-180px");
        }, 1800);
      }
      else if ($(this).hasClass("copy_hyperlink")) {
        var holdLink       = $("#holdLink");
        var holdLink_inp   =  "";
        if ($(this).hasClass("chapterCopy")) {
          var chapter_embedlink = $(this).attr('name');
          var top_menu_link  = $(".toplevelhead.clickedOnce").text().trim();
          var mid_menu_link  = $(".sublevelhead.clickedOnce").text().trim();
          holdLink_inp       =  "<a href=" + "'" + chapter_embedlink + "'" + ">" +
                                "Learn&rarr;"  +
                                top_menu_link  + "&rarr;" +
                                mid_menu_link + "</a>";
        }
        else {
          var url            = window.location.href.replace(location.hash,"");
          var parent_id      = $(this).prev().prev('a[name]').attr('name');
          var parent_id_name = $(this).parent().clone().children().remove().end().text().trim();
          var this_link      = url + "#" + parent_id;
          var top_menu_link  = $(".toplevelhead.activeLink_clickedOnce").text().trim();
          var mid_menu_link  = $(".sublevelhead.activeLink_clickedOnce").text().trim();
          var sub_menu_link  = $(".menu.active").text().trim();
          holdLink_inp       =  "<a href=" + "'" + this_link + "'" + ">" +
                                "Learn&rarr;"  +
                                top_menu_link  + "&rarr;" +
                                mid_menu_link  + "&rarr;" +
                                sub_menu_link  + "&rarr;" +
                                parent_id_name + "</a>";
        }
        holdLink.val(holdLink_inp);
        holdLink.select();
        document.execCommand("copy");
        $("#slideNotification").css("right","0");
        setTimeout(function(){
          $("#slideNotification").css("right","-180px");
        }, 1800);
      }
    });
  });

// ----------------------------------------------------------------------------------------
//  Chapter Index Page...
// ----------------------------------------------------------------------------------------

  if ((!$(".menu").hasClass("active")) && ($(".sublevelhead").hasClass("activeLink_clickedOnce"))) {
    $(".chapterPage").css("display","block");
    var activeSublevelhead = $(".sublevelhead.activeLink_clickedOnce");
    var activeSublevel = activeSublevelhead.next();
    var chapterContent = $(".chapterContent");
    var replicateSublevelhead = activeSublevelhead.text().trim();
    var replicateactiveSublevel = activeSublevel.clone();
    var replicateactiveSublevel = replicateactiveSublevel.removeClass().addClass("chapterlistStyle");
    var chapterHeading = $(".chapterHeading");
    chapterHeading.text(replicateSublevelhead);
    replicateactiveSublevel.find('li').removeClass().addClass("chaptermenuStyle");
    chapterContent.html(replicateactiveSublevel);

    anchorAttach();
  }
  
// ----------------------------------------------------------------------------------------
//  Scroll Down to Active Link in the Menu...
// ----------------------------------------------------------------------------------------
  
  if ($(".sublevelhead.activeLink_clickedOnce")) {
    var notify = $(".sublevelhead.activeLink_clickedOnce").offset();
    var notify = notify.top - 42;
  }

  $(".sidenav").animate({scrollTop:notify},600);


</script>
