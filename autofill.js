$(document).ready(function () {
  $("#username").keyup(function () {
    var query = $(this).val();
    if (query != "") {
      $.ajax({
        url: "search.php",
        method: "POST",
        data: {
          query: query,
        },
        success: function (data) {
          $("#usernameList").fadeIn();
          $("#usernameList").html(data);
        },
      });
    }
  });
  $(document).on("click", "li", function () {
    $("#username").val($(this).text());
    $("#usernameList").fadeOut();
    $("#appointmentdata").load("appointmentnum.php", {
      postusername: $(this).text(),
    });
  });
});
