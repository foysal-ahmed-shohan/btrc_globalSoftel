<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\F;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.file.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.file.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            'note'=> $request->get('note'),
            'original_date'=> date('d M Y'),
            'original_time'=> date('h:i:s A'),
            'status'=> 1,

        );
        File::create($form_data);
        toastr()->success('Success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
