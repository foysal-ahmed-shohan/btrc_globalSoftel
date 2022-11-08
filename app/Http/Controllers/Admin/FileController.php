<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\FileDownloadActivity;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Response;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\F;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Paginator;;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files=File::where('status',1)->orderBy('id','DESC')->paginate(12);
        return view('admin.file.list',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $files=File::where('status',1)->orderBy('id','DESC')->take(5)->get();
        return view('admin.file.create',compact('files'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(empty($request->file_document)){
            $files=File::where('status',1)->orderBy('id','DESC')->take(5)->get();
            return view('admin.file.create',compact('files'));
        }
        $file_name_with_extension= $request->file('file_document')->getClientOriginalName();
        $fileName = pathinfo($file_name_with_extension, PATHINFO_FILENAME);
        $file_unique_naming = $fileName.time().'.'.$request->file_document->extension();
        $request->file_document->move(public_path('file'), $file_unique_naming);
        $form_data = array(
            'user_id'=> Auth::id(),
            'date'=> $request->get('date'),
            'time'=> $request->get('time'),
            'file_modified_name'=> $file_unique_naming,
            'file_original_name'=> $fileName,
            'file_original_name_with_extension'=> $file_name_with_extension,
            'note'=> $request->get('note'),
            'original_date'=> date('d M Y'),
            'original_time'=> date('h:i:s A'),
            'status'=> 1,
        );
        $value=File::create($form_data);
        toastr()->success('Success');
        $files=File::where('status',1)->orderBy('id','DESC')->take(5)->get();
        unset($request->file_document);
        //return response()->json(['success'=>'File Uploaded Successfully']);
        //return view('admin.file.create',compact('files'));
        return redirect()->route('documentFile.create', $files);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $value = File::where('id', $id)->first();
        $user_info = User::where('id', $value->user_id)->first();
        //return $user_info;
        //document download activity history
        if ($user_info->is_admin != 1){
            $form_data = array(
                'user_id' => Auth::id(),
                'file_id' => $id,
                'date' => date('d M Y'),
                'time' => date('h:i:s A'),
                //'ip_address'=> date('h:i:s A'),
                'status' => 1,
            );
        $data = FileDownloadActivity::create($form_data);
        }
        //file download from storage
        $file= public_path(). "/file/".$value->file_modified_name;
        $headers = array(
            'Content-Type: application/pdf',
        );
        return Response::download($file, $value->file_original_name.'.'.$value->file_original_name_with_extension, $headers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return 1;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=File::where('id',$id)->first();
        if($data){
            $path = public_path()."/file/".$data->file_modified_name;
            unlink($path);
            $delete=File::where('id',$id)->delete();
            toastr()->success('Successfully Deleted Data');
            return back();
        }
        else{
            //toastr()->success('Success');
            return back();
        }

    }
}
