define("tour_amd/tool_tip",['jquery'],function($){function getViewportHeight(){if(window.innerHeight!=window.undefined)return window.innerHeight;if(document.compatMode=='CSS1Compat')return document.documentElement.clientHeight;if(document.body)return document.body.clientHeight;return window.undefined;}
function getViewportWidth(){if(window.innerWidth!=window.undefined)return window.innerWidth;if(document.compatMode=='CSS1Compat')return document.documentElement.clientWidth;if(document.body)return document.body.clientWidth;return window.undefined;}
function getScrollTop(){if(self.pageYOffset)
{return self.pageYOffset;}
else if(document.documentElement&&document.documentElement.scrollTop)
{return document.documentElement.scrollTop;}
else if(document.body)
{return document.body.scrollTop;}}
function getScrollLeft(){if(self.pageXOffset)
{return self.pageXOffset;}
else if(document.documentElement&&document.documentElement.scrollLeft)
{return document.documentElement.scrollLeft;}
else if(document.body)
{return document.body.scrollLeft;}}
var endaction=false;var ns4=document.layers;var ns6=document.getElementById&&!document.all;var ie4=document.all;offsetX=10;offsetY=20;var toolTipSTYLE="";function initToolTips()
{tempDiv=document.createElement("div");tempDiv.id="toolTipLayer";tempDiv.style.position="absolute";tempDiv.style.display="none";tempDiv.style.zIndex=99999;document.body.appendChild(tempDiv);if(ns4||ns6||ie4)
{if(ns4)toolTipSTYLE=document.toolTipLayer;else if(ns6)toolTipSTYLE=document.getElementById("toolTipLayer").style;else if(ie4)toolTipSTYLE=document.all.toolTipLayer.style;if(ns4)document.captureEvents(Event.MOUSEMOVE);else
{toolTipSTYLE.visibility="visible";toolTipSTYLE.display="none";}
document.onmousemove=moveToMouseLoc;}}
function toolTip(msg,fg,bg)
{try{if(toolTip.arguments.length<1)
{if(ns4)
{toolTipSTYLE.visibility="hidden";}
else
{if(!endaction){toolTipSTYLE.display="none";}}}
else
{var content='<div style="border: 2px solid #fff; box-shadow: 0px 2px 3px #eaeaea;">'+msg+'</div>'
if(ns4)
{toolTipSTYLE.document.write(content);toolTipSTYLE.document.close();toolTipSTYLE.visibility="visible";}
if(ns6)
{document.getElementById("toolTipLayer").innerHTML=content;toolTipSTYLE.display='block'}}}catch(e){}}
function moveToMouseLoc(e)
{var scrollTop=getScrollTop();var scrollLeft=getScrollLeft();if(ns4||ns6)
{x=e.pageX+scrollLeft;y=e.pageY-scrollTop;}
else
{x=event.clientX+scrollLeft;y=event.clientY;}
if(x-scrollLeft>getViewportWidth()/2){x=x-document.getElementById("toolTipLayer").offsetWidth-2*offsetX;}
if((y+document.getElementById("toolTipLayer").offsetHeight+offsetY)>getViewportHeight()){y=getViewportHeight()-document.getElementById("toolTipLayer").offsetHeight-offsetY;}
toolTipSTYLE.left=(x+offsetX)+'px';toolTipSTYLE.top=(y+offsetY+scrollTop)+'px';return true;}
initToolTips();window.toolTip=toolTip;});