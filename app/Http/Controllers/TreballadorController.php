<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Treballador;
use Dompdf\Dompdf;
use Dompdf\Options;
use Dotenv\Exception\ValidationException;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;

class TreballadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dades_treballadors = Treballador::all();
        return view('treballadors.admin_treb', compact('dades_treballadors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('treballadors.create_treb');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nom_cognoms' => 'required',
                'email' => 'required|email|unique:treballadors,email',
                'contrasenya' => [
                    'required',
                    'min:8',
                    Password::min(8)
                        ->mixedCase()
                        ->letters()
                        ->numbers()
                        ->symbols(),
                ],
                'tipus' => 'required'
            ]);

            $contrasenyaCifrada = Hash::make($request->input('contrasenya'));

            Treballador::create([
                'nom_cognoms' => $request->input('nom_cognoms'),
                'email' => $request->input('email'),
                'contrasenya' => $contrasenyaCifrada,
                'tipus' => $request->input('tipus'),
            ]);

            return redirect()->route('treballadors.index')->with('success', 'Treballador afegit correctament');
        } catch (ValidationException $e) {
            return redirect()->route('treballadors.create')->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->route('treballadors.create')->with('error', 'Error al afegir el treballador: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $treballador = Treballador::findOrFail($id);
        return view('treballadors.show_treb', compact('treballador'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $treballador = Treballador::findOrFail($id);
        return view('treballadors.edit_treb', compact('treballador'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validatedData = $request->validate([
                'nom_cognoms' => 'required',
                'email' => 'required|email|unique:treballadors,email,' . $id,
                'tipus' => 'required'
            ]);

            $treballador = Treballador::findOrFail($id);

            $treballador->update([
                'nom_cognoms' => $validatedData['nom_cognoms'],
                'email' => $validatedData['email'],
                'tipus' => $validatedData['tipus']
            ]);

            return redirect()->route('treballadors.index')->with('success', 'Treballador actualitzat correctament');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->route('treballadors.edit', $id)->with('error', 'Error al actualitzar el treballador: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Treballador::findOrFail($id)->delete();


        return redirect()->route('treballadors.index')->with('success', 'Treballador eliminat correctament');
    }


    public function pdf($id)
    {
        $treballador = Treballador::findOrFail($id);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        $html = view('treballadors.pdf_treb', compact('treballador'));
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream("treballador_{$treballador->id}.pdf");
    }
}
