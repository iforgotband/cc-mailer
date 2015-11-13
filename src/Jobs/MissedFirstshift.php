<?php

namespace Jobs;

use MailJob;

class MissedFirstShift extends MailJob {
    public function run() {
        $body = <<<EOM
Hi there!

I noticed you missed your first shift - I wanted to check in to make sure everything is okay? I hope so. If there is something that I can help with, let me know! 

If you can't make your scheduled shift please make sure to go to CTL online to request that time off and schedule a make up shift: https://online.crisistextline.org/user?destination=time-off


Thanks!
Jen James
Director of Crisis Counselors
Crisis Text Line
EOM;
        $message = $this->createMessage($this->extraParams, 'We missed you on your shift!', $body);
        $message->setReplyTo('jen@crisistextline.org');
        $this->send();
    }
}

