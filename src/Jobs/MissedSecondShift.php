<?php

namespace Jobs;

use MailJob;

class MissedSecondShift extends MailJob {
    public function run() {
        $body = <<<EOM
Hey,

I'm reaching out to make sure everything's okay - I've noticed you've missed some shifts lately. I know being a crisis counselor is a lot of work, we deal with some heavy stuff! I want you to know that we are here to support you. If there is something specific that we can help you with, such as: encouragement or feedback please let me know. Our texters need you, we need you!

Hugs,
Jen James
Director of Crisis Counselors
Crisis Text Line
EOM;
        $message = $this->createMessage($this->extraParams, 'Everything ok?', $body);
        $message->setReplyTo('jen@crisistextline.org');
        $this->send();
    }
}

