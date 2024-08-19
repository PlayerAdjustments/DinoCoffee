<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Generation\StoreGenerationRequest;
use App\Http\Requests\Generation\UpdateGenerationRequest;
use App\Models\Generation;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GenerationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $generations = Generation::query();

        if($request->has('simple-search')){
            $input = $request->input('simple-search');
            $generations->whereAny([
                'code',
            ], 'like', $input.'%');
        }

        if ($request->has('hiddenGenerationDeactivated') && $request->input('hiddenGenerationDeactivated') == 1) $generations->onlyTrashed();

        $generations = $generations->orderBy('id')->paginate(
            $request->has('perpage') ? $request->input('perpage') : 10, 
            ['code','start_date','end_date','deleted_at']
            )->withQueryString();

        return view('Pages.Developer.Generation.list', compact('generations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenerationRequest $request)
    {
        Generation::create($request->validated());

        /**
         * Send email and create notification for the user.
         */
        // Mail::to(env('MAIL_FROM_ADDRESS'))->send(new UserCreatedMail(User::where('matricula',$request->validated('matricula'))->firstOrFail(), $request->validated('password')));
        
        foreach(User::whereIn('role',['DEV','ADM'])->pluck('matricula') as $m){
            Notification::create([
                'user_matricula' => $m,
                'subject' => '¡Han creado una generación! ('.$request->validated('code').')',
                'body' => 'Recuerda configurar todos los detalles.',
                'icon' => 'Rexxi_cheer.gif',
                'created_by' => Auth::user()->matricula
            ]);
        }
        
        /**
         * Send user back to the correspondent list page
         */
        return redirect()->route('developer.generations.index')->with('Success', 'Generation '.$request->validated('code').' has been created.');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGenerationRequest $request, Generation $generation)
    {
        $generation->update($request->validated());

        // Mail::to($request->validated('email'))->bcc(env('MAIL_FROM_ADDRESS'))->send(new UserUpdatedMail(User::where('matricula',$request->validated('matricula'))->firstOrFail(), $request->validated('password')));
        
        foreach(User::whereIn('role',['DEV','ADM'])->pluck('matricula') as $m){
            Notification::create([
                'user_matricula' => $m,
                'subject' => '¡Han actualizado una generación ('.$generation->code.')!',
                'body' => 'Corroboren la información, antes de realizar cualquier cambio.',
                'icon' => 'Seri_Glasses.png',
                'created_by' => Auth::user()->matricula
            ]);
        }

        return redirect()->route('developer.generations.index', $generation)->with('Success', 'Generation '.$generation->code.' was updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Generation $generation)
    {
        // Mail::to($school->email)->bcc(env('MAIL_FROM_ADDRESS'))->send(new schoolDeletedMail(school::where('matricula',$school->matricula)->firstOrFail()));
        
        $generation->delete();

        foreach(User::whereIn('role',['DEV','ADM'])->pluck('matricula') as $m){
            Notification::create([
                'user_matricula' => $m,
                'subject' => '¡Han desactivado una generación ('.$generation->code.')!',
                'body' => 'Corroboren la información, antes de realizar cualquier cambio.',
                'icon' => 'Seri_Confused.png',
                'created_by' => Auth::user()->matricula
            ]);
        }

        return redirect()->route('developer.generations.index')->with('Success','Generation '.$generation->code.' has been deleted.');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(Generation $generation)
    {
        $generation->restore();

        foreach(User::whereIn('role',['DEV','ADM'])->pluck('matricula') as $m){
            Notification::create([
                'user_matricula' => $m,
                'subject' => '¡Han restaurado una generación ('.$generation->code.')!',
                'body' => 'Corroboren la información, antes de realizar cualquier cambio.',
                'icon' => 'Seri_Reading.png',
                'created_by' => Auth::user()->matricula
            ]);
        }

        return redirect()->route('developer.generations.index')->with('Success', 'Generation '.$generation->code.' has been restored');
    }
}
