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
	 class SearchStream {

    /**
     * @param string $keyword The keyword to search for
     * @param resource $file The file pointer, which points to a file successfully opened by fopen()
     * @return array An array of strings
     */
    public static function findLines($keyword, $file) {
//        $lines = file('file/sample.txt');
//        foreach ($lines as $lineNumber => $line) {
//            if (strpos($line, $keyword) !== false) {
//                echo $line;
//            }
//        }
//        return -1;
//        $stream = fopen('php://memory', 'r+');
//        fputs($stream, "Hello, there!\nHow are you today?\nYes, you over there.\nYou go there.");
//        rewind($stream);
//Another method
        $arr = array();
        while (!feof($file)) {
            $line = fgets($file);
            if (strpos($line, $keyword) !== false) {
                print_r($line.'<br/>');
            }
        }
        return;
    }

}
$stream = fopen('php://memory', 'r+');
fputs($stream, "Hello, there!\nHow are you today?\nYes, you over there.\nYou go there.");
rewind($stream);
print_r($rslt->findLines('there', $stream));

?>
	</body>
</html>
