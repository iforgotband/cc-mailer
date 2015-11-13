<?php

class MailJob {
    protected $mailer;
    protected $messages = array();
    protected $defaults = array();
    protected $extraParams = array();

    public function __construct($config, $params) {
        $transport = Swift_SmtpTransport::newInstance($config->mail_host, $config->mail_port, 'tls')
            ->setUsername($config->mail_user)
            ->setPassword($config->mail_password)
        ;

        $this->mailer = Swift_Mailer::newInstance($transport);
        
        $this->defaults = array(
            'from_email' => $config->mail_from_email,
            'from_name'  => $config->mail_from_name,
        );

        $this->extraParams = $params;
    }

    protected function createMessage($to, $subject, $body) {
        $message = Swift_Message::newInstance($subject);
        $message->setFrom(array($this->defaults['from_email'] => $this->defaults['from_name']));
        $message->setBody($body);

        if (!is_array($to)) {
            $to = array($to);
        }

        $message->setTo($to);

        $this->messages[] = $message;
        
        return $message;
    }
    
    protected function send() {
        foreach ($this->messages as $message) {
            if (!$this->mailer->send($message, $errors)) {
                var_dump($errors);
            }
        }
    }
}

