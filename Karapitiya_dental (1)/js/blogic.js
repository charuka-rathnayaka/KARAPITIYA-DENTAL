function setTime() {
  document.getElementById("timebtn").style.backgroundcolor = "red";
}

function send() {
  var ischeck = $("#check1").val();
  var choice = $("#select1").val();
  var date = $("#datepicker").val();
  var name = $("#id1").val();
  var username = $("#usernam").val();
  if (ischeck != null) {
    if (name == "") {
      document.getElementById("id1").style.borderColor = "red";
    }
    if (name != "") {
      document.getElementById("id1").style.borderColor = "black";
    }
    var xx = date.split("-");
    var y = new Date(xx);
    var ytime = y.getTime();
    var current = new Date();
    var time = current.getTime();
    var dif = ytime - time;
    //var user = "<?php echo $_SESSION['user_type']?>";
    //console.log(username);
    if (dif <= 604800000 && username == "Staff") {
      document.getElementById("datepicker").style.borderColor = "black";
    } else if (dif > 604800000 || dif < 0 || date == "") {
      document.getElementById("datepicker").style.borderColor = "red";
    } else if (!(dif > 604800000 || dif < 0 || date == "")) {
      document.getElementById("datepicker").style.borderColor = "black";
    }
    $(document).ready(function () {
      var ischeck = $(this).val();
      var choice = $("#select1").val();
      var date = $("#datepicker").val();
      var name = $("#id1").val();
      $.ajax({
        url: "check.php",
        method: "POST",
        data: {
          check: ischeck,
          choice: choice,
          date: date,
          name: name,
        },
        success: function (data) {
          $(".bottom").html(data);
        },
      });
    });
  }
}
