<?php

namespace Jobs;

use MailJob;

class MissedFourthShift extends MailJob {
    public function run() {
        $body = <<<EOM
Hi,

I'm concerned. You put in so much time and effort to graduate from training and we haven't seen you on the platform for a month.

It's important that you are able to continue your weekly scheduled shift. If you are having a hard time making that particular time, please go to the scheduling tool and find a time that works for you. We know that life can get in the way, and that is why I'm reaching out, so we can find a balance for your life and your commitment with Crisis Text Line.

If you have any questions please don't hesitate to reach out.

Thanks!
Jen James
Director of Crisis Counselors
Crisis Text Line
EOM;
        $message = $this->createMessage($this->extraParams, 'Volunteer Commitment', $body);
        $message->setReplyTo('jen@crisistextline.org');
        $this->send();
    }
}

