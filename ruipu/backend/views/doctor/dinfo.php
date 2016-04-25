<style type="text/css">
    ul li{
        float: left;
    }
</style>
 <?php include('../views/layouts/top.php');?>
   <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">作品管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="index.php?r=details/search" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="search" value="" id="search" type="text"></td>
                            <td><input class="btn btn-primary btn2" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="index.php?r=details/upload"><i class="icon-font"></i>新增作品</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr><th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th width="5%">ID</th>
                            <th width="8%">姓名</th>
                            <th width="11%">电话</th>
                            <th width="10%">性别</th>
                            <th width="6%">年龄</th>
                            <th width="6%">学位</th>
                            <th width="6%">邮箱</th>
                            <th width="6%">管理操作</th>
                        </tr>



                        <?php
                         foreach ($arr as $k => $v) {?>
                        <tr>
								<td><input type="checkbox" name="stu" /></td>
								<td><?php echo $v["doc_id"];?></td>
								<td><?php echo $v["doc_name"];?></td>
								<td><?php echo $v["doc_tel"];?></td>
									<?php
									if($v['doc_sex'] == '1'){
										echo '<td>男</td>';
									}else{
										echo '<td>女</td>';
									}
									?>
								<td><?php echo $v["doc_age"];?></td>
								<td><?php echo $v["doc_education"];?></td>
								<td><?php echo $v["u_email"];?></td>
							<td>
								<a class="link-update" href="index.php?r=doctor/save&id=<?php echo $v['doc_id']?>">修改</a>
								<a class="link-del" onclick="if(confirm('确定删除？')) return true; else return false;" href="index.php?r=doctor/delete&id=<?php echo $v['doc_id']?>" class='outiong'>移除</a>
							</td>

                        </tr>
                         <?php } ?>
                    </table>
                        <center><a href="index.php?r=doctor/dinfo&page=<?php 
                        if ($page-1<1) {
                            echo '1';
                        }else{
                            $aa = $page-1;
                            echo $aa;
                        }
                         ?>">上一页</a>&nbsp;
                        
                        <a href="index.php?r=doctor/dinfo&page=<?php 
                        if ($page+1>$countpage) {
                            echo "$countpage";
                        }else{
                            $bb = $page+1;
                            echo $bb;
                        }
                         ?>">下一页</a><br/>
                         当前第<?php echo "$page"; ?>页-------
                         共<?php echo "$countpage";?>页
                         </center>
 				</div>
            </form>
        </div>
    </div>
</div>

