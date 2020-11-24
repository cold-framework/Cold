<?php


namespace App\Constraint;

class Password extends Constraint
{
    public function validate(): bool
    {
        if(!(strlen($this->data) >= 8)) {
            $this->addError('Your password must contain at least 8 caracteres');
        }

        if(!(strlen($this->data) <= 64)) {
            $this->addError('Your password must contain at maximum 64 caracteres');
        }

        if(!((new NeedMinOneCapitalLetter($this->data))->validate())) {
            $this->addError('Your password must contain at least one capital letter');
        }

        if(!((new NeedMinOneMinusculeLetter($this->data))->validate())) {
            $this->addError('Your password must contain at least one minuscule letter');
        }

        if(!((new NeedMinOneNumber($this->data))->validate())) {
            $this->addError('Your password must contain at least one number');
        }

        if(!((new NeedMinOneSpecialChar($this->data))->validate())) {
            $this->addError('Your password must contain at least one special caractere');
        }

        return empty($this->getErrors());
    }
}