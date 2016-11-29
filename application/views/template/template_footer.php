<footer class="site-footer">
  <div class="text-center">
      Smart LPG &copy; <?php echo date('Y');?>
      <a href="<?=base_url();?>" class="go-top">
          <i class="fa fa-angle-up"></i>
      </a>
  </div>
</footer>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url().'assets';?>/js/jquery.js"></script>
    <script src="<?php echo base_url().'assets';?>/js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo base_url().'assets';?>/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url().'assets';?>/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url().'assets';?>/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url().'assets';?>/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets';?>/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="<?php echo base_url().'assets';?>/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url().'assets';?>/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets';?>/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="<?php echo base_url().'assets';?>/js/sparkline-chart.js"></script>    
	<script src="<?php echo base_url().'assets';?>/js/zabuto_calendar.js"></script>	
	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>

    <!--script for charts and morris-->
    <script src="<?php echo base_url().'assets';?>/js/chart-master/Chart.js"></script>
    <script src="<?php echo base_url().'assets';?>/js/chartjs-conf.js"></script>

    <script src="<?php echo base_url().'assets';?>/js/morris-conf.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>

      <script>
          //custom select box

          $(function(){
              $('select.styled').customSelect();
          });

      </script>

</body>
</html>