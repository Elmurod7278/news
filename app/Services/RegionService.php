<?php


namespace App\Services;



use App\Models\Region;
use Illuminate\Http\Request;

class RegionService
{
    public function findRegion(Request $request)
    {


        $query=Region::orderBy('created_at','Desc');

        if (!empty($value = $request->get('name_uz'))) {
            $query->where('name_uz', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('name_oz'))) {
            $query->where('name_oz', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('name_ru'))) {
            $query->where('name_ru', $value);
        }
        return $query;
    }


}
