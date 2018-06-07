<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportController extends Controller
{
    public function index()
    {
        $response = new StreamedResponse(function() {
            // Open output stream
            $handle = fopen('php://output', 'w');

             // Get all users
            foreach (User::all() as $user) {
                // Add a new row with data
                fputcsv($handle, [
                    $user->id,
                    $user->name,
                    $user->email
                ]);
            }

            // Close the output stream
            fclose($handle);
        }, 200, [
                'Content-Type' => 'application/vnd.ms-excel',
                'Content-Disposition' => 'attachment; filename="file.xls"',
            ]
        );

        return $response;
    }
}
