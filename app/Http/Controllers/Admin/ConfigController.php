<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{

    public function index()
    {

    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function edit()
    {
        // Fetch existing configs (assuming you store them in a single row)
        $configs = Config::where('is_active',1)->get();

        return view('admin.Configs.edit', compact('configs'));
    }

    public function update(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);

        // Update the configs (assuming you store them in a single row)
        $configs = Config::first();
        if ($configs) {
            $configs->update($validated);
        } else {
            Config::create($validated);
        }

        return redirect()->route('configs.edit')->with('success', 'configs updated successfully.');
    }

    public function destroy($id)
    {
    }
}
