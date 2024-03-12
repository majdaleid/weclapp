<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WeclappService;

class WeclappController extends Controller
{
    public function updateContract(WeclappService $weclapp, $entityId)
    {
        // Fetch the existing contract
        $contract = $weclapp->getContract($entityId);

        // Update the description
        $contract['description'] = 'Majd Aleid';

        // Send the updated contract back
        $updatedContract = $weclapp->updateContract($entityId, $contract);

        return response()->json($updatedContract);
    }
}
