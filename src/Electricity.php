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
use HenryEjemuta\LaravelMegaSup\Enums\DiscoEnum;
use HenryEjemuta\LaravelMegaSup\Enums\MeterTypeEnum;

abstract class Electricity
{
    private $config;
    private $megaSup;

    public function __construct(MegaSup $megaSup, $config)
    {
        $this->config = $config;
        $this->megaSup = $megaSup;
    }

    /**
     * @param DiscoEnum $disco
     * @param $meterNumber
     * @param $meterType
     * @return MegaSupResponse
     * @throws Exceptions\MegaSupErrorException
     */
    public function verifyMeterNumber(DiscoEnum $disco, $meterNumber, MeterTypeEnum $meterType): MegaSupResponse
    {
        return $this->megaSup->getRequest('validatemeter', [
            'disconame' => $disco->getID(),
            'meternumber' => $meterNumber,
            'mtype' =>  $meterType->getCode(),
        ]);
    }

    /**
     * @param DiscoEnum $disco
     * @param $meterNumber
     * @param $amount
     * @param MeterTypeEnum $meterType
     * @return MegaSupResponse
     * @throws Exceptions\MegaSupErrorException
     */
    public function buyElectricity(DiscoEnum $disco, $meterNumber, $amount, MeterTypeEnum $meterType): MegaSupResponse
    {
        return $this->megaSup->postRequest('billpayment/', [
            'disco_name' => $disco->getID(),
            'meter_number' => $meterNumber,
            'amount' => $amount,
            'MeterType' => $meterType->getCode()
        ]);
    }

}
