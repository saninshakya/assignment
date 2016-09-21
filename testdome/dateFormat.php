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
            function formatDate(userDate) {
                userDate = new Date(userDate);
                y = userDate.getFullYear().toString();
                m = (userDate.getMonth() + 1).toString();
                d = userDate.getDate().toString();
                if (m.length == 1)
                    m = '0' + m;
                if (d.length == 1)
                    d = '0' + d;
                return y + m + d;
            }
            // document.getElementById("result").innerText += 

            document.write(formatDate("12/31/2014"));

        </script>




    </body>
</html>