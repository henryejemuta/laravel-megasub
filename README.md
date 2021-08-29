# Laravel MegaSup

[![Latest Version on Packagist](https://img.shields.io/packagist/v/henryejemuta/laravel-megasup.svg?style=flat-square)](https://packagist.org/packages/henryejemuta/laravel-megasup)
[![Latest Stable Version](https://poser.pugx.org/henryejemuta/laravel-megasup/v/stable)](https://packagist.org/packages/henryejemuta/laravel-megasup)
[![Total Downloads](https://poser.pugx.org/henryejemuta/laravel-megasup/downloads)](https://packagist.org/packages/henryejemuta/laravel-megasup)
[![License](https://poser.pugx.org/henryejemuta/laravel-megasup/license)](https://packagist.org/packages/henryejemuta/laravel-megasup)
[![Quality Score](https://img.shields.io/scrutinizer/g/henryejemuta/laravel-megasup.svg?style=flat-square)](https://scrutinizer-ci.com/g/henryejemuta/laravel-megasup)

## What is MegaSup
The MegaSup API is an HTTPs GET API that allows you to integrate all MegaSup virtual top-up and bills payment services available on our platform with your application (websites, desktop apps & mobile apps). You can also start your own VTU business by integrating our VTU API and resell our services in Nigeria.

## What is Laravel MegaSup
Laravel MegaSup is a laravel package to seamlessly integrate MegaSup api within your laravel application.

Create a MegaSup Account [Sign Up](https://mega-sub.com/signup/).

Look up MegaSup API Documentation [API Documentation](https://www.mega-sub.com/documentation/).

## Installation

You can install the package via composer:

```bash
composer require henryejemuta/laravel-megasup
```

Publish MegaSup configuration file, migrations as well as set default details in .env file:

```bash
php artisan megasup:init
```

## Usage

**Important: Kindly use the ``$response->successful()`` to check the response state before proceeding with working with the response and gracefully throw and handle the MegaSupErrorException on failed request**

Before initiating any transaction kindly check your balance to confirm you have enough MegaSup balance to handle the transaction

The Laravel MegaSup Package is quite easy to use via the MegaSup facade
``` php
use HenryEjemuta\LaravelMegaSup\Facades\MegaSup;
use HenryEjemuta\LaravelMegaSup\Classes\MegaSupResponse;

...

//To buy Airtime
try{
    $response = MegaSupFacade::buyAirtime(NetworkEnum::getNetwork('mtn'), 100, '08134567890');
} catch (MegaSupErrorException $exception) {
    Log::error($exception->getMessage() . "\n\r" . $exception->getCode());
}

//A dump of the MegaSupResponse on successful airtime purchase
HenryEjemuta\LaravelMegaSup\Classes\MegaSupResponse {#1423 ▼
  -message: ""
  -hasError: false
  -error: null
  -code: 200
  -body: {#1539 ▼
    +"id": 167630
    +"airtime_type": "VTU"
    +"network": 1
    +"paid_amount": "97.0"
    +"mobile_number": "08134567890"
    +"amount": "100"
    +"plan_amount": "₦100"
    +"plan_network": "MTN"
    +"balance_before": "2892.6"
    +"balance_after": "2795.6"
    +"Status": "successful"
    +"create_date": "2021-08-28T21:02:54.311846"
    +"Ported_number": true
  }
}



//To buy Data Bundle
try{
    $response = MegaSupFacade::buyData(MegaSupNetworkEnum::getNetwork("mtn"), 7, "08134567890");
} catch (MegaSupErrorException $exception) {
    Log::error($exception->getMessage() . "\n\r" . $exception->getCode());
}

//A dump of the MegaSupResponse on successful data purchase
HenryEjemuta\LaravelMegaSup\Classes\MegaSupResponse {#1423 ▼
  -message: ""
  -hasError: false
  -error: null
  -code: 200
  -body: {#1539 ▼
    +"id": 108602
    +"network": 1
    +"balance_before": "2698.6"
    +"balance_after": "2459.6"
    +"mobile_number": "08134567890"
    +"plan": 7
    +"Status": "successful"
    +"plan_network": "MTN"
    +"plan_name": "1.0GB"
    +"plan_amount": "₦239.0"
    +"create_date": "2021-08-28T21:27:41.169631"
    +"Ported_number": true
  }
}
...

```


Find an overview of all method with comment on what they do and expected arguments
``` php

       
    /**
     * Get Your MegaSub account details including available balance
     * @return MegaSupResponse
     * @throws MegaSupErrorException
     */
    public function checkUserDetails(): MegaSupResponse

    /**
     * @param NetworkEnum $mobileNetwork
     * @param int $amount
     * @param $phoneNumber
     * @param bool $portedNumber
     * @param string $airtimeType
     * @return MegaSupResponse
     * @throws MegaSupErrorException
     */
    public function buyAirtime(NetworkEnum $mobileNetwork, int $amount, $phoneNumber, bool $portedNumber = true, string $airtimeType = "VTU"): MegaSupResponse

    /**
     * MegaSup API Transaction handler to access:
     * Transaction()->getAllDataTransaction(): MegaSupResponse
     * Transaction()->queryDataTransaction(int $txnId): MegaSupResponse
     * Transaction()->queryAirtimeTransaction(int $txnId): MegaSupResponse
     * Transaction()->queryElectricityBillTransaction(int $txnId): MegaSupResponse
     * Transaction()->queryCableTvTransaction(int $txnId): MegaSupResponse
     *
     * @return Transaction
     */
    public function Transaction(): Transaction

    /**
     * Cable TV Bill handler to access:
     * CableTv()->verifyIUC(CableTvEnum $cableTv, $smartCardNo): MegaSupResponse
     * CableTv()->purchasePackage(CableTvEnum $cableTv, string $package, $smartCardNo): MegaSupResponse
     *
     * @return CableTv
     */
    public function CableTv(): CableTv


    /**
     * @param NetworkEnum $network
     * @param string $plan
     * @param string $phoneNumber
     * @param bool $portedNumber
     * @return MegaSupResponse
     * @throws MegaSupErrorException
     */
    public function buyData(NetworkEnum $network, string $plan, string $phoneNumber, bool $portedNumber = true): MegaSupResponse


    /**
     * Electricity Bills payment handler to access:
     * Electricity()->verifyMeterNumber(DiscoEnum $disco, $meterNumber, MeterTypeEnum $meterType): MegaSupResponse
     * Electricity()->buyElectricity(DiscoEnum $disco, $meterNumber, $amount, MeterTypeEnum $meterType): MegaSupResponse
     *
     * @return Electricity
     */
    public function Electricity(): Electricity

```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email henry.ejemuta@gmail.com instead of using the issue tracker.

## Credits

- [Henry Ejemuta](https://github.com/henryejemuta)
- [All Contributors](https://github.com/henryejemuta/graphs/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
