<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Career\StoreCareerRequest;
use App\Http\Requests\Career\UpdateCareerRequest;
use App\Models\Career;
use App\Models\CareerCode;
use App\Models\Notification;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $careers = Career::query();

        if($request->has('simple-search')){
            $input = $request->input('simple-search');
            $careers->whereAny([
                'abbreviation',
                'name',
                'coordinador_matricula',
                'school_abbreviation'
            ], 'like', $input.'%');
        }

        if ($request->has('hiddenCareerDeactivated') && $request->input('hiddenCareerDeactivated') == 1) $careers->onlyTrashed();

        $careers = $careers->orderBy('school_abbreviation')->paginate(
            $request->has('perpage') ? $request->input('perpage') : 10, 
            ['abbreviation','name','coordinador_matricula','school_abbreviation','color','deleted_at']
            )->withQueryString();

        return view('Pages.Developer.Career.list', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schools = School::query()->get(['abbreviation','name','director_matricula']);
        $candidates = User::whereIn('role', ['COO'])->get();
        return view('Pages.Developer.Career.Create', compact('candidates','schools'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCareerRequest $request)
    {
        Career::create($request->validated());

        /**
         * Send email and create notification for the user.
         */
        // Mail::to(env('MAIL_FROM_ADDRESS'))->send(new UserCreatedMail(User::where('matricula',$request->validated('matricula'))->firstOrFail(), $request->validated('password')));
        
        foreach(User::whereIn('role',['DEV','ADM'])->pluck('matricula') as $m){
            Notification::create([
                'user_matricula' => $m,
                'subject' => '¡Han creado una carrera! ('.$request->validated('abbreviation').')',
                'body' => 'Recuerda configurar todos los detalles.',
                'icon' => 'Rexxi_cheer.gif',
                'created_by' => Auth::user()->matricula
            ]);
        }
        

        /**
         * Send user back to the correspondent list page
         */
        return redirect()->route('developer.careers.index')->with('Success', 'Career '.$request->validated('abbreviation').' has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Career $career)
    {
        $career_codesObj = CareerCode::where('career_abbreviation',$career->abbreviation)->get(['id','code','deleted_at']); 

        return view('Pages.Developer.Career.show', compact('career','career_codesObj'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Career $career)
    {
        $schools = School::query()->get(['abbreviation','name','director_matricula']);
        $candidates = User::whereIn('role', ['COO'])->get();

        return view('Pages.Developer.Career.edit', compact('career','candidates','schools'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCareerRequest $request, Career $career)
    {
        $career->update($request->validated());

        /**
         * Update career_codes joined value.
         */
        $career_codes = CareerCode::where('career_abbreviation',$career->abbreviation)->withTrashed()->get();
        foreach($career_codes as $code){
            CareerCode::where('joined',$code->joined)->update(['joined' => $code->career_abbreviation.'-'.$code->code]);
        }

        // Mail::to($request->validated('email'))->bcc(env('MAIL_FROM_ADDRESS'))->send(new UserUpdatedMail(User::where('matricula',$request->validated('matricula'))->firstOrFail(), $request->validated('password')));
        
        foreach(User::whereIn('role',['DEV','ADM'])->pluck('matricula') as $m){
            Notification::create([
                'user_matricula' => $m,
                'subject' => '¡Han actualizado una carrera ('.$career->abbreviation.')!',
                'body' => 'Corroboren la información, antes de realizar cualquier cambio.',
                'icon' => 'Seri_Glasses.png',
                'created_by' => Auth::user()->matricula
            ]);
        }

        return redirect()->route('developer.careers.show', $career)->with('Success', 'Career '.$career->abbreviation.' was updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Career $career)
    {
        // Mail::to($school->email)->bcc(env('MAIL_FROM_ADDRESS'))->send(new schoolDeletedMail(school::where('matricula',$school->matricula)->firstOrFail()));
        
        $career->delete();

        foreach(User::whereIn('role',['DEV','ADM'])->pluck('matricula') as $m){
            Notification::create([
                'user_matricula' => $m,
                'subject' => '¡Han desactivado una carrera ('.$career->abbreviation.')!',
                'body' => 'Corroboren la información, antes de realizar cualquier cambio.',
                'icon' => 'Seri_Confused.png',
                'created_by' => Auth::user()->matricula
            ]);
        }

        return redirect()->route('developer.careers.index')->with('Success','Career '.$career->abbreviation.' has been deleted.');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(Career $career)
    {
        $career->restore();

        // Mail::to($career->email)->bcc(env('MAIL_FROM_ADDRESS'))->send(new careerRestoredMail(career::where('matricula',$career->matricula)->firstOrFail(), null));

        foreach(User::whereIn('role',['DEV','ADM'])->pluck('matricula') as $m){
            Notification::create([
                'user_matricula' => $m,
                'subject' => '¡Han restaurado una careera ('.$career->abbreviation.')!',
                'body' => 'Corroboren la información, antes de realizar cualquier cambio.',
                'icon' => 'Seri_Glasses.png',
                'created_by' => Auth::user()->matricula
            ]);
        }

        return redirect()->route('developer.careers.index')->with('Success', 'Career '.$career->abbreviation.' has been restored');
    }
}
