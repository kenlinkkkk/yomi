$(document).ready(function () {
	$("#sachkhampha a").click(function () {
		var package_code =$(this).attr("rel");
		var data = {package_code: package_code};

		$.ajax({
			type: "POST",
			url: "mobiireg",
			success: function (response) {
				window.location.href = response;
			}
		});
	});
});

$(window).scroll(function() {
	if ($(this).scrollTop()) {
		$("#myBtn").show("fade");
	} else {
		$("#myBtn").hide("fade");
	}
});

$("#myBtn").click(function() {
	$("html, body").animate({scrollTop: 0}, 500);
});

$("#dangnhapbtn").click(function (e) {
	$("#dangnhap").show("easing");
	$("#navbarResponsive").removeClass("show");
	e.stopPropagation();
});

$("#content-login").click(function(e){
	e.stopPropagation();
});

$("html, body, #iconClose").click(function(e){
	$("#dangnhap").hide("easing");
});

$(window).on('hashchange', function(e){
	history.replaceState ("", document.title, e.originalEvent.oldURL);
});
