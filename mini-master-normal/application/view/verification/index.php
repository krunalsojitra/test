<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Business Card App | Account Verification</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo URL.'public/plugins/font-awesome/css/font-awesome.min.css';?>" rel="stylesheet" type="text/css"/>
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URL.'public/plugins/bootstrap/css/bootstrap.min.css';?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo URL.'public/plugins/uniform/css/uniform.default.css';?>" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo URL.'public/css/style-metronic.css';?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo URL.'public/css/style.css';?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo URL.'public/css/plugins.css';?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo URL.'public/css/pages/tasks.css';?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo URL.'public/css/themes/default.css';?>" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo URL.'public/css/print.css';?>" rel="stylesheet" type="text/css" media="print"/>
<link href="<?php echo URL.'public/css/custom.css';?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo URL.'public/css/style-responsive.css';?>" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="<?php echo URL.'public/img/favicon.png'; ?>"/>

<script src="<?php echo URL.'public/plugins/jquery-1.10.2.min.js';?>" type="text/javascript"></script>
<script src="<?php echo URL.'public/plugins/jquery-migrate-1.2.1.min.js';?>" type="text/javascript"></script>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-fixed-top">
	
	<!-- BEGIN TOP NAVIGATION BAR -->
	<div class="header-inner">
		<!-- BEGIN LOGO -->
		<a class="navbar-brand" href="<?php echo URL; ?>" style="margin-left:42%">
			Business Card App
			<!-- <img src="<?php echo URL.'public/img/logo.png';?>" alt="logo" class="img-responsive" /> -->
		</a>
		<!-- END LOGO -->
	</div>
	<!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<div class="clearfix"></div>

<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper" id="divWrapper">
		<div class="page-content" style="margin-left: 0px !important; min-height: 565px !important; text-align: center !important;">
			<!-- BEGIN PAGE HEADER-->
			<div class="row" style="margin-top:5%;">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
						Account Verification
					</h3>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
				
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12 blog-page">
					<div class="row">
						<div class="col-md-12 article-block">
						
							<!--end news-tag-data-->
							<div class="custom-card-text" style="text-align: center !important;">
								
								<?php 
									if(isset($result))
									{
										if($result==1)
										{
											echo '<p class="sccs">Congratulations! Your account has been activated now.</p>';
								?>
											
								<?php		
										}
										else {
											echo '<p class="errr">Account activation process failed. Please try later.</p>';
								?>
											
								<?php		
										}
									}
								?>
							
							</div>
					
					</div> <!-- end of article-block -->
				</div> <!-- end of row -->
			</div> <!-- end of blog page -->					
		</div> <!-- row -->
		
	</div> <!-- end of page-content -->
</div> <!--END OF page-content-wrapper-->

<!-- END CONTENT -->

<!-- BEGIN FOOTER -->
<div class="footer" style="text-align: center !important;">
	<div class="footer-inner" style="text-align: center !important; float:none;">
		 2015 &copy; Team Orion
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo URL.'public/plugins/respond.min.js';?>"></script>
<script src="<?php echo URL.'public/plugins/excanvas.min.js';?>"></script> 
<![endif]-->
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo URL.'public/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js';?>" type="text/javascript"></script>
<script src="<?php echo URL.'public/plugins/jquery-migrate-1.2.1.min.js';?>" type="text/javascript"></script>
<script src="<?php echo URL.'public/plugins/bootstrap/js/bootstrap.min.js';?>" type="text/javascript"></script>
<script src="<?php echo URL.'public/plugins/jquery.blockui.min.js';?>" type="text/javascript"></script>
<script src="<?php echo URL.'public/plugins/jquery.cokie.min.js';?>" type="text/javascript"></script>
<script src="<?php echo URL.'public/plugins/uniform/jquery.uniform.min.js';?>" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo URL.'public/scripts/custom/index.js';?>" type="text/javascript"></script>

<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>	
			
					