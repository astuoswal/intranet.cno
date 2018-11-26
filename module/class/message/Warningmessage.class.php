<?php
    class Warningmessage extends message
    {
        public function getMessage(string $message): string {
            $message= strip_tags($message);
            return "<div class='alert alert-warning text-center' role='alert'>$message</div>";
        }
    }
?>