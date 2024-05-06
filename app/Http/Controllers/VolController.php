<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vol;
use Dompdf\Dompdf;
use Dompdf\Options;
use Dotenv\Exception\ValidationException;
use Illuminate\Validation\Rule;

class VolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dades_vols = Vol::all();
        return view('vols.admin_vol', compact('dades_vols'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vols.create_vol');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
        $validatedData = $request->validate([
            'codi_vol' => [
                'required',
                Rule::unique('vols'),
                'regex:/^[a-zA-Z]{2}\d{4}$/'
            ],
            'codi_model_avio' => 'required',
            'ciutat_origen' => 'required',
            'ciutat_destinacio' => 'required',
            'terminal_origen' => 'required',
            'terminal_destinacio' => 'required',
            'data_sortida' => 'required|date',
            'data_arribada' => 'required|date',
            'hora_sortida' => 'required|date_format:H:i',
            'hora_arribada' => 'required|date_format:H:i',
            'classe' => 'required',
        ]);

        Vol::create($validatedData);

        return redirect()->route('vols.index')->with('success', 'Vuelo creado correctamente.');
    } catch (ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        return redirect()->route('vols.edit')->with('error', 'Error al actualitzar el vol: ' . $e->getMessage());
    }
    }

    public function show(string $id)
    {
        $vol = Vol::findOrFail($id);
        return view('vols.show_vol', compact('vol'));
    }

    public function edit(string $id)
    {
        $vol = Vol::findOrFail($id);
        return view('vols.edit_vol', compact('vol'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
        $validatedData = $request->validate([
            'codi_vol' => [
                'required',
                Rule::unique('vols'),
                'regex:/^[a-zA-Z]{2}\d{4}$/'
            ],
            'codi_model_avio' => 'required',
            'ciutat_origen' => 'required',
            'ciutat_destinacio' => 'required',
            'terminal_origen' => 'required|string',
            'terminal_destinacio' => 'required|string',
            'data_sortida' => 'required',
            'data_arribada' => 'required',
            'hora_sortida' => 'required',
            'hora_arribada' => 'required',
            'classe' => 'required|string',
        ]);


        $vol = Vol::findOrFail($id);


        $vol->update($validatedData);


        return redirect()->route('vols.index')->with('success', 'Vuelo actualizado correctamente');
    } catch (ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        return redirect()->route('vols.edit', $id)->with('error', 'Error al actualitzar el vol: ' . $e->getMessage());
    }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Vol::findOrFail($id)->delete();


        return redirect()->route('vols.index')->with('success', 'Vol eliminat correctament');
    }

    public function pdf($id)
    {
        $vol = Vol::findOrFail($id);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        $html = view('vols.pdf_vol', compact('vol'));
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream("vol_{$vol->codi_vol}.pdf");
    }

}
