<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Test Demo</title>
        <link rel="stylesheet" type="text/css" href="css/mystyle.css" />
        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    </head>
	<body>

	    
	<ul id='commentList'>
	</ul>


	<form>
		<input type='text' id='comment'/>
		<input type='button' id='postComment' value='Post'/>
	</form>

	<script type="text/javascript">
		$( document ).ready(function() {
			$('#postComment').on('click', function(e) {
				e.preventDefault();
				var val = $('#comment').val();
				
				if(jQuery.trim(val).length > 0)
				{
					$('#commentList').append('<li>'+val+'</li>');
					$('#comment').val("");
				}
			});
		});
	</script>
	</body>
</html>
