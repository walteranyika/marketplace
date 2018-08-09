<?php

namespace App\Http\Controllers\Account;

use App\File;
use App\Http\Requests\File\StoreFileRequest;
use App\Http\Requests\File\UpdateFileRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileController extends Controller
{

    public function index()
    {
        $files = auth()->user()->files()->latest()->finished()->get();
       // dd($files);
        return view('account.files.index')->with('files',$files);
    }
    
    public function create(File $file)
    {
        if(!$file->exists){
           //    echo "Does not exist";
           $file= $this->createAndReturnSkeletonFile();
          // dd($file);
           return redirect()->route('account.files.create',$file);
        }
        $this->authorize('touch',$file);

        return view('account.files.create')->with('file',$file);
    }

    public function edit(File $file)
    {
        $this->authorize('touch',$file);

        return view('account.files.edit')->with(['file'=>$file,'approval'=>$file->approvals()->first()]);
    }

    public function store(File $file, StoreFileRequest $request)
    {
        $this->authorize('touch',$file);
        $file->fill($request->only(['title','overview','overview_short','price']));
        $file->finished=true;
        $file->save();
        //TODO update this
        return redirect()->route('account.files.index')->with('success','Thanks, submitted for review');

    }

    public function update(File $file, UpdateFileRequest  $request)
    {
        $this->authorize('touch',$file);
        $approvalProperties = $request->only(File::APPROVAL_PROPERTIES);

        if ($file->needsApproval($approvalProperties)){

            $file->createApproval($approvalProperties);
            return back()->withSuccess('Thanks!. We will review your changes soon');
        }
        $file->update(['live'=>$request->get('live',false),
                       'price'=>$request->price]);
        return back()->withSuccess('File updated successfully');

    }

    protected  function createAndReturnSkeletonFile(){
        //dd()
              return auth()->user()->files()->create([
                  'title'=>'Untitled',
                  'overview'=>'None',
                  'overview_short'=>'None',
                  'price'=>0,
                  'finished'=>false,
              ]);

    }
}
