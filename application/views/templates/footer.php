<!-- navbar footer -->
<!-- <header id="header" class="header fixed-bottom">
  <div class="header-menu">
    <div class="col-sm-4">
        <div align="center"><a href="<?php echo $navmenu1 ?>" class="nav-bottom__link">
            <i class="fa <?php echo $navlink1 ?> fa-2x"></i></a>
        </div>
    </div>
    <div class="col-sm-4">
      <div align="center"><a href="<?php echo $navmenu2 ?>" class="nav-bottom__link">
        <i class="fa <?php echo $navlink2 ?> fa-2x"></i></a>
    </div>
</div>
<div class="col-sm-4">
    <div align="center"><a href="<?php echo $navmenu3 ?>" class="nav-bottom__link">
        <i class="fa <?php echo $navlink3 ?> fa-2x"></i></a>
    </div>
</div>
</div>
</header> -->
<div class="typo-articles" align="center">
    <p class="small"><a href="https://instagram.com/arditriheru" target="_blank"><?php echo getCopyright()." - ".getVersion() ?></a></p>
</div>
</div>

<!-- footer -->
<script src="<?php echo base_url() ?>assets/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/popper.js/dist/umd/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/main.js"></script>


<script src="<?php echo base_url() ?>assets/chart.js/dist/Chart.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/dashboard.js"></script>
<script src="<?php echo base_url() ?>assets/js/widgets.js"></script>
<script src="<?php echo base_url() ?>assets/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="<?php echo base_url() ?>assets/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<script src="<?php echo base_url() ?>assets/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script>
    (function($) {
        "use strict";

        jQuery('#vmap').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#1de9b6', '#03a9f5'],
            normalizeFunction: 'polynomial'
        });
    })(jQuery);
</script>

</body>

</html>
