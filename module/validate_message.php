<?php
    $message = isset($_GET['message']) && isset($_GET['type']) ? messageFactory::createMessage($_GET['type']) : false;
    $message_out = $message ? $message->getMessage($_GET['message']) : '';

    echo $message_out;
?>