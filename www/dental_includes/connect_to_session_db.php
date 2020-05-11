<?php

require_once 'DatabaseSession.class.php';

$session = new DatabaseSession('root', 'Admin@winga123', 'session',  'dental','127.0.0.1');
session_set_save_handler(array($session, 'open'),
    array($session, 'close'),
    array($session, 'read'),
    array($session, 'write'),
    array($session, 'destroy'),
    array($session, 'gc')
); 

?>
