<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Tool::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('inventory_code', 'like', '%' . $request->search . '%')
                    ->orWhere('category', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $tools = $query->latest()->paginate(10)->withQueryString();

        return view('admin.tools.index', compact('tools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tools.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'inventory_code' => ['required', 'string', 'unique:tools,inventory_code'],
            'condition' => ['required', 'in:good,fair,poor'],
            'location' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'status' => ['required', 'in:available,borrowed,maintenance'],
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('tools', 'public');
        }

        Tool::create($validated);

        return redirect()->route('admin.tools.index')->with('success', 'Tool created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tool $tool)
    {
        return view('admin.tools.show', compact('tool'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tool $tool)
    {
        return view('admin.tools.edit', compact('tool'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tool $tool)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'inventory_code' => ['required', 'string', 'unique:tools,inventory_code,' . $tool->id],
            'condition' => ['required', 'in:good,fair,poor'],
            'location' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'status' => ['required', 'in:available,borrowed,maintenance'],
        ]);

        if ($request->hasFile('photo')) {
            if ($tool->photo) {
                Storage::disk('public')->delete($tool->photo);
            }
            $validated['photo'] = $request->file('photo')->store('tools', 'public');
        }

        $tool->update($validated);

        return redirect()->route('admin.tools.index')->with('success', 'Tool updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tool $tool)
    {
        if ($tool->photo) {
            Storage::disk('public')->delete($tool->photo);
        }

        $tool->delete();

        return redirect()->route('admin.tools.index')->with('success', 'Tool deleted successfully.');
    }
}
