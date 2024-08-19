<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CareerCode\StoreCareerCodeRequest;
use App\Http\Requests\CareerCode\UpdateCareerCodeRequest;
use App\Models\CareerCode;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CareerCodeController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCareerCodeRequest $request)
    {
        CareerCode::create($request->validated());

        /**
         * Send email and create notification for the user.
         */
        // Mail::to(env('MAIL_FROM_ADDRESS'))->send(new UserCreatedMail(User::where('matricula',$request->validated('matricula'))->firstOrFail(), $request->validated('password')));
        
        foreach(User::whereIn('role',['DEV','ADM'])->pluck('matricula') as $m){
            Notification::create([
                'user_matricula' => $m,
                'subject' => '¡Han creado un código para una carrera! ('.$request->validated('joined').')',
                'body' => 'Recuerda configurar todos los detalles.',
                'icon' => 'Rexxi_cheer.gif',
                'created_by' => Auth::user()->matricula
            ]);
        }
        
        /**
         * Send user back to the correspondent list page
         */
        return redirect()->route('developer.careers.show', $request->validated('career_abbreviation'))->with('Success', 'CareerCode '.$request->validated('joined').' has been created.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCareerCodeRequest $request, CareerCode $careercode)
    {
        $careercode->update($request->validated());

        // Mail::to($request->validated('email'))->bcc(env('MAIL_FROM_ADDRESS'))->send(new UserUpdatedMail(User::where('matricula',$request->validated('matricula'))->firstOrFail(), $request->validated('password')));
        
        foreach(User::whereIn('role',['DEV','ADM'])->pluck('matricula') as $m){
            Notification::create([
                'user_matricula' => $m,
                'subject' => '¡Han actualizado el código una carrera ('.$careercode->joined.')!',
                'body' => 'Corroboren la información, antes de realizar cualquier cambio.',
                'icon' => 'Seri_Glasses.png',
                'created_by' => Auth::user()->matricula
            ]);
        }

        return redirect()->route('developer.careers.show', $careercode->career_abbreviation)->with('Success', 'CareerCode '.$careercode->joined.' was updated.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CareerCode $careercode)
    {
        // Mail::to($school->email)->bcc(env('MAIL_FROM_ADDRESS'))->send(new schoolDeletedMail(school::where('matricula',$school->matricula)->firstOrFail()));
        
        $careercode->delete();

        foreach(User::whereIn('role',['DEV','ADM'])->pluck('matricula') as $m){
            Notification::create([
                'user_matricula' => $m,
                'subject' => '¡Han desactivado el código de una carrera ('.$careercode->joined.')!',
                'body' => 'Corroboren la información, antes de realizar cualquier cambio.',
                'icon' => 'Seri_Confused.png',
                'created_by' => Auth::user()->matricula
            ]);
        }
        return redirect()->route('developer.careers.show',$careercode->career_abbreviation)->with('Success','CareerCode '.$careercode->joined.' has been deleted.');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(CareerCode $careercode)
    {
        $careercode->restore();

        // Mail::to($school->email)->bcc(env('MAIL_FROM_ADDRESS'))->send(new schoolRestoredMail(school::where('matricula',$school->matricula)->firstOrFail(), null));

        foreach(User::whereIn('role',['DEV','ADM'])->pluck('matricula') as $m){
            Notification::create([
                'user_matricula' => $m,
                'subject' => '¡Han restaurado el código de una escuela ('.$careercode->joined.')!',
                'body' => 'Corroboren la información, antes de realizar cualquier cambio.',
                'icon' => 'Seri_Reading.png',
                'created_by' => Auth::user()->matricula
            ]);
        }

        return redirect()->route('developer.careers.show',$careercode->career_abbreviation)->with('Success', 'CareerCode '.$careercode->joined.' has been restored');
    }
}
