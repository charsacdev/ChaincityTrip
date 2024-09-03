<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Aws\LocationService\LocationServiceClient;

class SpecialActivities extends Controller{

    #client logout
    public function logoutClient(Request $request){
        Auth::guard('web')->logout();
        return redirect('login')->with('error', 'Dont worry you can always login again...');;
    
    }

    #admin logout
    public function logoutAdmin(Request $request){
        Auth::guard('admin')->logout();
        return redirect('/admin/login')->with('error', 'Dont worry you can always login again...');;
    
    }

    #upload file to amazon test
    public function uploadfile(Request $request){
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            Storage::disk('profile_photo')->put($fileName, file_get_contents($file));

            // Optionally, you can generate a public URL for the uploaded file.
            $fileUrl = Storage::disk('profile_photo')->url($fileName);

            // You can store the URL or perform additional actions as needed.
            
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'File upload failed.');
        }
    }

    #Amazon services autosearch
    public function autoComplete(Request $request){
        try{
            $queryText = $request->input('query');
            $maxResults = 5;
    
            $locationService = new LocationServiceClient([
                'region' => 'eu-north-1',
                'version' => '2020-11-19',
                'http'    => [
                    'verify' => false
                ]
            ]);
    
            $results = $locationService->searchPlaceIndexForText([
                'key'=>'v1.public.eyJqdGkiOiJiMmE3ZDcxMy00NDg2LTRkNzUtYjRmMS00MzRmNzhjYmM2YTkifQroya7hTGf6EY-4ZlmxnEZdSzP-btgmlorEY-2clVzpd9CZyp_iCFTSgn47mrKzHDihcEgnG6ygwE7zP45nxrJ3pOoN9HzWyvUtUQitmo4Lk95y7EOrcxhU8o_DHUx44HWgMEXudy4kBA0-Yt-Rj89rOKGwMGQ-nyXRDu4aZjXQbAPDy_w0Z77HczA5SR60ANkMkm4fwWrXRpG5JcOqx2b-70UDaBUePRzykzQf-A_bmj_KP5Uzdx9B-awHXvRxqAHtv5PFedmolfhPyEHWCYCxhNKm6G1920uBVXzqezk4U3rlT_Wrh7324BtRKk11flbCdONRAXG6ksqIM77pPAM.N2IyNTQ2ODQtOWE1YS00MmI2LTkyOTItMGJlNGMxODU1Mzc2',
                'IndexName' => 'chaincity-location-index',
                'Text' => $queryText,
                'MaxResults' => $maxResults,
       
            ]);
            #echo $results->get('Results');
            return response()->json($results->get('Results'));
        }
        catch(\Throwable $g){
            return response()->json([
                'message'=>$g->getMessage()
            ]);  
        }

       
    }



}
