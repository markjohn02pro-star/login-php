<?php

include './config.php';


session_unset();
session_destroy();

echo "
<script>
alert('Logout Successfully')
window.location.href = './login.php'
</script>

";
?>