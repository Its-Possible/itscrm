<?php

use App\Models\Customer;

function getUserAvatar(): string
{
    return "link";
}

function fetchCustomer(Customer $customer, string $field): void
{
    dd($customer);
}
