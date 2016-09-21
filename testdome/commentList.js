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