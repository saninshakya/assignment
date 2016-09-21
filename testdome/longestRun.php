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

        class Run {

            public static function indexOfLongestRun($str) {
                $string = 'aabbbbbcddd';
                $pattern = '/(.)\1+/';
                preg_match_all($pattern, $str, $m);
                usort($m[0], function($a, $b) {
                    return (strlen($a) < strlen($b)) ? 1 : -1;
                });
                $char = str_split($m[0][0]);
                $char = $char[0];
                $positions = array();
                $pos = -1;
                while (($pos = strpos($str, $char, $pos + 1)) !== false) {
                    $positions[] = $pos;
                }
                return $positions[0];
            }

        }
        $rslt = new Run();
        echo($rslt->indexOfLongestRun('abbcccddddcccbba'));
        ?>
    </body>
</html>
<!-- The correct Answer is  -->

<?php
class Run
{
    public static function indexOfLongestRun($str)
    {
        $len = 1;
        $longest = 1;
        $lastChar = "";
        for( $i = 0; $i < strlen($str); $i++)
        {
                if ( $str[$i] == $lastChar ) // is current char = last char
                {          
                    $len += 1;     
                    if ( $len >= $longest )
                    {              
                        $longest = $len;   
                        $position = $i - ($longest -1 ); // -1 because of the current char
                    }              
                }          
                else
                {      
                    $lastChar = $str[$i];
                    $len = 1;      
                }          
        }  
        return $position;
    }
}

// For testing purposes (do not submit uncommented):

echo Run::indexOfLongestRun('abbcccddddcccbba');

