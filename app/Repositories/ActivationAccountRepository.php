<?php

namespace App\Repositories;

use App\Helpers\Interfaces\ActivationAccountInterface;
use App\Models\ActivationAccount;

class ActivationAccountRepository {

    private ActivationAccount $activationAccount;

    public function __construct(ActivationAccount $activationAccount)
    {
        $this->activationAccount = $activationAccount;
    }

    public function all()
    {
        return $this->activationAccount->all();
    }

    public function WhereTokenIs($token)
    {
        return $this->activationAccount->where('token', $token)->firstOrFail();
    }

    public function WhereStatusActive()
    {
        return $this->activationAccount->where('status', ActivationAccountInterface::STATUS_ACTIVE)->get();
    }

    public function WhereStatusUsed()
    {
        return $this->activationAccount->where('status', ActivationAccountInterface::STATUS_USED)->get();
    }

    public function WhereStatusExpired()
    {
        return $this->activationAccount->where('status', ActivationAccountInterface::STATUS_EXPIRED)->get();
    }
}
