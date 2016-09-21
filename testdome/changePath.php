<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Test Demo</title>
        <link rel="stylesheet" type="text/css" href="css/mystyle.css" />
        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    </head>
    <body>
       <?php

//        class Path {

//            function __construct($path) {
//                $this->currentPath = $path;
//            }
//
//            function cd($newPath) {
//                $path = new Path($newPath);
//                $dot = explode("/", $newPath);
//                $rslt = count($dot);
//                $newpath = $path->currentPath;
//                $str = substr($newpath, 0, -($rslt - 1));
//                $currentPath = $str . $dot[1];
//                return($currentPath);
//            }
//
//        }
//
//        $path = new Path('/a/b/c/d');
//        echo $path->cd('../x')->currentPath;
            
       
   ?>
        <?php
     //////////////////// ANOther Solution
            
  class Path {

    public $currentPath;
    private $array;

    function __construct($path) {
        $this->currentPath = $path;
        $this->array = array_slice(explode("/", $path), 1);
    }

    public function cd($newPath) {
        if ($newPath == "" || $newPath == ".") {
            return $this;
        }

        $change = explode("/", $newPath);
        foreach ($change as $value) {
            if ($value == "..") {
                if (count($this->array) > 0) {
                    array_pop($this->array);
                }
            } elseif ($value !== "") {
                array_push($this->array, $value);
            }
        }

        if (count($this->array) > 0) {
            $this->currentPath = "/" . implode("/", $this->array);
        } else {
            $this->currentPath = "/";
        }
        return $this;
    }

}

// For testing purposes (do not submit uncommented):

$path = new Path('/a/b/c/d');
echo $path->cd('../x')->currentPath;
              
        
?>

    </body>
</html>
