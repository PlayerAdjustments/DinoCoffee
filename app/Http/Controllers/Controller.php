<?php

namespace App\Http\Controllers;

use App\Enums\ActionMethods;
use App\Enums\ControllerNames;
use App\Enums\NotificationMethods;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

abstract class Controller
{

    /**
     * Generate a popup message based on the provided enum and entity name.
     * @param ControllerNames $controllerName
     * @param ActionMethods $method
     * @param string $actionItem
     * @return string
     */
    public function actionMessages(ControllerNames $controllerName, $actionItem, ActionMethods $method): string
    {
        return $controllerName->value . $actionItem . $method->value;
    }

    /**
     * Generate and send a notification to all the users with the Developer Role based on the provided information.
     * @param ControllerNames $ControllerName
     * @param NotificationMethod $Method
     * @param string $NotificationItem
     * @return string
     */
    public function NotifyDevelopers(ControllerNames $controllerName, $notificationItem, NotificationMethods $method): void
    {
        foreach (User::whereIn('role', ['DEV'])->pluck('matricula') as $m) {
            Notification::create([
                'user_matricula' => $m,
                'subject' => $method->getSubject($controllerName, $notificationItem),
                'body' => $method->getBody(),
                'icon' => $method->getIcon(),
                'created_by' => Auth::user()->matricula
            ]);
        }
    }
}
