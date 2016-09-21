<?php
class SearchStream {
    /**
     * @param string $keyword The keyword to search for
     * @param resource $file The file pointer, which points to a file successfully opened by fopen()
     * @return array An array of strings
     */
    public static function findLines($keyword, $file) {
        $strArr = array();
        while (!feof($file)) {
            $line = trim(fgets($file));
            if($line !== ''){
                if (strpos($line, $keyword) !== false) {
                $strArr[] = $line;
            }
            }
        }
        return $strArr;
    }
}

$stream = fopen('php://memory', 'r+');
fputs($stream, "Hello, there!\nHow are you today?\nYes, you over there.");
rewind($stream);
print_r(SearchStream::findLines('there', $stream));