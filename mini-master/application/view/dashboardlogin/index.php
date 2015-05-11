<?php @session_start();
if(isset($_COOKIE['email']) && !empty($_COOKIE['email']))
{
	$_SESSION['email'] = $_COOKIE['email'];
	echo '<script>window.location.href="'.URL.'Home"</script>';
	exit;
} 
?>
 <meta charset="UTF-8">
    <title>Business Card | Login Form</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo URL;?>public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo URL;?>public/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo URL;?>public/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
     <link href="<?php echo URL;?>public/css/style.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->


<!-- END CORE PLUGINS -->



</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->

	
	
<body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?php echo URL; ?>"><b>Business </b>Card</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Log In to your account</p>
        <form class="login-form" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username" name="lemail" id="lemail"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="lpassword" id="lpassword"/>
            <span class="glyphicon glyphicon-lock form-control-feedback formErrorMessage"></span>
          </div>
          <div class="row">
           <div class="col-xs-8"> 
           	</div>
            <div class="col-xs-4">
            	<div class="loader  pull-right" style="display: none;">
				<img src="<?php echo URL; ?>public/img/loading-spinner-blue.gif" alt="loading...">
			</div>
              <button type="submit" class="btn btn-primary btn-block btn-flat" id="btnLogin" name="btnLogin">Sign In</button>
              
            </div><!-- /.col -->
             <div class="col-xs-12">    
              <div class="checkbox icheck">
                <div class="divError" id="loginError" style="visibility: hidden; color: red;">
					Wrong Username. Please try again!
				</div>
              </div>                        
            </div><!-- /.col -->
          </div>
        </form>

       	
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="<?php echo URL;?>public/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo URL;?>public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?php echo URL;?>public/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
<!-- BEGIN PAGE LEVEL PLUGINS -->

<script src="<?php echo URL.'public/js/jquery.cokie.min.js';?>" type="text/javascript"></script>
<script src="<?php echo URL.'public/js/jquery.validate.min.js';?>" type="text/javascript"></script>
<script src="<?php echo URL.'public/js/additional-methods.js';?>" type="text/javascript"></script>
<!-- END JAVASCRIPTS -->
<script type="text/javascript">

	$('.login-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	                lemail: {
	                    required: true,
	                     maxlength: 30,
	                     minlength: 8
	                    
	                },
	                lpassword: {
	                   required: true,
	                    maxlength: 15,
	                    minlength: 5
	                    
	                }
	            },

	            messages: {
	                lemail: {
	                    required: "Required",
	                    minlength:"Min 8 characters",
	                    maxlength:"Max 30 characters"
	                    
	                },
	                lpassword: {
	                    required: "Required",
	                    minlength:"Min 5 characters",
	                    maxlength:"Max 15 characters"
	                }
	            }
});
/*
 * @Author:  Kalpana
 * @Created: November 25 2014
 * @Modified By:Kalpana
 * @Modified at: January 31 2015
 * @Comment: login function
 */
$('#btnLogin').click(function(){
	if($('.login-form').valid())
	{
		$('.login-form').attr('onsubmit','false');
		
		var email = $('#lemail').val();
		var password = $('#lpassword').val();	
		
		
		var dataString = "email="+email+"&password="+password;
		
		$.ajax({
			type: 'POST',
			url: '<?php echo URL; ?>Dashboardlogin/authenticate',
			data: dataString,
			cache: false,
			beforeSend: function(){
				$('#btnLogin').hide();
				$('.loader').show();
				//alert(dataString);
			},
			success: function(data) {
				//alert(data);
				if(data == 1)
				{
					window.location.href = '<?php echo URL; ?>Home';
				}else
				{
					$('#btnLogin').show();
					$('.loader').hide();
					$('#loginError').css('visibility','visible');	
					$('#loginError').removeClass('success');
				}	
			}
		});  	
	}
	return false;	
});


</script>

</body>
<!-- END BODY -->
</html>