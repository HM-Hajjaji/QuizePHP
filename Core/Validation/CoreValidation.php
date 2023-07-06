<?php
namespace Core\Validation;
class CoreValidation
{
    const DEFAULT_VALIDATION_ERRORS = [
        'required' => 'The %s is required',
        'email' => 'The %s is not a valid email address',
        'min' => 'The %s must have at least %d characters',
        'max' => 'The %s must have at most %d characters',
        'between' => 'The %s must have between %d and %d characters',
        'same' => 'The %s must match with %s',
        'alphanumeric' => 'The %s should have only letters and numbers',
        'secure' => 'The %s must have between 8 and 64 characters and contain at least one number, one upper case letter, one lower case letter and one special character',
        'unique' => 'The %s already exists',
    ];
    private array $data;
    private array $errors = [];

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    private function getValue(string $key): mixed
    {
        return trim($this->data[$key])??null;
    }

    private function addError(string $key ,string $message):void
    {
        if (!array_key_exists($key,$this->errors))
        {
            $this->errors[$key] = $message;
        }
    }

    public function getErrors():array
    {
        return $this->errors;
    }

    public function isValid():bool
    {
        return empty($this->errors);
    }

    public function required(array $keys):static
    {
        foreach ($keys as $key) {
            $value = $this->getValue($key);
            if (empty($value) && !ctype_alnum($value)) {
                $this->addError($key,sprintf(self::DEFAULT_VALIDATION_ERRORS['required'],$key));
            }
        }
        return $this;
    }

    public function email(string $key):static
    {
        $value = $this->getValue($key);
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->addError($key,sprintf(self::DEFAULT_VALIDATION_ERRORS['email'],$key));
        }
        return $this;
    }

    public function alphanumeric(string $key):static
    {
        $value = $this->getValue($key);
        if (!is_numeric($value)) {
            $this->addError($key,sprintf(self::DEFAULT_VALIDATION_ERRORS['alphanumeric'],$key));
        }
        return $this;
    }

    public function min(string $key,int $min):static
    {
        $value = $this->getValue($key);
        if (strlen($value) < $min)
        {
            $this->addError($key,sprintf(self::DEFAULT_VALIDATION_ERRORS['min'],$key,$min));
        }
        return $this;
    }

    public function max(string $key,int $max):static
    {
        $value = $this->getValue($key);
        if (strlen($value) > $max)
        {
            $this->addError($key,sprintf(self::DEFAULT_VALIDATION_ERRORS['max'],$key,$max));
        }
        return $this;
    }

    public function between(string $key,int $min,int $max):static
    {
        $value = $this->getValue($key);
        if (strlen($value) < $min || strlen($value) > $max)
        {
            $this->addError($key,sprintf(self::DEFAULT_VALIDATION_ERRORS['between'],$key,$min,$max));
        }
        return $this;
    }
}