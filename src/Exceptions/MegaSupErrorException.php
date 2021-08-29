<?php
/**
 * Created By: Henry Ejemuta
 * PC: Enrico Systems
 * Project: laravel-megasup
 * Company: Stimolive Technologies Limited
 * Class Name: MegaSupErrorException.php
 * Date Created: 9/27/20
 * Time Created: 7:24 PM
 */

namespace HenryEjemuta\LaravelMegaSup\Exceptions;


class MegaSupErrorException extends \Exception
{
    /**
     * MegaSupErrorException constructor.
     * @param string $message
     * @param $code
     */
    public function __construct(string $message, $code)
    {
        parent::__construct($message, $code);
    }
}
