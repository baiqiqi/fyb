

<div class="demo">
  <div class="zoom-section">
    <div class="zoom-small-image"> 
    <a href='<?php echo $data['pro_img'] ?>'  class='cloud-zoom' title="<?php echo $data['pro_name'] ?>" rel="softFocus: true, position:'anypos', smoothMove:2">
    <img src="<?php echo $data['pro_img'] ?>" height='185' width='285' alt='' /></a> </div>
    <div class="zoom-desc" style="position:relative">
      <div id="anypos" style="position:absolute;top:-100px; left: 350px;width:280px;height:180px;"></div>
      <h3><?php echo $data['pro_name'] ?></h3>
      <p><?php echo $data['pro_content'] ?></p>
    </div>
  </div>
</div>