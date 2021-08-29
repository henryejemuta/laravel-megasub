<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    /*
     * ---------------------------------------------------------------
     * Base Url
     * ---------------------------------------------------------------
     *
     * The MegaSup base url upon which others is based, if not set it's going to use the sandbox version
     */
    'base_url' => env('MEGASUP_BASE_URL', 'https://www.nellobytesystems.com/'),

    /*
     * ---------------------------------------------------------------
     * ApiToken
     * ---------------------------------------------------------------
     *
         * Your MegaSup ApiToken
     */
    'api_token' => env('MEGASUP_API_TOKEN'),
];
