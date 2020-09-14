<table class="tbl">
    <thead>
        <tr>
            <th>User name</th>
            <th>Name</th>
            <th>Patient ID</th>
            <th>Date</th>
            <th>Appointment Number</th>
            <th>Traetment</th>
        </tr>
    </thead>
    <?php
    include_once("dbOperations/appointment.php");
    $app = new Appointment();
    $app->setState(new ActiveState());
    $app->activeAppointment();



    ?>
</table>
</div>

<div>
    <h2>WAITING LIST</h2>
    <table class="tbl">
        <thead>
            <tr>
                <th>User name</th>
                <th>Name</th>
                <th>Patient ID</th>
                <th>Date</th>
                <th>Appointment Number</th>
                <th>Traetment</th>

            </tr>
        </thead>
        <?php


        $app->setState(new LateState());
        $app->lateAppointment();


        ?>
    </table>
</div>

<div>
    <h2>ARRIVAL LIST</h2>
    <table class="tbl">
        <thead>
            <tr>
                <th>User name</th>
                <th>Name</th>
                <th>Patient ID</th>
                <th>Date</th>
                <th>Appointment Number</th>
                <th>Traetment</th>

            </tr>
        </thead>
        <?php


        $app->setState(new ArrivalConfirmedState());
        $app->arrivalConfirmedAppointment();


        ?>
    </table>
</div>