<?php

namespace Jobs;

use MailJob;

class FirstShiftDebrief extends MailJob {
    public function run() {
        $body = <<<EOM
Wooohoo!  First shift complete - congrats!

We're always looking to improve our crisis counselors' experience. I'd love to hear how your shift went for you.

Do you have any suggestions to help us better the first shift experience for you and future crisis counselors?

Thank you so much for your help and dedication to the texters, you made a difference!

Let me know if you need further support! I'm always here to help!

Cheers,
Jen James
Director of Crisis Counselors
Crisis Text Line
EOM;
        $message = $this->createMessage($this->extraParams, 'WAY TO GO!', $body);
        $message->setReplyTo('jen@crisistextline.org');
        $this->send();
    }
}

