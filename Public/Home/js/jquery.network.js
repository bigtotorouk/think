// JavaScript Document 中文
//更换省
function initProvince(provinceName){
	var initjScrollPane=function(){
		$('div.stores > div.scrollpane').jScrollPane({animateTo:true, animateInterval:50, animateStep:5, showArrows: true, scrollbarWidth: 7, arrowSize: 8,dragMaxHeight:99999,scrollbarMargin:10,reinitialiseOnImageLoad: false })
		}
	loadingProvinceHtml(provinceName,initjScrollPane)
	}

function reloadProvince(provinceName){
	$('div.stores').html("<div class=\"scrollpane\"><ul class=\"jcarousel\"></ul></div>")
	var initjScrollPane=function(){
		$('div.stores > div.scrollpane').jScrollPane({animateTo:true, animateInterval:50, animateStep:5, showArrows: true, scrollbarWidth: 7, arrowSize: 8,dragMaxHeight:99999,scrollbarMargin:10,reinitialiseOnImageLoad: false })
		}
	loadingProvinceHtml(provinceName,initjScrollPane)
	}

//Ajax读取店铺地址列表
function loadingProvinceHtml(provinceName,callback){

	$.ajax({
		   cache: false,
		   data:"provinceName="+provinceName,
		   type:"post",
		   url:"network/"+provinceName+"/index.html",
		   beforeSend:function(){
			   $("div.stores > div.scrollpane").addClass('loading');
			   },
		   success:function(html){
			   $("div.stores > div.scrollpane").removeClass('loading');
			   var $items=$(html);
			   var $itemscontainer=$("div.stores > div.scrollpane > ul.jcarousel");
			   $items.find("li").each(function(i,data){
											   $(data).hover(
															 function(){
																 var $this=$(this);
																 if ($this.hasClass("current")) return false;
																 var offsetleft=$this.offset().left-$this.width()+5;
																 var offsettop=$this.offset().top-6//+$this.innerHeight()-120+36;
																 
																 $("div.network div.smallstoredetail").show().css({"left":offsetleft+"px","top":offsettop+"px"}).find(".bg").html("<div class='loading'></div>");
																 fillSmallStoreDetail($this.attr("address"),$this);
																 },
															 function(){}
															 )
											   $(data).click(function(){
																	  var $this=$(this);
																	  if (!$this.hasClass("picture")) return false;
																	  $this.siblings().removeClass("current");
																	  $this.addClass("current");
																	  fillStoreDetail($this.attr("address"),$this);
																	  $("div.network div.smallstoredetail").hide();
																	  return false;
																	  })
											   $itemscontainer.append($(data))
//											   carousel.add(i+1,$(data).html())
//											   carousel.get(i+1).attr({address:$(data).attr("address")}).addClass($(data).attr("class"))
//											   carousel.get(i+1).hover(
//																	   function(){
//																		   var $this=$(this);
//																		   if ($this.hasClass("current")) return false;
//																		   var offsetleft=$this.offset().left-$this.width()+30;
//																		   //console.log($this.offset().top-6)
//																		   var offsettop=$this.offset().top-6//+$this.innerHeight()-120+36;
//																		   $("div.network div.smallstoredetail").show().css({"left":offsetleft+"px","top":offsettop+"px"}).find(".bg").html("<div class='loading'></div>")
//																		   fillSmallStoreDetail($this.attr("address"),$this)
//																		   },
//																	   function(){}
//																	   )
//											   carousel.get(i+1).click(function(){
//																				var $this=$(this);
//																				if (!$this.hasClass("picture")) return false;
//																				$this.siblings().removeClass("current");
//																				$this.addClass("current");
//																				fillStoreDetail($this.attr("address"),$this);
//																				$("div.network div.smallstoredetail").hide();
//																				return false;
//																				})
											   })
  
			   callback();
			   }
		   })
	}

function fillStoreDetail(address,item){
	var $storedetail=$("div.network div.storedetail")
	$storedetail.html("<div class='loading'></div>")
	$.get(
		   address,
		  function(data){
			  $storedetail.html("")
			  $storedetail.append($(data).siblings(".return"))
			  $storedetail.append($(data).siblings(".googlemap"))
			  $storedetail.find(".googlemap a").attr({"href":"http://ditu.google.cn/maps?hl=zh-CN&q="+encodeURI($storedetail.find(".googlemap a").attr("address"))+"&um=1&ie=UTF-8&sa=N&tab=wl"})
			  $storedetail.append($(data).siblings(".storename"))
			  $storedetail.append($(data).siblings(".address"))
			  $storedetail.append($(data).siblings(".tel"))
			  $storedetail.append($(data).siblings(".fax"))
			  $storedetail.append($(data).siblings(".storepicture"))
			  $storedetail.show(
								1,
								function(){
									$(this).find("div.return").click(function(){
																			  $(this).parent("div.storedetail").html("").hide();
																			  item.removeClass("current");return false;
																			  })
									}								
								)
			  }
		  )
	}
	
function fillSmallStoreDetail(address,item){
	var $smallstoredetailbg=$("div.network div.smallstoredetail").find(".bg")
	$.get(
		   address,
		  function(data){
			  var $data=$(data);
			  $smallstoredetailbg.html("")
			  if ($(data).siblings(".smallstorepicture").length>0) {
				  $smallstoredetailbg.append($(data).siblings(".smallstorepicture"))
				  }
			  $smallstoredetailbg.append($(data).siblings(".storename"))
			  $smallstoredetailbg.append($(data).siblings(".address"))
			  $smallstoredetailbg.append($(data).siblings(".intro"))
			  $smallstoredetailbg.append($(data).siblings(".googlemap"))
			  $smallstoredetailbg.find(".googlemap a").attr({"href":"http://ditu.google.cn/maps?hl=zh-CN&q="+encodeURI($smallstoredetailbg.find(".googlemap a").attr("address"))+"&um=1&ie=UTF-8&sa=N&tab=wl"})
			  if ($(data).siblings(".viewpicture").length>0) {
				  $smallstoredetailbg.append($(data).siblings(".viewpicture"))
				  $smallstoredetailbg.parent().find(".smallstorepicture").css({cursor:"pointer"})
				  $smallstoredetailbg.parent().find(".viewpicture ,.smallstorepicture").attr({"address":address}).click(
																									function(){
																										fillStoreDetail(address,item);
																										$smallstoredetailbg.parent().hide();
																										item.addClass("current");
																										item.siblings().removeClass("current");
																										return false;
																										}
																									)

				  }
			  $smallstoredetailbg.append($("<div class='clear'></div>"))
			  }
		  )
	
	
	}


//非swfobject获取SWF对象
function getMovie(value) {
	if (navigator.appName.indexOf("Microsoft") != -1) {
		return window[value]
	}
	else{
		return document[value]
	}
}
//FLASH TO JS
function selectSity(value){
	reloadProvince(value)
}
function swfLoaded(){
	$.get(
		  "app/viewIp.do",//以后替换成根据IP读取省市
		  function(data){initProvince("shanghai");callselectSity("shanghai")}
		  )
	}
//JS TO FLASH
function callselectSity(value){
	//获取SWF
	//var flashTarget=swfobject.getObjectById("flashcontent");
	$("#flashcontent").get(0).selectSity(value)
	//flashTarget.selectSity(value)
}
$(function(){
		   $(document).mousemove(function(event){
										  var $target = $(event.target);
//										  console.log($target.parents(".smallstoredetail").length + " || " + $target.parents(".jcarousel-item").length + " && " +$target.parents(".jcarousel-item").hasClass("current"))
//										  console.log($target.parents(".smallstoredetail").length==0 && $target.parents(".jcarousel-item").length==0)
//										  if ($target.parents(".smallstoredetail").length==0 && $target.parents(".jcarousel-item").length==0){
//											  $("div.network div.smallstoredetail").hide() //鼠标位置不在列表项和浮动层
//											  }
//										  else{
//											  $("div.network div.smallstoredetail").show()
//											  }
										  
										  if (!($target.parents(".smallstoredetail").length!=0 || $target.parents("ul.jcarousel > li").length!=0)){
											  $("div.network div.smallstoredetail").hide()
											  }
										  else{
											  $("div.network div.smallstoredetail").show()
											  }
										  if ($target.parents("ul.jcarousel > li").length!=0 && $target.parents("ul.jcarousel > li").hasClass("current")){
											  $("div.network div.smallstoredetail").hide()
											  }
										  })
		   })