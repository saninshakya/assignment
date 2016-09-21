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

        class AreAnagrams {

            public static function areStringsAnagrams($a, $b) {
                return(count_chars($a, 1)==count_chars($b, 1));
            }

        }
        
        $rslt = new AreAnagrams();
        echo($rslt->areStringsAnagrams('neural', 'unreal'));
        ?>




    </body>
</html>
