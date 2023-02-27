<?php

use Illuminate\Support\Facades\Crypt;

function encrypt_data($value): string
{
    return Crypt::encrypt($value);
}

function decrypt_data($value): string
{
    return Crypt::decrypt($value);
}
