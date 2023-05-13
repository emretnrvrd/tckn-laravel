<?php

namespace Emretnrvrd\TcknLaravel\Rules;

use Emretnrvrd\Tckn\Services\TcknValidator\TcknValidator;
use Illuminate\Contracts\Validation\Rule;

class TcknValidationRule implements Rule
{


    public string $alias = 'tckn';
    protected array $rules = [
        'size:11'
    ];
    protected $validator;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->validator = app()['validator'];
    }

    /**
     * Get the expected TCKN's.
     *
     * @return array
     */
    protected function getExpectedIds()
    {
        $configs = config('tckn', []);

        return $configs['expected_ids'] ?? [];
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
        $expectedIds = $this->getExpectedIds();
        $otherValidations = $this->validator->make([$attribute => $value], [$attribute => $this->rules]);

        if(in_array($value, $expectedIds)) {
            return true;
        }
        else if($otherValidations->fails()) {
            return false;
        }
        else {
            $tcknIsValidated = (new TcknValidator($value))->validate();
            return $tcknIsValidated;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('tckn-laravel::validation.tckn');
    }

}
