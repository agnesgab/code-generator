<?php

namespace App\Models;

class VarietyOption
{
    private string $varietyCode;
    private array $varietyOptions;
    private string $varietyDescription;
    private array $colorsAndSizes;

    public function __construct(string $varietyCode, array $varietyOptions, string $varietyDescription)
    {
        $this->varietyCode = $varietyCode;
        $this->varietyOptions = $varietyOptions;
        $this->varietyDescription = $varietyDescription;
    }

    public function getVarietyDescription(): string
    {
        return $this->varietyDescription;
    }

    public function getVarietyCode(): string
    {
        return $this->varietyCode;
    }

    public function getVarietyOptions(): array
    {
        return $this->varietyOptions;
    }

    public function getColorsAndSizes(): array
    {
        foreach ($this->varietyOptions as $option) {
            $this->colorsAndSizes[$option['code']][] = $option['description'];
        }
        return $this->colorsAndSizes;
    }

}
