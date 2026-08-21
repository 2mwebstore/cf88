<?php

namespace App\Http\Controllers;

use App\Models\Fight;
use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class FightController extends Controller
{
        private function deactivateOtherFights($exceptId = null)
    {
        Fight::where('status', 1)
            ->when($exceptId, fn($q) => $q->where('id', '!=', $exceptId))
            ->update(['status' => 0]);
    }
    // List fights with search & filter
    public function index(Request $request)
    {
        $query = Fight::with('category');

        // Search by fighter name (Red or Blue)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('red_fighter', 'like', "%{$search}%")
                  ->orWhere('blue_fighter', 'like', "%{$search}%");
            });
        }

        // Filter by category
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Filter by date range
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('created_at', [
                $request->start_date . ' 00:00:00',
                $request->end_date . ' 23:59:59'
            ]);
        }

        $query->orderBy('id', 'desc');

        $perPage = $request->input('length', 10);
        $fights = $query->paginate($perPage)->appends([
            'search' => $request->search,
            'length' => $perPage,
            'category_id' => $request->category_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        $categories = Category::where('status', 0)->orderBy('row')->get();

        return view('admin.fights.index', compact('fights', 'categories'));
    }

    // Show create form
    public function create()
    {
        $categories = Category::where('status', 0)->orderBy('row')->get();
        return view('admin.fights.create', compact('categories'));
    }

    // Store new fight
    public function store(Request $request)
    {
        $request->validate([
            'no' => 'required',
            'red_fighter' => 'required',
            'blue_fighter' => 'required',
            'category_id' => 'required|exists:category,id',
        ]);

        $fight = Fight::create([
            'no' => $request->no,
            'category_id' => $request->category_id,
            'red_fighter' => $request->red_fighter,
            'red_image'   => $request->red_image ?? '',
            'red_score'   => $request->red_score ?? 0,
            'blue_fighter'=> $request->blue_fighter,
            'blue_image'  => $request->blue_image ?? '',
            'blue_score'  => $request->blue_score ?? 0,
            'status'      => 0,
        ]);

        Alert::success('Success', 'Fight created successfully.');
        return redirect()->route('fights');
    }
        public function setActive($id)
    {
        $fight = Fight::findOrFail($id);

        $this->deactivateOtherFights($id);

        $fight->status = 1;
        $fight->save();

        Alert::success('Success', 'Fight set as the current active fight.');
        return redirect()->route('fights');
    }

    // Show edit form
    public function edit($id)
    {
        $fight = Fight::findOrFail($id);
        $categories = Category::where('status', 0)->orderBy('row')->get();
        return view('admin.fights.edit', compact('fight', 'categories'));
    }

    // Update fight
    public function update(Request $request, $id)
    {
        $fight = Fight::findOrFail($id);
        $fight->timestamps = false; 
        $request->validate([
            'no' => 'required',
            'red_fighter' => 'required',
            'blue_fighter' => 'required',
            'category_id' => 'required|exists:category,id',
        ]);
        if ($request->created_at) {
            $created_at = date('Y-m-d H:i:s', strtotime($request->created_at));
        } else {
            $created_at = $fight->created_at;
        }
        $fight->update([
            'no'          => $request->no,
            'created_at'  => $created_at,
            'category_id' => $request->category_id,
            'red_fighter' => $request->red_fighter,
            'red_image'   => $request->red_image ?? '',
            'red_score'   => $request->red_score ?? 0,
            'blue_fighter'=> $request->blue_fighter,
            'blue_image'  => $request->blue_image ?? '',
            'blue_score'  => $request->blue_score ?? 0,
            'status'      => 0,
        ]);

        Alert::success('Success', 'Fight updated successfully.');
        return redirect()->route('fights');
    }

    // Delete fight
    public function destroy($id)
    {
        $fight = Fight::findOrFail($id);
        $fight->delete();

        Alert::success('Success', 'Fight deleted successfully.');
        return redirect()->route('fights');
    }
}
