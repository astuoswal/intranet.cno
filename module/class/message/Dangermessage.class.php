<?php
    class Dangermessage extends message
    {
        public function getMessage(string $message): string {
            $message= strip_tags($message);
            return "<div class='alert alert-danger text-center' role='alert'>$message</div>";
        }
    }
?>