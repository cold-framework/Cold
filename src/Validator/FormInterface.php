<?php

namespace ColdBolt\Validator;

interface FormInterface {
    public function validate(): bool;
    public function getErrors(): array;
}