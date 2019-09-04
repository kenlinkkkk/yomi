$(document).ready(function () {
	$("#sachkhampha a").click(function () {
		var package_code =$(this).attr("rel");
		var data = {package_code: package_code};
		$.ajax({
			type: "POST",
			url: "mobireg",
			data: data,
			success: function (response) {
				window.location.href = response;
			}
		});
	});

	$("#btnSubmit").click(function () {
		var data = $(":input").serializeArray();
		// console.log(data);
		$.ajax({
			type: "POST",
			url: "chiem-tinh/tao-sach",
			data: data,
			success: function (resp) {
				if (resp == 1) {
					alert("Nhận sách khám phá bản thân thành công");
					location.reload();
				} else {
					alert("Có lỗi khi tạo sách! Vui lòng thử lại");
					location.reload();
				}
			}
		});
	});

	$("#btnTry").click(function () {
		var ar = $(":input").serializeArray();
		var data = {email: ar[10].value};
		// console.log(data);
		$.ajax({
			type: "POST",
			url: "chiem-tinh/tao-sach",
			data: data,
			success: function (resp) {
				if (resp == 1) {
					alert("Nhận sách khám phá bản thân thành công");
					location.reload();
				} else {
					alert("Có lỗi khi tạo sách! Vui lòng thử lại");
					location.reload();
				}
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
