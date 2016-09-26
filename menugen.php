<?php

    $pages = json_decode(file_get_contents("menu.json"));
    if ($pages==null) {
        $pages = new stdClass;
        print "Pages object is null\n";
    }
    
    $result = scandir("view");
    for ($i=2; $i<count($result); $i++) {
        $dir1 = $result[$i];
        $nicename = str_replace("-"," ",$dir1);
        $nicename = ucwords($nicename);
        
        if (!isset($pages->$dir1)) {
            print "- Adding new book $dir1\n";
            $pages->$dir1 = new stdClass;
            $pages->$dir1->nicename = $nicename;
            $pages->$dir1->chapters = new stdClass;
        }
        
        if (is_dir("view/$dir1")) {
            $l2 = scandir("view/$dir1");
            for ($i2=2; $i2<count($l2); $i2++) {
                $dir2 = $l2[$i2];
                $nicename = str_replace("-"," ",$dir2);
                $nicename = ucwords($nicename);
                
                if (!isset($pages->$dir1->chapters->$dir2)) {
                    print "- Adding new chapter $dir2\n";
                    $pages->$dir1->chapters->$dir2 = new stdClass;
                    $pages->$dir1->chapters->$dir2->nicename = $nicename;
                    $pages->$dir1->chapters->$dir2->pages = new stdClass;
                }
                    
                if (is_dir("view/$dir1/$dir2")) {
                    $l3 = scandir("view/$dir1/$dir2");
                    for ($i3=2; $i3<count($l3); $i3++) {
                        $dir3 = $l3[$i3];
                        if (!isset($pages->$dir1->chapters->$dir2->pages->$dir3)) {
                        
                            $nicename = str_replace("-"," ",$dir3);
                            $nicename = str_replace(".html","",$nicename);
                            $nicename = str_replace(".php","",$nicename);
                            $nicename = str_replace(".md","",$nicename);
                            $nicename = ucfirst($nicename);
                            
                            if (is_file("view/$dir1/$dir2/$dir3")) {
                                $pages->$dir1->chapters->$dir2->pages->$dir3 = new stdClass;
                                $pages->$dir1->chapters->$dir2->pages->$dir3->nicename = $nicename;
                                $pages->$dir1->chapters->$dir2->pages->$dir3->url = "$dir1/$dir2/$dir3";
                            }
                        }
                    }
                }
            }
        }
    }
    
    $fh = fopen("menu.json","w");
    fwrite($fh,json_encode($pages,JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
