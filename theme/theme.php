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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="<?php echo $path; ?>lib/jquery-1.11.3.min.js"></script>
</head>

<body>

  <div id="topnav" style="display:none">
    <img id="sidebar-open" src="<?php echo $path; ?>theme/list-menu-icon.png">
    <div class="menuTitle">
      <span style="color:#ffffff"><span style="font-weight:bold;">
      &nbsp;Learn</span> | Open<span style="font-weight:bold;">EnergyMonitor</span></span>
    </div>
    
  </div>

  <div id="mySidenav" class="sidenav">
    <div class="titleWrapper">
      
      <span class='learnTitle'>
        <span>Learn</span> | Open<span>EnergyMonitor</span>
        <span><i id="menuSelect" class="fa fa-chevron-circle-down"></i></span>
      </span>
    
    </div>
    <div class="oemMenu">

      <ul>

       <li><a href="https://community.openenergymonitor.org/">
           <span class='menuLinks'><span>Community</span> | Open<span>EnergyMonitor</span>&nbsp;
           <i class="fa fa-external-link-square" aria-hidden="true"></i></span></a></li>
       <li><a href="https://shop.openenergymonitor.com/">
           <span class='menuLinks'><span>Shop</span> | Open<span>EnergyMonitor</span>&nbsp;
           <i class="fa fa-external-link-square" aria-hidden="true"></i></span></a></li>
       <li><a href="https://guide.openenergymonitor.org/">
           <span class='menuLinks'><span>Guide</span> | Open<span>EnergyMonitor</span>&nbsp;
           <i class="fa fa-external-link-square" aria-hidden="true"></i></span></a></li>

      </ul>

    </div>

    <div class="sidenav_inner" style="width:300px">

      <?php

      $menu = json_decode(file_get_contents("menu.json"));

      foreach ($menu as $mk1=>$mv1)
      {
          echo "<div class='toplevelhead'>
            <span class='topIcons'></span>&nbsp;".$mv1->nicename."</div>";
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
    $(".oemMenu").hide();

// ----------------------------------------------------------------------------------------
// Append icons to the top level of the side-bar menu
// ----------------------------------------------------------------------------------------

   $( ".topIcons:eq( 0 )" ).append( "<i class='fa fa-bolt'></i>" );
   $( ".topIcons:eq( 1 )" ).append( "<i class='fa fa-globe'></i>" );
   $( ".topIcons:eq( 2 )" ).append( "<i class='fa fa-share-alt'></i>" );
   
// ----------------------------------------------------------------------------------------
// Show/hide OpenenergyMonitor site links
// ----------------------------------------------------------------------------------------

    $(".titleWrapper").click(function() {
      $(".oemMenu").toggle("fast");
      $(this).find('#menuSelect').toggleClass('fa-chevron-circle-down fa-minus-circle')
      $(this).toggleClass("noborder");
    });

// ----------------------------------------------------------------------------------------
// Display current page link in menu
// ----------------------------------------------------------------------------------------
      var q = "<?php echo $q; ?>";
      q = q.split("/");
      if (q[0] && q[1] != ("")) {
        console.log(q)
        sl = $(".sublevel[name="+q[1]+"]");
        tl = $(".toplevel[name="+q[0]+"]");
        tl.show();
        tl.prev().addClass("topclickedOnce");
        sl.show();
        sl.prev().addClass("clickedOnce");
        sl.prev().children().find('#subIcon').toggleClass('fa-plus-circle fa-minus-circle')
        sl.find("li[name='"+q[2]+"']").addClass('active');
      }


// ----------------------------------------------------------------------------------------
// Open and close top level of menu
// ----------------------------------------------------------------------------------------

    $(".toplevelhead").click(function() {
    var $this = $(this);
    var sibling = $this.siblings(".toplevel");
    var siblingHead = $this.siblings(".toplevelhead");
    if ($this.hasClass("topclickedOnce")) {
      var topLevel = $(this).next();
      topLevel.hide("fast");
      $this.removeClass("topclickedOnce");
    }
    else {
      siblingHead.next().hide("fast");
      siblingHead.removeClass("topclickedOnce");
      $this.addClass("topclickedOnce");
      var topLevel = $(this).next();
      topLevel.show("fast");
    }
});

// ----------------------------------------------------------------------------------------
// Open and close sub level of menu
// ----------------------------------------------------------------------------------------

    $(".sublevelhead").click(function() {
    $(this).find('#subIcon').toggleClass('fa-plus-circle fa-minus-circle');
    var sibling = $(this).siblings(".sublevel");
    var siblingHead = $(this).siblings(".sublevelhead");
 //   console.log(siblingHead.children("#subIcon.fa-minus-circle"));
    if ($(this).hasClass("clickedOnce")) {
      var sublevel = $(this).next();
      sublevel.hide("fast");
      $(this).removeClass("clickedOnce");
    }
    else {
      sibling.hide("fast");
      siblingHead.removeClass("clickedOnce");
      siblingHead.find("#subIcon.fa-minus-circle").toggleClass('fa-minus-circle fa-plus-circle');
      $(this).addClass("clickedOnce");
      var sublevel = $(this).next();
      sublevel.show("fast");
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
