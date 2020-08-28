$(document).ready(function () {
	ClassicEditor
		.create( document.querySelector( '#blog_content' ) )
		.then( editor => {
		} )
		.catch( error => {
		} );

	$("#dangky a").click(function () {
		var package_code =$(this).attr("rel");
		var data = {package_code: package_code};
		$.ajax({
			type: "POST",
			url: "mobireg",
			data: data,
			success: function (response) {
				location.href = response;
			}
		});
	});

	$("#tuviphongthuy a, #cunghoangdao a").click(function () {
		var tag = $(this).attr("rel");
		var data = {tag: tag};
		console.log(data);
		$.ajax("chiem-tinh/check-info",{
			type: "POST",
			data: data,
			success: function (response) {
				if (response == 0) {
					element = document.getElementById("infosubmit-pr");
					element.style.display = "block";
					ele2 = document.getElementById("navbarResponsive");
					ele2.classList.remove("show");
				} else {
					location.href = 'chiem-tinh/' + response;
				}
			}
		});
	});

	$("#infoSubmit").on("click", function () {
		var data = $(":input").serializeArray();
		$.ajax("chiem-tinh/add-info", {
			type: "POST",
			data: data,
			success: function (response) {
				if (response == 1) {
					location.reload();
				}
			}
		});
	});

	$("#skp-input").validate({
		rules: {
			name: "required",
			giosinh: {
				required: true,
				min: 0,
				max: 23,
			},
			ngaysinh: {
				required: true,
				min: 1,
				max: 31,
			},
			thangsinh: {
				required: true,
				min: 1,
				max: 12,
			},
			namsinh: {
				required: true,
				min: 1,
				max: new Date().getFullYear(),
			},
			email: {
				required: true,
				email: true,
			}

		},
		messages: {
			name: "Vui lòng nhập đầy đủ họ tên",
			giosinh: {
				required: "Vui lòng nhập giờ sinh",
				min: "Nhập giờ sinh trong khoảng từ 0 - 23",
				max: "Nhập giờ sinh trong khoảng từ 0 - 23",
			},
			ngaysinh: {
				required: "Vui lòng nhập ngày sinh",
				min: "Nhập ngày sinh trong khoảng từ 1 - 31",
				max: "Nhập ngày sinh trong khoảng từ 1 - 31",
			},
			thangsinh: {
				required: "Vui lòng nhập tháng sinh",
				min: "Nhập tháng sinh trong khoảng từ 1 - 12",
				max: "Nhập tháng sinh trong khoảng từ 1 - 12",
			},
			namsinh: {
				required: "Vui lòng nhập năm sinh",
				min: "Nhập năm sinh > 0",
				max: "Nhập năm sinh nhỏ hơn " + new Date().getFullYear(),
			},
			email: {
				required: "Vui lòng nhập email",
				email: "Sai định dạng email: abc@abc.com"
			}
		}
	});

	$("#btnTry, #btnSubmit").on("click", function () {
		if ($("#skp-input").valid()) {
			var data = $(":input").serializeArray();
			$.ajax("chiem-tinh/tao-sach",{
				type: "POST",
				data: data,
				success: function (response) {
					console.log(response);
					if (response == 1) {
						alert("Nhận sách khám phá bản thân thành công");
						location.reload();
					} else {
						// alert("Có lỗi khi tạo sách! Vui lòng thử lại");
						alert("Cập nhật thông tin tạo sách thành công");
						location.reload();
					}
				}
			});
		}
	});

	$(".trigger_popup_fricc").click(function(){
		$('.hover_bkgr_fricc').show();
	});
	$('.hover_bkgr_fricc').click(function(){
		$('.hover_bkgr_fricc').hide();
	});
	$('.popupCloseButton').click(function(){
		$('.hover_bkgr_fricc').hide();
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

$("#iconClose1").click(function (event) {
	$("#infosubmit-pr").hide("easing");
});

$(window).on('hashchange', function(e){
	history.replaceState ("", document.title, e.originalEvent.oldURL);
});

$('.dropify').dropify({
	messages: {
		'default': 'Drag and drop a file here or click',
		'replace': 'Drag and drop or click to replace',
		'remove': 'Remove',
		'error': 'Ooops, something wrong appended.'
	},
	error: {
		'fileSize': 'The file size is too big (2M max).'
	}
});


