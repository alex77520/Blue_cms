<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests\Back\PictureSourceRequest;
use App\Service\PictureService;
use App\Service\PictureSourceService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PictureSourceController extends Controller
{
    /**
     * PictureSourceController constructor.
     * @param PictureSourceService $service
     */
    public function __construct(PictureSourceService $service)
    {
        $this->middleware('auth.back:back');
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.picture.source.index');
    }

    /**
     * @return mixed
     */
    public function indexData(){
        return $this->service->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, PictureService $pictureService)
    {
        return view('back.picture.source.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, PictureSourceRequest $request)
    {
        $this->service->store($id,$request);
        return redirect('back/picture-source');
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
        $pictureSource = $this->service->pictureSourceRepository->find($id);
        return view('back.picture.source.edit', compact('pictureSource'));
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
        $this->service->update($request, $id);
        return redirect('back/picture-source');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->pictureSourceRepository->delete($id);
        return redirect()->back();
    }
}
