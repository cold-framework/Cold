<?php

namespace App;

use App\Constraint\Constraint;

abstract class Validator
{
    private array $data;
    private array $errors = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function validate(): bool
    {
        $validationFields = $this->getValidationFields();

        foreach ($validationFields as $field => $validationField) {
            $skippingValidation = false;
            foreach ($validationField as $validation) {
                if ($skippingValidation) {
                    break;
                }

                /** @var Constraint $constraint */
                $constraint = new $validation[0]($this->data[$field]);

                $isValidated = $constraint->validate();

                $isValidated ?: $this->errors[$field] = $constraint->getErrors();
                $isValidated ?: $skippingValidation = $constraint->skipAllNextValidation();
            }
        }

        return empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    abstract protected function getValidationFields(): array;
}