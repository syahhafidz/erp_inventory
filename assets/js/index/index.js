var index = {
  module: () => {
    return "index";
  },

  // realtimeReview :() => {
  // }

  modalAbout: () => {
    bootbox.alert("ini modal about");
  },

  modalServices: () => {
    bootbox.alert("ini modal services");
  },

  modalPortofolio: (elm) => {
    bootbox.dialog({
      title: $(elm).attr("index_portofolio"),
      message:
        '<p style="text-align:justify">' +
        $(elm).attr("detail_portofolio") +
        "</p>",
      size: "large",
    });
  },

  insertReviewPeople: (elm, e) => {
    e.preventDefault();

    let valStars = [];
    $("#rate_stars input:checked").each(function () {
      valStars.push($(this).val());
    });

    let params = {
      nama_review: $("#name_review").val(),
      review_message: $("#review_message").val(),
      rate: valStars[0],
    };

    console.log(params.rate);

    if (params.nama_review === "") {
      $("#note").html("<p style='color:red'>Nama masih ada yang kosong </p>");
    } else if (params.review_message === "") {
      $("#note").html("<p style='color:red'>Ulasan masih ada yang kosong </p>");
    } else if (params.rate === undefined) {
      $("#note").html("<p style='color:red'>Harap beri rate </p>");
    } else {
      // return false
      $("#note").hide();
      $.ajax({
        type: "POST",
        dataType: "json",
        data: params,
        url: index.module() + "/" + "insertReviewPeople",
        beforeSend: function () {
          // message.loadingProses("Proses Simpan Data...");
        },
        error: function () {
          // toastr.error("gagal");
          // message.closeLoading();
        },
        success: function (resp) {
          // toastr.success("Berhasil disimpan");
          $("#wrapper").html("Review Ditambahkan");
          window.location.reload();
        },
      });
    }
  },

  sendContact : () => {
    let params = {
      nama_sender: $("#nama_sender").val(),
      email_sender: $("#email_sender").val(),
      message_sender: $("#message_sender").val(),
    };

    if (params.nama_sender === "") {
      $("#note_sender").html("<p style='color:red'>Nama masih ada yang kosong </p>");
    } else if (params.email_sender === "") {
      $("#note_sender").html("<p style='color:red'>Email masih ada yang kosong </p>");
    } else if (params.message_sender === "") {
      $("#note_sender").html("<p style='color:red'>Harap isi pesan </p>");
    } else {
      // return false
      $("#note").hide();
      $.ajax({
        type: "POST",
        dataType: "json",
        data: params,
        url: index.module() + "/" + "sendContact",
        beforeSend: function () {
          // message.loadingProses("Proses Simpan Data...");
        },
        error: function () {
          // toastr.error("gagal");
          // message.closeLoading();
        },
        success: function (resp) {
          // toastr.success("Berhasil disimpan");
          $("#note_sender").html("Berhasil Dikirim");
         setInterval(function () {
           location.reload();
         }, 2000);
        },
      });
    }
  },
};