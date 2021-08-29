<?php

namespace HenryEjemuta\LaravelMegaSup;

use HenryEjemuta\LaravelMegaSup\Classes\MegaSupResponse;
use HenryEjemuta\LaravelMegaSup\Enums\NetworkEnum;
use Illuminate\Support\Facades\Facade;

/**
 * @method static MegaSupResponse checkUserDetails()
 * @method static MegaSupResponse buyAirtime(NetworkEnum $mobileNetwork, int $amount, $phoneNumber, bool $portedNumber = true, string $airtimeType = "VTU")
 * @method static Transaction Transaction()
 * @method static CableTv CableTv()
 * @method static Electricity Electricity()
 * @method static MegaSupResponse buyData(NetworkEnum $network, string $plan, string $phoneNumber, bool $portedNumber = true)
 *
 * For respective method implementation:
 * @see \HenryEjemuta\LaravelMegaSup\MegaSup
 */
class MegaSupFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'megasup';
    }
}
