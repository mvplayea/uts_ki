<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Visit;
use App\Helpers\EncryptionHelper;

class VisitController extends Controller
{
    public function index(Request $request)
    {
        $patient = $request->get('authenticated_patient'); 
        $visit = Visit::where('patient_id', $patient->id)
        ->with(['patient', 'doctor', 'medicalRecords'])
        ->get();

        $responseData = [
            'message' => 'Success',
            'data' => $visit,
        ];

        $encryptedResponse = EncryptionHelper::encrypt(json_encode($responseData));

        return response()->json(['data' => $encryptedResponse]);
    }
}
