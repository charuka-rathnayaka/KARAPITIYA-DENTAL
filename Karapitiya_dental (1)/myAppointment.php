<?php
$name = $_SESSION['username'];
$obj = DataLayer::getInstance();
$results = $obj->select_view($name);
if (mysqli_num_rows($results) > 0) {
    while ($rows = mysqli_fetch_assoc($results)) {
        echo "<tr><td>" . $rows["username"] . "</td><td>" . $rows["patient_name"] . "</td><td>" . $rows["date"] . "</td><td>" . $rows["Appointmentnumber"] . "</td><td>" . $rows["category"] . "</td><td><input type='button' id='btn' value='Delete' name='delete' onClick='selectedRowInput()'>" . "</td></tr>";
    }
}
?>
</table>

<script src="../Karapitiya_dental/js/jquery.min.js"></script>
<script>
    $('input[type="button"]').click(function() {
        $(this).closest('tr').remove();
    });
</script>
<script>
    function selectedRowInput() {
        var rIndex, table = document.getElementById("tbl");
        for (var i = 0; i < table.rows.length; i++) {
            table.rows[i].onclick = function() {
                var user = this.cells[0].innerHTML;
                var name = this.cells[1].innerHTML;
                var date = this.cells[2].innerHTML;
                var app_num = this.cells[3].innerHTML;
                var treatment = this.cells[4].innerHTML;
                var btnval = this.cells[5].innerHTML;
                $.ajax({
                    url: "delete.php",
                    method: "POST",
                    data: {
                        user: user,
                        name: name,
                        date: date,
                        app_num: app_num,
                        treatment: treatment,
                        btnval: btnval
                    },
                    success: function(data) {

                    }
                });
            }
        }
    }
</script>
