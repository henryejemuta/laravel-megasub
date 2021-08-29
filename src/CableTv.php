<?php
/**
 * Created By: Henry Ejemuta
 * PC: Enrico Systems
 * Project: laravel-megasup
 * Company: Stimolive Technologies Limited
 * Class Name: Transaction.php
 * Date Created: 5/14/21
 * Time Created: 10:24 AM
 */

namespace HenryEjemuta\LaravelMegaSup;

use HenryEjemuta\LaravelMegaSup\Classes\MegaSupResponse;
use HenryEjemuta\LaravelMegaSup\Enums\CableTvEnum;

abstract class CableTv
{
    private $config;
    private $megaSup;

    public function __construct(MegaSup $megaSup, $config)
    {
        $this->config = $config;
        $this->megaSup = $megaSup;
    }


    /**
     * @param CableTvEnum $cableTv
     * @param $smartCardNo
     * @return MegaSupResponse
     * @throws Exceptions\MegaSupErrorException
     */
    public function verifyIUC(CableTvEnum $cableTv, $smartCardNo): MegaSupResponse
    {
        return $this->megaSup->getRequest('validateiuc', [
            'cablename' => $cableTv->getID(),
            'smart_card_number' => $smartCardNo,
        ]);
    }

    /**
     * @param CableTvEnum $cableTv
     * @param string $package
     * @param $smartCardNo
     * @return MegaSupResponse
     * @throws Exceptions\MegaSupErrorException
     */
    public function purchasePackage(CableTvEnum $cableTv, string $package, $smartCardNo): MegaSupResponse
    {
        return $this->megaSup->postRequest('cablesub', [
            'cablename' => $cableTv->getID(),
            'cableplan' => $package,
            'smart_card_number' => $smartCardNo,
        ]);
    }


}
