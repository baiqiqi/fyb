<!DOCTYPE html>
<html>
<head>
    <title>登录</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/self.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src=js/bootstrap.min.js"></script>

</head>
<body background="images/bg.jpg">

<div class="container" style="width: 600px;padding-top: 120px;">
    <div class="jumbotron">
        <h2>&nbsp;瑞普健康后台管理系统！</h2>
        <form role="form" action="index.php?r=login/index" method="post">
            <div class="form-group">
                <label for="name">名&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;称:</label>
                <input type="text" class="form-control" name="u_name" id="name" placeholder="请输入名称" s>
            </div>
            <div class="form-group">
                <label for="name">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:</label>
                <input type="password" class="form-control" name='passwd' id="name" placeholder="请输入密码">
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox">请记住我
                </label>
            </div>
            <div class="but">
                <input type="submit" class="btn btn-success" value="登录"/>
                <input type="reset" class="btn btn-warning" value="重置">
            </div>
            <div>
                <?php if(isset($login_error)): ?>
                    <br/><h4 style="color: red;text-align: center;"><?= $login_error; ?></h4>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

</body>
</html>
