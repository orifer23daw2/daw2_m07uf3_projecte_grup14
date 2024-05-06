<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use Dompdf\Dompdf;
use Dompdf\Options;
use Dotenv\Exception\ValidationException;
use Illuminate\Database\QueryException;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dades_reserva = Reserva::all();
        return view('reserva.admin_reserva', compact('dades_reserva'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reserva.create_reserva');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'passaport_client' => 'required',
                'codi_vol' => 'required',
                'localitzador' => 'required',
                'numero_seient' => 'required',
                'equipatge_ma' => 'required',
                'equipatge_cabina' => 'required',
                'quantitat_equipatges' => 'required',
                'tipus_assegurança' => 'required',
                'preu_vol' => 'required',
                'tipus_checking' => 'required',
            ]);

            Reserva::create($validatedData);

            return redirect()->route('reserva.index')
                ->with('success', 'Reserva creada correctamente');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Error al crear la reserva: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $passaport_client, string $codi_vol)
    {
        $reserva = Reserva::where('passaport_client', $passaport_client)
            ->where('codi_vol', $codi_vol)
            ->firstOrFail();
        return view('reserva.show_reserva', compact('reserva'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $passaport_client, string $codi_vol)
    {
        $reserva = Reserva::where('passaport_client', $passaport_client)
            ->where('codi_vol', $codi_vol)
            ->firstOrFail();
        return view('reserva.edit_reserva', compact('reserva'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $passaport_client, string $codi_vol)
    {
        try {
            $validatedData = $request->validate([
                'passaport_client' => 'required',
                'codi_vol' => 'required',
                'localitzador' => 'required',
                'numero_seient' => 'required',
                'equipatge_ma' => 'required',
                'equipatge_cabina' => 'required',
                'quantitat_equipatges' => 'required',
                'tipus_assegurança' => 'required',
                'preu_vol' => 'required',
                'tipus_checking' => 'required',
            ]);

            Reserva::where('passaport_client', $passaport_client)
                ->where('codi_vol', $codi_vol)
                ->update($validatedData);

            return redirect()->route('reserva.index')
                ->with('success', 'Reserva actualizada correctamente');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Error al actualizar la reserva: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $passaport_client, string $codi_vol)
    {
        Reserva::where('passaport_client', $passaport_client)
            ->where('codi_vol', $codi_vol)
            ->delete();

        return redirect()->route('reserva.index')
            ->with('success', 'Reserva eliminada correctamente');
    }

    public function pdf($passaport_client, $codi_vol)
    {

        $reserva = Reserva::where('passaport_client', $passaport_client)
            ->where('codi_vol', $codi_vol)
            ->firstOrFail();


        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);


        $dompdf = new Dompdf($options);


        $html = view('reserva.pdf_reserva', compact('reserva'))->render();


        $dompdf->loadHtml($html);


        $dompdf->setPaper('A4', 'portrait');


        $dompdf->render();


        return $dompdf->stream("reserva_{$reserva->passaport_client}_{$reserva->codi_vol}.pdf");
    }
}
