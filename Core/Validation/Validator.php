<?php

namespace Core\Validation;

class Validator extends CoreValidation
{
    public function setData(array $data):static
    {
        $this->dataHandling = $data;
        return $this;
    }
}