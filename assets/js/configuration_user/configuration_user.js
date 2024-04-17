let cu = {

    addUser: (elm) =>{

        let token = $(elm).attr("token");

        let html = `
        <div class="row">
            <div class="col-sm-3">
                <label for="nama">Nama :</label>
            </div>
            <div class="col-sm-9">
                <input class="form form-control" id="nama" autocomplete="off" required/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3">
                <label for="alamat">Alamat :</label>
            </div>
            <div class="col-sm-9">
                <input class="form form-control" id="alamat" autocomplete="off" required/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3">
                <label for="tgl_lahir">Tanggal Lahir :</label>
            </div>
            <div class="col-sm-9">
                <input type="date" class="form form-control" id="tgl_lahir" autocomplete="off" required/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3">
                <label for="tgl_lahir">No Telp :</label>
            </div>
            <div class="col-sm-9">
                <input type="number" class="form form-control" id="no_telp" autocomplete="off" required/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3">
                <label for="username">Username :</label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form form-control" id="username" autocomplete="off" required/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3">
                <label for="password">Password :</label>
            </div>
            <div class="col-sm-9">
                <input type="password" class="form form-control" id="password" autocomplete="off" required/>
            </div>
        </div>


        `;

        bootbox.dialog({
            title: 'Tambah user',
            message: html,
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
                            nama : $("#nama").val(),
                            alamat : $("#alamat").val(),
                            tgl_lahir : $("#tgl_lahir").val(),
                            no_telp : $("#no_telp").val(),
                            username : $("#username").val(),
                            password : $("#password").val(),
                            token : token,
                        }

                        $.ajax({
                            type: "POST",
                            url: "configuration_user/addUser",
                            data : params,
                            dataType:"json",
                            beforeSend: function () {
                              message.loadingProses("Proses Simpan Data...");
                            },
                            error: function () {
                              toastr.error("User gagal ditambahkan");
                              message.closeLoading();
                            },
                            success: function (resp) {
                              message.closeLoading();
                              toastr.success("User berhasil ditambahkan");
                              window.location.reload();
                            },
                        });

                    }
                }
            },
        });

        $(".modal").css("z-index", "999999999999");

    },
}