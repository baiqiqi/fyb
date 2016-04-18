 <?php 
 $nav = $this->context->layout_data;
    foreach ($nav as $key => $v) {?>
        <li><a href="index.php?r=index/products"><?php echo $v["nav_name"]?></a></li>
    <?php }?>