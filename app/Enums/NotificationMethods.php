<?php

namespace App\Enums;

enum NotificationMethods: string
{
  case Stored = 'stored_notification';
  case Destroyed = ' destroyed_notification';
  case Restored = ' restored_notification';
  case Updated = ' updated_notification';

  /**
   * Get the subject for the notification message.
   * @param ControllerNames $ControllerName
   * @param string $Item
   * 
   * @return string
   */
  public function getSubject(ControllerNames $ControllerName, $Item): string
  {
    $ControllerNameTranslated = trim(strtolower($ControllerName->getTranslation()));
    return match ($this) {
      self::Stored => "¡Han creado un/a nuevo/a {$ControllerNameTranslated}! ({$Item})",
      self::Destroyed => "¡Han eliminado un/a {$ControllerNameTranslated}! ({$Item})",
      self::Restored => "¡Han restaurado un/a {$ControllerNameTranslated}! ({$Item})",
      self::Updated => "¡Han actualizado un/a {$ControllerNameTranslated}! ({$Item})"
    };
  }

  /**
   * Get the body for the notification message.
   * 
   * @return string
   */
  public function getBody(): string
  {
    return match ($this) {
      self::Stored => 'El registro podrá ser utilizado a partir de ahora.',
      self::Destroyed => 'El registro no será visible desde este momento.',
      self::Restored => 'El registro será visible y utilizable a partir de ahora.',
      self::Updated => 'Se recomienda revisar por cambios inesperados en otras partes.'
    };
  }

  /**
   * Get the icon for the notification message.
   * @return NotificationIcons
   */
  public function getIcon(): NotificationIcons 
  {
    return match ($this) {
      self::Stored => NotificationIcons::RexxiCheer,
      self::Destroyed => NotificationIcons::SeriConfused,
      self::Restored => NotificationIcons::SeriReading,
      self::Updated => NotificationIcons::SeriGlasses,
    };
  }
}


