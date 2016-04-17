define("product/train",["jquery","underscore","product/city_search"],function($,_){var Train=function(cfg){var defaultCfg={autocompleteOption:{dataType:"json",transformResult:function(response){if(response.code==200){response=response.data;_.each(response.suggestions,function(item){item.value=item.name;});}else{response=$.extend({"query":"","suggestions":[]},response.data);}
return response;},formatResult:function(suggestion){return suggestion.value+'('+suggestion.pinyin+')';}}}
this.cfg=$.extend({},defaultCfg,cfg);this.init();this.registerEvents();}
Train.prototype={init:function(){var self=this;self.elt=$("#"+self.cfg.id);self.trainForm=self.elt.find("form");self.departingElt=self.elt.find(".departing_station input");self.destinationElt=self.elt.find(".destination_station input");self.departingDateElt=self.elt.find(".departing_date input");self.switchBtn=self.elt.find(".switch_btn");self.submitBtn=self.elt.find(".submit_btn");self.departingElt.citysearch({id:"train_cities_list",cityUrl:"/yii.php?r=train/trainTicket/getStation",autocompleteOption:self.cfg.autocompleteOption});self.destinationElt.citysearch({id:"train_cities_list",cityUrl:"/yii.php?r=train/trainTicket/getStation",autocompleteOption:self.cfg.autocompleteOption});},registerEvents:function(callback){this.switchBtn.on("click",$.proxy(this.onSwitchBtnClick,this));this.submitBtn.on("click",$.proxy(this.onSubmitBtnClick,this));},onSubmitBtnClick:function(){this.clearErrors();if(this.validate()){var fromName=this.departingElt.val(),from=this.departingElt.attr("code"),toName=this.destinationElt.val(),to=this.destinationElt.attr("code"),date=this.departingDateElt.val();this.trainForm.find("input[name=fromName]").val(fromName);this.trainForm.find("input[name=from]").val(from);this.trainForm.find("input[name=toName]").val(toName);this.trainForm.find("input[name=to]").val(to);this.trainForm.find("input[name=date]").val(date);var action="http://huoche.tuniu.com/station_"+from+"_"+to;this.trainForm.attr("action",action);this.trainForm.submit();}},validate:function(){if(!String.prototype.trim){String.prototype.trim=function(){return this.replace(/(^\s*)|(\s*$)/g,"");}}
if(this.departingElt.val().trim()==""){this.departingElt.addClass("error");return false;}
if(this.destinationElt.val().trim()==""){this.destinationElt.addClass("error");return false;}
if(this.departingDateElt.val().trim()==""){this.departingDateElt.addClass("error");return false;}
if(!this.departingElt.attr("code")){this.departingElt.addClass("error");return false;}
if(!this.destinationElt.attr("code")){this.destinationElt.addClass("error");return false;}
if(this.departingElt.val().trim()==this.destinationElt.val().trim()){this.destinationElt.addClass("error");this.departingElt.addClass("error");return false;}
return true;},clearErrors:function(){this.departingElt.removeClass("error");this.destinationElt.removeClass("error");this.departingDateElt.removeClass("error");},onSwitchBtnClick:function(){var depaValue=this.departingElt.val(),depaCode=this.departingElt.attr("code");var destValue=this.destinationElt.val(),destCode=this.destinationElt.attr("code");var value=depaValue,code=depaCode;this.departingElt.val(destValue);this.departingElt.attr("code",destCode);this.destinationElt.val(value);this.destinationElt.attr("code",code);}}
return Train;});