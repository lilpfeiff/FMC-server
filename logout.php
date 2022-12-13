<?php
/*
Filename: logout.php
Description: user can logout of session / site
Author: Loren Pfeiffer
*/
?>

<!DOCTYPE html>
<html>
<body>

<?php
date_default_timezone_set('America/New_York');

    echo "Logged out successfully";

    session_start();
    session_destroy();

?>

</body>
</html>
