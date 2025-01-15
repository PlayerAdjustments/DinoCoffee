<?php

namespace App\Enums;

enum NotificationIcons: string
{
    /**
     * Common notification for action stuff.
     */
    case RexxiCheer = 'Rexxi_cheer.gif';
    case SeriConfused = 'Seri_confused.png';
    case SeriGlasses = 'Seri_glasses.png';
    case SeriReading = 'Seri_reading.png';

    /**
     * Notificatrion icons used for birthdays.
     */
    case CelebrateBrontiA = 'Birthday/Celebrate_Bronti.gif';
    case CelebrateBrontiB = 'Birthday/Celebrate_Bronti.png';
    case CelebrateRexxi = 'Birthday/Celebrate_Rexxi.png';
    case CelebrateSeri = 'Birthday/Celebrate_Seri.png';
    case CelebrateSteggi = 'Birthday/Celebrate_Steggi.png';
    case CelebrateTeri = 'Birthday/Celebrate_Teri.png';

    /**
     * Get the asset URL for the enum case.
     * @return string
     */
    public function getAsset(): string
    {
        $basePath = 'notification_Icons/';
        return asset($basePath . $this->value);
    }
}
