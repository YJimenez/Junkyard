<?php

unset($_SESSION['ooyalaAdmin']);
unset($_SESSION['ooyala']);
unset($_SESSION['ooyalaUser']);
header("Location: index.php?section=login");

?>