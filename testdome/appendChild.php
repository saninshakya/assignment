<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Test Demo</title>
        <link rel="stylesheet" type="text/css" href="css/mystyle.css" />
        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <!--Function appendChildren should add a new child div to each existing div. New divs should be decorated by calling decorateDiv.
        
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
        The code below should do the job, but for some reason it goes into an infinite loop. Fix the bugs.-->
 This is wrong 
        <script type="text/javascript">

            function appendChildren() {
                var allDivs = document.getElementsByTagName("div");
                allDivs = [].slice.call(allDivs, 0); //This line is added.
                for (var i = 0; i < allDivs.length; i++) {
                    var newDiv = document.createElement("div");
                    decorateDiv(newDiv);
                    allDivs[i].appendChild(newDiv);
                }
            }

            // Mock of decorateDiv function for testing purposes
            function decorateDiv(div) {
            }

            document.write(appendChildren();
        </script>


        <div id="a">
            <div id="b">
            </div>
        </div>

    </body>
</html>
<!-- Correct one is this -->
function appendChildren() {

    var allDivs = $('div');
    var divlen = allDivs.length;

    for (var i = 0; i < divlen; i++) {
        var newDiv = document.createElement("div");
        decorateDiv(newDiv);
        allDivs[i].appendChild(newDiv);
    }
}