<?php

$result = scandir("view");
for ($i=2; $i<count($result); $i++) {
    $dir = $result[$i];
    $nicename = str_replace("-"," ",$dir);
    if (is_dir("view/$dir")) {
    
        $l2 = scandir("view/$dir");
        for ($i2=2; $i2<count($l2); $i2++) {
            $dir2 = $l2[$i2];
            $nicename = str_replace("-"," ",$dir2);
            
            if (is_dir("view/$dir/$dir2")) {
                
                $l3 = scandir("view/$dir/$dir2");
                for ($i3=2; $i3<count($l3); $i3++) {
                    $dir3 = $l3[$i3];
                    $nicename = str_replace("-"," ",$dir3);
                    $nicename = str_replace(".html","",$nicename);
                    $nicename = str_replace(".php","",$nicename);
                    if (is_file("view/$dir/$dir2/$dir3")) {
                        $body = file_get_contents("view/$dir/$dir2/$dir3");
                        $body = str_replace("http://lab.megni.co.uk/oemdocs/","",$body);
                        echo "view/$dir/$dir2/$dir3\n";
                        $fh = fopen("view/$dir/$dir2/$dir3","w");
                        fwrite($fh,$body);
                        fclose($fh);
                    }
                }
                echo "</ul></div>";
            }
        }
        echo "</div>";
    }
      }
