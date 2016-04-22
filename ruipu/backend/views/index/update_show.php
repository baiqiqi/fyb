<!doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.codify.min.js"></script>
    <script type="text/javascript" src="js/htmlbox.colors.js"></script>
    <script type="text/javascript" src="js/htmlbox.styles.js"></script>
    <script type="text/javascript" src="js/htmlbox.syntax.js"></script>
    <script type="text/javascript" src="js/htmlbox.undoredomanager.js"></script>
    <script type="text/javascript" src="js/htmlbox.min.js"></script>
</head>
<body>
<?php include('../views/layouts/top.php');?>
<div class="container clearfix">
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">修改导航</a><span class="crumb-step">&gt;</span><span>新增导航</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
 
                    <form action="index.php?r=index/upda" method="post">
                    <table class="insert-tab" width="100%">
                        <tbody>
                        <?php foreach ($update_show as $val) {?>
                            <tr>
                                <th>导航ID：</th>
                                <td>
                                    <input class="common-text required" value="<?php echo $val["nav_id"]?>" name="nav_id" size="50"  type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>导航名称：</th>
                                <td>
                                <input class="common-text required" value="<?php echo $val["nav_name"]?>" name="nav_name" size="50"  type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>导航路径：</th>
                                <td>
                                    <input class="common-text required" value="<?php echo $val["nav_url"]?>" name="nav_url" size="50"  type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>是否启用：</th>
                                <td>
                                    <?php if ($val["nav_status"] == 1) {?>
                                    <input class="common-text required" type='radio' checked='checked' name="1" />是<input class="common-text required" type='radio'/>否;
                                    <?php }else{?>
										<input class="common-text required" type='radio'/>是<input class="common-text required" type='radio' checked='checked' name="1" />否;
									<?php }?>
                                </td>
                            </tr>
                            <tr>
                                <th>显示顺序：</th>
                                <td>
                                   <input class="common-text required" value="<?php echo $val["nav_sort"]?>" name="nav_sort" size="20"  type="text">
                                </td>
                            </tr>
                            <?php }?>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="修改" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>           </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>
<script language="Javascript" type="text/javascript">
var hb_icon_set_green = $("#htmlbox_icon_set_green").css("height","100").css("width","600").htmlbox({
    toolbars:[
         ["cut","copy","paste","separator_dots","bold","italic","underline","strike","sub","sup","separator_dots","undo","redo","separator_dots",
         "left","center","right","justify","separator_dots","ol","ul","indent","outdent","separator_dots","link","unlink","image"],
         ["code","removeformat","striptags","separator_dots","quote","paragraph","hr","separator_dots",
             {icon:"new.gif",tooltip:"New",command:function(){hb_icon_set_green.set_text("<p></p>");}},
             {icon:"open.gif",tooltip:"Open",command:function(){alert('Open')}},
             {icon:"save.gif",tooltip:"Save",command:function(){alert('Save')}}
          ]
    ],
    icons:"default",
    skin:"green"
});
</script>