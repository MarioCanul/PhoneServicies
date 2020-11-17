<?php

namespace App\Http\Controllers;

use App\payeer;
use App\phones;
use Illuminate\Http\Request;
use App\Http\Requests\PhoneRequest;

class PhoneController extends Controller
{

    public function ServiciosPagados()
    {
        $payeer = payeer::get();
        return view('partials.ServiciosPagados', [
            'payeer' => $payeer,
        ]);
    }
    public function DestroyServicioPagado(payeer $payeerItem)
    {
        $payeerItem->delete();
        return redirect()->action([PhoneController::class, 'ServiciosPagados']);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Phones = phones::get();
        return view('welcome', [
            'Phones' => $Phones,
            'Phone' => new phones
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneRequest $request)
    {
        $validated = $request->validated();
        $Phone = new phones;
        $Phone->Folio = $validated['folio'];
        $Phone->Modelo = $validated['modelo'];
        $Phone->NombreP = $validated['Propietario'];
        $Phone->Estatus = $validated['Estatus'];
        $Phone->save();
        return redirect()->action([PhoneController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\phoneModel  $phoneModel
     * @return \Illuminate\Http\Response
     */
    public function show(phones $PhoneItem)
    {
        $phones = phones::get();
        return view('partials.edit', [
            'Phone' => $PhoneItem,
            'Phones' => $phones
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\phoneModel  $phoneModel
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneRequest $request, phones $PhoneItem)
    {
        $validated = $request->validated();
        $PhoneItem->Folio = $validated['folio'];
        $PhoneItem->Modelo = $validated['modelo'];
        $PhoneItem->NombreP = $validated['Propietario'];
        $PhoneItem->Estatus = $validated['Estatus'];
        $PhoneItem->save();
        return redirect()->action([PhoneController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\phoneModel  $phoneModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(phones $PhoneItem)
    {
        $PhoneItem->delete();
        return redirect()->action([PhoneController::class, 'index']);
    }
}
