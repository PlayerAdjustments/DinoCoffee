<?php

namespace App\Enums;

enum ControllerNames: string
{
  case User = 'User ';
  case Career = 'Career ';
  case CareerCode = 'CareerCode ';
  case Subject = 'Subject ';
  case Generation = 'Generation ';
  case School = 'School ';
  case StudyPlan = 'StudyPlan ';
  case Midterm = 'Midterm';
  
  /**
   * Get translation for Notifications
   * @return string
   */
  public function getTranslation(): string
  {
    return match ($this) {
      self::User => 'Usuario ',
      self::Career => 'Carrera ',
      self::CareerCode => 'Código de una carrera ',
      self::Subject => 'Materia ',
      self::Generation => 'Generación ',
      self::School => 'Escuela ',
      self::StudyPlan => 'Plan de estudio ',
      self::Midterm => 'Parcial',
    };
  }
}
