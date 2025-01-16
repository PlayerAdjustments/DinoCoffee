<?php

namespace App\Enums;

enum NotificationIcons: string
{
    /**
     * Common notification for action stuff.
     */
    case RexxiCheer = 'Rexxi_Cheer.gif';
    case SeriConfused = 'Seri_Confused.png';
    case SeriGlasses = 'Seri_Glasses.png';
    case SeriReading = 'Seri_Reading.png';

    /**
     * Notificatrion icons used for birthdays.
     */
    case CelebrateBrontiA = 'birthday/Celebrate_Bronti.gif';
    case CelebrateBrontiB = 'birthday/Celebrate_Bronti.png';
    case CelebrateRexxi = 'birthday/Celebrate_Rexxi.png';
    case CelebrateSeri = 'birthday/Celebrate_Seri.png';
    case CelebrateSteggi = 'birthday/Celebrate_Steggi.png';
    case CelebrateTeri = 'birthday/Celebrate_Teri.png';

    /**
     * Get al case names (i.e., the enum case identifiers).
     * @return array
     */
    public static function getCaseNames(): array
    {
        return array_map(fn($case) => $case->name, self::cases());
    }

    /**
     * Get all the possible icon file names.
     */
    public static function getIcons(): array
    {
        return array_map(fn($icon) => $icon->value, self::cases());
    }

    /**
     * Get the asset URL for the enum case.
     * @return string
     */
    public function getAsset(): string
    {
        $basePath = 'storage/notification_icons/';
        return asset($basePath . $this->value);
    }
}
