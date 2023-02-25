<?php

namespace App\Helpers\Interfaces;

class MailInterface
{
    //
    const STATUS_SENT = 'MAIL::STATUS::SENT';
    const STATUS_PENDING = 'MAIL::STATUS::PENDING';
    const STATUS_FAILED = 'MAIL::STATUS::FAILED';

    const TYPE_HTML = 'MAIL::TYPE::HTML';

    const TYPE_TEXT = 'MAIL::TYPE::TEXT';

}
