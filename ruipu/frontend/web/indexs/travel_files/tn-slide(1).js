(function($) {
  $.fn.tn_slide = function(s) {
    var de = {
      width: 800,
      height: 280,
      timeSpace: 400
    }
    var custom = $.extend(de, s);
    var _this = $(this);
    var len = _this.find("ul li").length; //获取焦点图个数

    var box_img_h = custom.height;
    var box_img_w = custom.width;


    var _this_ul = _this.find("ul");
    var li_img = _this_ul.find("li img");
    var li_li = _this_ul.find("li");
    if (parseInt(li_img.width()) != 800) {
      _this.css({
        "width": box_img_w,
        "height": box_img_h
      });
      li_img.css({
        "width": box_img_w,
        "height": box_img_h
      });
      li_li.css({
        "width": box_img_w,
        "height": box_img_h
      });
    }
    var f_li = _this.find("ul li").eq(0).clone();
    var l_li = _this.find("ul li").eq(len - 1).clone();

    var index = 0;
    var picTimer;
    // tn_tem = index;

    //添加样式列表
    if (!$("#tnSlideCss").length) {
      $("head") && $("head").append('<link href="http://img1.tuniucdn.com/f/20140807/tn-slide/fotorama.css" rel="stylesheet" id="tnSlideCss">');
    }


    //以下代码添加数字按钮和按钮后的半透明条，还有上一页、下一页两个按钮
    var btn = "<div class='btn' style='width:" + box_img_w + "px'>";
    for (var i = 0; i < len; i++) {
      if (i == 0) {
        btn += "<span class='on'></span>";
      } else {
        btn += "<span></span>";
      }

    }
    btn += "</div><div class='preNext pre' style='display:none;'></div><div class='preNext next' style='display:none;'></div>";
    _this.append(btn);

    //为小按钮添加鼠标滑入事件，以显示相应的内容
    _this.find(".btn span").mouseover(function() {
      index = _this.find(".btn span").index(this);
      showPics(index);
    }).eq(0).trigger("mouseover");

    //本例为左右滚动，即所有li元素都是在同一排向左浮动，所以这里需要计算出外围ul元素的宽度
    _this_ul.css({
      "width": box_img_w * (len + 2),
      "left": -box_img_w
    });

    _this_ul.css("left", -box_img_w);
    _this_ul.append(f_li);
    l_li.insertBefore(_this.find("ul li").eq(0));
    var preNextButton = _this.find(".preNext");
    _this.css("height", box_img_h);

    _this.hover(function() {
      //获取上下页按钮位置
      if (preNextButton.height() == 0) {
        return;
      }
      var sHeight = (box_img_h - preNextButton.height()) * 0.5;
      preNextButton.css("top", sHeight).show();
      //上一页、下一页按钮透明度处理
      preNextButton.css("opacity", 0.2).hover(function() {
        $(this).stop(true, false).animate({
          "opacity": "0.5"
        }, 300);
      }, function() {
        $(this).stop(true, false).animate({
          "opacity": "0.2"
        }, 300);
      });
    }, function() {
      preNextButton.hide();
    });
    //上一页按钮
    _this.find(".pre").bind("click", function() {
      index -= 1;
      showPics(index);
      if (index == -1) {
        index = len - 1;
      }
    });

    //下一页按钮
    _this.find(".next").bind("click", function() {
      index += 1;
      showPics(index);
      if (index == len) {
        index = 0;
      }

    });
    //鼠标滑上焦点图时停止自动播放，滑出时开始自动播放
    _this.hover(function() {
      clearInterval(picTimer);
    }, function() {
      picTimer = setInterval(function() {
        index += 1;
        showPics(index);

        if (index == len) {
          index = 0;
        }
      }, custom.timeSpace); //此4000代表自动播放的间隔，单位：毫秒
    }).trigger("mouseleave");


    //显示图片函数，根据接收的index值显示相应的内容

    function showPics(index) { //普通切换
      var nowLeft = -(index + 1) * box_img_w; //根据index值计算ul元素的left值
      var tn_tem = index;

      if (li_li.eq(tn_tem).find("img").attr("datas-src") && li_li.eq(tn_tem).find("img").attr("datas-src") != li_li.eq(tn_tem).find("img").attr("src")) {
        li_li.eq(tn_tem).find("img").attr("src", li_li.eq(tn_tem).find("img").attr("datas-src"));
      }



      _this.find("ul").stop(true, false).animate({
        "left": nowLeft
      }, 300, function() {
        if (index == len) {
          _this_ul.css("left", -box_img_w);
          tn_tem = 0;

        }
        if (index == -1) {
          _this_ul.css("left", -len * box_img_w);
          tn_tem = len - 1;
        }
        _this.find(".btn span").removeClass("on").eq(tn_tem).addClass("on"); //为当前的按钮切换到选中的效果
        if (_this.parents(".banner").find(".opc-bg").length) {
          _this.parents(".banner").find(".opc-bg img").removeClass("on").eq(tn_tem).addClass("on");
        }
      }); //通过animate()调整ul元素滚动到计算出的position
    }

  }
})(jQuery)