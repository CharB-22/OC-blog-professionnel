<?php

class UserMessage
{
    protected $messageContent;
    protected $messageFormat;

    public function __construct($messageContent, $alert)
    {
        $this->messageContent = $messageContent;
        $this->messageFormat = $alert;
    }

    public function getMessageContent()
    {
        return $this->messageContent;
    }

    public function getMessageFormat()
    {
        return $this->messageFormat;
    }

    public function setMessageContent($messageContent)
    {
        if(is_string($messageContent))
        {
            $this->messageContent = $messageContent;
        }
    }

    public function setMessageFormat($messageFormat)
    {
        if($messageFormat === "success" || $messageFormat === "danger")
        {
            $this->messageFormat = $messageFormat;
        }
    }
}