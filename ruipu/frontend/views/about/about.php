
<!-- start banner -->
<div class="about">
		<div class="container">
				<h3>关于我们</h3>
			<table>
			<tr><td><p>本院先进的医疗器材</p></td></tr>
			<tr>
			<?php foreach($data as $key => $value){ ?>
				<td style="padding: 45px;">
				<div class="about-top">
					<a href="./index.php?r=about/details&pro_id=<?php echo $value['pro_id'] ?>"><img src="<?php echo $value['pro_img'] ?>" height='150' width='220' alt="" title="<?php echo $value['pro_name'] ?>"></a>	
					<div class="clearfix"></div>	
						<a href="./index.php?r=about/details&pro_id=<?php echo $value['pro_id'] ?>"><h4><?php echo $value['pro_name'] ?></h4></a>
						<p><?php echo mb_strlen($value['pro_content'], 'utf-8') > 20  ? mb_substr($value['pro_content'], 0, 20 , 'utf-8').'....' :$value['pro_content'] ; ?></p>
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
				<li><p>最新文章</p></li>
				<?php foreach($data_article as $key => $value){ ?>
						<li>
						<a href="#"><span></span><?php echo $value['art_title'] ?></a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<?php echo mb_strlen($value['art_time'], 'utf-8') > 10 ? mb_substr($value['art_time'], 0, 10, 'utf-8').'' :$value['art_time'] ; ?>
						</li>
				<?php } ?>
				</ul>
				<hr/>
			</div>
			<br/><br/>
			<div class="col-md-12 shop-4">
				<table> 
			        <tr><td><b>合作单位</b></td><br/></tr>
			        <tr>
			        <?php foreach ($data_agency as $key => $value): ?>
			        	<td style="padding: 45px;">
			        	<b><a href="./index.php?r=about/agency&ag_id=<?php echo $value['ag_id'] ?>"><?php echo $value['ag_name'] ?></a></b>
			        	</td>
			        	<?php if(($key+1)%5==0):?>
							<tr></tr>
						<?php endif;?>
			        <?php endforeach ?>			        
			        </tr>
			    </table>
			</div>
			</div>
	   </div>
