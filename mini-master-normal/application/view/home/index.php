 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           All Card
            <!-- <small>advanced tables</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="javascript:"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="javascript:">All Card</a></li>
            <!-- <li class="active">Data tables</li> -->
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <!-- <h3 class="box-title">All Card</h3> -->
                </div><!-- /.box-header -->
                <div class="col-xs-9 nopadding">
                	<div class="input-group">
                		<button type="button" class="btn btn-info btn-flat mail" title="Mail"><i class="fa fa-envelope"></i></button>
                	</div>
                </div>
	             <div class="col-xs-3 nopadding">
	             	<div class="input-group seracherror" style="display: none; color: red; font-size: 16px;">No card found.</div>
					  <div class="input-group">
	                    <input type="text" class="form-control" placeholder="Search by name" id="searchvalue">
	                    <span class="input-group-btn">
	                    
						 <button style="display: none;"class="btn btn-info btn-flat search-loader"><img alt="loading..." src="<?php echo URL;?>/public/img/loading-spinner-grey.gif"></button>
	                      <button type="button" class="btn btn-info btn-flat" id="searchUser"><i class="fa fa-search"></i></button>
	                    </span>
	                  </div>
	             </div>
                  
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                     	<th width="3%;"><input type="checkbox" class="allcheckbox" name="allcheckboxID"></th>
                        <th width="15%;">Name</th>
                        <th width="25%;">Email</th>
                        <th>Card Image</th>
                      </tr>
                    </thead>
                    <tbody id="resulttable">
                  	 <?php   foreach($results as $result){ ?>
                      <tr>
                        <td class="selection"><input type="checkbox" class="checkbox" name="sendmaiID" value="<?php echo $result['id'];?>"></td>
                        <td><?php echo $result['name'];?></td>
                        <td><?php echo $result['email'];?></td>
                        <td class="Cardimg"><img height="150px"  src="<?php echo URL;?>public/upload/image/<?php echo $result['image'];?>" /></td>
                      </tr>
                      <?php }?>
                    </tbody>
                    <tfoot>
                      <tr>
                     	<th width="3%;"><input type="checkbox" class="allcheckbox" name="allcheckboxID"></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Card Image</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
   <div class="example-modal">
            <div class="modal" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Share with email</h4>
                  </div>
                  <form action="" name="cardsend" id="cardsend" method="post" onsubmit="return false;">
	                  <div class="modal-body">
		                  	<div class="form-group">
		                  		<input type="hidden" name="rowhiddenid" value="" id="rowhiddenid"/>
		                    	<input type="email" placeholder="To:" class="form-control" name="mailId" id="mailId" />
		                    </div>
		                    <div class="form-group">
		                    	<input type="text" placeholder="Subject:" class="form-control" name="subject" id="subject"/>
		                    </div>
		                    <div class="form-group">
		                      <textarea placeholder="Message" rows="3" class="form-control"  name="message" id="message"></textarea>
		                    </div>
		                    <div class="form-group" id="prev_img">
		                      
		                    </div>
	                  </div>
	                  <div class="modal-footer">
	                  	<div class="pull-left sucess" style="display: none; color: #099808; font-size: 16px;">Mail sent successfully.</div>
	                  	<div class="pull-left failed" style="display: none; color: red; font-size: 16px;">Failed to send email. Please try later.</div>
	                  	<div class="pull-left selectatcimg" style="display: none; color: red; font-size: 16px;">Select at least one card.</div>
	                  	<div style="display: none;" class="loader  pull-right">
							<img alt="loading..." src="<?php echo URL;?>/public/img/loading-spinner-blue.gif">
						</div>
	                  	<button type="submit" class="btn btn-primary Send">Send</button>
	                  </div>
                  </form>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </div><!-- /.example-modal -->
<script src="<?php echo URL;?>public/plugins/jQuery/jQuery-2.1.3.min.js" type="text/javascript"></script>
<script src="<?php echo URL;?>public/js/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo URL;?>public/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo URL;?>public/js/additional-methods.js" type="text/javascript"></script>
<!-- END JAVASCRIPTS -->
<script type="text/javascript">

	
	$('#cardsend').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	                mailId: {
	                   	 required: true,
	                   	
	                    
	                },
	                subject: {
	                   	required: true,
	                    maxlength: 20,
	                    minlength: 5
	                    
	                },
	                message: {
	                   	required: true,
	                    maxlength: 255
	                    
	                }
	                
	            },
				messages: {
	                mailId: {
	                    required: "Required",
	                    minlength:"Min 8 characters",
	                    maxlength:"Max 30 characters"
	                    
	                },
	                subject: {
	                    required: "Required",
	                    minlength:"Min 5 characters",
	                    maxlength:"Max 20 characters"
	                },
	                message:{
	                	required: "Required"
	                }
	            }
		});

$( document ).ready(function() {
//on click all checkbox
$(".allcheckbox").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});



    $(".mail").on("click", function(){
    	var result = [];
    	$(".checkbox:checked").each(function(i){
    		 result[i] = $(this).closest("td").siblings(".Cardimg").html();
    		 i++;
    	});
    	//alert(result);
    	if(result == ""){
    		$('.selectatcimg').css("display", "block");
    		$('.Send').attr('disabled','disabled');
    	}else{
    		$('.selectatcimg').css("display", "none");
    		$('.Send').removeAttr('disabled');
    	}
    	
    	$("#prev_img").html(result);
    	$(".modal").show();
    	
    	var resultId = [];
    	$(".checkbox:checked").each(function(i){
    		 resultId[i] = $(this).val();
    		 i++;
    	});
    	
    	$("#rowhiddenid").val(resultId);
    	
    });
    $(".close").on("click", function(){
    	$(".modal").hide();
    });
    
    
 /*
 * @Author:  krunal
 * @Created: March 31 2015
 * @Modified By:
 * @Modified at: March 31 2015
 * @Comment: search by name 
 */   

$("#searchvalue").keypress(function(e) {
	var code = e.keyCode || e.which;	
	if (code == 13) {
		 $('#searchUser').trigger("click");
	}
});
	
 $('#searchUser').click(function () {
    var search_value = $("#searchvalue").val();
	
    $.ajax({
        type: 'POST',
		url: '<?php echo URL; ?>Home/myCardSearch',
        data: {'search_value': search_value},
        cache: false,
		beforeSend: function(){
			$('#searchUser').hide();
			$('.search-loader').show();
			
		},success: function(data) {
			$('#searchUser').show();
			$('.search-loader').hide();
			if(data != 0){
				$("#resulttable").html(data);
				$('.row .col-xs-6').css("display", "none");
				$('.seracherror').css("display", "none");
				
			}else{
				$('.seracherror').css("display", "block");
				
			}		
			
		}
    });
 });

    
    
});

/*
 * @Author:  krunal
 * @Created: March 31 2015
 * @Modified By:
 * @Modified at: March 31 2015
 * @Comment: krunal
 */
$('.Send').click(function(){
	//e.preventDefault();
		var dataString = $( "#cardsend" ).serialize();
	
		//var dataString = "mailId="+mailId+"&subject="+subject+"&message="+message+"&prev_img="+prev_img;
		$.ajax({
			type: 'POST',
			url: '<?php echo URL; ?>Home/mailSend',
			data: dataString,
			cache: false,
			beforeSend: function(){
				$('.Send').hide();
				$('.loader').show();
				
			},
			success: function(data) {
				$('.Send').show();
				$('.loader').hide();
				if(data == 1){
					$("#cardsend")[0].reset();
					$("#prev_img").html('');
					$('.sucess').css("display", "block");
					$('.failed').css("display", "none");
					
					$(".checkbox:checked").each(function(i){
			    		$(this).attr("checked",false);
			    	});
			    	
			    	var delayClick = (function () {
				            var timer = 0;
				            return function (callback, ms) {
				                clearTimeout(timer);
				                timer = setTimeout(callback, ms);
				            };
				    })();
				    delayClick(function () {
				    	$(".modal").hide();
				    	$('.sucess').css("display", "none");
				    	$('.failed').css("display", "none");
				    }, 1000);
		    	}else{
		    		$('.sucess').css("display", "none");
					//$('.failed').css("display", "block");
		    	}
				
			}
		}); 
	 	
});
</script>
<style>
	span.help-block {
    color: #f40808;
    margin-bottom: 0;
    margin-top: 0;
    text-align: right;
}
input.help-block, textarea.help-block {
    border: 1px solid red;
}
#prev_img > img {
    float: left;
    margin-bottom: 5px;
    margin-right: 5px;
    width: 50px;
    height: 50px;
}
.nopadding{padding: 10px;}
</style>