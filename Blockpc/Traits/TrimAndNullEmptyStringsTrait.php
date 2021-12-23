<?php

declare(strict_types=1);

namespace Blockpc\Traits;

trait TrimAndNullEmptyStringsTrait
{
    /**
     * @var string[]
     */
    protected $convertEmptyStringsExcept = [
        //
    ];

    /**
     * @param string $name
     * @param mixed $value
     */
    public function updatedConvertEmptyStringsToNull(string $name, $value): void
    {
        if (! is_string($value) || in_array($name, $this->convertEmptyStringsExcept)) {
            return;
        }

        $value = trim($value);
        $value = $value === '' ? null : $value;

        data_set($this, $name, $value);
    }
}