<?php

namespace Application\Model\Framework;

class MessageSession extends Session
{
    const SESSION_KEY = 'message';

    public function addMessage($message)
    {
        $arrayMessage = $this->get(self::SESSION_KEY);
        $arrayMessage[] = $message;
        $this->set(self::SESSION_KEY, $arrayMessage);
    }

    public function getMessage()
    {
        $messages = $this->get(self::SESSION_KEY);
        $this->remove(self::SESSION_KEY);
        return $messages;
    }
}
