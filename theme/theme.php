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
<!--<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Ubuntu:light,bold&subset=Latin">-->
<!-- Load font locally to enable full offline use, un comment above to load font remotely-->
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>fonts/ubuntu.css?family=Ubuntu:light,bold&subset=Latin">
<title>Learn | OpenEnergyMonitor</title>
<link rel="shortcut icon" href="<?php echo $path; ?>theme/favicon.ico" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
<meta name="theme-color" content="#44b3e2" />
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>theme/style.css" />
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<!-- Load font awesome resources locally to avoid chrome cross-origin script blocking and enable full offline use.
un-comment above to load resources remotely-->
<link rel="stylesheet" href="<?php echo $path; ?>theme/font-awesome.min.css" />
<script type="text/javascript" src="<?php echo $path; ?>lib/jquery-1.11.3.min.js"></script>
</head>
<body>
  <div id="topnav">
    <nav>
      <div class="learnTitle">
        <div id="sidebar-open">
          <div class="learnTitle-iconWrapper">
            <i class="fa fa-bars learnTitle-iconWrapper-icon" style="line-height:42px;"></i>
          </div>
          <div class="learnTitle-titleWrapper">
            <span>
                <strong>&nbsp;Learn</strong>&nbsp;|&nbsp;Open<strong>EnergyMonitor</strong>
            </span>
          </div>
        </div>
        <div class="learnTitle-topLinks">
          <div class="learnTitle-topLinks-toplinkBox">
            <a href="https://community.openenergymonitor.org/">
              <span class='menuLinks'>
                <i class="fa fa-comments" aria-hidden="true"></i>&nbsp;Community
              </span>
            </a>
          </div>
          <div class="learnTitle-topLinks-toplinkBox">
            <a href="https://shop.openenergymonitor.com/">
              <span class='menuLinks'>
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Shop
              </span>
            </a>
          </div>
          <div class="learnTitle-topLinks-toplinkBox">
            <a href="https://guide.openenergymonitor.org/">
              <span class='menuLinks'>
                <i class="fa fa-book" aria-hidden="true"></i>&nbsp;Guide
              </span>
            </a>
          </div>
          <div class="learnTitle-topLinks-toplinkBox">
            <a href="https://openenergymonitor.org/">
              <span class='menuLinks'>
                <i class="fa fa-home" aria-hidden="true"></i>&nbsp;Home
              </span>
            </a>
          </div>
        </div>
      </div>
    </nav>
  </div>
  <div id="mySidenav" class="sidenav">
    <div class="sidenav_inner">
      <div class="darkerBkd">
        <div class="titleWrapper">
          <div class='menuTitle'>
            <div class="menuSelect"><i id="menuSelect" class="fa fa-chevron-circle-down"></i>
            </div>
              <strong>Learn</strong> | Open<strong>EnergyMonitor</strong>
          </div>
        </div>
        <div class="oemMenu">
          <ul>
            <li>
              <a href="https://community.openenergymonitor.org/">
                <div class='menuLinks'>
                  <i class="fa fa-comments" aria-hidden="true"></i>&nbsp;
                  <span>Community</span> | Open<span>EnergyMonitor</span>&nbsp;
                  <i class="fa fa-external-link-square" aria-hidden="true"></i></span>
                </div>
              </a>
            </li>
            <li>
              <a href="https://shop.openenergymonitor.com/">
                <div class='menuLinks'>
                  <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;
                  <span>Shop</span> | Open<span>EnergyMonitor</span>&nbsp;
                  <i class="fa fa-external-link-square" aria-hidden="true"></i>
                </div>
              </a>
            </li>
            <li>
              <a href="https://guide.openenergymonitor.org/">
                <div class='menuLinks'>
                  <i class="fa fa-book" aria-hidden="true"></i>&nbsp;
                  <span>Guide</span> | Open<span>EnergyMonitor</span>&nbsp;
                  <i class="fa fa-external-link-square" aria-hidden="true"></i>
                </div>
              </a>
            </li>
            <li>
              <a href="https://openenergymonitor.org/">
                <div class='menuLinks'>
                  <i class="fa fa-home" aria-hidden="true"></i>&nbsp;
                  <span>Home</span> | Open<span>EnergyMonitor</span>&nbsp;
                  <i class="fa fa-external-link-square" aria-hidden="true"></i></span>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="lowermenuWrapper">
        <div class="searchContainer">
          <gcse:searchbox-only></gcse:searchbox-only>
        </div>
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
          echo "</div>";
        }
        echo "</div>";
      }

      ?>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <?php
      echo "<div class='editGit'><a href=".$github_url.">Edit&nbsp;<i class='fa fa-github' aria-hidden='true'></i></a></div>";
      echo $content;
      ?>
      <div class="nextPrev">
        <div class="prev"></div><div class="next"></div> <!--important! no white-space-->
      </div>
    </div>
  </div>
  <div id="rightpanel">
    <div id="rightpanel-inner"></div>
  </div>
  <div id="bodyfade"></div>
</body>
</html>
<script>
// ----------------------------------------------------------------------------------------
// Google search
// ----------------------------------------------------------------------------------------
  (function() {
    var cx = '006198118389747886812:hsjk7qeuppa';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
// ----------------------------------------------------------------------------------------
// Append icons to the top level of the side-bar menu
// ----------------------------------------------------------------------------------------
    $(".topIcons:eq(0)").append(
     "<i class='fa fa-bolt'></i>");
    $(".topIcons:eq(1)").append(
     "<i class='fa fa-globe'></i>");
    $(".topIcons:eq(2)").append(
     "<i class='fa fa-random' style='padding:10px 0 0 2px;'></i>");
// ----------------------------------------------------------------------------------------
// Enable sidebar
// ----------------------------------------------------------------------------------------
    var fixsidebar = false;
    sidebar_resize(); // Set correct size on loading
    $(".container").css('background-color','#fff');
    $(".sublevel").hide();
    $(".toplevel").hide();
// ----------------------------------------------------------------------------------------
// Show/hide OpenEnergyMonitor site links
// ----------------------------------------------------------------------------------------
    $(".titleWrapper").click(function(){
      open_topmenu()
    });

    function open_topmenu(){
      $(".oemMenu").slideToggle("fast");
      $(".titleWrapper").find('#menuSelect').toggleClass('fa-chevron-circle-down fa-minus-circle');
    };
// ----------------------------------------------------------------------------------------
// Display current page link in menu
// ----------------------------------------------------------------------------------------
    var q = "<?php echo $q; ?>";
    q = q.split("/");
    if (q[0] && q[1] != ("")) {
      sl = $(".sublevel[name="+q[1]+"]");
      tl = $(".toplevel[name="+q[0]+"]");
      tl.show();
      tl.prev().addClass("clickedOnce");
      tl.prev().children(".topIcons").addClass("clickedOnce");
      sl.show();
      sl.prev().addClass("clickedOnce");
      sl.prev().children().find('#subIcon').toggleClass('fa-plus-circle fa-minus-circle');

    $("a[href='" + window.location.href + "']").parent().addClass("active");

    $(window).on('hashchange', function(e){
      $(".menu a").parent().removeClass("active");
      $(".menu a[href='" + window.location.href + "']").parent().addClass("active");
      $('.nextPrev > .next').empty();
      $('.nextPrev > .prev').empty();
      pageLinks();
      });
    }
// ----------------------------------------------------------------------------------------
// Open and close top level of menu
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
      $(".oemMenu").slideUp("fast");
      $("#menuSelect.fa-minus-circle").toggleClass('fa-chevron-circle-down fa-minus-circle');
    }
});
// ----------------------------------------------------------------------------------------
// Open and close lower level of sidebar
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
      $(".oemMenu").slideUp("fast");
      $("#menuSelect.fa-minus-circle").toggleClass('fa-chevron-circle-down fa-minus-circle');
    }
});
// ----------------------------------------------------------------------------------------
// Open sidebar
// ----------------------------------------------------------------------------------------
    $("#sidebar-open").click(function(){
      $(".sidenav").css("width","300px");
      fixsidebar = true;
      $("#bodyfade").show();
    });
// ----------------------------------------------------------------------------------------
// Close sidebar
// ----------------------------------------------------------------------------------------
    $("#bodyfade").click(function(){
        $(".sidenav").css("width","0px");
        $(".oemMenu").slideUp("fast");
        $("#menuSelect.fa-minus-circle").toggleClass('fa-chevron-circle-down fa-minus-circle');
        $("#topnav").show();
        $("#sidebar-close-btn").css("display","none");
        $("#bodyfade").hide();
        fixsidebar = false;
    });
// ----------------------------------------------------------------------------------------
//  Responsive sidebar
// ----------------------------------------------------------------------------------------
function sidebar_resize() {
    var width = $(window).width();
    var height = $(window).height();
    if (width<1260) {
        if (fixsidebar===false) {
            $(".sidenav").css("width","0");
            $("#topnav").slideDown("fast");
        } else {
            $("#bodyfade").show();
        }
        $(".container").css("margin","0 auto");
    } else {
        $(".sidenav").css("width","300px");
        $("#topnav").slideUp("fast");
        $(".container").css("margin-left","300px");
        $("#bodyfade").hide();
    }
    // --------------------------------------------
    //  Responsive right hand panel
    // --------------------------------------------
    if (width<960) {
        $("#rightpanel").css("margin","0 auto");
        $("#rightpanel").css("width","100%");
        $(".container").css("float","none");
        $("#rightpanel").css("float","none");
    } else if (width<1260) {
        $("#rightpanel").css("margin","0 auto");
        $("#rightpanel").css("width","960px");
        $(".container").css("float","none");
        $("#rightpanel").css("float","none");
    } else if (width<(1260+400)) {
        $("#rightpanel").css("margin-left","300px");
        $("#rightpanel").css("width","960px");
        $(".container").css("float","none");
        $("#rightpanel").css("float","none");
    } else {
        var rightwidth = width - 300 - 960 - 20;
        $("#rightpanel").css("margin-left","0px");
        $("#rightpanel").css("width",rightwidth+"px");
        $(".container").css("float","left");
        $("#rightpanel").css("float","left");
    }
}
$(window).resize(function(){
    sidebar_resize();
});

// ----------------------------------------------------------------------------------------
//  Next & previous links on page
// ----------------------------------------------------------------------------------------
function pageLinks() {
  var previous = $("li.active").prev().html();
  var psLocate = $("li.active").closest(".sublevel").prevAll().eq(2);
  var prevSection = psLocate.text();
  var psLink = psLocate.next().find('a:first').attr('href');
  var next = $("li.active").next().html();
  var nsLocate = $("li.active").closest(".sublevel").nextAll().eq(0);
  var nextSection = nsLocate.text();
  var nsLink = nsLocate.next().find('a:first').attr('href');
  if (next != null) {
    $('.nextPrev > .next').append("Next:&nbsp;<br>" + next);
  }
  else if (nsLink != null) {
    $('.nextPrev > .next').append("Next Chapter:<a href=" + nsLink + "><br>" + nextSection + "</a>");
  }
  else if (nsLink == null && next == null) {
    $('.nextPrev > .next').append("Return to:<br><a href='/'>Main Menu</a>");
  }
  if (previous != null) {
    $('.nextPrev > .prev').append("Previous:<br>" + previous);
  }
  else if (psLink != null) {
    $('.nextPrev > .prev').append("Previous Chapter:<a href=" + psLink + "><br>" + prevSection + "</a>");
  }
  else if (psLink == null && previous == null) {
    $('.nextPrev > .prev').append("Return to:<br><a href='/'>Main Menu</a>");
  }
}
pageLinks();
</script>
<!--



End



-->
