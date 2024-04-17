let po = {

    module: () => {
        return "purchase_order";
    },

    addPurchaseOrder: (elm) =>{

        // let token = $(elm).attr("token");/

        $.ajax({
            type: "POST",
            url: po.module() + "/" + "addPurchaseOrder",
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
                    title: 'Tambah Purchase Order',
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
                                    po : $("#nomorpo").val(),
                                    so : $("#select_so").val(),
                                    customer : $("#customer").val(),
                                    alamat : $("#alamat").val(),
                                    barang : $("#barang").val(),
                                    qty : $("#qty").val(),
                                }

                                // console.log(params);
                                // return false;

                                if (params.so == ''){
                                    toastr.info("Nama customer harus di isi");
                                    return false;
                                } else {
                                    
                                    $.ajax({
                                        type: "POST",
                                        url: po.module() + "/" + "simpanData",
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

    setStatusPo: (elm) =>{
        let params = {
            nomorpo : $(elm).attr('nomorpo'),
            status : $(elm).attr('status'),
        }

        $.ajax({
            type: "POST",
            url: po.module() + "/" + "setStatusPo",
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