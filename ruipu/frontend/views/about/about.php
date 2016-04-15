
<!-- start banner -->
<div class="about">
		<div class="container">
				<h3>关于我们</h3>
			<table>
			<tr>
			<?php foreach($data as $key => $value){ ?>
				<td style="padding: 45px;">
				<div class="about-top">
					<!-- <div class="col-md-3 about-1"> -->
					<a href="#"><img src="<?php echo $value['pro_img'] ?>" class="" height='150' width='220' alt="" title="<?php echo $value['pro_name'] ?>"></a>	
					<!-- </div> -->
					<div class="clearfix"></div>	
					<!-- <div class="col-md-3 about-2"> -->
						<a href="#"><h4><?php echo $value['pro_name'] ?></h4></a>
						<p><?php echo $value['pro_content'] ?></p>
					<!-- </div> -->
				</div>
				</td>
				<?php if(($key+1)%4==0):?>
					<tr></tr>
				<?php endif;?>
			<?php } ?>
			</tr>
			</table>

			<div class="col-md-12 shop-4">
				<ul>
				<li><p>热门文章</p></li>
				<?php foreach($data_article as $key => $value){ ?>
						<li><a href="#"><span></span><?php echo $value['art_title'] ?></a></li>
				<?php } ?>
				</ul>
			</div>
			</div>
	   </div>
