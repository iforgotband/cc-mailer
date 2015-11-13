#Crisis Counselor Mailer

##Installation
1. Install composer
2. Clone repo
3. `composer install`

##Running
`php run <job-name>`

Job names are lower-cased, hyphen-separated class names. So, if we create
a Job called `DoThisThing`, we would do:
`php run do-this-thing`

Any additional parameters passed to the job are forwarded to the Job's class.

