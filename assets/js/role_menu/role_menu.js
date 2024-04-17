let rm = {
    selectRoleByUser: (elm) =>{
        let params = {
            user : $(elm).val(),
        }

        $.ajax({
            type: "POST",
            url: "role_menu/selectRoleByUser",
            data : params,
            dataType:"html",
            beforeSend: function () {
              message.loadingProses("Proses Load Data...");
            },
            error: function () {
              toastr.error("Gagal Load");
              message.closeLoading();
            },
            success: function (resp) {
              message.closeLoading();
              toastr.success("Load Berhasil");

              $("#detail_role").html(resp)
            },
        });

    }
}