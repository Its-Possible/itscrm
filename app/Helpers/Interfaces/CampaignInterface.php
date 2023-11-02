<?php

namespace App\Helpers\Interfaces;

interface CampaignInterface {

    const TYPE_CLASSIC = "CAMPAIGN::TYPE::CLASSIC";

    const STATUS_DRAFT  = 'CAMPAIGN::STATUS::DRAFT';
    const STATUS_ACTIVE = 'CAMPAIGN::STATUS::ACTIVE';
    const STATUS_DESACTIVATED = "CAMPAIGN::STATUS::DESACTIVATED";
    const STATUS_EXPIRED = 'CAMPAIGN::STATUS::EXPIRED';
}
