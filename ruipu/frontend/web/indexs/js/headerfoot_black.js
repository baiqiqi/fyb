$(function(){function e(e){var t,s,i;if(t=e.minResponseTime?new Date:null,i=function(t){if("undefined"==typeof t.error_code)try{t.error_code=t.error,t.result=t.result,0!=t.error_code&&(t.data=t.data||{},t.data.msg=t.msg)}catch(s){}0==t.error_code?("undefined"==typeof t.data&&(t.data=e.__defaultData__),e.onCallSuccessBefore&&e.onCallSuccessBefore(t),e.onSuccess&&e.onSuccess(t),e.onCallSuccessAfter&&e.onCallSuccessAfter(t)):e.onError&&e.onError(t)},e.testData)return"undefined"==typeof e.testData.data&&(e.testData.data=e.__defaultData__),void setTimeout(function(){i(e.testData)},e.minResponseTime||200);var r=window.location.host,n=e.url||e.posturl,o=e.data,a="json";if(/static.qyer.com/.test(r)===!0){var c;o=$.extend({},o,{__qFED__:e.__qFED__}),e.__qFED__&&e.__qFED__.id&&(c=e.__qFED__.id,e.type="GET"),n="http://fe.2b6.me:3000/service/api/"+c,a="jsonp",api=null}var h=$.ajax({type:e.type||"POST",url:n,dataType:a,data:o,cache:e.cache||!1,success:function(r){t?(s=new Date-t,setTimeout(function(){i.call(null,r)},s>e.minResponseTime?0:e.minResponseTime-s)):i.call(null,r),t=s=null},error:function(t,s){e.onError&&e.onError({error_code:-1,__server_error__:!0,__server_status__:h.statusText,result:"error",data:{msg:s||{}}})}});return h}function t(e){this.opts=$.extend({box:"#js_qyer_header_userStatus"},e),this.$userStatusBox=$(this.opts.box),this.ajaxUrls={userStatus:"qcross/home/ajax?action=loginstatus",msgCount:"qcross/user/ajax.php?action=getunreadcount",msgInfo:"qcross/home/ajax?action=notice"},this.hasNewMessage=!0,this.init()}function s(e){this.opts=$.extend({box:"#siteSearch"},e),this.$searchBox=$(this.opts.box),this.$input=this.$searchBox.find(".txt"),this.$form=this.$searchBox.find("form"),this.searchUrl=this.$form.attr("action"),this.ajaxUrls={sitesearch:"qcross/home/ajax?action=sitesearch"},this.searchTimer=null,this.$history=null,this.$autocomplete=null,this._history=[],this._search={},this.init()}function i(){this.href=window.location.href,this.refer=document.referrer,this.source=null,this.isnew=this.getCookie("isnew"),this.init()}var r={getUserStatus:function(t){e(t)},sitesearch:function(t){e(t)}},n={isParent:function(e,t){for(;void 0!=e&&null!=e&&"BODY"!=e.tagName.toUpperCase()&&"HTML"!=e.tagName.toUpperCase();){if(e==t)return!0;e=e.parentNode}return!1},loadInner:function(){return'<div class="sk-wave"><div class="sk-rect sk-rect1"></div><div class="sk-rect sk-rect2"></div><div class="sk-rect sk-rect3"></div><div class="sk-rect sk-rect4"></div><div class="sk-rect sk-rect5"></div></div>'},fliterScript:function(e){return e.replace(/<script[^>]*>[\s\S]*?<\/[^>]*script>/gi,"")}};t.prototype={init:function(){window.QYER=window.QYER||{uid:0},this.getUserStatus(),this.bindEvent()},getUserStatus:function(){var e=this;r.getUserStatus({url:this.ajaxUrls.userStatus,data:{timer:(new Date).getTime()},onSuccess:function(t){0==t.error_code&&(t.data.uid>0&&(window.QYER=window.QYER||{},window.QYER.uid=t.data.uid,e.renderUserInfoInner(t.data.userinfo)),window.__userStatusCallBack&&__userStatusCallBack.call(window,t.data))}})},renderUserInfoInner:function(e){e.msgCount&&this.$userStatusBox.find(">.user-info > .usermsg > .message > .num").text(e.msgCount);var t=['<em class="newmsg"'+(e.msgCount&&e.msgCount?"":' style="display:none;"')+"></em>",'<div class="q-layer q-layer-message">','<div class="layer-msg-tab">',"<ul>",'<li class="current'+(e.msg&&e.msg.board?" new":"")+'" data-msg-type="board"><a href="javascript:;">站内通知</a></li>',"<li"+(e.msg&&e.msg.notice?' class="new"':"")+' data-msg-type="notice"><a href="javascript:;">消息</a></li>',"<li"+(e.msg&&e.msg.message?' class="new"':"")+' data-msg-type="message"><a href="javascript:;">私信</a></li>',"</ul>","</div>",'<div class="layer-msg-container">','<div class="layer-msg-item layer-msg-item-board" style="display: block;">','<div class="layer-msg-inner"><div class="loading"></div></div>','<div class="layer-msg-more">','<a href="'+e.msgUrl.board+'"  data-bn-ipg="index-head-black-all">查看全部</a>',"</div>","</div>",'<div class="layer-msg-item layer-msg-item-notice">','<div class="layer-msg-inner"><div class="loading"></div></div>','<div class="layer-msg-more">','<a href="'+e.msgUrl.notice+'"   data-bn-ipg="index-head-notice-all">查看全部</a>',"</div>","</div>",'<div class="layer-msg-item layer-msg-item-message">','<div class="layer-msg-inner"><div class="loading"></div></div>','<div class="layer-msg-more">','<a href="'+e.msgUrl.message+'"  data-bn-ipg="index-head-letter-all">查看全部</a>',"</div>","</div>","</div>","</div>"].join("");this.$userStatusBox.find(">.user-info > .userstatus").append(e.menuInner),this.$userStatusBox.find(">.user-info > .usermsg").append(t),this.getUserMsgCount()},renderUserMsgInner:function(e){this.renderMsg("board",e.board,this.$userStatusBox.find(".layer-msg-item-board > .layer-msg-inner")),this.renderMsg("notice",e.notice,this.$userStatusBox.find(".layer-msg-item-notice > .layer-msg-inner")),this.renderMsg("message",e.message,this.$userStatusBox.find(".layer-msg-item-message > .layer-msg-inner"))},renderMsg:function(e,t,s){var i,r,n=[];switch(e){case"board":i="站内通知",r="black";break;case"notice":i="消息",r="notice";break;case"message":default:i="私信",r="letter"}if(this.$userStatusBox.find("[data-msg-type="+e+"]")[t.unread>0?"addClass":"removeClass"]("new"),t.list.length){n.push("<ul>");for(var o=0;o<t.list.length;o++){var a=t.list[o];n.push("<li"+(0==a.unread?"":' class="unread"')+">"),n.push('<div class="layer-msg-cont">'),n.push('<p class="cont">'),n.push('<a href="'+a.url+'" data-bn-ipg="index-head-msgrdrop-'+r+"List-"+o+'">'+("message"==e?a.from+": ":"")+a.msg+"</a>"),n.push("</p>"),n.push("</div>"),n.push("</li>")}n.push("</ul>")}else n.push('<div class="msg-empty">暂时没有新的'+i+"</div>");s.html(n.join(""))},getUserMsgCount:function(){var e=this,t=!0,s=0;$(window).focus(function(){t=!0}).blur(function(){t=!1});var i=function(){var i=!!s,r=10*Math.random()<7,n=!t;i||r||n||(e.hasNewMessage=!0,$.getJSON(e.ajaxUrls.msgCount,{timer:(new Date).getTime()}).done(function(t){s=t.total_count,e.$userStatusBox.find(".newmsg")[t.total_count>0?"show":"hide"](),e.$userStatusBox.find(".num").html(t.total_count)}))};setInterval(function(){i()},3e4)},getUserMsgInfo:function(){var e=this;this.hasNewMessage=!1,$.getJSON(this.ajaxUrls.msgInfo,{timer:(new Date).getTime()}).done(function(t){0==t.error_code&&e.renderUserMsgInner(t.data)})},bindEvent:function(){var e=this;this.$userStatusBox.on("click",".otherlogin-link",function(){return e.otherlogin(this.getAttribute("data-type"),this.getAttribute("url")),!1}).on("mouseenter",".userstatus,.usermsg",function(){clearTimeout(this.timer),$(this).addClass("hover"),$(this).hasClass("usermsg")&&e.hasNewMessage&&e.getUserMsgInfo()}).on("mouseleave",".userstatus,.usermsg",function(){var e=$(this);this.timer=setTimeout(function(){e.removeClass("hover")},500)}).on("click",".layer-msg-tab li",function(){if($(this).hasClass("current"))return!1;var t=this.getAttribute("data-msg-type");$(this).addClass("current").siblings().removeClass("current"),e.$userStatusBox.find(".layer-msg-item-"+t).show().siblings().hide()})},otherlogin:function(e,t){var t="http://login.qyer.com/auth.php?action="+e+"&popup=1&refer="+(t||window.location.href);window.open(t,"newwindow","width=600,height=530,top=100,left=300,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,status=no"),t=null}},new t({}),s.prototype={init:function(){this.createHistory(),this.createAutoComplete(),this.bindEvent(),this.getStorage()},bindEvent:function(){var e=this;this.$input.on("focus",function(){e.hideLayer(),e.searchBoxActive()}),this.$input.on("keyup",function(t){switch(t.keyCode){case 38:case 37:e.switchUpDown("up");break;case 40:case 39:e.switchUpDown("down");break;default:clearTimeout(e.searchTimer),e.searchTimer=setTimeout(function(){""==e.getSearchWord()?e.showHistory():e.searchWord(e.getSearchWord())},400)}}),this.$form.on("submit",function(){var t=$.trim(e.$input.val()),s=e.searchUrl+"?wd="+window.encodeURIComponent(t);return""==t?!1:void e.setStorage(t,s)})},searchBoxActive:function(){this.$searchBox.addClass("active"),this.clickDocumentEvent(this.$searchBox[0],this.searchBoxClose),""==this.getSearchWord()?this.showHistory():this.searchWord(this.getSearchWord())},searchBoxClose:function(){this.$searchBox.removeClass("active"),this.$input.val(""),this.$history&&this.$history.removeClass("show")},clickDocumentEvent:function(e,t){var s=this,i="e_"+(new Date).getTime();$(document).unbind("click."+i),$(document).bind("click."+i,function(r){n.isParent(r.target,e)||r.target==e||(t.call(s),$(document).unbind("click."+i))})},createHistory:function(){if(!window.localStorage)return!1;var e=this,t=['<div class="q-layer q-layer-sitesearch-history">',"<ul>","</ul>",'<div class="history-clear">','<a href="javascript:;">清空历史记录</a>',"</div>","</div>"];this.$searchBox.append(t.join("")),this.$history=this.$searchBox.find(".q-layer-sitesearch-history"),this.$history.on("click",".history-clear > a",function(){e.clearStorage()})},hideLayer:function(){this.$searchBox.find(".q-layer").removeClass("show")},showHistory:function(){if(!this._history.length)return!1;for(var e=[],t=0;t<this._history.length&&(e.push('<li data-type="history" data-wd="'+this._history[t].key+'"><a href="'+this._history[t].url+'">'+this._history[t].key+"</a></li>"),!(t>=8));t++);this.$history.find("ul").html(e.join("")),this.$history.addClass("show"),this.hideAutoComplete()},hideHistory:function(){this.$history.removeClass("show")},showAutoComplete:function(){this.$autocomplete.addClass("show")},hideAutoComplete:function(){this.$autocomplete.removeClass("show")},createAutoComplete:function(){var e=['<div class="q-layer q-layer-sitesearch-autocomplete">',"<ul>","</ul>","</div>"];this.$searchBox.append(e.join("")),this.$autocomplete=this.$searchBox.find(".q-layer-sitesearch-autocomplete")},getStorage:function(){if(window.localStorage&&window.localStorage.sitesearch_history){var e=window.localStorage.sitesearch_history;this._history=JSON.parse(e)}},setStorage:function(e,t){if(!window.localStorage)return!1;for(var s=-1,i=0;i<this._history.length;i++)if(this._history[i].key==e){s=i;break}-1!=s&&this._history.splice(i,1),this._history.unshift({key:e,url:t}),window.localStorage.sitesearch_history=JSON.stringify(this._history)},getSearchWord:function(){return n.fliterScript($.trim(this.$input.val()))},setSearchWord:function(e){this.$input.val(e)},clearStorage:function(){return window.localStorage?(window.localStorage.removeItem("sitesearch_history"),this._history=[],void this.$history.find("ul").empty()):!1},switchUpDown:function(e){this.$history.is(":visible")?this.switchUpDownInHistory(e):this.$autocomplete.is(":visible")&&this.switchUpDownInAutoComplete(e)},switchUpDownInHistory:function(e){var t=this.$history.find("li"),s=this.$history.find("li.current"),i=null;i="up"==e?s.length&&s.prev().length?s.prev():t.last():s.length&&s.next().length?s.next():t.first(),this.currentLayer(i)},switchUpDownInAutoComplete:function(e){var t=this.$autocomplete.find("li"),s=this.$autocomplete.find("li.current"),i=null;i="up"==e?s.length&&s.prev().length?s.prev():t.last():s.length&&s.next().length?s.next():t.first(),this.currentLayer(i)},currentLayer:function(e){switch(e.addClass("current").siblings().removeClass("current"),this.$form.attr("action",this.searchUrl),e.attr("data-type")){case"history":this.setSearchWord(e.attr("data-wd"));break;case"item":this.$form.attr("action",e.find("a").attr("href"));break;case"word":this.setSearchWord(e.find("a").text())}},ajaxSearch:function(e){var t=this,s={keyword:e,timer:(new Date).getTime()},i=this.ajaxUrls.sitesearch;r.sitesearch({url:i,type:"get",data:s,onSuccess:function(s){s.data.list.length?t.renderAutoComplete(t.$autocomplete,s.data,e):t.hideLayer()}})},searchWord:function(e){this._search[e]?this.renderAutoComplete(this.$autocomplete,this._search[e]):this.ajaxSearch(e)},renderAutoComplete:function(e,t,s){var i=[];if("string"==typeof t)i=t;else{for(var r=0;r<t.list.length;r++){var n=t.list[r];"item"==n.type_name?(i.push('<li data-type="item">'),i.push('<a href="'+n.url+'">'),i.push("<dl>"),i.push("<dt>"),i.push('<img src="'+n.src+'" width="30" height="30" />'),i.push("</dt>"),i.push("<dd>"),i.push("<p>"),i.push('<span class="cn">'+n.cn_name+"</span>"),i.push('<span class="en">'+n.en_name+"</span>"),i.push("</p>"),i.push("<p>"),i.push('<span class="poi">'+n.belong_name+"</span>"),i.push("</p>"),i.push("</dd>"),i.push("</dl>"),i.push("</a>"),i.push("</li>")):i.push('<li data-type="word"><a href="'+n.url+'">'+n.word+"</a></li>")}i=i.join("")}i&&(e.find("ul").html(i),this._search[s]=i),this.hideHistory(),this.showAutoComplete()},replaceKeyword:function(e,t){return e.replace(t,"<em>"+t+"</em>")}},new s({}),i.prototype={href:null,refer:null,source:null,isnew:null,isBigBanner:!1,init:function(){if(this.setSource(),window.QYER&&window.QYER.uid>0)return!1;var e,t;return e="m|login",t=new RegExp("^http://("+e+").(qyer|go2eu).com","i"),t.test(this.href)?!1:(this.getHtml(),void this.setIsnew())},getHtml:function(){var e=this;$.get("/qcross/bbs/api.php?action=banner&url="+encodeURIComponent(this.href)+"&isnewuser="+this.isnew+"&source="+encodeURIComponent(this.getSource()),function(t){if(""!==t){var s=$(t);s.find(".qyer_layer_fl").css("height","100%"),$("body").append(s),e.bindEvent(),e=null}})},bindEvent:function(){var e=this;$(document).on("click","._jslogin",function(e){window.location.href=$("#js_qyer_header_userStatus a[data-bn-ipg=index-head-un-login]").attr("href")}).on("click","._jslogin_reg",function(t){e.isBigBanner?window.location.href=$("#js_qyer_header_userStatus a[data-bn-ipg=index-head-un-login]").attr("href"):window.location.href=$("#js_qyer_header_userStatus a[data-bn-ipg=index-head-un-register]").attr("href")}).on("click","._jsweibologin",function(){var e="http://login.qyer.com/auth.php?action=weibo&popup=1&refer="+($(this).attr("url")||window.location.href);window.open(e,"newwindow","height=450px,width=600px,top=100,left=300,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no"),e=null}).on("click","._jstao_li",function(e){e.preventDefault();var t="http://login.qyer.com/auth.php?action=taobao&popup=1&refer="+window.location.href;window.open(t,"newwindow","height=450px,width=600px,top=100,left=300,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no"),t=null}).on("click","._jsqqlogin",function(){var e="http://login.qyer.com/auth.php?action=qq&popup=1&refer="+($(this).attr("url")||window.location.href);window.open(e,"newwindow","height=450px,width=600px,top=100,left=300,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no"),e=null}).on("click",".qyer_layer_close",function(t){$("._jsbeforelogindiv").fadeOut(1e3,function(){$(this).remove(),e=null})})},setCookie:function(e,t,s){var i=365,r=new Date;arguments[2]||(s=1),1==s?(r.setTime(r.getTime()+24*i*60*60*1e3),document.cookie=e+"="+escape(t)+"; path=/;domain=.qyer.com;expires="+r.toGMTString()):document.cookie=e+"="+escape(t)+"; path=/;domain=.qyer.com",i=r=null},getCookie:function(e){var t=document.cookie.match(new RegExp("(^| )"+e+"=([^;]*)(;|$)"));return null!=t?unescape(t[2]):null},setSource:function(){if(this.getSource(),!this.source){var e=".+",t=new RegExp("^http://("+e+").(qyer|go2eu).com","i");this.refer&&!t.test(this.refer)&&this.setCookie("source_url",this.refer),e=t=null}},getSource:function(){return this.source=this.getCookie("source_url"),this.source},setIsnew:function(){this.isnew||this.setCookie("isnew",(new Date).getTime())},beforeloginshow:function(){setTimeout(function(){$("._jsbeforelogindiv").fadeIn(500)},100)},beforeloginup:function(){this.isBigBanner=!0,this.beforeloginshow()}},setTimeout(function(){window.QYER.uid||window.banner||(window.banner=new i)},8e3)});