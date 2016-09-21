<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Test Demo</title>
        <link rel="stylesheet" type="text/css" href="css/mystyle.css" />
        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    </head>
    <body>

        <script type="text/javascript">

            function registerHandlers() {
                var elements = document.getElementsByTagName('a');
                for (var i = 0, len = elements.length; i < len; i++) {

                    (function(index) {
                        elements[i].onclick = function() {
                            alert(index);
                        }
                    })(i);
                }


            }


        </script>

        In my life, I used the following web search engines:<br/>
        <a href="#">Yahoo!</a><br/>
        <a href="#">AltaVista</a><br/>
        <a href="#">Google</a><br/> 

    </body>
</html>
