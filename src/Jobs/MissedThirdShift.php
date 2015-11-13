<?php

namespace Jobs;

use MailJob;

class MissedThirdShift extends MailJob {
    public function run() {
        $body = <<<EOM
Hi,

We haven't seen you on the platform in a while. I'm wondering if the shift you committed to is the right one for you? Feel free to check our scheduling tool to see if there's another shift that might better fit your schedule. (https://online.crisistextline.org/user?destination=schedule)

I want to be the best support possible, how can I help?

We miss you and could use your help on the platform with texters! 


Take care,
Jen James
Director of Crisis Counselors
Crisis Text Line

EOM;
        $message = $this->createMessage($this->extraParams, 'We miss you', $body);
        $message->setReplyTo('jen@crisistextline.org');
        $this->send();
    }
}

