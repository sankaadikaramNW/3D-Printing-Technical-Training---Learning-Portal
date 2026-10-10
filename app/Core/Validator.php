<?php
namespace App\Core;

/**
 * Request Input Validator
 */
class Validator
{
    private array $errors = [];

    public function validate(array $data, array $rules): bool
    {
        $this->errors = [];

        foreach ($rules as $field => $ruleString) {
            $ruleList = explode('|', $ruleString);
            $val = $data[$field] ?? null;

            foreach ($ruleList as $rule) {
                $params = [];
                if (strpos($rule, ':') !== false) {
                    list($ruleName, $paramStr) = explode(':', $rule, 2);
                    $params = explode(',', $paramStr);
                } else {
                    $ruleName = $rule;
                }

                switch ($ruleName) {
                    case 'required':
                        if ($val === null || trim((string)$val) === '') {
                            $this->addError($field, "The " . ucfirst(str_replace('_', ' ', $field)) . " field is required.");
                        }
                        break;

                    case 'email':
                        if (!empty($val) && !filter_var($val, FILTER_VALIDATE_EMAIL)) {
                            $this->addError($field, "The " . ucfirst(str_replace('_', ' ', $field)) . " must be a valid email address.");
                        }
                        break;

                    case 'min':
                        $min = (int)($params[0] ?? 0);
                        if (!empty($val) && mb_strlen((string)$val) < $min) {
                            $this->addError($field, "The " . ucfirst(str_replace('_', ' ', $field)) . " must be at least {$min} characters.");
                        }
                        break;

                    case 'max':
                        $max = (int)($params[0] ?? 255);
                        if (!empty($val) && mb_strlen((string)$val) > $max) {
                            $this->addError($field, "The " . ucfirst(str_replace('_', ' ', $field)) . " may not be greater than {$max} characters.");
                        }
                        break;

                    case 'numeric':
                        if (!empty($val) && !is_numeric($val)) {
                            $this->addError($field, "The " . ucfirst(str_replace('_', ' ', $field)) . " must be a number.");
                        }
                        break;
                }
            }
        }

        return empty($this->errors);
    }

    private function addError(string $field, string $message): void
    {
        if (!isset($this->errors[$field])) {
            $this->errors[$field] = $message;
        }
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function firstError(): ?string
    {
        return !empty($this->errors) ? reset($this->errors) : null;
    }
}
