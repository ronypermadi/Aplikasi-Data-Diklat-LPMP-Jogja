<?php
session_start();
session_unregister("username");
session_unregister("password");

session_destroy();

print ("<html><head><meta http-equiv='refresh' content='0;url=index.php'></head><body></body></html>");
exit;
?>