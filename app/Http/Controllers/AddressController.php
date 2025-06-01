<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddressController extends Controller
{
    // ... other methods ...

    public function getLgas($state)
    {
        $stateLgaMap = config('address.state_lga_map', []);
        
        if (!array_key_exists($state, $stateLgaMap)) {
            return response()->json(['error' => 'State not found'], 404);
        }

        return response()->json([
            'lgas' => $stateLgaMap[$state]
        ]);
    }

    public function getPopularAddresses($lga)
    {
        $lgaAddressMap = config('address.lga_address_map', []);
        
        $addresses = $lgaAddressMap[$lga] ?? [
            "Main Market",
            "Local Government Secretariat",
            "Central Mosque",
            "Main Bus Stop",
            "General Hospital"
        ];

        return response()->json([
            'addresses' => $addresses
        ]);
    }
}