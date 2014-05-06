	</div>
	<!-- container -->
	
<footer class="row text-center">
	<small>Copyright &copy;2014, The Maya Kitchen</small>
</footer>


<script src="<?php echo base_url('javascripts/foundation.min.js'); ?>"></script>
<script src="<?php echo base_url('javascripts/nicEdit.js'); ?>"></script>
<script src="<?php echo base_url('javascripts/jquery-datepicker-1.10.4.min.js'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/jquery-ui/style.css'); ?>">
<script>
	$(document).foundation();
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas({fullPanel : true}); });
</script>

</body>
</html>