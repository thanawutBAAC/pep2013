//===============================
// Kayako LiveResponse
// Copyright (c) 2001-2015

// http://www.kayako.com
// License: http://www.kayako.com/license.txt
//===============================

var sessionid_ar9m0yuf = "jkn03trqhyscsujh5okm3vbcml2xmw50";
var geoip_ar9m0yuf = new Array();
geoip_ar9m0yuf[2] = "high";
geoip_ar9m0yuf[5] = "TH";
geoip_ar9m0yuf[12] = "Thailand";
geoip_ar9m0yuf[6] = "Krung Thep";
geoip_ar9m0yuf[1] = "Bangkok";
geoip_ar9m0yuf[7] = "";
geoip_ar9m0yuf[8] = "13.7540";
geoip_ar9m0yuf[9] = "100.5014";
geoip_ar9m0yuf[10] = "";
geoip_ar9m0yuf[11] = "";
geoip_ar9m0yuf[13] = "";

var hasnotes_ar9m0yuf = "0";
var isnewsession_ar9m0yuf = "1";
var repeatvisit_ar9m0yuf = "1";
var lastvisittimeline_ar9m0yuf = "0";
var lastchattimeline_ar9m0yuf = "0";
var isfirsttime_ar9m0yuf = 1;
var timer_ar9m0yuf = 0;
var imagefetch_ar9m0yuf = 19;
var updateurl_ar9m0yuf = "";
var screenHeight_ar9m0yuf = window.screen.availHeight;
var screenWidth_ar9m0yuf = window.screen.availWidth;
var colorDepth_ar9m0yuf = window.screen.colorDepth;
var timeNow = new Date();
var referrer = escape(document.referrer);
var windows_ar9m0yuf, mac_ar9m0yuf, linux_ar9m0yuf;
var ie_ar9m0yuf, op_ar9m0yuf, moz_ar9m0yuf, misc_ar9m0yuf, browsercode_ar9m0yuf, browsername_ar9m0yuf, browserversion_ar9m0yuf, operatingsys_ar9m0yuf;
var dom_ar9m0yuf, ienew, ie4_ar9m0yuf, ie5_ar9m0yuf, ie6_ar9m0yuf, ie7_ar9m0yuf, ie8_ar9m0yuf, moz_rv_ar9m0yuf, moz_rv_sub_ar9m0yuf, ie5mac, ie5xwin, opnu_ar9m0yuf, op4, op5_ar9m0yuf, op6_ar9m0yuf, op7_ar9m0yuf, op8_ar9m0yuf, op9_ar9m0yuf, op10_ar9m0yuf, saf_ar9m0yuf, konq_ar9m0yuf, chrome_ar9m0yuf, ch1_ar9m0yuf, ch2_ar9m0yuf, ch3_ar9m0yuf;
var appName_ar9m0yuf, appVersion_ar9m0yuf, userAgent_ar9m0yuf;
var appName_ar9m0yuf = navigator.appName;
var appVersion_ar9m0yuf = navigator.appVersion;
var userAgent_ar9m0yuf = navigator.userAgent;
var dombrowser = "default";
var isChatRunning_ar9m0yuf = 0;
var title = document.title;
var proactiveImageUse_ar9m0yuf = new Image();
windows_ar9m0yuf = (appVersion_ar9m0yuf.indexOf('Win') != -1);
mac_ar9m0yuf = (appVersion_ar9m0yuf.indexOf('Mac') != -1);
linux_ar9m0yuf = (appVersion_ar9m0yuf.indexOf('Linux') != -1);
if (!document.layers) {
	dom_ar9m0yuf = (document.getElementById ) ? document.getElementById : false;
} else {
	dom_ar9m0yuf = false;
}
var myWidth = 0, myHeight = 0;
if( typeof( window.innerWidth ) == 'number' ) {
	//Non-IE
	myWidth = window.innerWidth;
	myHeight = window.innerHeight;
} else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
	//IE 6+ in 'standards compliant mode'
	myWidth = document.documentElement.clientWidth;
	myHeight = document.documentElement.clientHeight;
} else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
	//IE 4 compatible
	myWidth = document.body.clientWidth;
	myHeight = document.body.clientHeight;
}
winH = myHeight;
winW = myWidth;
misc_ar9m0yuf = (appVersion_ar9m0yuf.substring(0,1) < 4);
op_ar9m0yuf = (userAgent_ar9m0yuf.indexOf('Opera') != -1);
moz_ar9m0yuf = (userAgent_ar9m0yuf.indexOf('Gecko') != -1);
chrome_ar9m0yuf=(userAgent_ar9m0yuf.indexOf('Chrome') != -1);
if (document.all) {
	ie_ar9m0yuf = (document.all && !op_ar9m0yuf);
}
saf_ar9m0yuf=(userAgent_ar9m0yuf.indexOf('Safari') != -1);
konq_ar9m0yuf=(userAgent_ar9m0yuf.indexOf('Konqueror') != -1);

if (op_ar9m0yuf) {
	op_pos = userAgent_ar9m0yuf.indexOf('Opera');
	opnu_ar9m0yuf = userAgent_ar9m0yuf.substr((op_pos+6),4);
	op5_ar9m0yuf = (opnu_ar9m0yuf.substring(0,1) == 5);
	op6_ar9m0yuf = (opnu_ar9m0yuf.substring(0,1) == 6);
	op7_ar9m0yuf = (opnu_ar9m0yuf.substring(0,1) == 7);
	op8_ar9m0yuf = (opnu_ar9m0yuf.substring(0,1) == 8);
	op9_ar9m0yuf = (opnu_ar9m0yuf.substring(0,1) == 9);
	op10_ar9m0yuf = (opnu_ar9m0yuf.substring(0,2) == 10);
} else if (chrome_ar9m0yuf) {
	chrome_pos = userAgent_ar9m0yuf.indexOf('Chrome');
	chnu = userAgent_ar9m0yuf.substr((chrome_pos+7),4);
	ch1_ar9m0yuf = (chnu.substring(0,1) == 1);
	ch2_ar9m0yuf = (chnu.substring(0,1) == 2);
	ch3_ar9m0yuf = (chnu.substring(0,1) == 3);
} else if (moz_ar9m0yuf){
	rv_pos = userAgent_ar9m0yuf.indexOf('rv');
	moz_rv_ar9m0yuf = userAgent_ar9m0yuf.substr((rv_pos+3),3);
	moz_rv_sub_ar9m0yuf = userAgent_ar9m0yuf.substr((rv_pos+7),1);
	if (moz_rv_sub_ar9m0yuf == ' ' || isNaN(moz_rv_sub_ar9m0yuf)) {
		moz_rv_sub_ar9m0yuf='';
	}
	moz_rv_ar9m0yuf = moz_rv_ar9m0yuf + moz_rv_sub_ar9m0yuf;
} else if (ie_ar9m0yuf){
	ie_pos = userAgent_ar9m0yuf.indexOf('MSIE');
	ienu = userAgent_ar9m0yuf.substr((ie_pos+5),3);
	ie4_ar9m0yuf = (!dom_ar9m0yuf);
	ie5_ar9m0yuf = (ienu.substring(0,1) == 5);
	ie6_ar9m0yuf = (ienu.substring(0,1) == 6);
	ie7_ar9m0yuf = (ienu.substring(0,1) == 7);
	ie8_ar9m0yuf = (ienu.substring(0,1) == 8);
}

if (konq_ar9m0yuf) {
	browsercode_ar9m0yuf = "KO";
	browserversion_ar9m0yuf = appVersion_ar9m0yuf;
	browsername_ar9m0yuf = "Konqueror";
} else if (chrome_ar9m0yuf) {
	browsercode_ar9m0yuf = "CH";
	if (ch1_ar9m0yuf) {
		browserversion_ar9m0yuf = "1";
	} else if (ch2_ar9m0yuf) {
		browserversion_ar9m0yuf = "2";
	} else if (ch3_ar9m0yuf) {
		browserversion_ar9m0yuf = "3";
	}

	browsername_ar9m0yuf = "Google Chrome";
} else if (saf_ar9m0yuf) {
	browsercode_ar9m0yuf = "SF";
	browserversion_ar9m0yuf = appVersion_ar9m0yuf;
	browsername_ar9m0yuf = "Safari";
} else if (op_ar9m0yuf) {
	browsercode_ar9m0yuf = "OP";
	if (op5_ar9m0yuf) {
		browserversion_ar9m0yuf = "5";
	} else if (op6_ar9m0yuf) {
		browserversion_ar9m0yuf = "6";
	} else if (op7_ar9m0yuf) {
		browserversion_ar9m0yuf = "7";
	} else if (op8_ar9m0yuf) {
		browserversion_ar9m0yuf = "8";
	} else if (op9_ar9m0yuf) {
		browserversion_ar9m0yuf = "9";
	} else if (op10_ar9m0yuf) {
		browserversion_ar9m0yuf = "10";
	} else {
		browserversion_ar9m0yuf = appVersion_ar9m0yuf;
	}
	browsername_ar9m0yuf = "Opera";
} else if (moz_ar9m0yuf) {
	browsercode_ar9m0yuf = "MO";
	browserversion_ar9m0yuf = appVersion_ar9m0yuf;
	browsername_ar9m0yuf = "Firefox";
} else if (ie_ar9m0yuf) {
	browsercode_ar9m0yuf = "IE";
	if (ie4_ar9m0yuf) {
		browserversion_ar9m0yuf = "4";
	} else if (ie5_ar9m0yuf) {
		browserversion_ar9m0yuf = "5";
	} else if (ie6_ar9m0yuf) {
		browserversion_ar9m0yuf = "6";
	} else if (ie7_ar9m0yuf) {
		browserversion_ar9m0yuf = "7";
	} else if (ie8_ar9m0yuf) {
		browserversion_ar9m0yuf = "8";
	} else {
		browserversion_ar9m0yuf = appVersion_ar9m0yuf;
	}
	browsername_ar9m0yuf = "Internet Explorer";
}

if (windows_ar9m0yuf) {
	operatingsys_ar9m0yuf = "Windows";
} else if (linux_ar9m0yuf) {
	operatingsys_ar9m0yuf = "Linux";
} else if (mac_ar9m0yuf) {
	operatingsys_ar9m0yuf = "Mac";
} else {
	operatingsys_ar9m0yuf = "Unkown";
}

if (document.getElementById)
{
	dombrowser = "default";
} else if (document.layers) {
	dombrowser = "NS4";
} else if (document.all) {
	dombrowser = "IE4";
}

var proactiveX = 20;
var proactiveXStep = 1;
var proactiveDelayTime = 100;

var proactiveY = 0;
var proactiveOffsetHeight=0;
var proactiveYStep = 0;
var proactiveAnimate = false;

function browserObject_ar9m0yuf(objid)
{
	if (dombrowser == "default")
	{
		return document.getElementById(objid);
	} else if (dombrowser == "NS4") {
		return document.layers[objid];
	} else if (dombrowser == "IE4") {
		return document.all[objid];
	}
}

function doRand_ar9m0yuf()
{
	var num;
	now=new Date();
	num=(now.getSeconds());
	num=num+1;
	return num;
}

function getCookie_ar9m0yuf(name) {
	var crumb = document.cookie;
	var index = crumb.indexOf(name + "=");
	if (index == -1) return null;
	index = crumb.indexOf("=", index) + 1;
	var endstr = crumb.indexOf(";", index);
	if (endstr == -1) endstr = crumb.length;
	return unescape(crumb.substring(index, endstr));
}

function deleteCookie_ar9m0yuf(name) {
	var expiry = new Date();
	document.cookie = name + "=" + "; expires=Thu, 01-Jan-70 00:00:01 GMT" +  "; path=/";
}

function elapsedTime_ar9m0yuf()
{
	if (typeof _elapsedTimeStatusIndicator == 'undefined') {
		_elapsedTimeStatusIndicator = 'ar9m0yuf';
	} else if (typeof _elapsedTimeStatusIndicator == 'string' && _elapsedTimeStatusIndicator != 'ar9m0yuf') {

		return;
	}


	if (timer_ar9m0yuf < 3600)
	{
		timer_ar9m0yuf++;
		imagefetch_ar9m0yuf++;

		if (imagefetch_ar9m0yuf > 19) {
			imagefetch_ar9m0yuf = 0;
			doStatusLoop_ar9m0yuf();
		}

					setTimeout("elapsedTime_ar9m0yuf();", 1000);
		
	}
}


var Base64_ar9m0yuf = {
	_keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
	encode : function (input) {
		var output = "";
		var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
		var i = 0;

		input = Base64_ar9m0yuf._utf8_encode(input);

		while (i < input.length) {

			chr1 = input.charCodeAt(i++);
			chr2 = input.charCodeAt(i++);
			chr3 = input.charCodeAt(i++);

			enc1 = chr1 >> 2;
			enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
			enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
			enc4 = chr3 & 63;

			if (isNaN(chr2)) {
				enc3 = enc4 = 64;
			} else if (isNaN(chr3)) {
				enc4 = 64;
			}

			output = output +
			this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
			this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

		}

		return output;
	},

	_utf8_encode : function (string) {
		string = string.replace(/\r\n/g,"\n");
		var utftext = "";

		for (var n = 0; n < string.length; n++) {

			var c = string.charCodeAt(n);

			if (c < 128) {
				utftext += String.fromCharCode(c);
			}
			else if((c > 127) && (c < 2048)) {
				utftext += String.fromCharCode((c >> 6) | 192);
				utftext += String.fromCharCode((c & 63) | 128);
			}
			else {
				utftext += String.fromCharCode((c >> 12) | 224);
				utftext += String.fromCharCode(((c >> 6) & 63) | 128);
				utftext += String.fromCharCode((c & 63) | 128);
			}

		}

		return utftext;
	}
}

function doStatusLoop_ar9m0yuf() {
	date1 = new Date();
	var _finalPageTitle=Base64_ar9m0yuf.encode(title);

	var _finalWindowLocation = encodeURIComponent(decodeURIComponent(window.location));
	var _referrerURL = encodeURIComponent(decodeURIComponent(document.referrer));
	updateurl_ar9m0yuf = "https://jscape.kayako.com/visitor/index.php?/LiveChat/VisitorUpdate/UpdateFootprint/_time="+date1.getTime()+"/_randomNumber="+doRand_ar9m0yuf()+"/_url="+_finalWindowLocation+"/_isFirstTime="+encodeURIComponent(isfirsttime_ar9m0yuf)+"/_sessionID="+encodeURIComponent(sessionid_ar9m0yuf)+"/_referrer="+_referrerURL+"/_resolution="+encodeURIComponent(screenWidth_ar9m0yuf+"x"+screenHeight_ar9m0yuf)+"/_colorDepth="+encodeURIComponent(colorDepth_ar9m0yuf)+"/_platform="+encodeURIComponent(navigator.platform)+"/_appVersion="+encodeURIComponent(navigator.appVersion)+"/_appName="+encodeURIComponent(navigator.appName)+"/_browserCode="+encodeURIComponent(browsercode_ar9m0yuf)+"/_browserVersion="+encodeURIComponent(browserversion_ar9m0yuf)+"/_browserName="+encodeURIComponent(browsername_ar9m0yuf)+"/_operatingSys="+encodeURIComponent(operatingsys_ar9m0yuf)+"/_pageTitle="+encodeURIComponent(_finalPageTitle)+"/_hasNotes="+encodeURIComponent(hasnotes_ar9m0yuf)+"/_repeatVisit="+encodeURIComponent(repeatvisit_ar9m0yuf)+"/_lastVisitTimeline="+encodeURIComponent(lastvisittimeline_ar9m0yuf)+"/_lastChatTimeline="+encodeURIComponent(lastchattimeline_ar9m0yuf)+"/_isNewSession="+encodeURIComponent(isnewsession_ar9m0yuf)+"/_geoIP_2="+encodeURIComponent(geoip_ar9m0yuf[2])+"/_geoIP_5="+encodeURIComponent(geoip_ar9m0yuf[5])+"/_geoIP_12="+encodeURIComponent(geoip_ar9m0yuf[12])+"/_geoIP_6="+encodeURIComponent(geoip_ar9m0yuf[6])+"/_geoIP_1="+encodeURIComponent(geoip_ar9m0yuf[1])+"/_geoIP_7="+encodeURIComponent(geoip_ar9m0yuf[7])+"/_geoIP_8="+encodeURIComponent(geoip_ar9m0yuf[8])+"/_geoIP_9="+encodeURIComponent(geoip_ar9m0yuf[9])+"/_geoIP_10="+encodeURIComponent(geoip_ar9m0yuf[10])+"/_geoIP_11="+encodeURIComponent(geoip_ar9m0yuf[11])+"/_geoIP_13="+encodeURIComponent(geoip_ar9m0yuf[13]);

	proactiveImageUse_ar9m0yuf = new Image();
	proactiveImageUse_ar9m0yuf.onload = imageLoaded_ar9m0yuf;
	proactiveImageUse_ar9m0yuf.src = updateurl_ar9m0yuf;

	isfirsttime_ar9m0yuf = 0;
}

function startChat_ar9m0yuf(proactive)
{
	isChatRunning_ar9m0yuf = 1;

	docWidth = (winW-599)/2;
	docHeight = (winH-679)/2;

		_chatWindowURL = 'https://jscape.kayako.com/visitor/index.php?/LiveChat/Chat/Request/_sessionID=' + sessionid_ar9m0yuf + '/_proactive=' + proactive + '/_filterDepartmentID=/_randomNumber=' + doRand_ar9m0yuf() + '/_fullName=/_email=/_promptType=chat';
	


	chatwindow = window.open(_chatWindowURL,"customerchat"+doRand_ar9m0yuf(), "toolbar=0,location=0,directories=0,status=1,menubar=0,scrollbars=yes,resizable=1,width=599,height=679,left="+docWidth+",top="+docHeight);

	hideProactiveChatData_ar9m0yuf();
}

function imageLoaded_ar9m0yuf() {
	if (!proactiveImageUse_ar9m0yuf)
	{
		return;
	}
	proactiveAction = proactiveImageUse_ar9m0yuf.width;

	if (proactiveAction == 3)
	{
		doProactiveInline_ar9m0yuf();
	} else if (proactiveAction == 4) {
		displayProactiveChatData_ar9m0yuf();
	}
}

function writeInlineRequestData_ar9m0yuf()
{
	docWidth = (winW-600)/2;
	docHeight = (winH-680)/2;

	var divData = '';
	divData += "<div style=\"FLOAT: left; WIDTH: 600px; BACKGROUND: #FFFFFF; BORDER: SOLID 1px #bcb5a6;\"><iframe width=\"600\" height=\"680\" scrolling=\"auto\" frameborder=\"0\" src=\"\" name=\"inlinechatframe\" id=\"inlinechatframe\">ERROR: No IFRAME Support Detected</iframe></div><div style=\"FLOAT: left; MARGIN-LEFT: -8px; MARGIN-TOP: -8px;\"><a href=\"javascript: closeInlineProactiveRequest_ar9m0yuf();\"><img src=\"https://jscape.kayako.com/__swift/themes/client/images/icon_close.png\" border=\"0\" align=\"absmiddle\" /></a></div>";


	var inlineChatElement = document.createElement("div");
	inlineChatElement.style.position = 'absolute';
	inlineChatElement.style.display = 'none';
	inlineChatElement.style.float = 'left';
	inlineChatElement.style.top = docHeight+'px';
	inlineChatElement.style.left = docWidth+'px';
	inlineChatElement.style.zIndex = 500;

	if (inlineChatElement.style.overflow) {
		inlineChatElement.style.overflow = 'none';
	}

	inlineChatElement.id = 'inlinechatdiv';
	inlineChatElement.innerHTML = divData;

	var proactiveChatContainer = document.getElementById('proactivechatcontainer' + swiftuniqueid);
	proactiveChatContainer.appendChild(inlineChatElement);
}

function writeProactiveRequestData_ar9m0yuf()
{
	docWidth = (winW-450)/2;
	docHeight = (winH-400)/2;

	var divData = '';
	divData += "<div style=\"FLOAT: left; WIDTH: 500px; BACKGROUND: #FFFFFF URL(\'https://jscape.kayako.com/__swift/themes/client/images/mainbackground.gif\') REPEAT; BORDER: SOLID 1px #bcb5a6;\"><div style=\"BACKGROUND: #FFFFFF URL(\'https://jscape.kayako.com/__swift/themes/client/images/icon_proactiveuserbackground.gif\') NO-REPEAT bottom left; BORDER: SOLID 1px #bcb5a6; MARGIN: 8px;\"><div style=\"TEXT-ALIGN: center;\"><img src=\"https://jscape.kayako.com/__swift/files/file_0keho7q1q1ti28h.png\" border=\"0\" align=\"absmiddle\" /></div><HR align=\"center\" style=\"WIDTH: 80%; BORDER: none; COLOR: #bcb5a6; BACKGROUND-COLOR: #bcb5a6; HEIGHT: 1px; MARGIN-TOP: 10px; MARGIN-BOTTOM: 3px;\" /><div style=\"PADDING-LEFT: 120px; TEXT-ALIGN: left; MARGIN-TOP: 30px; HEIGHT: 60px; OVERFLOW: hidden; FONT: 45px Trebuchet MS, Georgia, Verdana, Arial, Helvetica; COLOR: #333333;\">Can I help you?</div><div style=\"PADDING-LEFT: 120px; VERTICAL-ALIGN: top; MARGIN-TOP: 0px; PADDING-TOP: 0px; HEIGHT: 200px; FONT: 18pt Trebuchet MS, Georgia, Verdana, Arial, Helvetica; COLOR: #776849;\">Our agents are ready to assist you. Click &quot;Chat Now&quot; to be connected to one instantly.<br /><div style=\"PADDING-TOP: 30px; PADDING-LEFT: 80px; TEXT-ALIGN: center;\"><div style=\"BORDER: SOLID 0 #FFFFFF; TEXT-ALIGN: center; BACKGROUND: URL(https://jscape.kayako.com/__swift/themes/client/images/proactivebutton.gif) no-repeat; HEIGHT: 37px; WIDTH: 135px; COLOR: #000000; FONT-WEIGHT: bold; FONT-FAMILY: Trebuchet MS, Georgia, Helvetica, Verdana, Tahoma; FONT-SIZE: 16px; MARGIN: 0px; PADDING-TOP: 6px; PADDING-BOTTOM: 15px; VERTICAL-ALIGN: middle; CURSOR: pointer;\" onmouseover=\"this.style.color=\'red\';\" onmouseout=\"this.style.color=\'#000000\'\" onclick=\"javascript:doProactiveRequest_ar9m0yuf();\">Chat Now</div></div></div></div></div><div style=\"FLOAT: left; MARGIN-LEFT: -8px; MARGIN-TOP: -8px;\"><a href=\"javascript:closeProactiveRequest_ar9m0yuf();\"><img src=\"https://jscape.kayako.com/__swift/themes/client/images/icon_close.png\" border=\"0\" align=\"absmiddle\" /></a></div>";


	var proactiveElement = document.createElement("div");
	proactiveElement.style.position = 'absolute';
	proactiveElement.style.display = 'none';
	proactiveElement.style.float = 'left';
	proactiveElement.style.top = docHeight+'px';
	proactiveElement.style.left = docWidth+'px';
	proactiveElement.style.zIndex = 500;

	if (proactiveElement.style.overflow) {
		proactiveElement.style.overflow = 'none';
	}

	proactiveElement.id = 'proactivechatdiv';
	proactiveElement.innerHTML = divData;

	var proactiveChatContainer = document.getElementById('proactivechatcontainer' + swiftuniqueid);
	proactiveChatContainer.appendChild(proactiveElement);
}

function displayProactiveChatData_ar9m0yuf()
{
	if (proactiveAnimate == true) {
		return false;
	}

	writeObj = browserObject_ar9m0yuf("proactivechatdiv");
	if (writeObj)
	{
		docWidth = (winW-450)/2;
		docHeight = (winH-400)/2;
		proactiveY = docHeight;
		writeObj.top = docWidth;
		writeObj.left = docHeight;
		proactiveAnimate = true;
	}

	showDisplay_ar9m0yuf("proactivechatdiv");

		animateProactiveDiv_ar9m0yuf();
	
}

function displayInlineChatData_ar9m0yuf()
{
	writeObj = browserObject_ar9m0yuf("inlinechatdiv");
	if (writeObj)
	{
		docWidth = (winW-600)/2;
		docHeight = (winH-680)/2;
		proactiveY = docHeight;
		writeObj.top = docHeight;
		writeObj.left = docWidth;

		acceptProactive = new Image();
		acceptProactive.src = "https://jscape.kayako.com/visitor/index.php?/LiveChat/VisitorUpdate/AcceptProactive/_randomNumber="+doRand_ar9m0yuf()+"/_sessionID="+sessionid_ar9m0yuf;

		inlineChatFrameObj = browserObject_ar9m0yuf("inlinechatframe");
		_iframeURL = 'https://jscape.kayako.com/visitor/index.php?/LiveChat/Chat/StartInline/_sessionID=jkn03trqhyscsujh5okm3vbcml2xmw50/_proactive=1/_filterDepartmentID=/_fullName=/_email=/_inline=1/';
		if (inlineChatFrameObj && inlineChatFrameObj.src != _iframeURL && writeObj.style.display == 'none') {
			inlineChatFrameObj.src = _iframeURL;
		}
	}

	showDisplay_ar9m0yuf("inlinechatdiv");
}

function hideProactiveChatData_ar9m0yuf()
{
	hideDisplay_ar9m0yuf("proactivechatdiv");
	hideDisplay_ar9m0yuf("inlinechatdiv");
}

function doProactiveInline_ar9m0yuf()
{
	displayInlineChatData_ar9m0yuf();
}

function doProactiveRequest_ar9m0yuf()
{
	acceptProactive = new Image();
	acceptProactive.src = "https://jscape.kayako.com/visitor/index.php?/LiveChat/VisitorUpdate/AcceptProactive/_randomNumber="+doRand_ar9m0yuf()+"/_sessionID="+sessionid_ar9m0yuf;

	startChat_ar9m0yuf("4");
}

function closeProactiveRequest_ar9m0yuf()
{
	rejectProactive = new Image();
	date1 = new Date();
	proactiveAnimate = false;
	rejectProactive.src = "https://jscape.kayako.com/visitor/index.php?/LiveChat/VisitorUpdate/ResetProactive/_time="+date1.getTime()+"/_randomNumber="+doRand_ar9m0yuf()+"/_sessionID="+sessionid_ar9m0yuf;

	hideProactiveChatData_ar9m0yuf();
}

function closeInlineProactiveRequest_ar9m0yuf()
{
	rejectProactive = new Image();
	date1 = new Date();
	rejectProactive.src = "https://jscape.kayako.com/visitor/index.php?/LiveChat/VisitorUpdate/ResetProactive/_time="+date1.getTime()+"/_randomNumber="+doRand_ar9m0yuf()+"/_sessionID="+sessionid_ar9m0yuf;
	var bodyElement = document.getElementsByTagName('body');

	document.getElementById('inlinechatframe').contentWindow.CloseProactiveChat();
//	window.frames.inlinechatframe.CloseProactiveChat();

	if (bodyElement[0])
	{
		var inlineDivElement = browserObject_ar9m0yuf('inlinechatdiv');
		if (inlineDivElement) {
			var _parentNode = inlineDivElement.parentNode;
			_parentNode.removeChild(inlineDivElement);
		}
	}
}

function switchDisplay_ar9m0yuf(objid)
{
	result = browserObject_ar9m0yuf(objid);
	if (!result)
	{
		return;
	}

	if (result.style.display == "none")
	{
		result.style.display = "block";
	} else {
		result.style.display = "none";
	}
}

function hideDisplay_ar9m0yuf(objid)
{
	result = browserObject_ar9m0yuf(objid);
	if (!result)
	{
		return;
	}

	result.style.display = "none";
}

function showDisplay_ar9m0yuf(objid)
{
	result = browserObject_ar9m0yuf(objid);
	if (!result)
	{
		return;
	}

	result.style.display = "block";
}

function updateProactivePosition_ar9m0yuf()
{
	writeObj = browserObject_ar9m0yuf("proactivechatdiv");
	writeObjInline = browserObject_ar9m0yuf("inlinechatdiv");

	docHeight = (winH-412)/2;
	docHeightInline = (winH-680)/2;

	finalTopValue = docHeight + document.body.scrollTop;
	if (finalTopValue < 0) {
		finalTopValue = 10;
	}

	finalTopValueInline = docHeightInline + document.body.scrollTop;
	if (finalTopValueInline < 0) {
		finalTopValueInline = 10;
	}

	if (writeObj) {
		writeObj.style.top = finalTopValue + "px";
	}

	if (writeObjInline) {
		writeObjInline.style.top = finalTopValueInline + "px";
	}
}

function animateProactiveDiv_ar9m0yuf()
{
	writeObj = browserObject_ar9m0yuf("proactivechatdiv");

	if (!writeObj) {
		return false;
	}

	if(proactiveYStep == 0){proactiveY = proactiveY-proactiveXStep;} else {proactiveY = proactiveY+proactiveXStep;}

	proactiveOffsetHeight = writeObj.offsetHeight;
	if(proactiveY < 0){proactiveYStep = 1; proactiveY=0; }
	if(proactiveY >= (myHeight - proactiveOffsetHeight)){proactiveYStep=0; proactiveY=(myHeight-proactiveOffsetHeight);}

	finalTopValue = proactiveY+document.body.scrollTop;
	if (finalTopValue < 0) {
		finalTopValue = 10;
	}

	writeObj.style.top = finalTopValue+"px";

	if (proactiveAnimate) {
		setTimeout('animateProactiveDiv_ar9m0yuf()', proactiveDelayTime);
	}
}

	writeProactiveRequestData_ar9m0yuf(); writeInlineRequestData_ar9m0yuf();


elapsedTime_ar9m0yuf();

var oldEvtScroll = window.onscroll; window.onscroll = function() { if (oldEvtScroll) { updateProactivePosition_ar9m0yuf(); } }

var swifttagdiv=document.createElement("div");swifttagdiv.innerHTML = "<a href=\"javascript:startChat_ar9m0yuf(\'0\');\" onMouseOver=\"window.status=\'Live Chat is offline. Click here to leave a message.\'; return true;\" onMouseOut=\"window.status=\'\'; return true;\"><img src=\"http://cdn2.hubspot.net/hub/26878/file-630676351-png/images/kayako/saleschatoffline.png\" border=\"0\" alt=\"Live Chat is offline. Click here to leave a message.\" title=\"Live Chat is offline. Click here to leave a message.\"></a>";document.getElementById("swifttagdatacontainer").appendChild(swifttagdiv);