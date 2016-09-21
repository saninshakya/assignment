<!-- Distinct
Compute number of distinct values in an array. -->.

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Test Demo</title>
        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    </head>
	<body>
    <?php
		$source[0] = array(5,3,8,9,4,1,3,-2);
		$source[1] = array(4,6,0,3,6,4,2,1);
		$source[2] = array(4,-5,3,1,9,5,6,6);
		$source[3] = array(3,7,5,3,2,8,9,4);
		$source[4] = array(5,3,-3,6,3,2,8,0);
		$source[5] = array(5,7,5,3,3,-9,2,2);
		$source[6] = array(0,4,3,2,5,7,5,4);

	    $final_spiral_list = get_spiral_form($source);
	   	echo array_sum($final_spiral_list);
		function get_spiral_form($matrix)
		{
			#Array to hold the final number list
			$spiralList = array();

			$result = $matrix;
			while(count($result) > 0)
			{
				$resultsFromRead = get_next_number_circle($result, $spiralList);
				$result = $resultsFromRead['new_source'];
				$spiralList = $resultsFromRead['read_list'];
			}

			return $spiralList;
		}
		function get_next_number_circle($matrix, $read)
{
    $unreadMatrix = $matrix;

    $rowNumber = count($matrix);
    $colNumber = count($matrix[0]);

    if($rowNumber == 1) $read = array_merge($read, $matrix[0]);
    if($colNumber == 1) for($i=0; $i<$rowNumber; $i++) array_push($read, $matrix[$i][0]);
    if($rowNumber == 2 || ($rowNumber == 2 && $colNumber == 2)) 
    {
        $read = array_merge($read, $matrix[0], array_reverse($matrix[1]));
    }

    if($colNumber == 2 && $rowNumber != 2) 
    {
        #First read left to right for the first row
        $read = array_merge($read, $matrix[0]);
        #Then read down on right column
        for($i=1; $i<$rowNumber; $i++) array_push($read, $matrix[$i][1]);
        #..and up on left column
        for($i=($rowNumber-1); $i>0; $i--) array_push($read, $matrix[$i][0]);
    }

    #If more than 2 rows or columns, pick up all the edge values by spiraling around the matrix
    if($rowNumber > 2 && $colNumber > 2)
    {
        #Move left to right
        for($i=0; $i<$colNumber; $i++) array_push($read, $matrix[0][$i]);
        #Move top to bottom
        for($i=1; $i<$rowNumber; $i++) array_push($read, $matrix[$i][$colNumber-1]);
        #Move right to left
        for($i=($colNumber-2); $i>-1; $i--) array_push($read, $matrix[$rowNumber-1][$i]);
        #Move bottom to top
        for($i=($rowNumber-2); $i>0; $i--) array_push($read, $matrix[$i][0]);
    }

    #Now remove these edge read values to create a new reduced matrix for the next read
    $unreadMatrix = remove_top_row($unreadMatrix);  

    $unreadMatrix = remove_right_column($unreadMatrix); 
    $unreadMatrix = remove_bottom_row($unreadMatrix);   
    $unreadMatrix = remove_left_column($unreadMatrix);  

    return array('new_source'=>$unreadMatrix, 'read_list'=>$read);
}

function remove_top_row($matrix)
{

    $removedRow = array_shift($matrix);
    return $matrix;
}

function remove_right_column($matrix)
{
    $neededCols = count($matrix[0]) - 1;
    $finalMatrix = array();
    for($i=0; $i<count($matrix); $i++) $finalMatrix[$i] = array_slice($matrix[$i], 0, $neededCols);
    return $finalMatrix;
}

function remove_bottom_row($matrix)
{
    unset($matrix[count($matrix)-1]);
    return $matrix;
}

function remove_left_column($matrix)
{
    $neededCols = count($matrix[0]) - 1;
    $finalMatrix = array();
    for($i=0; $i<count($matrix); $i++) $finalMatrix[$i] = array_slice($matrix[$i], 1, $neededCols);
    return $finalMatrix;
}
		?>
	</body>
</html>
