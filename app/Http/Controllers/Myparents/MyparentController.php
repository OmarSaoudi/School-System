<?php

namespace App\Http\Controllers\Myparents;
use App\Http\Controllers\Controller;

use App\Models\Myparent;
use Illuminate\Http\Request;
use App\Repository\MyparentRepositoryInterface;

class MyparentController extends Controller
{

    protected $Myparent;

    public function __construct(MyparentRepositoryInterface $Myparent)
    {
        $this->Myparent = $Myparent;
    }

    public function index()
    {
        return $this->Myparent->GetMyparents();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->Myparent->CreateMyparents();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->Myparent->StoreMyparents($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Myparent  $myparent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->Myparent->ShowMyparents($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Myparent  $myparent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->Myparent->EditMyparents($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Myparent  $myparent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return $this->Myparent->UpdateMyparents($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Myparent  $myparent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->Myparent->DeleteMyparents($request);
    }

}
