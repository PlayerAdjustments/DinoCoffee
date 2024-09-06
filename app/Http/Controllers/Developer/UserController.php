<?php

namespace App\Http\Controllers\Developer;

use App\Enums\ControllerNames;
use App\Enums\ActionMethods;
use App\Enums\NotificationMethods;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Mail\User\UserCreatedMail;
use App\Mail\User\UserDeletedMail;
use App\Mail\User\UserRestoredMail;
use App\Mail\User\UserUpdatedMail;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function listStudents(Request $request)
    {
        $users = User::query()->where('role', '=', 'ALU');

        if ($request->has('simple-search')) {
            $input = $request->input('simple-search');
            $users->whereAny([
                'matricula',
                'email',
                'phone_number',
                'name',
                'first_lastname',
                'second_lastname'
            ], 'like', $input . '%');
        }

        if ($request->has('hiddenSexMale') && $request->input('hiddenSexMale') == 1) $users->where('sex', 'M');

        if ($request->has('hiddenSexFemale') && $request->input('hiddenSexFemale') == 1) $users->where('sex', 'F');

        if ($request->has('hiddenUserDeactivated') && $request->input('hiddenUserDeactivated') == 1) $users->onlyTrashed();

        $users = $users->orderBy('id')->paginate(
            $request->has('perpage') ? $request->input('perpage') : 10,
            ['avatar', 'name', 'role', 'first_lastname', 'second_lastname', 'matricula', 'email', 'phone_number', 'sex', 'deleted_at']
        )->withQueryString();

        return view('Pages.Developer.Users.List.listStudents', compact('users'));
    }

    public function listEmployees(Request $request)
    {
        $users = User::query()->where('role', '!=', 'ALU');

        if ($request->has('simple-search')) {
            $input = $request->input('simple-search');
            $users->whereAny([
                'matricula',
                'email',
                'cedula_profesional',
                'phone_number',
                'name',
                'first_lastname',
                'second_lastname'
            ], 'like', $input . '%');
        }

        if ($request->has('hiddenSexMale') && $request->input('hiddenSexMale') == 1) $users->where('sex', 'M');
        if ($request->has('hiddenSexFemale') && $request->input('hiddenSexFemale') == 1) $users->where('sex', 'F');
        if ($request->has('hiddenUserDeactivated') && $request->input('hiddenUserDeactivated') == 1) $users->onlyTrashed();

        $searchRoles = [];

        if ($request->has('hiddenRoleDeveloper') && $request->input('hiddenRoleDeveloper') == 1) array_push($searchRoles, 'DEV');
        if ($request->has('hiddenRoleAdministrativo') && $request->input('hiddenRoleAdministrativo') == 1) array_push($searchRoles, 'ADM');
        if ($request->has('hiddenRoleDirector') && $request->input('hiddenRoleDirector') == 1) array_push($searchRoles, 'DIR');
        if ($request->has('hiddenRoleCoordinador') && $request->input('hiddenRoleCoordinador') == 1) array_push($searchRoles, 'COO');
        if ($request->has('hiddenRoleDocente') && $request->input('hiddenRoleDocente') == 1) array_push($searchRoles, 'DOC');

        if (!empty($searchRoles)) $users->whereIn('role', $searchRoles);

        $users = $users->orderBy('id')->paginate(
            $request->has('perpage') ? $request->input('perpage') : 10,
            ['avatar', 'name', 'role', 'first_lastname', 'second_lastname', 'matricula', 'cedula_profesional', 'email', 'phone_number', 'sex', 'deleted_at']
        )->withQueryString();

        return view('Pages.Developer.Users.List.listEmployees', compact('users'));
    }

    public function storeUser(StoreUserRequest $request): RedirectResponse
    {

        User::create($request->validated());

        /**
         * Send email and create notification for the user.
         */
        Mail::to($request->validated('email'))->bcc(env('MAIL_FROM_ADDRESS'))->send(new UserCreatedMail(User::where('matricula', $request->validated('matricula'))->firstOrFail(), $request->validated('password')));

        Notification::create([
            'user_matricula' => $request->validated('matricula'),
            'subject' => '¡Bienvenido al sistema oyentes!',
            'body' => 'se te ha registrado en este sistema. ¡Consulta con tu coordinador por detalles!',
            'icon' => 'Rexxi_cheer.gif',
            'created_by' => Auth::user()->matricula
        ]);

        $this->NotifyDevelopers(ControllerNames::User, $request->validated('matricula'), NotificationMethods::Stored);

        /**
         * Send user back to the correspondent list page
         */
        if ($request->validated('role') == 'ALU') return redirect()->route('developer.users.listStudents')->with('Success', $this->ActionMessages(ControllerNames::User, $request->validated('matricula'), ActionMethods::Stored));

        if (in_array($request->validated('role'), ['DEV', 'ADM', 'DIR', 'COO', 'DOC'])) return redirect()->route('developer.users.listEmployees')->with('Success', $this->ActionMessages(ControllerNames::User, $request->validated('matricula'), ActionMethods::Stored));
    }

    public function createStudent()
    {
        return view('Pages.Developer.Users.Create.createStudent');
    }

    public function createEmployee()
    {
        return view('Pages.Developer.Users.Create.createEmployee');
    }

    public function showUser(User $user)
    {
        return view('Pages.Developer.Users.Show.showUser', compact('user'));
    }

    public function updateUser(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());

        Mail::to($request->validated('email'))->bcc(env('MAIL_FROM_ADDRESS'))->send(new UserUpdatedMail(User::where('matricula', $request->validated('matricula'))->firstOrFail(), $request->validated('password')));

        Notification::create([
            'user_matricula' => $request->validated('matricula'),
            'subject' => '¡Hemos actualizado tu cuenta!',
            'body' => 'Modificaciones fueron realizadas, recuerda revisar tu correo para obtener las credenciales de acceso.',
            'icon' => 'Seri_Glasses.png',
            'created_by' => Auth::user()->matricula
        ]);

        $this->NotifyDevelopers(ControllerNames::User, $user->matricula, NotificationMethods::Updated);


        return redirect()->route('developer.users.show', $user)->with('Success', $this->ActionMessages(ControllerNames::User, $user->matricula, ActionMethods::Updated));
    }

    public function editUser(User $user)
    {
        return view('Pages.Developer.Users.Edit.editUser', compact('user'));
    }

    public function deleteUser(User $user)
    {
        Mail::to($user->email)->bcc(env('MAIL_FROM_ADDRESS'))->send(new UserDeletedMail(User::where('matricula', $user->matricula)->firstOrFail()));

        $this->NotifyDevelopers(ControllerNames::User, $user->matricula, NotificationMethods::Destroyed);

        $user->delete();

        if ($user->role == 'ALU') return redirect()->route('developer.users.listStudents')->with('Success', $this->ActionMessages(ControllerNames::User, $user->matricula, ActionMethods::Destroyed));
        if (in_array($user->role, ['DEV', 'ADM', 'DIR', 'COO', 'DOC'])) return redirect()->route('developer.users.listEmployees')->with('Success', $this->ActionMessages(ControllerNames::User, $user->matricula, ActionMethods::Destroyed));
    }

    public function restoreUser(User $user)
    {
        $user->restore();

        Mail::to($user->email)->bcc(env('MAIL_FROM_ADDRESS'))->send(new UserRestoredMail(User::where('matricula', $user->matricula)->firstOrFail(), null));

        Notification::create([
            'user_matricula' => $user->matricula,
            'subject' => '¡Bienvenido nuevamente!',
            'body' => 'Han restablecido tu cuenta, contacta a tu coordinador por detalles.',
            'icon' => 'Seri_Reading.png',
            'created_by' => Auth::user()->matricula
        ]);

        $this->NotifyDevelopers(ControllerNames::User, $user->matricula, NotificationMethods::Restored);

        if ($user->role == 'ALU') return redirect()->route('developer.users.listStudents')->with('Success', $this->ActionMessages(ControllerNames::User, $user->matricula, ActionMethods::Restored));
        if (in_array($user->role, ['DEV', 'ADM', 'DIR', 'COO', 'DOC'])) return redirect()->route('developer.users.listEmployees')->with('Success', $this->ActionMessages(ControllerNames::User, $user->matricula, ActionMethods::Restored));
    }
}
