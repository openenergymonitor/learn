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
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>theme/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>theme/table.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>theme/sidebar.css" />
<script type="text/javascript" src="<?php echo $path; ?>lib/jquery-1.11.3.min.js"></script>
</head>

<body>

  <div id="topnav" style="display:none">
  <img id="sidebar-open" style="height:100%; cursor:pointer" src="<?php echo $path; ?>theme/list-menu-icon.png">
  </div>
  </div>

  <div id="mySidenav" class="sidenav">
    <div class="titleWrapper">
      <!--<div><img src="<?php echo $path; ?>theme/book.png" style="width:38px; float:left; padding-right:10px; padding-top:6px"/></div>-->
      <div class='oemLearn'>Learn | <span>Open</span>EnergyMonitor</div>
    </div>
    <div class="sidenav_inner" style="width:300px">

      <?php

      $menu = json_decode(file_get_contents("menu.json"));

      foreach ($menu as $mk1=>$mv1)
      {
          echo "<div class='toplevelhead'><img class='openclosetop' src='".$path."theme/electricity-icon.png' style='width:24px; padding-right:5px; '>".$mv1->nicename."</div>";
          echo "<div class='toplevel' name='$mk1'>";

          foreach ($mv1->chapters as $mk2=>$mv2)
          {
              echo "<div class='sublevelhead'><img class='openclosemenu' src='".$path."theme/expand.png' style='width:12px; padding-right:5px'>".$mv2->nicename."</div>";
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

  <div class="container">
    <div class="row">
      <?php echo $content; ?>
    </div>
  </div>

  <div id="rightpanel">
      <div id="rightpanel-inner"></div>
  </div>

  <div id="bodyfade"></div>

</body>
</html>

<script>
    // Enable sidebar, set body background
    // $(".sidenav").show();
    var fixsidebar = false;
    sidebar_resize();

    $("body").css('background-color','WhiteSmoke');
    $(".container").css('background-color','#fff');

    $(".sublevel").hide();
    $(".toplevel").hide();

// ----------------------------------------------------------------------------------------
// Display current page link in menu
// ----------------------------------------------------------------------------------------

      var q = "<?php echo $q; ?>";
      q = q.split("/");
      if (q != "") {
        sl = $(".sublevel[name="+q[1]+"]");
        tl = $(".toplevel[name="+q[0]+"]");
        tl.show(250);
        tl.prev().addClass("topclickedOnce");
        tl.prev().children("img.openclosetop").attr('src','<?php echo $path; ?>theme/book.png');
        sl.show(250);
        sl.prev().addClass("clickedOnce");
        sl.prev().children("img.openclosemenu").attr('src','<?php echo $path; ?>theme/book.png');
        $(".sublevel[name="+q[1]+"]").find("li[name='"+q[2]+"']").addClass('active');
       }


// ----------------------------------------------------------------------------------------
// Open and close top-level menu
// ----------------------------------------------------------------------------------------

    $(".toplevelhead").click(function() {
    var $this = $(this);
    var sibling = $this.siblings(".toplevel");
    var siblingHead = $this.siblings(".toplevelhead");
    var image = $this.children("img.openclosetop");
    if ($this.hasClass("topclickedOnce")) {
      var topLevel = $(this).next();
      topLevel.hide(250);
      $this.removeClass("topclickedOnce");
      image.attr('src','<?php echo $path; ?>theme/electricity-icon.png');
    }
    else {
      siblingHead.next().hide(250);
      siblingHead.removeClass("topclickedOnce");
      siblingHead.children("img.openclosetop").attr('src','<?php echo $path; ?>theme/electricity-icon.png');
      $this.addClass("topclickedOnce");
      var topLevel = $(this).next();
      topLevel.show(250);
      image.attr('src','<?php echo $path; ?>theme/book.png');
    }
});

// ----------------------------------------------------------------------------------------
// Open and close sub-level menu
// ----------------------------------------------------------------------------------------

    $(".sublevelhead").click(function() {
    var $this = $(this);
    var sibling = $this.siblings(".sublevel");
    var siblingHead = $this.siblings(".sublevelhead");
    var image = $this.children("img.openclosemenu");
    if ($this.hasClass("clickedOnce")) {
      var sublevel = $(this).next();
      sublevel.hide(250);
      $this.removeClass("clickedOnce");
      image.attr('src','<?php echo $path; ?>theme/expand.png');
    }
    else {
      sibling.hide(250);
      siblingHead.removeClass("clickedOnce");
      siblingHead.children("img.openclosemenu").attr('src','<?php echo $path; ?>theme/expand.png');
      $this.addClass("clickedOnce");
      var sublevel = $(this).next();
      sublevel.show(250);
      image.attr('src','<?php echo $path; ?>theme/book.png');
    }
});

// ----------------------------------------------------------------------------------------
// Sidebar
// ----------------------------------------------------------------------------------------

$("#sidebar-open").click(function(){
  $("#topnav").hide();
  // $(".sidenav").css("transition","width 2s");
  $(".sidenav").css("width","300px");
  fixsidebar = true;
  // $(".container").css("background-color","rgba(0,0,0,0.4)");
  $("#bodyfade").show();
  $("#sidebar-close-btn").css("display","inline");
});

$("#sidebar-close").click(function(){
    $(".sidenav").css("width","0px");
});

// ----------------------------------------------------------------------------------------
// Close Sidebar
// ----------------------------------------------------------------------------------------

$("#sidebar-close-btn, #bodyfade").click(function(){
    $(".sidenav").css("width","0px");
    $("#topnav").show();
    $("#sidebar-close-btn").css("display","none");
    $("#bodyfade").hide();
    fixsidebar = false;
});

function sidebar_resize() {
    var width = $(window).width();
    var height = $(window).height();
    $("#sidenav").height(height-41);

    if (width<1260) {
        if (fixsidebar===false) {
            $(".sidenav").css("width","0px");
            $("#topnav").show();
        } else {
            $("#bodyfade").show();
        }
        $(".container").css("margin","0 auto");
    } else {
        $(".sidenav").css("width","300px");
        $("#topnav").hide();
        $(".container").css("margin-left","300px");
        $("#bodyfade").hide();
    }

    // Responsive right hand panel

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
</script>
