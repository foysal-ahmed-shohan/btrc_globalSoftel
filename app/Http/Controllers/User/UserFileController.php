<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\File;
use Response;
use App\Models\FileDownloadActivity;

class UserFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files=File::where('status',1)->orderBy('id','DESC')->paginate(12);
        return view('user.index',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }
}
