<?php

namespace App\Http\Controllers;

use App\UploadedFile;
use App\UploadedStatement;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

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
                    var_dump(strpos($name,'.csv'));
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
            } else {
                $i++;
            }
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
            $row = $item->vendor_code . ','
                . $item->partner_name . ',' . $item->login_id . ','
                . $item->bonus_time . ',' . $item->total_riders . ','
                . $item->unverified_riders . ','
                . $item->rating . ',' . $item->acceptance . ','
                . $item->total_collection . ',' . $item->total_fare . ','
                . $item->bonus . ',' . $item->wallet_balance
                . "\n";

            fwrite($handle, $row);
        }

        fclose($handle);

        return response()->download(storage_path() . '/app/' . $uploaded_file->file_name)
            ->deleteFileAfterSend(true);
    }

    public function getFiles()
    {
        $uploaded_files = UploadedFile::withCount('uploaded_statements')->orderBy('id', 'desc')->get();
//        dd($uploaded_files);
        $driver = '';
        return view('menu.options.uploaded_statements', compact('uploaded_files', 'driver'));
    }

    public function showFile($id)
    {
        $user_id = session('user_id');
        $uploaded_file = UploadedFile::with('uploaded_statements')->find($id);
        $driver = '';
        return view('menu.options.statements_data', compact('uploaded_file', 'driver'));
    }


}
