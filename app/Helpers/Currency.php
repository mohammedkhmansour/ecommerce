<?php
namespace App\Helpers;

use NumberFormatter;

class Currency{
    public static function format($amount, $currancy = null){
        $formatter = new NumberFormatter(config('app.locale'),NumberFormatter::CURRENCY);
        if($currancy == null){
            $currancy = config('app.currancy');
        }
        return $formatter->formatCurrency($amount,$currancy);
    }
}
