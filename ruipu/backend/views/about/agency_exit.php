<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="./index.php?r=index/index">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="./index.php?r=about/add">代理商添加</a><span class="crumb-step">&gt;</span><span>代理商信息修改</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
 
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td><input class="common-text required" value="<?php echo $data['ag_id'] ?>" name="ag_id" type="text"></td>
                            </tr>
                            <tr>
                                <th>代理商名：</th>
                                <td>
                                    <input class="common-text required" id="title" name="ag_name" size="50" value="<?php echo $data['ag_name'] ?>" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>代理商图片：</th>
                                <td><img width="100" height="100" src="<?php echo $data['ag_img']?>"><?= $form->field($model, 'file')->fileInput() ?></td>
                            </tr>
                            <tr>
                                <th>简介：</th>
                                <td><textarea id="htmlbox_icon_set_green" name="ag_content"><?php echo $data['ag_content'] ?></textarea></td>
                  

                            </tr>
                            <tr>
                                <th>代理商地址：</th>
                                <td>
                                    <input class="common-text required" id="title" name="ag_addr" size="50" value="<?php echo $data['ag_addr'] ?>" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>经度：</th>
                                <td>
                                    <input class="common-text required" id="title" name="ag_x" size="20" value="<?php echo $data['ag_x'] ?>" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>纬度：</th>
                                <td>
                                   <input class="common-text required" id="title" name="ag_y" size="20" value="<?php echo $data['ag_name'] ?>" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="修改" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                <?php ActiveForm::end() ?>            </div>
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