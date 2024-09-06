<?php

namespace App\Enums;


enum NotificationIcons: string
{
  /**
   * Common notification for action stuff
   */
  case RexxiCheer = 'Rexxi_cheer.gif';
  case SeriConfused = 'Seri_confused.png';
  case SeriGlasses = 'Seri_glasses.png';
  case SeriReading = 'Seri_reading.png';
  /**
   * Notification icons used for birthdays
   */
  case CelebrateBrontiA = 'Celebrate_Bronti.gif';
  case CelebrateBrontiB = 'Celebrate_Bronti.png';
  case CelebrateRexxi = 'Celebrate_Rexxi.png';
  case CelebrateSeri = 'Celebrate_Seri.png';
  case CelebrateSteggi = 'Celebrate_Steggi.png';
  case CelebrateTeri = 'Celebrate_Teri.png';


  /**
   * Get the asset URL for the enum case.
   * 
   * @return string
   */ 
  public function getAsset(): string
  {
    $mainPath = 'storage/Notification_Icons/';
    $birthdayPath = $mainPath.'Birthday/';

    return match ($this)
    {
      self::RexxiCheer => asset($mainPath.'Rexxi_cheer.gif'),
      self::SeriConfused => asset($mainPath.'Seri_Confused.png'),
      self::SeriGlasses => asset($mainPath.'Seri_Glasses.png'),
      self::SeriReading => asset($mainPath.'Seri_Reading.png'),

      self::CelebrateBrontiA => asset($birthdayPath.'Celebrate_Bronti.gif'),
      self::CelebrateBrontiB => asset($birthdayPath.'Celebrate_Bronti.png'),
      self::CelebrateRexxi => asset($birthdayPath.'Celebrate_Rexxi.png'),
      self::CelebrateSeri => asset($birthdayPath.'Celebrate_Seri.png'),
      self::CelebrateSteggi => asset($birthdayPath.'Celebrate_Steggi.png'),
      self::CelebrateTeri => asset($birthdayPath.'Celebrate_Teri.png'),
    };
  }
}
