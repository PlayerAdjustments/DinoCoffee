<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait UserQueryTrait
{
    protected function applyFilters(Builder $query, Request $request, array $additionalConditions = [])
    {
        if ($request->has('simple-search')) {
            $input = $request->input('simple-search');
            $query->whereAny([
                'matricula',
                'email',
                'phone_number',
                'name',
                'first_lastname',
                'second_lastname'
            ], 'like', $input . '%');
        }

        if ($request->has('hiddenSexMale') && $request->input('hiddenSexMale') == 1) {
            $query->where('sex', 'M');
        }

        if ($request->has('hiddenSexFemale') && $request->input('hiddenSexFemale') == 1) {
            $query->where('sex', 'F');
        }

        if ($request->has('hiddenUserDeactivated') && $request->input('hiddenUserDeactivated') == 1) {
            $query->onlyTrashed();
        }

        foreach ($additionalConditions as $condition) {
            $condition($query, $request);
        }

        return $query->orderBy('id')->paginate(
            $request->has('perpage') ? $request->input('perpage') : 10,
            ['avatar', 'name', 'role', 'first_lastname', 'second_lastname', 'matricula', 'email', 'phone_number', 'sex', 'cedula_profesional', 'deleted_at']
        )->withQueryString();

    }
}
