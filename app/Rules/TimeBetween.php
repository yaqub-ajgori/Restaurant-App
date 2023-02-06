<?php

namespace App\Rules;

use Illuminate\Support\Carbon;
use Illuminate\Contracts\Validation\Rule;

class TimeBetween implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $pickupDate = Carbon::parse($value);
        $pickupTime = Carbon::createFromTime($pickupDate->hour, $pickupDate->minute, $pickupDate->second);

        // restaurant opens at 11am and closes at 10pm
        $openTime = Carbon::createFromTimeString('11:00:00');
        $closeTime = Carbon::createFromTimeString('22:00:00');
        return $pickupTime->between($openTime, $closeTime) ? true : false;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please chone the time between 11 am and and 10pm';
    }
}
