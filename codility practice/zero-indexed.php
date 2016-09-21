
Task description
This is a demo task. You can read about this task and its solutions in this blog post.

A zero-indexed array A consisting of N integers is given. An equilibrium index of this array is any integer P such that 0 ≤ P < N and the sum of elements of lower indices is equal to the sum of elements of higher indices, i.e. 
A[0] + A[1] + ... + A[P−1] = A[P+1] + ... + A[N−2] + A[N−1].

Solution:


// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Test Demo</title>
        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    </head>
    <body>
    <?php
    $array = array("10", "3", "-4", "5", "1", "-6", "2", "1");
/*  echo '<pre>';
    print_r($array);
    echo '<\pre>';*/
    $rslt = solution($array);
    print_r($rslt);

    function solution($A) {
    $rightSum = array_sum($A);
    $leftSum = 0;
        for ($i = 0; $i < count($A); $i++) {
            if (isset($A[$i-1])) {
              $leftSum += $A[$i-1];
            }
            $rightSum -= $A[$i];
            if ($leftSum == $rightSum) {
               return $i;
            }
        }
        return -1;
    }
    ?>
    </body>
</html>
