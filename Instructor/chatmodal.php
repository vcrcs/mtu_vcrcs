<head>
<style>
.col-md-2, .col-md-10{
    padding:0;
}
.panel{
    margin-bottom: 0px;
}
.chat-window{
    bottom:0;
    position:fixed;
    float:right;
    margin-left:10px;
}
.chat-window > div > .panel{
    border-radius: 5px 5px 0 0;
}
.icon_minim{
    padding:2px 10px;
}
.msg_container_base{
  background: #e5e5e5;
  margin: 0;
  padding: 0 10px 10px;
  max-height:300px;
  overflow-x:hidden;
}
.top-bar {
  background: #666;
  color: white;
  padding: 10px;
  position: relative;
  overflow: hidden;
}
.msg_receive{
    padding-left:0;
    margin-left:0;
}
.msg_sent{
    padding-bottom:20px !important;
    margin-right:0;
}
.messages {
  background: white;
  padding: 10px;
  border-radius: 2px;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
  max-width:100%;
}
.messages > p {
    font-size: 13px;
    margin: 0 0 0.2rem 0;
  }
.messages > time {
    font-size: 11px;
    color: #ccc;
}
.msg_container {
    padding: 10px;
    overflow: hidden;
    display: flex;
}
img {
    display: block;
    width: 100%;
}
.avatar {
    position: relative;
}
.base_receive > .avatar:after {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    width: 0;
    height: 0;
    border: 5px solid #FFF;
    border-left-color: rgba(0, 0, 0, 0);
    border-bottom-color: rgba(0, 0, 0, 0);
}

.base_sent {
  justify-content: flex-end;
  align-items: flex-end;
}
.base_sent > .avatar:after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 0;
    border: 5px solid white;
    border-right-color: transparent;
    border-top-color: transparent;
    box-shadow: 1px 1px 2px rgba(black, 0.2); // not quite perfect but close
}

.msg_sent > time{
    float: right;
}



.msg_container_base::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

.msg_container_base::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

.msg_container_base::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}

.btn-group.dropup{
    position:fixed;
    left:0px;
    bottom:0;
}
</style></head>
<script>

$(document).on('click', '.panel-heading span.icon_minim', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('focus', '.panel-footer input.chat_input', function (e) {
    var $this = $(this);
    if ($('#minim_chat_window').hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideDown();
        $('#minim_chat_window').removeClass('panel-collapsed');
        $('#minim_chat_window').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('click', '#new_chat', function (e) {
    var size = $( ".chat-window:last-child" ).css("margin-left");
     size_total = parseInt(size) + 400;
    alert(size_total);
    var clone = $( "#chat_window_1" ).clone().appendTo( ".container" );
    clone.css("margin-left", size_total);
});
$(document).on('click', '.icon_close', function (e) {
    //$(this).parent().parent().parent().parent().remove();
    $( "#chat_window_1" ).remove();
});

</script>
<?php include('head.php');
include('../dbcon.php');?>
<section id="main" role="main">
<section id="content" class="content">
<?php 
$recive_from=$_GET['ID'];
?>
					<div class="panel-heading top-bar">
                    <div class="col-md-8 col-xs-8">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat - Pannel</h3>
                    </div>
                    <div class="col-md-4 col-xs-4" style="text-align: right;">
                        <a href="#"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>
                        <a href="#"><span class="glyphicon glyphicon-remove icon_close" data-id="chat_window_1"></span></a>
                    </div>
                </div>
                                                <div class="modal-body">
												
												
					<div class="panel-body msg_container_base">
					<?php
										 $quer= "SELECT * FROM Account WHERE user_id='$session_id'";
								         $resul = mysqli_query($con,$quer)or die(mysqli_error());
								         $roww = mysqli_fetch_array($resul);
						                 $picc=$roww["pro_image"];
										 $user_email=$roww["e_mail"];
						$queryss = mysqli_query($con,"SELECT * FROM Mail ORDER BY date ASC") or die(mysqli_error());
					    while($rowss = mysqli_fetch_assoc($queryss)){
								  $array[] = $rowss;
								  $send_from=$rowss['send_from'];
								  $send_to=$rowss['send_to'];
								  $content=$rowss['content'];
								  $date_come=$rowss['date'];
								  
							if($send_from==$user_email && $send_to==$recive_from){
							echo '	   <div class="row msg_container base_sent">';
                            echo '     <div class="col-md-10 col-xs-10">';
                            echo '     <div class="messages msg_sent">';
                            echo '     <p>'.$content.'</p>';
                            echo '     <time datetime="2009-11-13T20:00">'.$date_come.'</time>';
                            echo '     </div> </div>';
						    echo '     <div class="col-md-2 col-xs-2 avatar">';
                            echo '     <img  style="width:50px;" src="../Uploads/'.$picc.' " >';
                            echo '     </div>';
                            echo '     </div>';
							}
							else if($send_to==$user_email && $send_from==$recive_from){
							echo '	  <div class="row msg_container base_receive">';
							
				                         $query = "SELECT * FROM Account WHERE e_mail='$recive_from'";
								         $result = mysqli_query($con,$query)or die(mysqli_error());
								         $row = mysqli_fetch_array($result);
						                 $pic=$row["pro_image"];
					
                            echo '    <div class="col-md-2 col-xs-2 avatar">';
                            echo '    <img style="width:50px;" src="../Uploads/'.$pic.'" ></div>';
                            echo '    <div class="col-md-10 col-xs-10">';
                            echo '    <div class="messages msg_receive">';
                            echo '    <p>'.$content.'</p>';
                            echo '    <time datetime="2009-11-13T20:00">'.$date_come.'</time>';
                            echo '    </div> </div> </div>';
						}
						}
					
					?>
					
                    </div></div>
					<form action="chatwithme.php" class="form-horizontal"  method="get" enctype="multipart/form-data" >
					<div class="panel-footer">				
                    <div class="input-group">
					    <input  id="hide" name="hide" type="hidden" value="<?php echo $recive_from;?>" />
                        <input  id="message" name="message" type="text" style="height:40px;" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                        <span class="input-group-btn">
                        <button type="submit" class="btn green" name="send_chat" class="form-control input-sm chat_input" id="send_chat" >Send </button>
                        </span>
                    </div>
                </div></form>
                                  </section>
</section>								  