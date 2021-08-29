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

abstract class Transaction
{
    private $megaSup;

    /**
     * Transactions constructor.
     * @param MegaSup $megaSup
     */
    public function __construct(MegaSup $megaSup)
    {
        $this->megaSup = $megaSup;
    }


    /**
     * Get All Data Transactions
     * @return MegaSupResponse
     * @throws Exceptions\MegaSupErrorException
     */
    public function getAllDataTransaction(): MegaSupResponse
    {
        return $this->megaSup->getRequest("data/");
    }

    /**
     * Query Transactions
     * @param string $txnType
     * @param int $txnId
     * @return MegaSupResponse
     * @throws Exceptions\MegaSupErrorException
     */
    private function queryTransaction(string $txnType, int $txnId): MegaSupResponse
    {
        return $this->megaSup->getRequest("$txnType/$txnId");
    }

    /**
     * Query Data Transactions
     * @param int $txnId
     * @return MegaSupResponse
     * @throws Exceptions\MegaSupErrorException
     */
    public function queryDataTransaction(int $txnId): MegaSupResponse
    {
        return $this->queryTransaction('data', $txnId);
    }

    /**
     * Query Airtime Transactions
     * @param int $txnId
     * @return MegaSupResponse
     * @throws Exceptions\MegaSupErrorException
     */
    public function queryAirtimeTransaction(int $txnId): MegaSupResponse
    {
        return $this->queryTransaction('topup', $txnId);
    }

    /**
     * Query Bill Payment Transactions
     * @param int $txnId
     * @return MegaSupResponse
     * @throws Exceptions\MegaSupErrorException
     */
    public function queryElectricityBillTransaction(int $txnId): MegaSupResponse
    {
        return $this->queryTransaction('billpayment', $txnId);
    }

    /**
     * Query Cable Subscription Transactions
     * @param int $txnId
     * @return MegaSupResponse
     * @throws Exceptions\MegaSupErrorException
     */
    public function queryCableTvTransaction(int $txnId): MegaSupResponse
    {
        return $this->queryTransaction('cablesub', $txnId);
    }

}
