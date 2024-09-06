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
     * @param ControllerNames $ControllerName
     * @param ActionMethods $Method
     * @param string $NotificationItem
     * @return string
     */
    public function ActionMessages(ControllerNames $ControllerName,$NotificationItem, ActionMethods $Method) : string
    {
        return $ControllerName->value.$NotificationItem.$Method->value;
    }

    /**
     * Generate and send a notification to all the users with the Developer Role based on the provided information.
     * @param ControllerNames $ControllerName
     * @param NotificationMethod $Method
     * @param string $NotificationItem
     * @return string
     */
    public function NotifyDevelopers(ControllerNames $ControllerName, $NotificationItem, NotificationMethods $Method) : void 
    {
        foreach (User::whereIn('role', ['DEV'])->pluck('matricula') as $m) {
            Notification::create([
                'user_matricula' => $m,
                'subject' => $Method->getSubject($ControllerName, $NotificationItem),
                'body' => $Method->getBody(),
                'icon' => $Method->getIcon(),
                'created_by' => Auth::user()->matricula
            ]);
        }
    }
}
