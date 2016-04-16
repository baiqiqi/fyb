M.define("/js/Dropdown",function(c,b,d){function a(e){this.$nav=typeof e.nav==="string"?$(e.nav):e.nav;this.$panel=typeof e.panel==="string"?$(e.panel):e.panel;this.showCallback=e.showCallback;this.hideCallback=e.hideCallback;this.delay=e.delay||0;this.event=e.event||"mouseenterleave";this._isShow=false;this.init()}a.prototype={init:function(){if(this.event==="mouseenterleave"){this.$nav.on("mouseenter.dropdown",M.bind(function(e){this.show()},this)).on("mouseleave.dropdown",M.bind(function(e){if($(e.relatedTarget).closest(this.$panel).length===0){this.hide(true)}},this));this.$panel.on("mouseenter.dropdown",M.bind(function(e){this.show()},this)).on("mouseleave.dropdown",M.bind(function(e){if($(e.relatedTarget).closest(this.$nav).length===0){this.hide(false)}},this))}if(this.event==="click"){this.$nav.on("click.dropdown",M.bind(function(e){this.show()},this));$(document).on("click.dropdown",M.bind(function(e){if($(e.target).closest(this.$nav).length===0&&$(e.target).closest(this.$panel).length===0){this.hide(false)}},this))}},show:function(){this.$panel.show();this._isShow=true;if(M.isFunction(this.showCallback)){this.showCallback.call(this,this.$nav,this.$panel)}},hide:function(e){this._isShow=false;if(e&&this.delay>0){setTimeout(M.bind(function(){if(!this._isShow){this.$panel.hide();if(M.isFunction(this.hideCallback)){this.hideCallback.call(this,this.$nav,this.$panel)}}},this),this.delay)}else{this.$panel.hide();if(M.isFunction(this.hideCallback)){this.hideCallback.call(this,this.$nav,this.$panel)}}},destory:function(){if(this.event==="mouseenterleave"){this.$nav.off("mouseenter.dropdown").off("mouseleave.dropdown");this.$panel.off("mouseenter.dropdown").off("mouseleave.dropdown")}if(this.event==="click"){this.$nav.off("click.dropdown")}this.$panel.hide()}};d.exports=a});M.define("InputListener",function(c,b,d){var a={listen:function(f,e){f=$(f);f.each($.proxy(function(g,h){h=$(h);if(!h.is("input")&&!h.is("textarea")){throw new Error("input listener only apply to input or textarea")}this.initListen(h,e)},this))},unlisten:function(e){e=$(e);e.each($.proxy(function(h,k){k=$(k);if(!k.is("input")&&!k.is("textarea")){throw new Error("input listener only apply to input or textarea")}if(arguments.length==1){k.unbind("focus",this.getStartListenFunc());k.unbind("blur",this.getStopListenFunc());k.removeData("__input_listener_handlers")}else{if(typeof arguments[1]=="function"){var j=arguments[1],g=k.data("__input_listener_listeninterval");for(var h=0,f=g.length;h<f;h++){if(g[h]==j){g.splice(h,1);h--}}}}},this))},initListen:function(f,e){f.data("__input_listener_currentval",f.val());if(!f.data("__input_listener_handlers")){this.bindListenEvent(f)}this.addListenHandler(f,e)},bindListenEvent:function(e){e.data("__input_listener_handlers",[]);e.focus(this.getStartListenFunc());e.blur(this.getStopListenFunc())},getStartListenFunc:function(){if(!this.bindStartListenFunc){this.bindStartListenFunc=$.proxy(this.startListen,this)}return this.bindStartListenFunc},getStopListenFunc:function(){if(!this.bindStopListenFunc){this.bindStopListenFunc=$.proxy(this.stopListen,this)}return this.bindStopListenFunc},startListen:function(e){var f=$(e.target);f.data("__input_listener_currentval",f.val());f.data("__input_listener_listeninterval",setInterval($.proxy(function(){var h=f.data("__input_listener_currentval"),g=f.val();if(h!=g){f.data("__input_listener_currentval",g);this.triggerListenHandler(f)}},this),100))},stopListen:function(e){var f=$(e.target);clearInterval(f.data("__input_listener_listeninterval"))},addListenHandler:function(f,e){if(typeof e=="function"){f.data("__input_listener_handlers").push(e)}},triggerListenHandler:function(h){var f=h.data("__input_listener_handlers");for(var g=0,e=f.length;g<e;g++){f[g].call(null,{target:h.get(0)})}}};return a});M.define("SuggestionXHR",function(b,a,c){function d(e){this.URL=null;this.delay=200;this.dataType="text";$.extend(this,e);this.delayTimer=null;this.xhr=null;this.cache={};this.init()}d.prototype={init:function(){if(!this.URL){throw new Error("no url for suggestion")}},getSuggestion:function(g,h){var f=this.getQuery(g),e=this.cache[f];h=typeof h==="function"?h:$.noop;this.stop();if(e){h(e)}else{this.getXHRData(f,h)}},stop:function(){clearTimeout(this.delayTimer);if(this.xhr&&this.xhr.readyState!==4){this.xhr.abort()}},getQuery:function(h){var g="";if(typeof h=="string"){g=encodeURIComponent(h)}else{if(h&&typeof h=="object"){var e=[];for(var f in h){if(h.hasOwnProperty(f)){e.push(f+"="+encodeURIComponent(h[f]))}}g=e.join("&")}}return g},getXHRData:function(e,h){var f=this.xhr,g={url:this.URL,data:e,dataType:this.dataType,success:M.bind(function(i){h(i);this.cache[e]=i},this)};this.delayTimer=setTimeout(M.bind(function(){this.xhr=$.ajax(g)},this),this.delay)}};return d});M.define("DropList",function(c,b,d){var a=M.Event;function e(f){this.trigger=null;this.container=null;this.itemSelector="._j_listitem";this.itemHoverClass="on";this.firstItemHover=false;$.extend(this,f);this.trigger=$(this.trigger);this.container=$(this.container);this.mouseon=false;this.visible=false;this.init()}M.mix(e.prototype,{createContainer:$.noop,updateList:$.noop,init:function(){if(!this.trigger.length){M.error("no trigger for drop list")}if(!this.container.length){this.container=this.createContainer()}if(!this.container.length){M.error("no container for drop list")}this.bindEvents()},bindEvents:function(){this.trigger.on("keydown",$.proxy(function(g){var h=g.keyCode;if(this.visible&&h==13){var f=this.getFocusItem();if(f.length){this.selectItem(f);g.preventDefault()}}else{if(this.visible&&h==38){this.moveFocus(-1)}else{if(this.visible&&h==40){this.moveFocus(1)}}}},this));this.container.on("mouseenter",this.itemSelector,$.proxy(this.moveFocus,this)).on("click",this.itemSelector,$.proxy(this.clickItem,this)).on("mouseenter",$.proxy(this.mouseOverCnt,this)).on("mouseleave",$.proxy(this.mouseOutCnt,this))},show:function(g){this.updateList(g);this.container.show();if(this.firstItemHover){var f=this.container.find(this.itemSelector);if(f.length){this.moveFocus(1)}}this.visible=true},hide:function(){this.container.hide();this.visible=false},clickItem:function(g){var f=this.getFocusItem();this.selectItem(f);g.preventDefault()},selectItem:function(f){console.log(f);a(this).fire("itemselected",{item:f})},moveFocus:function(i){var h=this.container.find(this.itemSelector),j=this.getFocusItem(),g=j,f;if(i===-1){if(j.length){f=h.index(j)-1}if(!j.length||f==-1){g=h.last()}else{g=h.eq(f)}}else{if(i===1){if(j.length){f=h.index(j)+1}if(!j.length||f==h.length){g=h.first()}else{g=h.eq(f)}}else{if(i.currentTarget){g=$(i.currentTarget)}}}j.removeClass(this.itemHoverClass);g.addClass(this.itemHoverClass);a(this).fire("itemfocused",{prevItem:j,focusItem:g})},getFocusItem:function(){var f=this.container.find(this.itemSelector);return f.filter("."+this.itemHoverClass)},mouseOverCnt:function(){this.mouseon=true},mouseOutCnt:function(){this.mouseon=false}});return e});M.define("Suggestion",function(c){var a=c("InputListener");var b='{{each(i, item) list}}<li class="${listItemClass}" data-value="${item.value}">${item.text}</li>{{/each}}';function d(e){e.suggestionURL=e.url||$(e.input).data("suggestionurl");this.dropListClass="droplist";this.listItemSelector="._j_listitem";this.listItemHoverClass="on";this.listFirstItemHover=false;this.keyParamName="key";this.dataType="json";this.suggestionParams={};this.listContainer=null;M.mix(this,e);this.input=$(this.input);this.listTmpl=this.listTmpl||b;this.actOnList=false;this.init()}M.mix(d.prototype,{init:function(){a.listen(this.input,$.proxy(this.inputChange,this));this.input.blur($.proxy(function(f){var e=$(f.currentTarget);if(e.data("droplist")){setTimeout($.proxy(function(){if(!this.actOnList&&e.data("droplist")){e.data("droplist").hide()}this.actOnList=false},this),200)}},this));this.input.keyup($.proxy(function(f){var e=$(f.currentTarget);if(f.keyCode==40&&(!e.data("droplist")||!e.data("droplist").visible)){this.inputChange(f)}},this))},inputChange:function(i){var f=$(i.target),k=$.trim(f.val()),j=c("SuggestionXHR"),h=c("DropList");var g=f.data("droplist");if(!g){f.data("droplist",g=new h({trigger:f,itemSelector:this.listItemSelector,itemHoverClass:this.listItemHoverClass,firstItemHover:this.listFirstItemHover,container:this.listContainer,createContainer:$.proxy(function(){var l=this.createListContainer(f);this.listContainer=l;return l},this),updateList:$.proxy(this.updateList,this)}));M.Event(g).on("itemselected",$.proxy(function(l){this.dropItemSelected(f,l.item)},this));M.Event(g).on("itemfocused",$.proxy(function(l){M.Event(this).fire("itemfocused",l)},this))}g.hide=function(){setTimeout($.proxy(function(){if(M.windowFocused){this.container.hide();this.visible=false}},this),1)};var e=f.data("suggestion");if(!e){f.data("suggestion",e=new j({URL:this.suggestionURL,dataType:this.dataType}))}if(!k.length){e.stop();g.hide()}else{this.suggestionParams[this.keyParamName]=k;M.Event(this).fire("before suggestion xhr");e.getSuggestion(this.suggestionParams,$.proxy(function(m){M.Event(this).fire("before show list");var l=this.handleSuggest(m);if(l){f.data("droplist").show(l)}},this))}},handleSuggest:function(f){var e="";if(this.dataType=="json"){e=$.tmpl(this.listTmpl,f)}return e},createListContainer:function(f){var g=$("<ul />"),e=f.position();g.css({display:"none",position:"absolute",left:e.left,top:e.top+f.outerHeight()}).addClass(this.dropListClass);g.insertAfter(f);return g},updateList:function(e){this.listContainer.html(e)},hideDropList:function(){this.input.data("droplist")&&this.input.data("droplist").hide()},dropItemSelected:function(e,f){a.unlisten(e);M.Event(this).fire("itemselected",{item:f,input:e});a.listen(e,$.proxy(this.inputChange,this))}});return d});M.define("/js/SiteSearch",function(c){var d=c("Suggestion"),b=window.Env||{};var a=function(h){var e=$("#"+h.input+""),g=e.closest(".head-search-wrapper"),q=!!h.submit?$("#"+h.submit+""):null,k=h.additionalClass?h.additionalClass:"",f=false,l=false,t=false,u="",o="";var r=new d({url:(b.WWW_HOST?"http://"+b.WWW_HOST:"")+"/group/ss.php",input:e,listItemHoverClass:"active",listFirstItemHover:false,dataType:"jsonp",createListContainer:function(){var w=$('<div class="m-search-suggest '+k+' hide"><ul class="mss-list"></ul></div>').appendTo("body");w.on("mouseenter",".mss-place .mss-title, .mss-place .mss-nav a",function(y){var x=$(y.currentTarget),z=x.closest(".mss-place");z.find(".mss-title").removeClass("active").removeClass("frozen").end().find(".mss-nav a").removeClass("active").end();x.addClass("active")}).on("mouseleave",".mss-place .mss-title, .mss-place .mss-nav a",function(y){var x=$(y.currentTarget);x.removeClass("active")}).on("click",".mss-place .mss-nav a",function(y){var x=$(y.currentTarget);l=true;x.addClass("J_selected");j($.trim(e.val()),x,"click");location.href=x.data("url");return false});return w},handleSuggest:function(H){u=H.keyword;f=!!H.is_hit;o="http://"+H.www_host;var E=$("<ul>");var B=H.first_poi;if(!!B){var x=B,J=$('<li class="mss-item _j_listitem" data-type="poi">').appendTo(E),L=$('<div class="mss-title">').appendTo(J);J.attr("data-url",x.url);L.append('<span class="mss-fr">'+(!!x.mddname?x.mddname:"")+x.typename+"</span>");L.append('<span class="mss-cn">'+x.dis_name+"</span>")}var K=H.mdd_info;if(!!K){for(var A=0;A<K.result.length;A++){var D=K.result[A],J=$('<li class="mss-item mss-place '+(K.result.length===1?"frozen":"")+' _j_listitem" data-url="'+D.url+'" data-type="mdd">').appendTo(E),L=$('<div class="mss-title">').appendTo(J),G=$('<div class="mss-nav clearfix">').appendTo(J);if(!!D.parent){L.append('<span class="mss-fr">'+D.parent+"</span>")}L.append('<span class="mss-cn">'+D.dis_name+"</span>");L.append('<span class="mss-gl"> 最新旅游攻略</span>');var y=D.service_type;if(y){for(var z=0;z<y.length;z++){var C=y[z];G.append('<a data-url="'+o+C.url+'" data-type="'+C.tag+'"><i class="mss-icon '+C.icon+'"></i><div>'+C.title+"</div></a>")}}}}var w=H.poi_info;if(!!w){for(var A=0;A<w.result.length;A++){var x=w.result[A],I="hotel"===x.stype?"hotel":"scenic",J=$('<li class="mss-item _j_listitem" data-type="'+I+'">').appendTo(E),L=$('<div class="mss-title">').appendTo(J);J.attr("data-url",x.url);L.append('<span class="mss-fr">'+(!!x.mddname?x.mddname:"")+x.typename+"</span>");L.append('<span class="mss-cn">'+x.dis_name+"</span>")}}var N=H.ginfo_num;if(!!N){var J=$('<li class="mss-item _j_listitem" data-type="info">').appendTo(E);J.append('<div class="mss-title">搜“<span class="mss-key">'+u+'</span>”相关游记<span class="mss-num">'+N+"篇</span></div>")}var F=H.user_num;if(!!N){var J=$('<li class="mss-item _j_listitem" data-type="user">').appendTo(E);J.append('<div class="mss-title">搜“<span class="mss-key">'+u+"</span>”相关用户</div>")}return E.html()},updateList:function(w){this.listContainer.find(".mss-list").html(w);if(f){r.input.data("droplist").moveFocus(1)}}});M.Event(r).on("before suggestion xhr",function(){s(e,r.listContainer);r.listContainer.find(".mss-list").hide().end()});M.Event(r).on("before show list",function(){r.listContainer.find(".mss-list").show()});M.Event(r).on("itemfocused",function(x){var w=x.prevItem,y=x.focusItem,z=r.listContainer;if(1<z.find(".mss-place").length){if(y.hasClass("mss-place")){z.find(".mss-place").removeClass("frozen")}if(!y.hasClass("mss-place")&&!!w&&w.hasClass("mss-place")){z.find(".mss-place").removeClass("frozen");w.addClass("frozen")}}if(y.hasClass("mss-place")){y.find(".mss-title").addClass("frozen")}});M.Event(r).on("itemselected",function(x){if(l){return}var z=x.item;if(z.length){var y=z.data("type"),w=z.data("url");j($.trim(e.val()),z,"click");if("info"===y||"user"===y){location.href=o+"/group/s.php?q="+u+"&t="+y}else{location.href=z.data("url")}}else{if(!!u){location.href=o+"/group/s.php?q="+u}}});if(!!g[0]){e.on("focus",function(w){setTimeout(function(){g.addClass("head-search-focus")},1)}).on("blur",function(w){setTimeout(function(){if(M.windowFocused){g.removeClass("head-search-focus")}},1)})}if(!!q&&!!q[0]){q.on("click",function(y){var x=$.trim(e.val());if(!!x){if(!!r.listContainer){r.listContainer.hide()}if(!t){j(u,"","search_btn")}var w=o+"/group/s.php?q="+encodeURIComponent(x);if(!!window.pageData&&!!window.pageData.type&&location.pathname==="/group/s.php"){w+="&t="+window.pageData.type}location.href=w}})}var n=e.closest(".head-search");if(!!n[0]){n.find("form").on("submit",function(){var w=$.trim(e.val());if(!!w&&!t){if(!!r.listContainer){r.listContainer.hide()}j(w,"","enter");location.href=o+"/group/s.php?q="+w;return false}})}var v=e.closest(".r-search");if(!!v[0]){v.find("form").on("submit",function(){var x=$.trim(e.val());if(!!x&&!t){if(!!r.listContainer){r.listContainer.hide()}j(x,"","enter");var w=o+"/group/s.php?q="+x;if(!!window.pageData&&!!window.pageData.type&&location.pathname==="/group/s.php"){w+="&t="+window.pageData.type}location.href=w;return false}})}$(window).resize(function(){if(r.listContainer&&r.listContainer.length&&r.listContainer.is(":visible")){s(e,r.listContainer)}});var j=function(x,z,y){t=true;var w={};if(!!z){var B=z.closest("li");w.local=B.index()}w.search_category="suggest";w.url="/group/s.php?q="+encodeURIComponent(x);w.search_type="all";w.search_tab="suggest";w.trigger=y;if(h.input=="inp-txt"){w.search_from="result_suggest"}else{if(h.input=="_j_index_suggest_input_all"){w.search_from="index_all"}else{w.search_from="top"}}w.keyword=x;if(z.length){w.url=z.data("url");var A=z.find(".J_selected");if(A[0]){w.search_type=A.data("type")}else{w.search_type=z.data("type")}}w.trigger=w.search_type=="more"?"more":w.trigger;!!mfwPageEvent&&mfwPageEvent("se","result_click",w)};function s(w,y){var x=w.offset();y.css({left:x.left+(h.input==="_j_index_suggest_input_all"?0:1),top:x.top+e.outerHeight()-2})}function i(x,B){var y=[],D=x.split("|");B=p(B);for(var A=0;A<D.length;A++){var z=$.trim(D[A]);if(z=="search://"){var w=y.length;y[w]=D[A++];y[w+1]=D[A++];y[w+2]=D[A++];y[w+3]=D[A++];y[w+4]=D[A++];y[w+5]=D[A];continue}if(z){try{z=z.replace(new RegExp(B,"ig"),function(E){return'<span class="highlight">'+E+"</span>"})}catch(C){z=z.replace(B,function(E){return'<span class="highlight">'+E+"</span>"})}y[y.length]=z}}return y}var m=$("<div/>");function p(w){return m.text(w).html()}};return a});(function(a){a.fn.UpNum=function(d,e,b,c){return this.each(function(){var g=a(this).offset();var j=Math.round(g.left)+"px";var h=Math.round(g.top)+"px";if(d.toString().indexOf("-")==0){var k=Math.round(g.top)+30+"px"}else{var k=Math.round(g.top)-30+"px"}var f="20px";if(b){f=b}c=c||"120";var i=d||a(this).attr("money");a("<div/>").appendTo(a("body")).addClass("numeric").css({position:"absolute",top:h,left:j,color:(d.toString().indexOf("-")==0)?"#333":"red",fontFamily:"Georgia",fontSize:f,zIndex:c}).html(i).animate({top:k},{duration:1000,complete:function(){a(this).remove();if(e){e()}}})})};if(window.M&&typeof M.define=="function"){M.define("jq-upnum",function(){return jQuery})}})(jQuery);M.define("dialog/Layer",function(a){var g=0,f=550,d=(function(){return $.browser.msie&&parseInt($.browser.version,10)==7}()),c=(function(){return $.browser.msie&&parseInt($.browser.version,10)<7}());function b(){return g++}function e(h){this.opacity=0.8;this.background="#fff";this.impl="Dialog";this.fixed=true;M.mix(this,h);this.id="_j_layer_"+b();this.stacks=[];this.activeStackId=null;this.overflow=false;this.changeFixed=false;e.instances[this.id]=this;if(!e[this.impl]){e[this.impl]=[]}e[this.impl].push(this.id);this.init()}e.prototype={init:function(){this._createPanel()},_createPanel:function(){f++;var h={position:(!c&&this.fixed)?"fixed":"absolute",width:"100%",height:"100%",top:0,left:0},j=M.mix({},h,{"z-index":f,display:"none"}),k=M.mix({},h,{position:!c?"fixed":"absolute",background:this.background,opacity:this.opacity,"z-index":-1}),i=M.mix({},h,{"z-index":0},(!c&&this.fixed)?{"overflow-x":"hidden","overflow-y":"hidden"}:{overflow:"visible"});this._panel=$('<div id="'+this.id+'" class="layer _j_layer">                                <div class="layer_mask _j_mask"></div>                                <div class="layer_content _j_content"></div>                            </div>').css(j).appendTo("body");this._mask=this._panel.children("._j_mask").css(k);this._content=this._panel.children("._j_content").css(i)},setZIndex:function(h){f=h;this._panel.css("z-index",f)},getZIndex:function(){return +this._panel.css("z-index")},toFront:function(){this.setZIndex(f+1)},setFixed:function(h){h=!!h;if(this.fixed!=h){this.changeFixed=true;this.fixed=h;if(!c&&this.fixed){this._panel.css("position","fixed");this._content.css({position:"fixed","overflow-x":"hidden","overflow-y":"hidden"})}else{this._panel.css("position","absolute");this._content.css({position:"absolute","overflow-x":"","overflow-y":"",overflow:"visible"})}}else{this.changeFixed=false}},newStack:function(i){var h=$(i).appendTo(this._content);this.stacks.push(h);return this.stacks.length-1},getStack:function(h){return this.stacks[h]},getActiveStack:function(){return this.stacks[this.activeStackId]},setActiveStack:function(h){this.activeStackId=h},getPanel:function(){return this._panel},getMask:function(){return this._mask},getContent:function(){return this._content},show:function(j){var i=this;if(this.visible){typeof j==="function"&&j();return}e.activeId=this.id;this.visible=true;if(c){var h=document.documentElement&&document.documentElement.scrollHeight||document.body.scrollHeight;this._panel.css("height",h);this._mask.css("height",h)}this._panel.fadeIn(200,function(){typeof j==="function"&&j()})},hide:function(i){var h=this;if(!this.visible){typeof i==="function"&&i();return}this.visible=false;if(c){this._panel.css("height","");this._mask.css("height","")}this._panel.fadeOut(200,function(){typeof i==="function"&&i();h._recoverTopScroller()})},setOverFlow:function(h){this.overflow=h;if(h){if(!c&&this.fixed){this._hideTopScroller();this._content.css("overflow-y","auto")}}else{if(!c&&this.fixed){this._content.css("overflow-y","hidden")}}},_hideTopScroller:function(){if(d){$("html").css("overflow","hidden")}else{if(!c){$("body").css("overflow","hidden")}else{$("body").css("overflow-x","hidden");this._panel.height($(document).height()+20)}}},_recoverTopScroller:function(){if(d){$("html").css("overflow","")}else{if(!c){$("body").css("overflow","")}else{$("body").css("overflow-x","")}}},destroy:function(){this.hide($.proxy(function(){this._panel&&this._panel.remove();this._panel=null;if(M.indexOf(e[this.impl],this.id)!=-1){e[this.impl].splice(M.indexOf(e[this.impl],this.id),1)}delete e.instances[this.id]},this))},clear:function(){this._content.empty();this.stacks=[];this.activeStackId=null}};e.instances={};e.activeId=null;e.getInstance=function(h){return e.instances[h]};e.getActive=function(h){var i=e.getInstance(e.activeId);if(h&&i){i=i.impl===h?i:null}return i};e.getImplInstance=function(i){var h=e.getActive(i);if(!h&&M.is(e[i],"Array")&&e[i].length){h=e.getInstance(e[i][e[i].length-1])}return h};e.closeActive=function(){var h=e.getActive();if(h&&h.getActiveStack()){h.getActiveStack().trigger("close")}};$(document).keyup(function(h){if(h.keyCode==27){e.closeActive()}});$(document).unload(function(){M.forEach(e.instances,function(){e.destroy()})});return e});M.define("dialog/DialogBase",function(b){var e=b("dialog/Layer"),a=M.Event,d=(function(){return $.browser.msie&&parseInt($.browser.version,10)<7}());function c(f){this.newLayer=false;this.width="";this.height="";this.background="#000";this.panelBackground="#fff";this.bgOpacity=0.7;this.stackable=true;this.fixed=true;this.reposition=false;this.autoPosition=true;this.minTopOffset=20;this.layerZIndex=-1;this.impl="Dialog";M.mix(this,f);this.visible=false;this.destroyed=false;this.positioned=false;this.resizeTimer=0;this.init()}c.prototype={tpl:"<div />",init:function(){this._createDialog();this._bindEvents()},_createDialog:function(){this._panel=$(this.tpl).css({position:"absolute",opacity:0,display:"none",background:this.panelBackground,"z-index":0});this.setRect({width:this.width,height:this.height});this._layer=!this.newLayer&&e.getImplInstance(this.impl)||new e({impl:this.impl});if(this.layerZIndex>=0){this._layer.setZIndex(this.layerZIndex)}this._layer.setFixed(this.fixed);this._layer.getMask().css({background:this.background,opacity:this.bgOpacity});this._stackId=this._layer.newStack(this._panel);this.setPanelContent()},_bindEvents:function(){var f=this;$(window).resize($.proxy(this.resizePosition,this));M.Event(this).on("resize",$.proxy(this.resizePosition,this));this._panel.delegate("._j_close, a[data-dialog-button]","click",function(g){var h=$(g.currentTarget).attr("data-dialog-button");if(h=="hide"){f.hide()}else{f.close()}g.preventDefault()});this._panel.bind("close",function(g,h){f.close(h)})},resizePosition:function(){var f=this;clearTimeout(this.resizeTimer);if(f.visible&&f.autoPosition){this.resizeTimer=setTimeout(function(){f.setPosition()},100)}},addClass:function(f){this._panel.addClass(f)},removeClass:function(f){this._panel.removeClass(f)},setRect:function(f){if(f.width){this._panel.css("width",f.width);this.width=f.width}if(f.height){this._panel.css("height",f.height);this.height=f.height}},getPanel:function(){return this._panel},getLayer:function(){return this._layer},getMask:function(){return this._layer&&this._layer.getMask()},setPanelContent:function(){},_getPanelRect:function(){var f=this.getPanel(),g=f.outerHeight(),h=f.outerWidth();if(!f.is(":visible")){f.css({visibility:"hidden",display:"block"});var g=f.outerHeight(),h=f.outerWidth();f.css({visibility:"",display:""})}return{height:g,width:h}},_getNumric:function(f){f=parseInt(f,10);return isNaN(f)?0:f},setPosition:function(f){var g=this._getPanelRect(),h={width:$(window).width(),height:$(window).height()};var k=(h.width-(this._getNumric(this.width)>0?this._getNumric(this.width):g.width))/2,j=(h.height-(this._getNumric(this.height)>0?this._getNumric(this.height):g.height))*2/5;j=j<this.minTopOffset?this.minTopOffset:j;if(d||!this.fixed){var i=$(window).scrollTop();if(i>0){j+=i}}f={left:(f&&f.left)||k,top:(f&&f.top)||j};if(!d&&this.fixed){if(h.height-g.height<=f.top){this.getPanel().addClass("dialog_overflow");this._layer.setOverFlow(true)}else{this.getPanel().removeClass("dialog_overflow");this._layer.setOverFlow(false)}}var l=this.positioned?"animate":"css";$.fn[l].call(this.getPanel(),f,200);this.positioned=true;this.position=f},setFixed:function(f){this.fixed=!!f;this._layer.setFixed(this.fixed)},getPosition:function(){return this.position},show:function(f){if(this.visible){return}var h=this;a(this).fire("beforeshow");var g;if(this._layer.getActiveStack()){g=this._layer.getActiveStack();if(!this.reposition&&!f&&!this._layer.changeFixed){f=this._layer.getActiveStack().position()}}this._layer.show();this.getPanel().css({display:"","z-index":1});this.setPosition(f);g&&g.trigger("close",[true]);this.visible=true;this._layer.setActiveStack(this._stackId);this.getPanel().animate({opacity:1},{queue:false,duration:200,complete:function(){a(h).fire("aftershow")}})},close:function(){var f=this.stackable?"hide":"destroy";this[f].apply(this,Array.prototype.slice.call(arguments))},hide:function(g,f){if(typeof g=="function"){f=g;g=undefined}if(!this.visible){typeof f=="function"&&f();return}a(this).fire("beforeclose");a(this).fire("beforehide");this._layer.setActiveStack(null);this.visible=false;if(!g){this._layer.hide()}this.getPanel().animate({opacity:0},{queue:false,duration:200,complete:$.proxy(function(){this.getPanel().css({display:"none","z-index":0});a(this).fire("afterhide");a(this).fire("afterclose");typeof f=="function"&&f()},this)})},destroy:function(g,f){if(typeof g=="function"){f=g;g=undefined}if(this.destroyed){M.error("Dialog already destroyed!");typeof f=="function"&&f();return}a(this).fire("beforeclose");a(this).fire("beforedestroy");this.destroyed=true;this.hide(g,$.proxy(function(){if(this._panel.length){this._panel.undelegate();this._panel.unbind();this._panel.remove();this._panel=null}this._layer=null;a(this).fire("afterdestroy");a(this).fire("afterclose");typeof f=="function"&&f()},this))}};return c});M.define("dialog/Dialog",function(c){var d=c("dialog/DialogBase"),a='<div class="popup-box layer_dialog _j_dialog pop_no_margin">                    <div class="dialog_title" style="display:none"><div class="_j_title title"></div></div>                    <div class="dialog_body _j_content"></div>                    <a id="popup_close" class="close-btn _j_close"><i></i></a>                </div>';var b=M.extend(function(e){this.content="";this.title="";this.PANEL_CLASS="";this.MASK_CLASS="";b.$parent.call(this,e)},d);M.mix(b.prototype,{tpl:a,setPanelContent:function(){this._dialogTitle=this._panel.find("._j_title");this._dialogContent=this._panel.find("._j_content");this.setTitle(this.title);this.setContent(this.content);this.addClass(this.PANEL_CLASS);this.getMask().addClass(this.MASK_CLASS)},setTitle:function(e){if(e){this._dialogTitle.html(e).parent().css("display","")}else{this._dialogTitle.parent().css("display","none")}this.title=e},getTitle:function(){return this.title},setContent:function(e){this._dialogContent.empty().append(e)}});return b});