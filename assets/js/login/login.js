
var UserLogin = {
	cari: $("#cari"),

	dataUser: () => {
		return "data_user";
	},

	login: () => {
		let username = $("#username").val();
		let password = $("#password").val();
		// let captcha =  $(".g-recaptcha").html();
		let captcha = $(".g-recaptcha-response").val();

		console.log(username, password, captcha);
		// return false;

		$.ajax({
			type: "POST",
			dataType: "json",
			data: {
				username: username,
				password: password,
				captcha : captcha,
			},
			url: "login/ChekDataLogin",
			beforeSend: function () {
				message.loadingProses("Proses Login");
			},
			error: function () {
				toastr.error("gagal");
				message.closeLoading();
			},
			success: function (resp) {
				if (resp == 1) {
					toastr.success("Login Berhasil");
					setTimeout(function () {
						window.location.assign("dashboard");
					}, 3000);
					message.closeLoading();
					} else {
						toastr.error("Data Tidak Valid");
						message.closeLoading();
					}
				console.log(resp);
			},
		});

		// console.log(username);
	},

};

$(document).ready(function () {
	
});
