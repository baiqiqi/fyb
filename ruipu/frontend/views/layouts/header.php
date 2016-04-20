<!DOCTYPE HTML>
<html>
<head>

<title>瑞普</title>


<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->
<script type='text/javascript' src="js/jquery-1.11.1.min.js"></script>

<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Medical_Equipment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- start menu -->
<script type="text/javascript" src="js/bootstrap.js"></script>

<script src="js/simpleCart.min.js"> </script>
<script src="js/responsiveslides.min.js"></script>

</head>
<body>
<!-- header -->
<div class="header_bg">
<div class="container">
  <div class="header">
  <div class="head-t">
    <div class="logo">
      <a href="index.html"><img src="images/logo.png" class="img-responsive" alt=""/> </a>
    </div>
    <!-- start header_right -->
    <div class="header_right">
      <div class="rgt-bottom">
      <li><a href="index.php?r=index/index">首页</a></li>
          <?php 
              $session = Yii::$app->session;
              $session->open();    
              $username = $session->get('uname');
              if($username)
              {
             echo "<a href='index.php?r=index/user_center&m='>$username</a>";
                          }
              else{
          ?>
        
        <li class="status"><a href="index.php?r=login/signin">注册  </a><a href="index.php?r=login/login">登录</a></li>
        <?php }?>
        <li><a href="index.php?r=index/user_center&m=">用户中心</a></li>
        <li><a href="index.php?r=login/back">退出</a></li>
        <li a="" href="#">
 <!--          <div class="drop-down">
              <select class="d-arrow">
                <option><a href="index.php?r=index/user_center&m=">用户中心</a></option>
                <option value="Fren">个人资料</option>
                <option value="Russ">Russ</option>
                <option value="Chin">Chin</option>
              </select>
          </div> -->
        </li>
        <li a="" href="#">
  <!--         <div class="drop-down">
              <select class="d-arrow">
                <option value="$">$</option>
                <option value="€">€</option>
              </select>
          </div> -->
        </li>       
      <div class="clearfix"> </div>
    </div>
    <div class="se-ca">
      <div class="search">
        <form>
          <input type="text" value="" placeholder="search...">
          <input type="submit" value="">
        </form>
      </div>
      
      <div class="clearfix"> </div>
    </div>
    </div>
      <div class="clearfix"> </div>
  </div>  
  
    <!-- start header menu -->
    <div class="header-top">
      <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       <?php //include('../views/layouts/nav.php');?>

       <!-- 首页导航开始 -->
        <li class="active"><a href="index.php?r=index/index">首页 </a><li>
        <li class="active"><a href="index.php?r=index/contact">商品</a><li>
     <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sale <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="index.php?r=indexle">Action</a><li>
            <li><a href="index.php?r=indexle">Another action</a><li>
            <li><a href="index.php?r=indexle">Something else here</a><li>
           
          </ul>
        <li>
    <li><a href="index.php?r=about/about">关于我们</a><li>
    <li><a href="">Contact Us</a><li>
      </ul>
    <!-- 首页导航结束 -->

      </ul>
      
    
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    </div>
    <!-- start header menu -->
  </div>
</div>
</div>

<link href="css/lanrenzhijia.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/cloud-zoom.1.0.2.min.js"></script>

<?= $content ?>




<div class="foot-top">
  <div class="container">
    <div class="col-md-6 s-c">
      <li>
        <div class="fooll">
          <h5>follow us on</h5>
        </div>
      </li>
      <li>
        <div class="social-ic">
          <ul>
            <li><a href="#"><i class="facebok"> </i></a></li>
            <li><a href="#"><i class="twiter"> </i></a></li>
            <li><a href="#"><i class="goog"> </i></a></li>
            <li><a href="#"><i class="inst"> </i></a></li>
              <div class="clearfix"></div>  
          </ul>
        </div>
      </li>
        <div class="clearfix"> </div>
    </div>
    <div class="col-md-6 s-c">
      <div class="stay">
            <div class="stay-left">
              <form>
                <input type="text" placeholder="Enter your email " required="">
              </form>
            </div>
            <div class="btn-1">
              <form>
                <input type="submit" value="join">
              </form>
            </div>
              <div class="clearfix"> </div>
      </div>
    </div>
      <div class="clearfix"> </div>
  </div>
</div>
<div class="footer">
  <div class="container">
    <div class="col-md-3 cust">
      <h4>服务</h4>
        <li><a href="#">帮助中心</a></li>
        <li><a href="#">FAQ</a></li>
        <li><a href="#">如何购买</a></li>
        <li><a href="#">交易</a></li>
    </div>
    <div class="col-md-3 abt">
      <h4>关于我们</h4>
        <li><a href="./index.php?r=about/intro">医院简介</a></li>
        <li><a href="./index.php?r=index/contact">联系我们</a></li>
    </div>
    <div class="col-md-3 myac">
      <h4>我的账户</h4>
        <li><a href="register.html">登陆/注册</a></li>
        <li><a href="#">我的购物车</a></li>
        <li><a href="#">订单记录</a></li>
        <li><a href="buy.html">付款方式</a></li>
    </div>
    <div class="col-md-3 our-st">
        <h4>OUR STORE</h4>
        <li><i class="add"> </i>lorem ipsum</li>
        <li><i class="phone"> </i>1234567890</li>
        <li><a href="mailto:info@example.com"><i class="mail"> </i>info@sitename.com </a></li>
      
    </div>
    <div class="clearfix"> </div>
      <p>版权归优秀团队所有 &copy; 2016.优秀公司保留所有权利.</p>
  </div>
</div>
<a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 0;"></span> <span id="toTopHover" style="opacity: 0;"> </span></a>
</body>
</html>