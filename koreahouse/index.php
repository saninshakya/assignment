<?php   
   require_once('connection/config.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AITSU-AIT_Calendar</title>
<link rel="stylesheet" href="style/documentation.css" type="text/css" />
<link rel="stylesheet" href="style/jalendar.css" type="text/css" />
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script><!--jQuery-->
<script type="text/javascript" src="js/jalendar.js"></script>


 
<script type="text/javascript">
$(function () {
/*    $('#myId').jalendar({
        customDay: '2017/12/01',  // Format: Year/Month/Day
        color: '#ed145a', // Unlimited Colors
        lang: 'EN' // Format: English — 'EN', Türkçe — 'TR'
    });
    $('#myId2').jalendar({
        customDay: '2016/02/29',
        color: '#023447',
        lang: 'ES'
    });*/
    $('#myId3').jalendar();
        <?php
        
        if(isset($_SESSION['ssuser_name'])&&($_SESSION['ssuser_role']!=1)){        
            echo '$(".add-new").hide(); $(".erase").hide();';       
        }else   if(!isset($_SESSION['ssuser_name'])){
         echo '$(".add-new").hide(); $(".erase").hide();';   
        } 
    ?>
});
</script>

</head>

<body>
    
<article> 
<?php     
 
if( isset($_SESSION['ssuser_name'])&&($_SESSION['ssuser_role'] == 1))
{
?>
<h4 align="right"> <a href="logout.php">Logout</a></h4>
<?php

}else
{
?>
<h4 align="right"> <a href="loginform.php">Login</a></h4>
<?php
}   

?>
    <div  class="jalendar">
        <h2>Korea House Calendar </h2>
        <p>SU,Best to meet you here!</p>
        
    </div>
     
<div id="myId3" class="jalendar mid">
  <?php
    $qry=" SELECT a.id, a.description, DATE_FORMAT(a.date,'%e/%c/%Y') as date, a.clock FROM ait_event as a ";
    $result=mysql_query($qry);
    while($arr=mysql_fetch_assoc($result))
    {
      $description = $arr['description'];
      $date = $arr['date'];
      $clock = $arr['clock'];
    ?>
      <div class="added-event" data-date="<?php echo $date; ?>" data-time="<?php echo $clock; ?>" data-title="<?php echo $description;?>"></div>
    <?php
    }
  ?>
</div>
</article>
<div style="text-align:center;clear:both">
</div>

<script>

$(document).ready(function(){
    var events = [];
    $('.submit').on('click',function(){
       events = [];
       $('.days .day').each(function(){
            var that = this;
            if($(this).hasClass('have-event')){
                $('.event-single',this).each(function(){                                    
                    events.push({'description':$(this).children('p').text(),'date':$(that).attr('data-date'),'clock':$('.details .clock',this).text()});

                })
            }
       }) 
       // console.log(events);

       post_data_to_server(events);
    })

    $('body').on('click','.event-single .erase',function(){
      events = [];
      var erasethat = this;

      $('.days .day').each(function(){
           $('.event-single',this).each(function(){
                var id = $(erasethat).parents('.event-single').attr('data-id');
                $('[data-id="'+id+'"]').remove();

           })
      })  
      $('.days .day').each(function(){
           var that = this;
          $('.event-single',this).each(function(){
               events.push({'description':$(this).children('p').text(),'date':$(that).attr('data-date'),'clock':$('.details .clock',this).text()});
           }) 
      })  
       // console.log(events);
      //passing all events to the server site

        post_data_to_server(events);

    })

})    

function post_data_to_server(events)
{
    $.post('bizlayer/post_save.php',{data:JSON.stringify(events)},function(data){
     
        //post the response after inserting in the database;
    },'json');
}

</script>
<div  class="jalendar">
<h2><a href='http://aitsu.asia/forum.php?mod=forumdisplay&fid=140&page=1'>--Booking Now--</a></h2>
<p>Copyright ©2015 CSIM. All Rights Reserved</p>
<p>Team From CSIM :<br /><a href="https://www.facebook.com/razzz.sanin?fref=ts"> Sanin Shakya,</a><a href='https://www.facebook.com/ant.moddy'> Mod Jiraporn,</a><a href="https://www.facebook.com/profile.php?id=100005410484642"> Yang</a></p>
</div>
</body>
</html>