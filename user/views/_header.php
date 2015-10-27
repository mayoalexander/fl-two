<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo "<div class='jumbotron panel-body alert-danger login-panel-alert' style='font-size:32px;'>";
                echo '<p>'.$error.'</p>';
            echo "</div>";
        }
    }
    /*echo '<pre>';
    print_r($login->messages);
    echo '</pre>';*/
    if ($login->messages) {
        foreach ($login->messages as $key => $message) {
            echo "<div class='jumbotron panel-body alert-warning login-panel-alert' style='font-size:32px;'>";
                echo '<p>'.$message.'<p>';
            echo "</div>";
        }
    }
}
?>
<?php
// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            //echo $error;
            echo "<div class='jumbotron panel-body alert-danger login-panel-alert' style='font-size:32px;'>";
                echo '<p>'.$error.'</p>';
            echo "</div>";
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            //echo $message;
            echo "<div class='jumbotron panel-body alert-warning login-panel-alert' stle='font-size:32px;'>";
                echo '<p>'.$message.'</p>';
            echo "</div>";
        }
    }
}
?>