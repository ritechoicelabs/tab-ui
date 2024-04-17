<?php

namespace RiteChoiceInnovations\TabUi\Theme;

class Button
{
    private string $variant = 'solid';
    private string $color = 'primary';
    private string $size = 'md';
    private string $rounded = 'xl';

    private string $variantClasses;
    private string $sizeClasses;
    private string $roundedClasses;

    public static function make(): self
    {
        return new static();
    }

    public function render(): string
    {
        return $this->generateClasses();
    }

    private function generateClasses(): string
    {
        $base = $this->baseClasses();
        $this->rounded($this->rounded);
        $this->size($this->size);
        $this->color($this->color);
        $this->variant($this->variant);
        return "{$base} {$this->variantClasses} {$this->sizeClasses} {$this->roundedClasses}";
    }


    /**
     * @return string
     */
    private function baseClasses(): string
    {
        return "inline-flex items-center justify-center whitespace-nowrap text-sm font-medium
    ring-offset-white disabled:pointer-events-none disabled:opacity-65
    transition-colors focus-visible:outline-none focus-visible:ring-2
    focus-visible:ring-slate-950 focus-visible:ring-offset-2 disabled:pointer-events-none
    disabled:opacity-50 dark:ring-offset-slate-950 dark:focus-visible:ring-slate-300";
    }

    public function rounded(string $rounded = null): static
    {
        $this->rounded = $rounded ?? $this->rounded;
        $this->roundedClasses = $this->setRoundedClasses()[$this->rounded] ?? "rounded-xl";
        return $this;
    }

    /**
     * @return string[]
     */
    private function setRoundedClasses(): array
    {
        return [
            "none" => "rounded-none",
            "sm" => "rounded-sm",
            "md" => "rounded-md",
            "lg" => "rounded-lg",
            "xl" => "rounded-xl",
            "full" => "rounded-full",
        ];
    }

    public function size(string $size = null): static
    {
        $size = $size ?? $this->size;
        $this->sizeClasses = $this->sizeClasses()[$size] ?? "h-10 px-4 py-2";
        return $this;
    }

    /**
     * @return string[]
     */
    private function sizeClasses(): array
    {
        return [
            "md" => "h-10 px-4 py-2",
            "sm" => "h-9 rounded-md px-3",
            "xs" => "h-6 rounded-md px-1",
            "lg" => "h-11 rounded-md px-8",
            "icon" => "h-10 w-10",
        ];
    }

    public function color(string $color = null): static
    {
        $this->color = $color ?? $this->color;
        return $this;
    }

    public function variant(string $variant = null): static
    {
        $this->variant = $variant ?? $this->variant;
        $color = $this->color;
        $this->variantClasses = $this->variantClasses()[$variant][$color] ?? ['solid']['primary'];
//        dd($this->variant);
        return $this;
    }

    private function variantClasses(): array
    {
        return [
            'solid' => $this->solidVariantClasses(),
            'outlined' => $this->outlinedVariantClasses(),
            'ghost' => $this->ghostVariantClasses(),
            'link' => $this->linkVariantClasses(),
        ];
    }

    /**
     * @return string[]
     */
    public function solidVariantClasses(): array
    {
        return [
            'primary' => 'bg-primary-900 text-slate-50 hover:bg-primary-900/80 dark:bg-slate-50 dark:text-primary-500 dark:hover:bg-slate-100',
            'secondary' => 'bg-secondary-500 text-slate-50 hover:bg-secondary-500/90 dark:bg-secondary-900 dark:text-slate-50 dark:hover:bg-secondary-900/90',
            'danger' => 'bg-danger-500 text-slate-50 hover:bg-danger-500/90 dark:bg-danger-900 dark:text-slate-50 dark:hover:bg-danger-900/90',
            'warning' => 'bg-warning-500 text-slate-50 hover:bg-warning-500/90 dark:bg-warning-900 dark:text-slate-50 dark:hover:bg-warning-900/90',
            'positive' => 'bg-positive-500 text-slate-50 hover:bg-positive-500/90 dark:bg-positive-900 dark:text-slate-50 dark:hover:bg-positive-900/90',
            'info' => 'bg-info-500 text-slate-50 hover:bg-info-500/90 dark:bg-info-900 dark:text-slate-50 dark:hover:bg-info-900/90',
        ];
    }

    /**
     * @return string[]
     */
    private function outlinedVariantClasses(): array
    {
        return [
            'primary' => 'border border-slate-200 hover:text-slate-50 bg-white hover:bg-slate-100 hover:text-slate-900 dark:border-slate-800 dark:bg-slate-950 dark:hover:bg-slate-800 dark:hover:text-slate-50',
            'secondary' => 'border border-secondary-500 bg-white text-secondary-500 hover:text-slate-50 hover:bg-secondary-500/90 hover:border-secondary-600 dark:border-secondary-900 dark:bg-secondary-900 dark:hover:bg-secondary-900/90 dark:hover:text-slate-50',
            'danger' => 'border border-danger-500 bg-white text-danger-500 hover:text-slate-50 hover:bg-danger-500/90 hover:border-danger-600 dark:border-danger-900 dark:bg-danger-900 dark:hover:bg-danger-900/90 dark:hover:text-slate-50',
            'warning' => 'border border-warning-500 bg-white hover:text-slate-50 text-warning-500 hover:bg-warning-500/90 hover:border-warning-600 dark:border-warning-900 dark:bg-warning-900 dark:hover:bg-warning-900/90 dark:hover:text-slate-50',
            'positive' => 'border border-positive-500 bg-white text-positive-500 hover:text-slate-50 hover:bg-positive-500/90 hover:border-positive-600 dark:border-positive-900 dark:bg-positive-900 dark:hover:bg-positive-900/90 dark:hover:text-slate-50',
            'info' => 'border border-info-500 bg-white hover:text-slate-50 text-info-500 hover:bg-info-500/90 hover:border-info-600 dark:border-info-900 dark:bg-info-900 dark:hover:bg-info-900/90 dark:hover:text-slate-50',
        ];
    }

    /**
     * @return string[]
     */
    private function ghostVariantClasses(): array
    {
        return [
            'primary' => 'hover:bg-slate-100 hover:text-slate-900 dark:hover:bg-slate-800 dark:hover:text-slate-50',
            'secondary' => 'hover:bg-secondary-100 hover:text-secondary-900 dark:hover:bg-secondary-800 dark:hover:text-slate-50',
            'danger' => 'hover:bg-danger-100 hover:text-danger-900 dark:hover:bg-danger-900 dark:hover:text-slate-50',
            'warning' => 'hover:bg-warning-100 hover:text-warning-900 dark:hover:bg-warning-900 dark:hover:text-slate-50',
            'positive' => 'hover:bg-positive-100 hover:text-positive-900 dark:hover:bg-positive-900 dark:hover:text-slate-50',
            'info' => 'hover:bg-info-100 hover:text-info-900 dark:hover:bg-info-900 dark:hover:text-slate-50',
        ];
    }

    /**
     * @return string[]
     */
    private function linkVariantClasses(): array
    {
        return [
            'primary' => 'text-primary-900 underline-offset-4 hover:underline dark:text-primary-50',
            'secondary' => 'text-secondary-500 underline-offset-4 hover:text-secondary-900 dark:text-secondary-900 dark:hover:text-slate-50',
            'danger' => 'text-danger-500 underline-offset-4 hover:text-danger-900 dark:text-danger-900 dark:hover:text-slate-50',
            'warning' => 'text-warning-500 underline-offset-4 hover:text-warning-900 dark:text-warning-900 dark:hover:text-slate-50',
            'positive' => 'text-positive-500 underline-offset-4 hover:text-positive-900 dark:text-positive-900 dark:hover:text-slate-50',
            'info' => 'text-info-500 underline-offset-4 hover:text-info-900 dark:text-info-900 dark:hover:text-slate-50',
        ];
    }
}