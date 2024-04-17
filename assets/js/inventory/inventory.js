let inv = {

    module: () => {
        return "inventory";
    },

    showAddInventory: (elm) =>{

        // let token = $(elm).attr("token");/

        $.ajax({
            type: "POST",
            url: inv.module() + "/" + "showAddInventory",
            dataType: "html",
            beforeSend: function () {
              message.loadingProses("Proses Memuat Data...");
            },
            error: function () {
              toastr.error("gagal");
              message.closeLoading();
            },
            success: function (resp) {
                message.closeLoading();
                bootbox.dialog({
                    title: 'Tambah Inventory',
                    message: resp,
                    size: 'large',
                    buttons: {
                        cancel: {
                            label: "Batal",
                            className: 'btn-danger',
                            callback: function(){
                                console.log('Custom cancel clicked');
                            }
                        },
                        ok: {
                            label: "Simpan",
                            className: 'btn-info',
                            callback: function() {
                                let params = {
                                    nama_barang : $("#nama_barang").val(),
                                }

                                // console.log(params);
                                // return false;

                                if (params.nama_barang == ''){
                                    toastr.info("Nama barang harus di isi");
                                    return false;
                                } else {
                                    
                                    $.ajax({
                                        type: "POST",
                                        url: inv.module() + "/" + "simpanData",
                                        data : params,
                                        dataType: "json",
                                        beforeSend: function () {
                                            message.loadingProses("Proses Simpan Data...");
                                        },
                                        error: function () {
                                            toastr.error("gagal");
                                            message.closeLoading();
                                            return false;
                                        },
                                        success: function (resp) {
                                            toastr.success("Berhasil Disimpan")
                                            window.location.reload(true);
                                        }
                                    })
                                }
                                // console.log(params)
                               
                            }
                        }
                    },
                });
        
                $(".modal").css("z-index", "999999999999");
            },
        });

    },

    getAllDataSo:(elm) =>{
        let customer = $(elm).find("option:selected").attr("customer");
        let alamat = $(elm).find("option:selected").attr("alamat");
        let id_barang = $(elm).find("option:selected").attr("id_barang");

        console.log(id_barang)

        $("#customer").val(customer);
        $("#alamat").val(alamat);
        $(".barang").find("option[value='" + id_barang + "']").prop("selected", true);
        $("#customer").prop("disabled", true);
        $("#alamat").prop("disabled", true);
        $(".barang").prop("disabled", true);
    },


}