<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SportController extends Controller
{

    public function index(Request $request) {
        $search = $request->input('search');
        $query = Sport::with(['user']);
        
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('first_team', 'like', "%{$search}%")
                  ->orWhere('second_team', 'like', "%{$search}%");
            })
            ->orWhereHas('user', function($q) use ($search) {
                $q->where('email', 'like', "%{$search}%");
            });
        }
    
        $sports = $query->paginate(5);
    
        return view('admin.sport.main', compact('sports'));
    }

    public function create() {
        return view('admin.sport.create');
    }

    public function store(Request $request) {
        $request->validate([
            'first_team' => 'nullable|string',
            'second_team' => 'nullable|string',
            'date' => 'nullable|date',
            'first_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'second_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $sports = new Sport();
        $sports->first_team = $request->first_team;
        $sports->second_team = $request->second_team;
        $sports->date = $request->date;
        $sports->user_id = Auth::id();

        if ($request->hasFile('first_img')) {
            $path = $request->file('first_img')->store('public/images/sport');
            $sports->first_img = $path;
        }

        if ($request->hasFile('second_img')) {
            $path = $request->file('second_img')->store('public/images/sport');
            $sports->second_img = $path;
        }

        $sports->save();
        Alert::success('Success', 'Sport added successfully');
        return redirect()->route('sport.index');
    }

    public function edit($id) {
        $sports = Sport::findOrFail($id);
        return view('admin.sport.edit', compact('sports'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'first_team' => 'nullable|string',
            'second_team' => 'nullable|string',
            'date' => 'nullable|date',
            'first_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'second_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $sports = Sport::findOrFail($id);
        $sports->first_team = $request->first_team;
        $sports->second_team = $request->second_team;
        $sports->date = $request->date;

        if ($request->hasFile('first_img')) {
            
            // Hapus gambar lama jika ada
            if ($sports->first_img && file_exists(storage_path('app/public/images/sport/' . basename($sports->first_img)))) {
                unlink(storage_path('app/public/images/sport/' . basename($sports->first_img)));
            }
            $path = $request->file('first_img')->store('public/images/sport');
            $sports->first_img = $path;
        }

        if ($request->hasFile('second_img')) {
            
            // Hapus gambar lama jika ada
            if ($sports->second_img && file_exists(storage_path('app/public/images/sport/' . basename($sports->second_img)))) {
                unlink(storage_path('app/public/images/sport/' . basename($sports->second_img)));
            }
            $path = $request->file('second_img')->store('public/images/sport');
            $sports->second_img = $path;
        }

        $sports->save();
        Alert::success('Success', 'Sport updated successfully');
        return redirect()->route('sport.index');
    }

    public function destroy($id) {
        $sports = Sport::findOrFail($id);

        // Hapus gambar terkait jika ada
        if ($sports->first_img && file_exists(storage_path('app/public/images/sport/' . basename($sports->first_img)))) {
            unlink(storage_path('app/public/images/sport/' . basename($sports->first_img)));
        }
        
        // Hapus gambar terkait jika ada
        if ($sports->second_img && file_exists(storage_path('app/public/images/sport/' . basename($sports->second_img)))) {
            unlink(storage_path('app/public/images/sport/' . basename($sports->second_img)));
        }

        $sports->delete();
        Alert::success('Success', 'Sport deleted successfully');
        return redirect()->route('sport.index');
    }
    
}
