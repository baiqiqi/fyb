<script>
    $(function () {
      $("#slider").responsiveSlides({
        auto: true,
        nav: true,
        speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  
  </script>
<script type="text/javascript" src="js/move-top.js"></script>
       <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
      jQuery(document).ready(function($) {
        $(".scroll").click(function(event){   
          event.preventDefault();
          $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
        });
      });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        /*
        var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear' 
        };
        */
    $().UItoTop({ easingType: 'easeOutQuart' });
});
</script>
<!-- start banner -->
<div class="banner">
	<div class="container">
		<div class="col-md-6 banner-left">
			<div class="header-slider">
				<div class="slider">
					<div class="callbacks_container">
					  	<ul class="rslides" id="slider">
					  	<?php foreach ($row as $k => $v) { ?>
							<li>
								<img src="<?php echo $v['pro_img']?>" class="img-responsive" alt="">
								<div class="caption">
									<h3><?php echo $v['pro_name']?></h3>
									<p><?php echo $v['pro_content']?></p>
								</div>
							</li>
						<?php } ?>
						</ul>
			  		</div>
				 </div>
				</div>
		</div>
		<div class="col-md-6 banner-right">
			<div class="col-md-6 banner-top">
				<h6>Dialysis Chairs</h6>
				
			</div>
			<div class="col-md-6 banner-top1">
				<h6>Surgical Bed</h6>
			</div>
			<div class="col-md-6 banner-top2">
				<h6>Wheel Chairs</h6>
				
			</div>
			<div class="col-md-6 banner-top3">
				<h6>Radiant Warmers</h6>
				
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- end banner -->
<div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >手机网站模板</a></div>
<div class="special">
	<div class="container">
		<div class="specia-top">
		   	<ul class="grid_2">
			<?php foreach ($arr as $k => $v) { ?>
		<li>
				<a href="index.php?r=index/details&pro_id=<?php echo $v['pro_id']?>"><img src="<?php echo $v['pro_img']?>" class="img-responsive" alt=""></a>
				<div class="special-info grid_1 simpleCart_shelfItem">
					<h5><?php echo $v['pro_name']?></h5>
					<div class="item_add"><span class="item_price"><h6>ONLY $<?php echo $v['pro_price']?></h6></span></div>
					<div class="item_add"><span class="item_price"><a href="#">Add to cart</a></span></div>
				</div>
		</li>
		<?php } ?>
		<div class="clearfix"> </div>
	</ul>
		</div>
	</div>
</div>