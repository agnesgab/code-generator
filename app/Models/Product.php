<?php

namespace App\Models;

class Product
{
    private string $itemCode;
    private array $requiredVarieties;
    private string $itemDescription;
    private array $options = [];

    public function __construct(string $itemCode, string $itemDescription, array $requiredVarieties = null)
    {
        $this->itemCode = $itemCode;
        $this->requiredVarieties = $requiredVarieties;
        $this->itemDescription = $itemDescription;
    }

    public function getItemCode(): string
    {
        return $this->itemCode;
    }

    public function getRequiredVarieties(): ?array
    {
        return $this->requiredVarieties;
    }

    public function getItemDescription(): string
    {
        return $this->itemDescription;
    }

    public function setVarietyOptions(VarietyOption $option)
    {
        $this->options[] = $option;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

}