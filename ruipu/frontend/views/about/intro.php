<div class="about">
	<div class="container">
		<h3>医院简介</h3>
		<?php foreach($data as $key => $value){ ?>
		<div class="about-top">
			<div class="col-md-3 about-1">
			   <img src="<?php echo $value['com_img'] ?>" class="img-responsive" alt="" title="<?php echo $value['com_name'] ?>">
			</div>	
			<p><?php echo $value['com_name'] ?></p>
			<p><?php echo $value['com_content'] ?></p>
			<br/><br/><br/><br/>
			<p>医院地址：<?php echo $value['com_addr'] ?></p>

		</div>
			<?php } ?>
	</div>
</div>