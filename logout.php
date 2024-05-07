<?php

session_start();

session_destroy();

header("Location: mainreg.php");
exit;