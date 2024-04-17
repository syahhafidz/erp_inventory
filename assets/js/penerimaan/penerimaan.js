let penerimaan = {

    module: () => {
        return "penerimaan_inventory_masuk";
    },

    addPenerimaan: (elm) =>{

        // let token = $(elm).attr("token");/

        $.ajax({
            type: "POST",
            url: penerimaan.module() + "/" + "addPenerimaan",
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
                    title: 'Tambah Penerimaan Inventory Masuk',
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
                                    no_penerimaan : $("#no_penerimaan").val(),
                                    no_po : $("#select_po").val(),
                                    customer : $("#customer").val(),
                                    alamat : $("#alamat").val(),
                                    barang : $("#barang").val(),
                                    qty : $("#qty").val(),
                                }

                                // console.log(params);
                                // return false;

                                if (params.customer == ''){
                                    toastr.info("Nama customer harus di isi");
                                    return false;
                                } else {
                                    $.ajax({
                                        type: "POST",
                                        url: penerimaan.module() + "/" + "simpanData",
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

    getAllDataPo:(elm) =>{
        let customer = $(elm).find("option:selected").attr("customer");
        let alamat = $(elm).find("option:selected").attr("alamat");
        let id_barang = $(elm).find("option:selected").attr("id_barang");
        let qty = $(elm).find("option:selected").attr("qty");

        // console.log(id_barang)

        // $("#customer").val(customer);
        // $("#alamat").val(alamat);
        $("#qty").val(qty);
        $(".barang").find("option[value='" + id_barang + "']").prop("selected", true);
        // $("#customer").prop("disabled", true);
        // $("#alamat").prop("disabled", true);
        $(".barang").prop("disabled", true);
        $("#qty").prop("disabled", true);
    },

    setStatusPenerimaan: (elm) =>{
        let params = {
            nomorpo : $(elm).attr('nomorpo'),
            status : $(elm).attr('status'),
            id_barang : $(elm).attr('id_barang'),
            qty : $(elm).attr('qty'),
        }

        $.ajax({
            type: "POST",
            url: penerimaan.module() + "/" + "setStatusPenerimaan",
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