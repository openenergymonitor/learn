<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<head>
<?php
  global $path, $session;
  $apikey = $session['apikey_read'];
  $q = "";
  if (isset($_GET['q'])) $q = $_GET['q'];
?>
<script>
  var path = "<?php print $path; ?>";
  var session = JSON.parse('<?php echo json_encode($session); ?>');
  var apikey = "<?php print $apikey; ?>";
</script>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Ubuntu:light,bold&subset=Latin">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="theme-color" content="#777" />
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>theme/style.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="<?php echo $path; ?>lib/jquery-1.11.3.min.js"></script>
</head>
 <body>
  <div id="topnav">
    <nav>
      <div class="learnTitle">
        <div class="learnTitle-iconWrapper">
          <i id="sidebar-open" class="fa fa-bars learnTitle-iconWrapper-icon" style="line-height:42px;"></i>
        </div>
        <div class="learnTitle-titleWrapper">
          <span>
            <span class="boldText">&nbsp;Learn</span>&nbsp;|&nbsp;
        Open<span class="boldText">EnergyMonitor</span>
          </span>
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
            <span><i class="fa fa-mortar-board" aria-hidden="true"></i>&nbsp;Learn
            </span> |
        Open<span>EnergyMonitor
            </span>
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
    <?php echo $content; ?>
    <hr>
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
    $(".oemMenu").hide();
// ----------------------------------------------------------------------------------------
// Show/hide OpenEnergyMonitor site links
// ----------------------------------------------------------------------------------------
    $(".titleWrapper").click(function() {
      $(".oemMenu").slideToggle("fast");
      $(this).find('#menuSelect').toggleClass('fa-chevron-circle-down fa-minus-circle');
    });
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
      sl.show();
      sl.prev().addClass("clickedOnce");
      sl.prev().children().find('#subIcon').toggleClass('fa-plus-circle fa-minus-circle');
      sl.find("li[name='"+q[2]+"']").addClass('active');
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
      $(this).removeClass("clickedOnce");
    }
    else {
      siblingHead.next().slideUp("fast");
      siblingHead.removeClass("clickedOnce");
      $(this).addClass("clickedOnce");
      var topLevel = $(this).next();
      topLevel.slideDown("fast");
      $(".oemMenu").slideUp("fast");
      $("#menuSelect.fa-minus-circle").toggleClass('fa-chevron-circle-down fa-minus-circle');
    }
});
// ----------------------------------------------------------------------------------------
// Open and close top and lower levels of sidebar
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
        $("#topnav").slideDown("fast");
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
// ----------------------------------------------------------------------------------------
//  Responsive right hand panel
// ----------------------------------------------------------------------------------------
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
<<<<<<< HEAD
</script>
=======

var next = $("li.active").next().html();
var previous = $("li.active").prev().html();
var prevSection = $("li.active").closest(".sublevel").prevAll().eq(2).text();
var nextSection = $("li.active").closest(".sublevel").nextAll().eq(0).text();
if (next != null) { $('.nextPrev > .next').append("Next&nbsp;<i class='fa fa-chevron-right' aria-hidden='true'></i><br>" + next);}
  else { $('.nextPrev > .next').append("Next Section:<a><br>" + nextSection + "</a>");}
if (previous != null) { $('.nextPrev > .prev').append("<i class='fa fa-chevron-left' aria-hidden='true'></i>&nbsp;Previous<br>" + previous);}
  else { $('.nextPrev > .prev').append("Previous Section:<a><br>" + prevSection + "</a>");}
</script>
>>>>>>> 3c01448b65bd2389c9d57f59513779cb4a450a89
