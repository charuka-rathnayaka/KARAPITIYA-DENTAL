 <?php
    $connect = mysqli_connect("localhost", "root", "", "dentalkarapitiya");
    if (isset($_POST["query"])) {
        $output = '';
        $query = "SELECT * FROM patient_accounts WHERE Username LIKE '%" . $_POST["query"] . "%' OR  Firstname LIKE '%" . $_POST["query"] . "%' OR  Lastname LIKE '%" . $_POST["query"] . "%'";
        $result = mysqli_query($connect, $query);
        $output = '<ul class="list-unstyled">';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                //$output .= '<li>' . $row["Firstname"] . ' ' . $row["Lastname"] . '</li>';
                $output .= '<li>' . $row["Username"] . '</li>';
            }
        } else {
            $output .= '<li>user name not found</li>';
        }
        $output .= '</ul>';
        echo $output;
    }
    ?>  