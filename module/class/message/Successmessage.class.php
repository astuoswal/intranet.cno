<?php
    class Successmessage extends message
    {
        public function getMessage(string $message): string {
            $message= strip_tags($message);
            return "<div class='alert alert-success text-center' role='alert'>$message</div>";
        }
    }
?>