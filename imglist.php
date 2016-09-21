<?php
die;
      
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
                        
                        $results = array();
                        strpos_recursive($body,".gif",0,$results);
                        foreach ($results as $line) {
                            print $line." ";
                            
                            if (file_exists("files/$line")) {
                                print "ok";
                                exec("cp files/$line f2/$line");
                            }
                            
                            print "\n";
                        }
                    }
                }
                echo "</ul></div>";
            }
        }
        echo "</div>";
    }
      }
      
function strpos_recursive($haystack, $needle, $offset = 0, &$results = array()) {                
    $offset = strpos($haystack, $needle, $offset);
    if($offset === false) {
        return $results;            
    } else {
        $maxlen = 200;
        $str = substr($haystack,$offset-$maxlen,$maxlen+4);
        $parts = explode("/",$str);
        $results[] = $parts[count($parts)-1];
        return strpos_recursive($haystack, $needle, ($offset + 1), $results);
    }
}
