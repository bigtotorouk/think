var flashvars = { cityArrStr:[] }
			
	flashvars.cityArrStr.push("anhui");
	
	flashvars.cityArrStr.push("beijing");
	
	flashvars.cityArrStr.push("chongqing");
	
	flashvars.cityArrStr.push("fujian");
	
	flashvars.cityArrStr.push("gansu");
	
	flashvars.cityArrStr.push("guangdong");
	
	flashvars.cityArrStr.push("guangxi");
	
	flashvars.cityArrStr.push("guizhou");
	
	flashvars.cityArrStr.push("hainan");
	
	flashvars.cityArrStr.push("hebei");
	
	flashvars.cityArrStr.push("heilongjiang");
	
	flashvars.cityArrStr.push("henan");
	
	flashvars.cityArrStr.push("hubei");
	
	flashvars.cityArrStr.push("hunan");
	
	flashvars.cityArrStr.push("jiangsu");
	
	flashvars.cityArrStr.push("jiangxi");
	
	flashvars.cityArrStr.push("jilin");
	
	flashvars.cityArrStr.push("liaoning");
	
	flashvars.cityArrStr.push("neimenggu");
	
	flashvars.cityArrStr.push("shaanxi");
	
	flashvars.cityArrStr.push("shandong");
	
	flashvars.cityArrStr.push("shanghai");
	
	flashvars.cityArrStr.push("shanxi");
	
	flashvars.cityArrStr.push("sichuan");
	
	flashvars.cityArrStr.push("tianjin");
	
	flashvars.cityArrStr.push("xinjiang");
	
	flashvars.cityArrStr.push("xizang");
	
	flashvars.cityArrStr.push("yunnan");
	
	flashvars.cityArrStr.push("zhejiang");
	
	var params = {menu: "false",scale: "noScale",allowFullscreen: "true",allowScriptAccess: "always",bgcolor:"#FFFFFF",wmode:"transparent"};
	
	var attributes = {id:"flashcontent"};
	
	swfobject.embedSWF("swf/map.swf", "flashcontent", "754", "536", "9.0.0", "expressInstall.swf", flashvars,params,attributes);