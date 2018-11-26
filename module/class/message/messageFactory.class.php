<?php

    class messageFactory
    {
        public static function createMessage ($type){
            switch ($type) {
                case 'Successmessage':
                    return new Successmessage();
                    break;
                case 'Warningmessage':
                    return new Warningmessage();
                    break;
                case 'Infomessage':
                    return new Infomessage();
                    break;
                case 'Dangermessage':
                    return new Dangermessage();
                    break;
                default:
                    return false;
                    break;
            }
        }
    }
    
?>