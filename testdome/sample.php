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
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // To find longest run
        // echo(longestrun('aabbbbccbb'));
        // function longestrun($myList){
        //   $letters = str_split($myList);
        //   $result  = array_fill_keys($letters, 1);
        //   $previous = '';
        //   $pos = 1;
        //   $check =0;
        //   foreach($letters as $letter) {
        //       if($letter == $previous) {
        //             $pos++;
        //           if ($check !=1){
        //             $maxrepeat ++;
        //           }
        //           $check =1;
        //       }
        //       $check =0;
        //       $previous = $letter;
        //   }
        //   // arsort($result);
        //   // print_r($result);
        //   return $pos;
        // }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // Write a function that provides change directory (cd) function for an abstract file system.
        // Notes:
        // Root path is '/'.
        // Path separator is '/'.
        // Parent directory is addressable as '..'.
        // Directory names consist only of English alphabet letters (A-Z and a-z).
        // For example:
        // $path = new Path('/a/b/c/d');
        // echo $path->cd('../x')->currentPath;
        // should display '/a/b/c/x'.
        // Note: The evaluation environment uses '\' as the path separator.
        // class Path
        // {
        //     function __construct($path)
        //     {
        //         $this->currentPath = $path;
        //     }   
        //     function cd($newPath)
        //     {
        //         $path = new Path('/a/b/c/d');
        //         $dot = explode("/",$newPath);
        //         $rslt = count($dot);
        //         $newpath = $path->currentPath;
        //         $str = substr($newpath, 0, -($rslt-1));
        //         $currentPath = $str . $dot[1];
        //         echo($currentPath);    
        //     }
        // }
        // $path = new Path('/a/b/c/d');
        // echo $path->cd('../x');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ?>

        <!-- For Javascript code -->


        <script type="text/javascript">
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            // function registerClickHandler() {
            //   $('#clickme').click(function(e) {
            //     setTimeout(function() {
            //       alert(e.currentTarget.innerHTML);
            //     }, 200);
            //   });
            // }
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            // Question 3 of 3 Skills: JAVASCRIPT
            // Fix the bugs in the registerHandlers function. An alert should display anchor's zero-based index within a document instead of following the link.

            // For example, in the document below, the alert should display "2" when Google anchor is clicked since it is the third anchor element in the document and its zero-based index is 2.
            // function registerHandlers() {
            //     var as = document.getElementsByTagName("a");
            //     for (var i = 0; i < as.length; i++) {
            //         as[i].onclick = function() {
            //           alert(i);
            //           return false;
            //         }
            //     }
            // }

            // jQuery(document).ready(function($) {
            //         var elements = document.getElementsByTagName('a');
            //         for (var i = 0, len = elements.length; i < len; i++) {

            //             (function(index) {
            //                 elements[i].onclick = function() {
            //                     alert(index);
            //                 }
            //             })(i);
            //         }

            //     });

        </script>

       <!--  In my life, I used the following web search engines:<br/>
        <a href="#" onclick="registerHandlers()">Yahoo!</a><br/>
        <a href="#" onclick="registerHandlers()">AltaVista</a><br/>
        <a href="#" onclick="registerHandlers()">Google</a><br/> -->


<!-- ////////////////////////////////////////////////////////////////////////////////////////////////// -->

Function appendChildren should add a new child div to each existing div. New divs should be decorated by calling decorateDiv.

For example, after appendChildren is executed, the following divs:

  <div id="a">
    <div id="b">
    </div>
  </div>
should take the following form (assuming decorateDiv does nothing):

  <div id="a">
    <div id="b">
      <div></div>
    </div>
    <div></div>
  </div>
The code below should do the job, but for some reason it goes into an infinite loop. Fix the bugs.

function appendChildren() {
  var allDivs = document.getElementsByTagName("div");

  for (var i = 0; i < allDivs.length; i++) {
    var newDiv = document.createElement("div");
    decorateDiv(newDiv);
    allDivs[i].appendChild(newDiv);
  }
}

// Mock of decorateDiv function for testing purposes
function decorateDiv(div) {}





    </body>
</html>