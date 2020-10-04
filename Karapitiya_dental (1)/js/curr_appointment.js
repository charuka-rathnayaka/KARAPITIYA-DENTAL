function getting() {
  $(document).ready(function () {
    $("#appstatus").load("dbOperations/load_appointment.php");
  });
}

function clock() {
  var status = document.getElementById("status");
  var h = new Date().getHours();
  var day = new Date().getDay();

  if (8 <= h && h <= 19) {
    setInterval(getting(), 1000);
    status.innerHTML = "Next Appointment Number";
  } else {
    status.innerHTML = "Clinic is closed";
  }
}

var interval = setInterval(clock, 1000);
