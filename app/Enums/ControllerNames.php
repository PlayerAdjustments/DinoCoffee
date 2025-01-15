<?php

namespace App\Enums;

enum ControllerNames : string
{
    case User = 'User|Usuario';
    case Career = 'Career|Carrera';
    case CareerCode = 'CareerCode|Código de una carrera';
    case Subject = 'Subject|Materia';
    case Generation = 'Generation|Generación';
    case School = 'School|Escuela';
    case StudyPlan = 'StudyPlan|Plan de estudio';

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
