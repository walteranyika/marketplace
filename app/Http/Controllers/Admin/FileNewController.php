<?php

namespace App\Http\Controllers\Admin;

use App\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileNewController extends Controller
{
    public function index()
    {
        $files =File::unapproved()->finished()->oldest()->get();
        //dd($files);
        return view('admin.files.new.index')->with('files', $files);
    }
    public function update(File $file)
    {
      $file->approve();
      return back()->withSuccess("{$file->title} has been approved");
    }
    public function destroy(File $file)
    {
        $file->delete();
        $file->uploads->each->delete();
        return back()->withSuccess("{$file->title} has been rejected");
    }
}
