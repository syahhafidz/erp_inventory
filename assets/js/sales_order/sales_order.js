let so = {

    module: () => {
        return "sales_order";
    },

    addSalesOrder: (elm) =>{

        // let token = $(elm).attr("token");/

        $.ajax({
            type: "POST",
            url: so.module() + "/" + "addSalesOrder",
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
                    title: 'Tambah Sales Order',
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
                                    nomorso : $("#nomorso").val(),
                                    customer : $("#customer").val(),
                                    alamat : $("#alamat").val(),
                                    barang : $("#barang").val(),
                                }

                                if (params.customer == ''){
                                    toastr.info("Nama customer harus di isi");
                                    return false;
                                } else if(params.alamat == ''){
                                    toastr.info("Alamat customer harus di isi");
                                    return false;
                                } else if(params.barang == null){
                                    toastr.info("Barang harus di isi");
                                    return false;
                                } else{
                                    
                                    
                                    $.ajax({
                                        type: "POST",
                                        url: so.module() + "/" + "simpanData",
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

    setStatusSo: (elm) =>{
        let params = {
            nomorso : $(elm).attr('nomorso'),
            status : $(elm).attr('status'),
        }

        $.ajax({
            type: "POST",
            url: so.module() + "/" + "setStatusSo",
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
    },
}