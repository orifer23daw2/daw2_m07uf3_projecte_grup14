<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Dompdf\Dompdf;
use Dompdf\Options;
use Dotenv\Exception\ValidationException;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dades_clients = Client::all();
        return view('clients.admin_cli', compact('dades_clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create_cli');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
        $validatedData = $request->validate([
            'passaport_client' => 'required',
            'nom_cognoms' => 'required',
            'edat' => 'required|numeric',
            'telefon' => 'nullable',
            'adreca' => 'nullable',
            'ciutat' => 'nullable',
            'pais' => 'nullable',
            'email' => 'nullable|email',
            'tipus_targeta' => 'nullable',
            'numero_targeta' => 'nullable',
        ]);


        Client::create($validatedData);


        return redirect()->route('clients.index')->with('success', 'Cliente añadido correctamente');
    } catch (ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        return redirect()->route('clients.create')->with('error', 'Error al crear el cliente: ' . $e->getMessage());
    }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $client = Client::findOrFail($id);


        return view('clients.show_cli', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit_cli', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
        $validatedData = $request->validate([
            'passaport_client' => 'required',
            'nom_cognoms' => 'required',
            'edat' => 'required|numeric',
            'telefon' => 'nullable',
            'adreca' => 'nullable',
            'ciutat' => 'nullable',
            'pais' => 'nullable',
            'email' => 'nullable|email',
            'tipus_targeta' => 'nullable',
            'numero_targeta' => 'nullable',
        ]);

        Client::findOrFail($id)->update($validatedData);

        return redirect()->route('clients.index')->with('success', 'Cliente actualizado correctamente');
    } catch (ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        return redirect()->route('clients.edit', $id)->with('error', 'Error al actualitzar el cliente: ' . $e->getMessage());
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Client::findOrFail($id)->delete();

        return redirect()->route('clients.index')->with('success', 'Cliente eliminado correctamente');
    }

    public function generatePDF($id)
    {
        $client = Client::findOrFail($id);


        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);


        $html = view('clients.pdf_cli', compact('client'));
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();


        return $dompdf->stream("client_{$client->passaport_client}.pdf");
    }
}
