<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $username = $request->get('username');
        $phone = $request->get('phone');
        $name = $request->get('name');
        $type = $request->get('type');
        $model = $request->get('model');
        $color = $request->get('color');
        $plateFirstNumber = $request->get('plateFirstNumber');
        $plateSecondNumber = $request->get('plateSecondNumber');
        $currentKM = $request->get('currentKM');
        $nextKM = $request->get('nextKM');
        $dateOfChanges = $request->get('dateOfChanges');

        if (!$username || !$phone || !$name || !$type || !$model || !$color
            || !$plateFirstNumber || !$plateSecondNumber || !$currentKM
            || !$nextKM || !$dateOfChanges) {
            return response()->json([
                'statusCode' => 0,
                'message' => 'missing data'
            ]);
        }

        $service = new Service();
        $service->username = $username;
        $service->phone = $phone;
        $service->name = $name;
        $service->type = $type;
        $service->model = $model;
        $service->color = $color;
        $service->plateFirstNumber = $plateFirstNumber;
        $service->plateSecondNumber = $plateSecondNumber;
        $service->currentKM = $currentKM;
        $service->nextKM = $nextKM;
        $service->dateOfChanges = $dateOfChanges;

        if ($service->save()) {
            return response()->json([
                'statusCode' => 1,
                'message' => 'mission complete'
            ]);
        }
        return response()->json([
            'statusCode' => 0,
            'message' => 'something wrong!'
        ]);
    }

    public function search(Request $request)
    {

        $firstNumber = $request->get('firstNumber');
        $secondNumber = $request->get('secondNumber');

        if (!$firstNumber || !$secondNumber) {
            return response()->json([
                'statusCode' => -1,
                'message' => 'missing data'
            ]);
        }

        $service = Service::where([
            ['plateFirstNumber', '=', $firstNumber],
            ['plateSecondNumber', '=', $secondNumber]
        ])->get()->last();

        if (!$service) {
//            return response()->json([
//                'statusCode' => 0,
//                'message' => 'data not found'
//            ]);
            $service=new Service();
            $service->plateFirstNumber=$firstNumber;
            $service->plateSecondNumber=$secondNumber;
            return view('search', ['service' => $service]);
        }
        return view('search', ['service' => $service]);
//        return response()->json([
//            'statusCode' => 1,
//            'message'=> 'data found',
//            'data' => $service
//        ]);
    }

    public function find(Request $request)
    {

        $firstNumber = $request->get('firstNumber');
        $secondNumber = $request->get('secondNumber');

        if (!$firstNumber || !$secondNumber) {
            return response()->json([
                'statusCode' => -1,
                'message' => 'missing data'
            ]);
        }

        $service = Service::where([
            ['plateFirstNumber', '=', $firstNumber],
            ['plateSecondNumber', '=', $secondNumber]
        ])->get()->last();

        if (!$service) {
            return response()->json([
                'statusCode' => 0,
                'message' => 'data not found'
            ]);
        }
        return response()->json([
            'statusCode' => 1,
            'message'=> 'data found',
            'data' => $service
        ]);
    }
}
