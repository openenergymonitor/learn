<!doctype html>
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

<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:light,bold&subset=Latin">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>theme/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>theme/buttons.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>theme/table.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>theme/forms.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>theme/sidebar.css" />
<script type="text/javascript" src="<?php echo $path; ?>lib/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>lib/feed.js"></script>


<body>

  <div id="topnav" style="display:none">
  <img id="sidebar-open" style="height:100%; cursor:pointer" src="<?php echo $path; ?>theme/list-menu-icon.png">
  </div>
  </div>

  <div id="mySidenav" class="sidenav">
    <div class="sidenav_inner" style="width:300px">
      <img src="<?php echo $path; ?>theme/book.png" style="width:38px; float:left; padding-right:10px; padding-top:6px"/>
      <div style="font-weight:bold; font-size:22px">Open Energy<br>Monitor</div>
      <br><br>
      <div id="appmenu"></div>
      
      <?php
      
      $result = scandir("view");
      for ($i=2; $i<count($result); $i++) {
          $dir = $result[$i];
          $nicename = str_replace("-"," ",$dir);
          if (is_dir("view/$dir")) {
              echo "<div class='toplevelhead'><img src='".$path."theme/electricity-icon.png' style='width:24px; padding-right:5px; '>$nicename</div>";
              echo "<div class='toplevel' name='$dir'>";
              $l2 = scandir("view/$dir");
              for ($i2=2; $i2<count($l2); $i2++) {
                  $dir2 = $l2[$i2];
                  $nicename = str_replace("-"," ",$dir2);
                  
                  if (is_dir("view/$dir/$dir2")) {
                      echo "<div class='sublevelhead'><img src='".$path."theme/expand.png' style='width:12px; padding-right:5px'>$nicename</div>";
                      echo "<div class='sublevel' name='$dir2'><ul>";
                      $l3 = scandir("view/$dir/$dir2");
                      for ($i3=2; $i3<count($l3); $i3++) {
                          $dir3 = $l3[$i3];
                          $name_parts = explode(".",$l3[$i3]);

                          if (count($name_parts)==2) $name = $name_parts[0];                        
                          if (count($name_parts)==3) $name = $name_parts[1]; 
                          $nicename = str_replace("-"," ",$name);
                          $link = strtolower($path."$dir/$dir2/$name");
                          echo "<li name='$dir3'><a href='$link'>$nicename</a></li>";
                      }
                      echo "</ul></div>";
                  }
              }
              echo "</div>";
          }
      }
      
      ?>

    </div>
  </div>


  <div class="container">
    <div class="row">
      <?php echo $content; ?>
    </div>
  </div>
  
  <div id="bodyfade"></div>

</body>

<script type="text/javascript" src="<?php echo $path; ?>view/appmenu3.js"></script>


<script>
    // Enable sidebar, set body background
    // $(".sidenav").show();
    var fixsidebar = false;
    sidebar_resize();
    
    $("body").css('background-color','WhiteSmoke');
    $(".container").css('background-color','#fff');
    
    $(".sublevel").hide();
    $(".toplevel").hide();

    var q = "<?php echo $q; ?>";
    q = q.split("/");
    if (q[0]!="") $(".toplevel[name="+q[0]+"]").show();
    if (q[1]!="") $(".sublevel[name="+q[1]+"]").show();
    if (q[2]!="") $(".sublevel[name="+q[1]+"]").find("li[name='"+q[2]+"']").addClass('active');

    $(".logout").click(function() {
        $.ajax({                   
            url: path+"/logout",
            dataType: 'text',
            success: function(result) {
                window.location = "";
            }
        });
    });


    $(".sublevelhead").click(function() {
        var sublevel = $(this).next();
        // var sublevel = $(".sublevel[name="+name+"]");
        $(".sublevel").hide();
        if (sublevel.is(":visible")) sublevel.hide(); else sublevel.show();
    });

    $(".toplevelhead").click(function() {
        var toplevel = $(this).next();
        // var sublevel = $(".sublevel[name="+name+"]");
        $(".toplevel").hide();
        if (toplevel.is(":visible")) toplevel.hide(); else toplevel.show();
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
});

$("#sidebar-close").click(function(){
    $(".sidenav").css("width","0px");
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
}

$(window).resize(function(){
    sidebar_resize();
});
</script>
