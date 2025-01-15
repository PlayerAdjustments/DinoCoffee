<?php

namespace App\Enums;

enum NotificationMethods: string
{
    case Stored = 'stored_notification';
    case Destroyed = 'destroyed_notification';
    case Restored = 'restored_notification';
    case Updated = 'updated_notification';

    /**
     * Get the subject for the notification message.
     * @param ControllerNames $controllerName
     * @param string $item
     * @return string
     */
    public function getSubject(ControllerNames $controllerName, $item): string
    {
        $controllerNameTranslated = trim(strtolower($controllerName->getTranslation()));

        return match ($this) {
            self::Stored => "¡Han creado un/a nuevo/a {$controllerNameTranslated}! ({$item})",
            self::Destroyed => "¡Han eliminado un/a {$controllerNameTranslated}! ({$item})",
            self::Restored => "¡Han restaurado un/a {$controllerNameTranslated}! ({$item})",
            self::Updated => "¡Han actualizado un/a {$controllerNameTranslated}! ({$item})"
        };
    }

    /**
     * Get the body for the notification message.
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
