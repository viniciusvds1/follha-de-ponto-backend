<?php

namespace app\Models;

use app\Exceptions\DomainRecordNotFoundException;

class UserNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The user you requested does not exist.';
}
