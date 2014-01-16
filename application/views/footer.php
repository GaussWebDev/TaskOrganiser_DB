        </div>
      </div>
    </div>
  </div>
</div>

<?php $url = base_url(); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>  
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<?php echo "<script src='{$url}assets/js/jquery.datetimepicker.js'></script>"; ?>
<!--Table sorter jquery-->
<?php echo "<script src='{$url}assets/tablesorter/jquery.tablesorter.js'></script>"; ?>
<?php echo "<script src='{$url}assets/tablesorter/pager.js'></script>"; ?>

<script type="text/javascript">
$(document).ready(function() { 
    $("#myTable").tablesorter(); 
}); 
$('#datetimepicker, #dtdomain1, #dtdomain2').datetimepicker({
	format:'d.m.Y',
    timepicker: false,
    closeOnDateSelect: true,
});
$('#myDropdown').on('hide.bs.dropdown', function () {
    return false;
});
</script>


<!--Jquery ostalo-->

<?php echo "<script src='{$url}assets/js/jquery.sparkline.min.js'></script>"; ?>
<?php echo "<script src='{$url}assets/js/bootstrap/tab.js'></script>"; ?>
<?php echo "<script src='{$url}assets/js/bootstrap/dropdown.js'></script>"; ?>
<?php echo "<script src='{$url}assets/js/bootstrap/collapse.js'></script>"; ?>
<?php echo "<script src='{$url}assets/js/bootstrap/transition.js'></script>"; ?>
<?php echo "<script src='{$url}assets/js/bootstrap/tooltip.js'></script>"; ?>
<?php echo "<script src='{$url}assets/js/jquery.knob.js'></script>"; ?>
<?php echo "<script src='{$url}assets/js/fullcalendar.min.js'></script>"; ?>
<?php echo "<script src='{$url}assets/js/datatables/datatables.min.js'></script>"; ?>
<?php echo "<script src='{$url}assets/js/chosen.jquery.min.js'></script>"; ?>
<?php echo "<script src='{$url}assets/js/datatables/bootstrap.datatables.js'></script>"; ?>
<?php echo "<script src='{$url}assets/js/raphael-min.js'></script>"; ?>
<?php echo "<script src='{$url}assets/js/for_pages/color_settings.js'></script>"; ?>
<?php echo "<script src='{$url}assets/js/for_pages/dashboard.js'></script>"; ?>
<?php echo "<script src='{$url}assets/js/for_pages/table.js'></script>"; ?>
<?php echo "<script src='{$url}assets/js/application.js'></script>"; ?>

</body>
</html>
