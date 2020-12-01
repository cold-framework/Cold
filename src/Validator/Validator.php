<?php

namespace ColdBolt\Validator;

use ColdBolt\Validator\Constraint\Constraint;

abstract class Validator
{
    private array $data;
    private array $errors = [];

    public function validate(): bool
    {
        $this->data = $this->getData();

        $validationFields = $this->getValidationFields();

        foreach ($validationFields as $field => $validationField) {
            $skippingValidation = false;
            foreach ($validationField as $validation) {
                if ($skippingValidation) {
                    break;
                }

                /** @var Constraint $constraint */
                $constraint = new $validation($this->data[$field]);

                $isValidated = $constraint->validate();

                if(!$isValidated) {
                    foreach ($constraint->getErrors() as $error) {
                        $this->errors[] = $error;
                    }
                }
                $skippingValidation = $constraint->skipAllNextValidation();
            }
        }

        return empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    abstract public function getData(): array;
    abstract protected function getValidationFields(): array;
}
