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

  <div id="mySidenav" class="sidenav" style="display:none">
    <div class="sidenav_inner">
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
                          $nicename = str_replace("-"," ",$dir3);
                          $nicename = str_replace(".html","",$nicename);
                          $nicename = str_replace(".php","",$nicename);
                          $nicename = str_replace(".md","",$nicename);
                          if (is_file("view/$dir/$dir2/$dir3")) {
                              echo "<li name='$dir3'><a href='".$path."$dir/$dir2/$dir3'>$nicename</a></li>";
                          }
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

</body>

<script type="text/javascript" src="<?php echo $path; ?>view/appmenu3.js"></script>


<script>
    // Enable sidebar, set body background
    $(".sidenav").show();
    $(".container").css({margin:"0 0 0 300px"});
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
</script>
