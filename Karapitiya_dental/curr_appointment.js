function getting() {
  $(document).ready(function () {
    $("#appstatus").load("load_appointment.php");
  });
}

function clock() {
  var status = document.getElementById("status");
  var h = new Date().getHours();
  var day = new Date().getDay();
  if (0 < day && day < 6) {
    if (8 <= h && h <= 24) {
      setInterval(getting(), 1000);
      status.innerHTML = "Next Appointment Number";
    } else {
      status.innerHTML = "Clinic is close";
    }
  } else {
    status.innerHTML = "Clinic is close";
  }
}

var interval = setInterval(clock, 1000);
