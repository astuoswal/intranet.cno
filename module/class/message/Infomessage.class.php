<?php
    class Infomessage extends message
    {
        public function getMessage(string $message): string {
            $message= strip_tags($message);
            return "<div class='alert alert-info text-center' role='alert'>$message</div>";
        }
    }
?>