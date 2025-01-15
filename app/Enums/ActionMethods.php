<?php

namespace App\Enums;

enum ActionMethods: string
{
    case Stored = ' has been created| ha sido creado';
    case Destroyed = ' has been deactivated| ha sido desactivado';
    case Restored = ' has been restored| ha sido restaurado';
    case Updated = ' has been updated| ha sido actualizado';

    /**
     * Get the controller name.
     * @return string
     */
    public function getName(): string
    {
        return explode('|', $this->value)[0];
    }

    /**
     * Get the translation for Notifications.
     * @return string
     */
    public function getTranslation(): string
    {
        return explode('|', $this->value)[1];
    }
}
