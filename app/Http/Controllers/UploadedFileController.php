<?php

namespace App\Http\Controllers;

use App\UploadedFile;
use App\UploadedStatement;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
class UploadedFileController extends Controller
{
    public function uploadFile()
    {
        if (request()->isMethod('post')) {
            $files = request()->file('files');

            if (!empty($files)) {
                foreach ($files as $file) {
                    $type = $file->getClientMimeType();
                    $name = $file->getClientOriginalName();
                    if ($type === 'text/csv' || strpos($name,'.csv') !== false) {

                        $name = Carbon::now()->format('Y_m_d_h_m_s') . '_' . $name;
                        Storage::disk('local')->putFileAs('/', new File($file), $name);
                        $status = $this->getFromFile($name);
                        if ($status === false){
                            return redirect("/menu")->with('status', 'Error, please check you headers and try again!');
                        }
                    } else {
                        return redirect("/menu")->with('status', 'Something went wrong, check uploaded file and try again!');
                    }
                }
            }

        }
        return redirect("/get_files")->with('status', 'File uploaded!');
    }

    public function getFromFile($name)
    {
        $file = storage_path() . '/app/' . $name;
        $handle = @fopen($file, "r");
        if ($handle == false) {
            $errors[] = 'Unable to read file ' . $file;
            return $errors;
        }

        $uploaded_file = UploadedFile::create([
            'file_name' => $name
        ]);

        $i = 0;
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if ($i == 0) {
                if(count($data) != 12)
                {
                    return false;
                }
                if (
                    trim($data[0]) == 'Vendor Code'
                    && trim($data[1]) == 'Partner Name'
                    && trim($data[2]) == 'Login ID'
                    && trim($data[3]) == 'Bonus Date'
                    && trim($data[4]) == 'Total Rides'
                    && trim($data[5]) == 'Unverified Rides'
                    && trim($data[6]) == 'Rating'
                    && trim($data[7]) == 'Acceptance'
                    && trim($data[8]) == 'Total Collection'
                    && trim($data[9]) == 'Total Fare'
                    && trim($data[10]) == 'Bonus'
                    && trim($data[11]) == 'Wallet Balance'
                ) {
                } else {
                    $uploaded_file->delete();
                    Storage::delete($name);
                    return false;
                }
            }

            if ($i > 0) {

                if($i == 1 && empty($data))
                {
                    return false;
                }
                UploadedStatement::create([
                    'uploaded_file_id' => $uploaded_file->id,
                    'vendor_code' => $data[0] ?? null,
                    'partner_name' => $data[1] ?? null,
                    'login_id' => $data[2] ?? null,
                    'bonus_time' => $data[3] ?? null,
                    'total_riders' => $data[4] ?? null,
                    'unverified_riders' => $data[5] ?? null,
                    'rating' => $data[6] ?? null,
                    'acceptance' => $data[7] ?? null,
                    'total_collection' => $data[8] ?? null,
                    'total_fare' => $data[9] ?? null,
                    'bonus' => $data[10] ?? null,
                    'wallet_balance' => $data[11] ?? null
                ]);
            }

            $i++;
        }

        if($i == 1)
        {
            return false;
        }

        fclose($handle);
        Storage::delete($name);
        return true;
    }

    public function getFile($id)
    {

        $uploaded_file = UploadedFile::with('uploaded_statements')->find($id);

        $handle = fopen(storage_path() . '/app/' . $uploaded_file->file_name, "w");

        $header = "Vendor Code,Partner Name,Login ID,Bonus Date,Total Rides,Unverified Rides,Rating,Acceptance,Total Collection,Total Fare,Bonus,Wallet Balance\n";
        fwrite($handle, $header);

        foreach ($uploaded_file->uploaded_statements as $item) {

            if(session('user_id') && $item->vendor_code == session('user_id'))
            {
                $row = $item->vendor_code . ','
                    . $item->partner_name . ',' . $item->login_id . ','
                    . $item->bonus_time . ',' . $item->total_riders . ','
                    . $item->unverified_riders . ','
                    . $item->rating . ',' . $item->acceptance . ','
                    . $item->total_collection . ',' . $item->total_fare . ','
                    . $item->bonus . ',' . $item->wallet_balance
                    . "\n";
            }elseif(session('admin'))
            {
                $row = $item->vendor_code . ','
                    . $item->partner_name . ',' . $item->login_id . ','
                    . $item->bonus_time . ',' . $item->total_riders . ','
                    . $item->unverified_riders . ','
                    . $item->rating . ',' . $item->acceptance . ','
                    . $item->total_collection . ',' . $item->total_fare . ','
                    . $item->bonus . ',' . $item->wallet_balance
                    . "\n";
            }
            else{
                $row = '';
            }





            fwrite($handle, $row);
        }

        fclose($handle);

        if(!isset($row) || $row == '')
        {
            return redirect('/get_files')->with('error','No data in this file for this user');
        }else{
            return response()->download(storage_path() . '/app/' . $uploaded_file->file_name)
                ->deleteFileAfterSend(true);
        }


    }

    public function getFiles(Request $request)
    {

            $uploaded_files = UploadedFile::withCount('uploaded_statements')->orderBy('id', 'desc')->get()->toArray();
            $uploaded_files_page = new PaginationArrayController($uploaded_files,10);
            $driver = '';
            return view('menu.options.uploaded_statements', ['uploaded_files' => $uploaded_files_page->getPageData($request)]);
    }

    public function getUserStatementInfo()
    {

        if(is_array(session('user_id')))
        {
            $filename = storage_path().'/app/'.session('user_id')[0].'_'.time().'.csv';
        }else{
            $filename = storage_path().'/app/'.session('user_id').'_'.time().'.csv';
        }

        $file = fopen($filename, 'w');
        $userData = UploadedStatement::where('vendor_code',session('user_id'))->get()->toArray();
        $headers = [
            'Vendor Code',
            'Partner Name',
            'Login ID',
            'Bonus Date',
            'Total Rides',
            'Unverified Rides',
            'Rating',
            'Acceptance',
            'Total Collection',
            'Total Fare',
            'Bonus',
            'Wallet Balance'
        ];

        fputcsv($file, $headers, ";");

        $excludedHeaders = ['id','uploaded_file_id','created_at','updated_at'];

        if(!empty($userData))
        {
            foreach ($userData as $fields) {

                foreach($fields as $key => $item)
                {
                    if(in_array($key,$excludedHeaders))
                    {
                        unset($fields[$key]);
                    }
                }

                fputcsv($file, $fields, ";");

            }
        }else{
            return redirect('/get_files')->with(['error' => 'No data found for this user']);
        }


        fclose($file);
        return response()->download($filename)
                         ->deleteFileAfterSend(true);
    }

    public function showFile($id)
    {
        //$user_id = session('user_id');
        $uploaded_file = UploadedFile::with('uploaded_statements')->find($id);
        $driver = '';
        return view('menu.options.statements_data', compact('uploaded_file', 'driver'));
    }


}
