 <?php 
 $nav = $this->context->layout_data;
    foreach ($nav as $key => $v) {?>
        <li><a href="<?php echo $v['nav_url']?>"><?php echo $v["nav_name"]?></a></li>
    <?php }?>