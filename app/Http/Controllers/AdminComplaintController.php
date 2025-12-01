<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminComplaintController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->checkAdminAccess();
        $complaints = Complaint::orderBy('created_at', 'desc')->get();
        return view('admin.complaints.index', compact('complaints'));
    }

    public function show($id)
    {
        $this->checkAdminAccess();
        $complaint = Complaint::findOrFail($id);
        return view('admin.complaints.show', compact('complaint'));
    }

    public function update(Request $request, $id)
    {
        $this->checkAdminAccess();
        
        $request->validate([
            'status' => 'required|in:No leído,En proceso,Cerrado',
            'internal_comments' => 'nullable|string',
        ]);

        $complaint = Complaint::findOrFail($id);
        $complaint->update($request->only(['status', 'internal_comments']));

        return redirect()->route('admin.complaints.show', $id)
            ->with('success', 'El estado y los comentarios se actualizaron correctamente.');
    }

    private function checkAdminAccess()
    {
        if (Auth()->user()->roles_id !== 1) {
            abort(403, 'No tienes permisos para acceder a esta sección.');
        }
    }
}

