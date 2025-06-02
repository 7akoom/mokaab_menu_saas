<?php

namespace App\Enums\Company;

enum ThemeEnum: string
{
    case Classic = 'كلاسيكي';
        // case Modern = 'حديث';
    case Minimal = 'بسيط';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function toSlug(self $theme): string
    {
        return match ($theme) {
            self::Classic => 'classic',
            // self::Modern => 'modern',
            self::Minimal => 'minimal',
        };
    }
}
