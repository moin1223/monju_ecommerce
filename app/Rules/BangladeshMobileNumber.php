<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class BangladeshMobileNumber implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Regex pattern to validate Bangladeshi mobile numbers
        $pattern = '/^(?:\+?88)?01[3-9]\d{8}$/';
        return preg_match($pattern, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a valid Bangladeshi mobile number.';
    }
}
