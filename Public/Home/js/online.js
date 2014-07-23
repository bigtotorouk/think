//qq online
document.write('<div id="talk" class="talk">');
document.write('<div class="div_tit"></div>');
document.write('<div class="div_meun">');
document.write('<div class="t"></div>');
document.write('<div class="m">');
document.write('<div class="con">');
document.write('<ul>');
document.write('<li><dl><dt class="current">快速建站及网店服务</dt><dd>3213123</dd></dl></li>');
document.write('<li><dl><dt>快速建站及网店服务</dt><dd class="hide">3213123</dd></dl></li>');
document.write('</ul>');
document.write('</div>');
document.write('</div>');
document.write('<div class="b"></div>');
document.write('</div>');
document.write('</div>');

function isIE6() {
    if (navigator.appName == "Microsoft Internet Explorer") {
        var reg = /msie (\d)/ig;
        var arr = reg.exec(navigator.appVersion);
        if (arr[1] <= 6) return true;
    }
    return false;
};

$(document).ready(function() {
    $("#talk").css({
        left: $(window).width() - $("#talk").outerWidth(),
        top: 150
    }).hover(function() {
        $(this).removeClass("talk").addClass("talk_hover").css({
            left: $(window).width() - $("#talk").outerWidth()
        })

    }, function() {
        $(this).removeClass("talk_hover").addClass("talk").css({
            left: $(window).width() - $("#talk").outerWidth()
        })
    })
    $(window).bind("resize", dwtalk);
    $(window).bind("scroll", dwtalk);
});

function dwtalk() {
    var div = $("#talk");
    if (isIE6()) {
        div.css({
            left: $(window).width() - $("#talk").outerWidth(),
            top: $(window).scrollTop() + 150
        })
    } else {
        div.css({
            left: $(window).width() - $("#talk").outerWidth(),
            top: 150
        })
    }
};

$(document).ready(function() {
	$('.con dt').click(function() {
		var online = $(this).next();
		if(online.is(':visible')) {
			online.slideUp('fast');
			$(this).removeClass('current');
		} else {
			online.slideDown('fast');
			$(this).addClass('current');
		}
	});
});