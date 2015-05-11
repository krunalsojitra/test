  <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <!-- <b>Version</b> 2.0 -->
        </div>
        <strong>Copyright &copy; 2015 <a href="http://letsnurture.com" title="Lets Nurture">Lets Nurture</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="<?php echo URL;?>public/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo URL;?>public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="<?php echo URL;?>public/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo URL;?>public/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="<?php echo URL;?>public/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?php echo URL;?>public/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?php echo URL;?>public/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
 <script src="<?php echo URL.'public/js/jquery.cokie.min.js';?>" type="text/javascript"></script>
    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $('#example1').dataTable({
          "bPaginate": true,
          "bLengthChange": true,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": true,
          "aoColumnDefs": [
	          { 'bSortable': false, 'aTargets': [ 0 ] }
	       ]
        });
      });
    </script>
<script type="text/javascript">
/*
 * @Author:  krunal
 * @Created: March 31 2015
 * @Modified By:
 * @Modified at: March 31 2015
 * @Comment: krunal
 */
$('#logout').click(function(){
	$.removeCookie('email');
		var logout = "logout";
		var dataString = "logout="+logout;
		$.ajax({
			type: 'POST',
			url: '<?php echo URL; ?>Dashboardlogin/logout',
			data: dataString,
			cache: false,
			beforeSend: function(){
				$('#btnLogin').hide();
				$('.loader').show();
				
			},
			success: function(data) {
				//alert(data);
				if(data == 1){
					window.location.href = '<?php echo URL; ?>';
				}
			}
		});  	
});
</script>

  </body>
</html>
