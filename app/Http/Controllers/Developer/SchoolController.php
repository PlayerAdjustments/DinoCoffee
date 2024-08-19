<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Http\Requests\School\StoreSchoolRequest;
use App\Http\Requests\School\UpdateSchoolRequest;
use App\Models\Notification;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $schools = School::query();

        if($request->has('simple-search')){
            $input = $request->input('simple-search');
            $schools->whereAny([
                'abbreviation',
                'name',
                'director_matricula'
            ], 'like', $input.'%');
        }

        if ($request->has('hiddenSchoolDeactivated') && $request->input('hiddenSchoolDeactivated') == 1) $schools->onlyTrashed();

        $schools = $schools->orderBy('id')->paginate(
            $request->has('perpage') ? $request->input('perpage') : 10, 
            ['abbreviation','name','director_matricula','color','deleted_at']
            )->withQueryString();

        return view('Pages.Developer.School.List.listSchools', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $candidates = User::whereIn('role', ['DIR'])->get();
        return view('Pages.Developer.School.Create.createSchool', compact('candidates','candidates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSchoolRequest $request)
    {
        School::create($request->validated());

        /**
         * Send email and create notification for the user.
         */
        // Mail::to(env('MAIL_FROM_ADDRESS'))->send(new UserCreatedMail(User::where('matricula',$request->validated('matricula'))->firstOrFail(), $request->validated('password')));
        
        foreach(User::whereIn('role',['DEV','ADM'])->pluck('matricula') as $m){
            Notification::create([
                'user_matricula' => $m,
                'subject' => '¡Han creado una escuela! ('.$request->validated('abbreviation').')',
                'body' => 'Recuerda configurar todos los detalles.',
                'icon' => 'Rexxi_cheer.gif',
                'created_by' => Auth::user()->matricula
            ]);
        }
        

        /**
         * Send user back to the correspondent list page
         */
        return redirect()->route('developer.schools.listSchools')->with('Success', 'School '.$request->validated('abbreviation').' has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        return view('Pages.Developer.School.Show.showSchool', compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        $candidates = User::whereIn('role', ['DIR'])->get();

        return view('Pages.Developer.School.Edit.editSchool', compact('school','candidates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSchoolRequest $request, School $school)
    {
        $school->update($request->validated());

        // Mail::to($request->validated('email'))->bcc(env('MAIL_FROM_ADDRESS'))->send(new UserUpdatedMail(User::where('matricula',$request->validated('matricula'))->firstOrFail(), $request->validated('password')));
        
        foreach(User::whereIn('role',['DEV','ADM'])->pluck('matricula') as $m){
            Notification::create([
                'user_matricula' => $m,
                'subject' => '¡Han actualizado una escuela ('.$school->abbreviation.')!',
                'body' => 'Corroboren la información, antes de realizar cualquier cambio.',
                'icon' => 'Seri_Glasses.png',
                'created_by' => Auth::user()->matricula
            ]);
        }

        return redirect()->route('developer.schools.show', $school)->with('Success', 'School '.$school->abbreviation.' was updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        // Mail::to($school->email)->bcc(env('MAIL_FROM_ADDRESS'))->send(new schoolDeletedMail(school::where('matricula',$school->matricula)->firstOrFail()));
        
        $school->delete();

        foreach(User::whereIn('role',['DEV','ADM'])->pluck('matricula') as $m){
            Notification::create([
                'user_matricula' => $m,
                'subject' => '¡Han desactivado una escuela ('.$school->abbreviation.')!',
                'body' => 'Corroboren la información, antes de realizar cualquier cambio.',
                'icon' => 'Seri_Confused.png',
                'created_by' => Auth::user()->matricula
            ]);
        }

        return redirect()->route('developer.schools.index')->with('Success','School '.$school->abbreviation.' has been deleted.');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(School $school){
        $school->restore();

        // Mail::to($school->email)->bcc(env('MAIL_FROM_ADDRESS'))->send(new schoolRestoredMail(school::where('matricula',$school->matricula)->firstOrFail(), null));

        foreach(User::whereIn('role',['DEV','ADM'])->pluck('matricula') as $m){
            Notification::create([
                'user_matricula' => $m,
                'subject' => '¡Han restaurado una escuela ('.$school->abbreviation.')!',
                'body' => 'Corroboren la información, antes de realizar cualquier cambio.',
                'icon' => 'Seri_Reading.png',
                'created_by' => Auth::user()->matricula
            ]);
        }

        return redirect()->route('developer.schools.index')->with('Success', 'School '.$school->abbreviation.' has been restored');
    }
}
