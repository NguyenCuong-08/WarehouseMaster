<?php
/**
 * Created by PhpStorm.
 * BillPayment: hoanghung
 * Date: 08/09/2016
 * Time: 19:52
 */

namespace App\Console\Commands\Website;

class Base
{

    public function checkUrl404($url) {
        $handle = curl_init($url);
        curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);

        /* Get the HTML or whatever is linked in $url. */
        $response = curl_exec($handle);

        /* Check for 404 (file not found). */
        $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        if($httpCode == 404) {
            return  true;
        }
        return false;
    }
}