<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Mail\ComplaintMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ComplaintController extends Controller
{
    /**
     * Show the complaint form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pages.complaint-form');
    }

    /**
     * Store a new complaint.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'claim_date' => 'required|date',
            'consumer_name' => 'required|string|max:255',
            'consumer_address' => 'required|string',
            'document_type' => 'required|in:DNI,Documento de Extranjería',
            'document_number' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'product_type' => 'required|in:Producto,Servicio',
            'claimed_amount' => 'required|numeric|min:0',
            'product_description' => 'required|string',
            'claim_detail' => 'required|string',
            'conformity' => 'required|accepted',
        ]);

        try {
            $complaint = Complaint::create(array_merge($validated, [
                'conformity' => true,
                'status' => 'No leído',
            ]));

            try {
                // Cambiar este email por el de tu empresa
                Mail::to('contacto@tunombredeempresa.com')->send(new ComplaintMail($complaint));
            } catch (\Exception $e) {
                \Log::error('Error al enviar correo de reclamo: ' . $e->getMessage());
            }

            return redirect()->route('complaints.create')->with('success', true);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Hubo un error al registrar su reclamo. Por favor, intente nuevamente.')
                ->withInput();
        }
    }
}

