<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php include('../views/layouts/top.php');?>
 <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">作品管理</a><span class="crumb-step">&gt;</span><span>新增作品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <?php $form=ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']])?>
                    <table class="insert-tab" width="100%">
                        <tbody>
                        <tr>
                                <th><i class="require-red">*</i>商品图片：</th>
                                <td><?=$form->field($model,'file')->fileInput() ?></td>
                            </tr>
                        <tr>
                            <th width="120"><i class="require-red">*</i>商品名称：</th>
                           <td>
                                    <input class="" id="pro_name" name="pro_name" size="30" value="" type="text">
                                </td>
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>商品详情：</th>
                                <td>
                                    <textarea name="pro_content" class="common-textarea" id="pro_content" cols="30" style="width: 50%;" rows="10"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>商品价格：</th>
                                <td><input class="common-text" name="pro_price" size="30" type="text" id="pro_price"></td>
                            </tr>
                             <tr>
                                <th>商品数量：</th>
                                <td><input class="common-text" name="pro_count" size="30" type="text" id="pro_count"></td>
                            </tr>
                             <tr>
                                <th>商品月销量：</th>
                                <td><input class="common-text" name="pro_sales" size="30" type="text" id="pro_sales"></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                <?php ActiveForm::end() ?>
            </div>
        </div>

    </div>
    <!--/main-->
</div>