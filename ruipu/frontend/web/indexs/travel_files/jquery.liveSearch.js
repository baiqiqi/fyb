jQuery.fn.liveSearch=function(conf){var config=jQuery.extend({url:'/search-results.php?q=',id:'jquery-live-search',duration:400,typeDelay:200,loadingClass:'loading',onSlideUp:function(){},uptadePosition:false},conf);var liveSearch=jQuery('#'+config.id);var selectedIndex=-1;var liveSearchContent;if(!liveSearch.length){liveSearch=jQuery('<div id="'+config.id+'"></div>').appendTo(document.body).hide().slideUp(0);jQuery(document.body).click(function(event){var clicked=jQuery(event.target);if(!(clicked.is('#'+config.id)||clicked.parents('#'+config.id).length||clicked.is('input'))){liveSearch.slideUp(config.duration,function(){config.onSlideUp();});}});}
return this.each(function(){var input=jQuery(this).attr('autocomplete','off');var liveSearchPaddingBorderHoriz=parseInt(liveSearch.css('paddingLeft'),10)+parseInt(liveSearch.css('paddingRight'),10)+parseInt(liveSearch.css('borderLeftWidth'),10)+parseInt(liveSearch.css('borderRightWidth'),10);var onKeyPress=function(e){switch(e.keyCode){case 27:hideLiveSearch();break;case 9:case 13:if(selectedIndex===-1){return}
window.location.href=liveSearchContent.children('li').eq(selectedIndex).children('a').eq(0).attr('href');break;case 38:moveUp();break;case 40:moveDown();default:return}
e.stopImmediatePropagation();e.preventDefault()}
var select=function(i){var selectedValue,f;selectedValue=this.suggestions[i];if(selectedValue){this.el.val(selectedValue);if(this.options.autoSubmit){f=this.el.parents("form");if(f.length>0){f.get(0).submit()}}
this.ignoreValueChange=true;this.hide();this.onSelect(i)}}
var moveUp=function(){if(!liveSearchContent){return}
if(selectedIndex===-1){return}
if(selectedIndex===0){liveSearchContent.children('li').get(0).className="";selectedIndex=-1;return}
adjustScroll(selectedIndex-1)}
var moveDown=function(){if(!liveSearchContent){return}
if(selectedIndex===(liveSearchContent.children('li').length-1)){return}
adjustScroll(selectedIndex+1)}
var adjustScroll=function(i){var activeItem,offsetTop,upperBound,lowerBound;activeItem=activate(i);offsetTop=activeItem.offsetTop;upperBound=liveSearchContent.scrollTop();lowerBound=upperBound+liveSearchContent.height()-25;if(offsetTop<upperBound){liveSearchContent.scrollTop(offsetTop)}else{if(offsetTop>lowerBound){liveSearchContent.scrollTop(offsetTop-liveSearchContent.height()+25)}}}
var activate=function(index){var lis,activeItem;lis=liveSearch.children('div.livesearch').children('ul').children('li');if(selectedIndex!==-1&&lis.length>selectedIndex){$(lis.get(selectedIndex)).removeClass()}
selectedIndex=index;if(selectedIndex!==-1&&lis.length>selectedIndex){activeItem=lis.get(selectedIndex);$(activeItem).addClass("selected")}
return activeItem}
var deactivate=function(li,index){li.className="";if(selectedIndex===index){selectedIndex=-1}}
var repositionLiveSearch=function(){var tmpOffset=input.offset();var inputDim={left:tmpOffset.left,top:tmpOffset.top,width:input.outerWidth(),height:input.outerHeight()};inputDim.topPos=inputDim.top+inputDim.height;inputDim.totalWidth=inputDim.width-liveSearchPaddingBorderHoriz;liveSearch.css({position:'absolute',left:inputDim.left-1+'px',top:inputDim.topPos+'px',width:inputDim.totalWidth+1+'px'});};var showLiveSearch=function(){repositionLiveSearch();$(window).unbind('resize',repositionLiveSearch);$(window).bind('resize',repositionLiveSearch);liveSearch.slideDown(config.duration);liveSearchContent=liveSearch.children('div.livesearch').children('ul');};var hideLiveSearch=function(){liveSearch.slideUp(config.duration,function(){config.onSlideUp();});};input.focus(function(){if(this.value!==''){if(liveSearch.html()==''){this.lastValue='';}
else{setTimeout(showLiveSearch,1);}}}).keyup(function(e){if(this.value!=this.lastValue){input.addClass(config.loadingClass);var q=$.trim(this.value);if(this.timer){clearTimeout(this.timer);}
if(q!=""){this.timer=setTimeout(function(){jQuery.get(config.url+encodeURIComponent(q),function(data){input.removeClass(config.loadingClass);if(data.length&&q.length){liveSearch.html(data);showLiveSearch();}
else{hideLiveSearch();}});},config.typeDelay);this.lastValue=this.value;}}else{onKeyPress(e);}});});};