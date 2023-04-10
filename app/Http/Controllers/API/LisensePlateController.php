<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\LisensePlate;
use Illuminate\Http\Request;

class LisensePlateController extends BaseController
{
    public function VehicaleInOut(Request $request)
    {
        $input = $request->all();
        $today = date('Y-m-d h:i:s');
        $model = new LisensePlate();
        if ($input['type'] == 2) {
            
            $checkValidVehicle = LisensePlate::where('plate_number', $input['plate_number'])->where('type', '1')->first();

            if(!$checkValidVehicle) {
                return $this->sendError('Unauthorised.', ['error'=>'Please provide valid lisense plate number']);
            } else {
                $checkValidVehicle->out_time = $today;
                $checkValidVehicle->type = 2;
                $checkValidVehicle->updated_by = auth()->id();
                $checkValidVehicle->save();
                return $this->sendResponse($checkValidVehicle, 'Vehicale Out.');
                
            }
        } else if($input['type'] == 1){
            $model->plate_number = $input['plate_number'];
            $model->in_time = $today;
            $model->created_by = auth()->id();
            $model->save();
            return $this->sendResponse($model, 'Vehicale Entered.');
        } else {
            return $this->sendError('Unauthorised.', ['error'=>'Please provide valid type']);
        }
    }
}
