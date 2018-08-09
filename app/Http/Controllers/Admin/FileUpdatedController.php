<?php

namespace App\Http\Controllers\Admin;

use App\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileUpdatedController extends Controller
{
    public function index()
    {
        $files= File::whereHas('approvals')->oldest()->get();
        return view('admin.files.updated.index')->with('files',$files);
    }

    public function update(File $file)
    {
        //merge approval properties
        $file->mergerApprovalProperties();
        //approve all uploads
        $file->approveAllUploads();
        //delete all approvals
        $file->deleteAllApprovals();

        return back()->withSuccess("{$file->title}  changes have been approved");
    }

    public function destroy(File $file)
    {
        return back()->withSuccess("{$file->title}  changes have been rejected");
    }
}
