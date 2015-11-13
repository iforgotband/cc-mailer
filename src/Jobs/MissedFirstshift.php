<?php

namespace Jobs;

use MailJob;

class MissedFirstShift extends MailJob {
    public function run() {
        $message = $this->createMessage($this->extraParams, 'Test email', 'This is the body.');
        $message->setReplyTo('jen@crisistextline.org');
        $this->send();
    }
}

