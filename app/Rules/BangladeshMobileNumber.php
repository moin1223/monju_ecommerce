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
          
        $banglaToEnglish = [
            '০' => '0', '১' => '1', '২' => '2', '৩' => '3', '৪' => '4',
            '৫' => '5', '৬' => '6', '৭' => '7', '৮' => '8', '৯' => '9'
        ];

        $value = strtr($value, $banglaToEnglish);

        
        return preg_match('/^(?:\+88|88)?(01[3-9]\d{8})$/', $value);
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
