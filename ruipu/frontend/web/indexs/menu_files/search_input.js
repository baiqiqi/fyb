function search_sub(){var actionStr="";var queryKey=document.getElementById("keyword-input").value;queryKey=lrTrim(queryKey);queryKey=queryKey.replace(/\'*/ig,'');isRouteId(queryKey,function(flag){if(flag){actionStr="http://www.tuniu.com/tours/"+queryKey;}else{var type="whole";var classifyId=0;var type_array=getElementsByClassName("type_s","route_search","div");var letter=document.getElementById("letter").value;for(var i=0;i<type_array.length;i++){if(type_array[i].style.display=="none"){classifyId=parseInt(type_array[i].attributes["classify"].nodeValue);}}
switch(classifyId){case 1:type="tours";break;case 2:type="pkg";break;case 3:type="hotel";break;case 6:type="ticket";break;case 8:type="drive";break;case 12:type="cruise";break;case 13:type="local";break;default:type="whole";}
if(queryKey){actionStr="http://s.tuniu.com/search_complex/"+type+"-"+letter+"-0-"+queryKey+"/";}else{actionStr="http://s.tuniu.com/search_complex/";}}
document.getElementById("route_search").action=actionStr;setTimeout("document.getElementById('route_search').submit();",700);addSearchCookie();});}
function isRouteId(queryKey,callback){if(/^\d+$/.test(queryKey)){$.ajax({url:"/yii.php?r=search/search/isTour",type:"GET",dataType:"json",data:{id:queryKey},success:function(ret){if(ret&&ret.success){if(ret.data.isTour){callback(true);}else{callback(false);}}else{callback(false);}},error:function(error){callback(false);}})}else{callback(false);}}
function getElementsByClassName(className,root,tagName){if(root){root=typeof root=="string"?document.getElementById(root):root;}else{root=document.body;}
tagName=tagName||"*";if(document.getElementsByClassName){return root.getElementsByClassName(className);}else{var tag=root.getElementsByTagName(tagName);var tagAll=[];for(var i=0;i<tag.length;i++){for(var j=0,n=tag[i].className.split(' ');j<n.length;j++){if(n[j]==className){tagAll.push(tag[i]);break;}}}
return tagAll;}}
function lTrim(str){if(str.charAt(0)==" "){str=str.slice(1);str=lTrim(str);}
return str;}
function rTrim(str){var iLength;iLength=str.length;if(str.charAt(iLength-1)==" "){str=str.slice(0,iLength-1);str=rTrim(str);}
return str;}
function lrTrim(str){return lTrim(rTrim(str));}