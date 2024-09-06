<?php

namespace App\Enums;

enum ActionMethods: string
{
  case Stored = ' has been created';
  case Destroyed = ' has been deactivated';
  case Restored = ' has been restored';
  case Updated = ' has been updated';
}
