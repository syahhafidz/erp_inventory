var dc = {
  cari: $("#cari"),

  module: () => {
    return "dashboard";
  },

  logout: () => {
    $.ajax({
      type: "POST",
      url: dc.module() + "/" + "logout",
      beforeSend: function () {
        message.loadingProses("Proses Memuat Data...");
      },
      error: function () {
        toastr.error("gagal");
        message.closeLoading();
      },
      success: function (resp) {
        message.closeLoading();
        window.location.assign("login");
      },
    });
  },

  changeDashboardIndex: (elm, e) => {
    e.preventDefault();
    let params = {
      services: $("#services").val(),
      portofolio: $("#portofolio").val(),
      team: $("#team").val(),
      review: $("#review").val(),
      contact: $("#contact").val(),
      no_whatsapp: $("#no_whatsapp").val(),
      message_whatsapp: $("#message_whatsapp").val(),
      footer_text: $("#footer_text").val(),
      doc_encrypt: $("#getDataUpload").attr("namefile"),
      doc_filetype: $("#getDataUpload").attr("extensions"),
      id_index: $(elm).attr("id_index"),
    };
    // console.log(params);
    // return false;

    $.ajax({
      type: "POST",
      dataType: "json",
      data: params,
      url: dc.module() + "/" + "changeDashboardIndex",
      beforeSend: function () {
        message.loadingProses("Proses Simpan Data...");
      },
      error: function () {
        toastr.error("gagal");
        message.closeLoading();
      },
      success: function (resp) {
        message.closeLoading();
        toastr.success("Berhasil disimpan");
        setTimeout(function () {
          window.location.reload();
        }, 2000);
      },
    });
  },

  changeHomeContent: (elm) => {
    let id_pict = $(elm).attr("id_pict");
    let label = $(elm).attr("getLabel");
    let caption = $(elm).attr("getCaption");
    let link =
      $(elm).attr("getLink") != null
        ? ""
        : "https://dummyimage.com/450x250/bfbfbf/383838.jpg";

    let views =
      `
    <div class="row">
      <div class="col-sm-3">
        <label>Label </label>
      </div>
      <div class="col-sm-6">
        <input id="update_label" class="form form-control" value="` +
      label +
      `"/>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-3">
        <label>Caption </label>
      </div>
      <div class="col-sm-6">
        <textarea id="update_caption" class="form form-control">` +
      caption +
      `</textarea>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-3">
        <label>Picture </label>
      </div>
      <div class="col-sm-7">
        <img id="getDataUpload" style="width:200px" src="` +
      link +
      `">
      </div>
    </div>
    <br>
    <div class="col-sm-10"> 
      <button class="float-right btn btn-warning" onclick="dc.uploadFile(this, event)">Upload</button>
    </div>
    `;

    bootbox.dialog({
      size: "large",
      message: views,
      buttons: {
        cancel: {
          label: "I'm a cancel button!",
          className: "btn-danger",
          callback: function () {
            console.log("Custom cancel clicked");
          },
        },
        ok: {
          label: "I'm an OK button!",
          className: "btn-info",
          callback: function () {
            let data = {
              id_pict: id_pict,
              label: $("#update_label").val(),
              caption: $("#update_caption").val(),
              filename:
                $("#getDataUpload").attr("namefile") == undefined
                  ? null
                  : $("#getDataUpload").attr("namefile"),
              extensions:
                $("#getDataUpload").attr("extensions") == undefined
                  ? null
                  : $("#getDataUpload").attr("extensions"),
            };
            // console.log(data);

            $.ajax({
              type: "POST",
              dataType: "json",
              data: data,
              url: "changeHomeContent",
              beforeSend: function () {
                message.loadingProses("Proses Memuat Data...");
              },
              error: function () {
                toastr.error("gagal");
                message.closeLoading();
              },
              success: function (resp) {
                toastr.success("Berhasil disimpan");
                window.location.reload();
              },
            });
          },
        },
      },
      onShown: function () {
        $(".bootbox").animate({ marginTop: "70px" }, 200);
      },
    });
  },

  changeAboutContent: (elm) => {
    let id_pict = $(elm).attr("id_pict");
    let label = $(elm).attr("getLabel");
    let caption = $(elm).attr("getCaption");
    let link =
      $(elm).attr("getLink") != null
        ? ""
        : "https://dummyimage.com/300x300/bfbfbf/383838.jpg";

    let views =
      `
    <div class="row">
      <div class="col-sm-3">
        <label>Label </label>
      </div>
      <div class="col-sm-6">
        <input id="update_label" class="form form-control" value="` +
      label +
      `"/>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-3">
        <label>Caption </label>
      </div>
      <div class="col-sm-6">
        <textarea id="update_caption" class="form form-control">` +
      caption +
      `</textarea>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-3">
        <label>Picture </label>
      </div>
      <div class="col-sm-7">
        <img id="getDataUpload" style="width:200px" src="` +
      link +
      `">
      </div>
    </div>
    <br>
    <div class="col-sm-10"> 
      <button class="float-right btn btn-warning" onclick="dc.uploadFile(this, event)">Upload</button>
    </div>
    `;

    bootbox.dialog({
      size: "large",
      message: views,
      buttons: {
        cancel: {
          label: "I'm a cancel button!",
          className: "btn-danger",
          callback: function () {
            console.log("Custom cancel clicked");
          },
        },
        ok: {
          label: "I'm an OK button!",
          className: "btn-info",
          callback: function () {
            let data = {
              id_pict: id_pict,
              label: $("#update_label").val(),
              caption: $("#update_caption").val(),
              filename:
                $("#getDataUpload").attr("namefile") == undefined
                  ? null
                  : $("#getDataUpload").attr("namefile"),
              extensions:
                $("#getDataUpload").attr("extensions") == undefined
                  ? null
                  : $("#getDataUpload").attr("extensions"),
            };
            // console.log(data);

            $.ajax({
              type: "POST",
              dataType: "json",
              data: data,
              url: "changeAboutContent",
              beforeSend: function () {
                message.loadingProses("Proses Simpan Data...");
              },
              error: function () {
                toastr.error("gagal");
                message.closeLoading();
              },
              success: function (resp) {
                toastr.success("Berhasil disimpan");
                window.location.reload();
              },
            });
          },
        },
      },
      onShown: function () {
        $(".bootbox").animate({ marginTop: "70px" }, 200);
      },
    });
  },

  changePortofolioContent: (elm) => {
    let id_pict = $(elm).attr("id_pict");
    let label = $(elm).attr("getLabel");
    let caption = $(elm).attr("getCaption");
    let link =
      $(elm).attr("getLink") != null
        ? ""
        : "https://dummyimage.com/300x300/bfbfbf/383838.jpg";

    let views =
      `
    <div class="row">
      <div class="col-sm-3">
        <label>Label </label>
      </div>
      <div class="col-sm-6">
        <input id="update_label" class="form form-control" value="` +
      label +
      `"/>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-3">
        <label>Caption </label>
      </div>
      <div class="col-sm-6">
        <textarea id="update_caption" class="form form-control">` +
      caption +
      `</textarea>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-3">
        <label>Picture </label>
      </div>
      <div class="col-sm-7">
        <img id="getDataUpload" style="width:200px" src="` +
      link +
      `">
      </div>
    </div>
    <br>
    <div class="col-sm-10"> 
      <button class="float-right btn btn-warning" onclick="dc.uploadFile(this, event)">Upload</button>
    </div>
    `;

    bootbox.dialog({
      size: "large",
      message: views,
      buttons: {
        cancel: {
          label: "I'm a cancel button!",
          className: "btn-danger",
          callback: function () {
            console.log("Custom cancel clicked");
          },
        },
        ok: {
          label: "I'm an OK button!",
          className: "btn-info",
          callback: function () {
            let data = {
              id_pict: id_pict,
              label: $("#update_label").val(),
              caption: $("#update_caption").val(),
              filename:
                $("#getDataUpload").attr("namefile") == undefined
                  ? null
                  : $("#getDataUpload").attr("namefile"),
              extensions:
                $("#getDataUpload").attr("extensions") == undefined
                  ? null
                  : $("#getDataUpload").attr("extensions"),
            };
            // console.log(data);

            $.ajax({
              type: "POST",
              dataType: "json",
              data: data,
              url: "changePortofolioContent",
              beforeSend: function () {
                message.loadingProses("Proses Simpan Data...");
              },
              error: function () {
                toastr.error("gagal");
                message.closeLoading();
              },
              success: function (resp) {
                toastr.success("Berhasil disimpan");
                window.location.reload();
              },
            });
          },
        },
      },
      onShown: function () {
        $(".bootbox").animate({ marginTop: "70px" }, 200);
      },
    });
  },

  changeTeamContent: (elm) => {
    let id_pict = $(elm).attr("id_pict");
    let label = $(elm).attr("getLabel");
    let caption = $(elm).attr("getCaption");
    let twitter = $(elm).attr("twitter");
    let facebook = $(elm).attr("facebook");
    let linkedin = $(elm).attr("linkedin");
    let instagram = $(elm).attr("instagram");

    let link =
      $(elm).attr("getLink") != null
        ? ""
        : "https://dummyimage.com/300x300/bfbfbf/383838.jpg";

    let views =
      `
    <div class="row">
      <div class="col-sm-3">
        <label>Nama </label>
      </div>
      <div class="col-sm-7">
        <input id="update_label" class="form form-control" value="` +
      label +
      `"/>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-3">
        <label>Jabatan </label>
      </div>
      <div class="col-sm-7">
        <textarea id="update_caption" class="form form-control">` +
      caption +
      `</textarea>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-3">
        <label>Twitter </label>
      </div>
      <div class="col-sm-7">
        <input id="update_twitter" class="form form-control" value="` +
      twitter +
      `"/>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-3">
        <label>Facebook </label>
      </div>
      <div class="col-sm-7">
        <input id="update_facebook" class="form form-control" value="` +
      facebook +
      `"/>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-3">
        <label>Linkedin </label>
      </div>
      <div class="col-sm-7">
        <input id="update_linkedin" class="form form-control" value="` +
      linkedin +
      `"/>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-3">
        <label>Instagram </label>
      </div>
      <div class="col-sm-7">
        <input id="update_instagram" class="form form-control" value="` +
      instagram +
      `"/>
      </div>
    </div>
    <br>
    <br>
    <div class="row">
      <div class="col-sm-3">
        <label>Picture </label>
      </div>
      <div class="col-sm-7">
        <img id="getDataUpload" style="width:200px" src="` +
      link +
      `">
      </div>
    </div>
    <br>
    <div class="col-sm-10"> 
      <button class="float-right btn btn-warning" onclick="dc.uploadFile(this, event)">Upload</button>
    </div>
    `;

    bootbox.dialog({
      size: "large",
      message: views,
      buttons: {
        cancel: {
          label: "Batal",
          className: "btn-danger",
          callback: function () {
            console.log("Custom cancel clicked");
          },
        },
        ok: {
          label: "Simpan",
          className: "btn-info",
          callback: function () {
            let data = {
              id_pict: id_pict,
              nama: $("#update_label").val(),
              jabatan: $("#update_caption").val(),
              twitter: $("#update_twitter").val(),
              facebook: $("#update_facebook").val(),
              linkedin: $("#update_linkedin").val(),
              instagram: $("#update_instagram").val(),
              filename:
                $("#getDataUpload").attr("namefile") == undefined
                  ? null
                  : $("#getDataUpload").attr("namefile"),
              extensions:
                $("#getDataUpload").attr("extensions") == undefined
                  ? null
                  : $("#getDataUpload").attr("extensions"),
            };
            // console.log(data);

            $.ajax({
              type: "POST",
              dataType: "json",
              data: data,
              url: "changeTeamContent",
              beforeSend: function () {
                message.loadingProses("Proses Simpan Data...");
              },
              error: function () {
                toastr.error("gagal");
                message.closeLoading();
              },
              success: function (resp) {
                // message.closeLoading();
                toastr.success("Berhasil disimpan");
                window.location.reload();
              },
            });
          },
        },
      },
      onShown: function () {
        $(".bootbox").animate({ marginTop: "30px" }, 200);
      },
    });
  },

  changeServicesContent: (elm) => {
    let id_services = $(elm).attr("id_services");
    let label = $(elm).attr("getLabel");
    let caption = $(elm).attr("getCaption");

    let views =
      `
    <div class="row">
      <div class="col-sm-3">
        <label>Label </label>
      </div>
      <div class="col-sm-6">
        <input id="update_label" class="form form-control" value="` +
      label +
      `"/>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-3">
        <label>Caption </label>
      </div>
      <div class="col-sm-6">
        <textarea id="update_caption" class="form form-control">` +
      caption +
      `</textarea>
      </div>
    </div>
    `;

    bootbox.dialog({
      title: "Services",
      size: "large",
      message: views,
      buttons: {
        cancel: {
          label: "Batal",
          className: "btn-danger",
          callback: function () {
            console.log("Custom cancel clicked");
          },
        },
        ok: {
          label: "Simpan",
          className: "btn-info",
          callback: function () {
            let data = {
              id_services: id_services,
              label: $("#update_label").val(),
              caption: $("#update_caption").val(),
            };
            // console.log(data);

            $.ajax({
              type: "POST",
              dataType: "json",
              data: data,
              url: "changeServicesContent",
              beforeSend: function () {
                message.loadingProses("Proses Simpan Data...");
              },
              error: function () {
                toastr.error("gagal");
                message.closeLoading();
              },
              success: function (resp) {
                toastr.success("Berhasil disimpan");
                if (resp.is_valid == true) {
                  window.location.reload();
                }
              },
            });
          },
        },
      },
      onShown: function () {
        $(".bootbox").animate({ marginTop: "70px" }, 200);
      },
    });
  },

  uploadFile: (elm, e) => {
    e.preventDefault();
    var uploader = $('<input type="file" id="fileInput" accept="*" />');
    uploader.click();
    uploader.on("change", function () {
      var reader = new FileReader();
      reader.onload = function (event) {
        var files = $(uploader).get(0).files[0];

        filename = files.name;
        var data_from_file = filename.split("."); //pecah nama file dan format
        var type_file = $.trim(data_from_file[data_from_file.length - 1]); // get format file
        if (
          type_file.toUpperCase().trim() == "JPG" ||
          type_file.toUpperCase().trim() == "PNG"
        ) {
          var data = event.target.result; // get base64
          // console.log(filename);
          // $("#upload").html("<a id='getFileUpload'>" + filename + "</a>");
          // $("#namafile").text(filename); // ganti nama
          $("#getDataUpload").attr("src", data);

          let filedata = data.split(";");
          $("#getDataUpload").attr("extensions", filedata[0]);
          $("#getDataUpload").attr("namefile", filedata[1]);
          // $("#getDataUpload").html("<img src='"+data+"' alt='' style='width:90px; height:90px; border:2px solid #BFBFBF'>");
        } else {
          bootbox.alert('Gagal, Lampiran file format ".PNG dan .JPG"');

          $("#getDataUpload").removeAttr("href");
          $("#getDataUpload").removeAttr("extensions");
          $("#getDataUpload").removeAttr("namefile");
          $("#namafile").text("");

          return false;
        }
      };
      reader.readAsDataURL(uploader[0].files[0]);
    });
  },

  deleteReview: (elm) => {
    let params = {
      id_review :$(elm).attr("id_review"),
    }

    $.ajax({
      type: "POST",
      dataType: "json",
      data: params,
      url: dc.module() + "/" + "deleteReview",
      beforeSend: function () {
        message.loadingProses("Proses hapus data...");
      },
      error: function () {
        toastr.error("gagal");
        message.closeLoading();
      },
      success: function (resp) {
        toastr.success("Berhasil dihapus");
        if (resp.is_valid == true) {
          window.location.reload();
        }
      },
    });
    // console.log('delete success')
  }
};

$(document).ready(function () {});
