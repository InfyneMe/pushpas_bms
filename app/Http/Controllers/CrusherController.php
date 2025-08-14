<?php

namespace App\Http\Controllers;

use App\Models\CrusherModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CrusherController extends Controller
{
    public function index(Request $request)
    {
        $query = CrusherModel::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhere('location', 'like', "%{$search}%")
                ->orWhere('gst_number', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->get('status'));
        }

        // Weight bridge filter
        if ($request->filled('has_weight')) {
            $query->where('has_weight', (bool) $request->get('has_weight'));
        }

        // Sorting
        $sortField = $request->get('sort', 'created_at');
        $sortDirection = $request->get('direction', 'desc');
        
        $allowedSorts = ['name', 'status', 'capacity', 'created_at'];
        if (in_array($sortField, $allowedSorts)) {
            $query->orderBy($sortField, $sortDirection);
        }

        // Pagination
        $crushers = $query->paginate(15)->withQueryString();

        // Handle export
        // if ($request->get('export') === 'csv') {
        //     return $this->exportCsv($query->get());
        // }

        return view('admin.crushers', compact('crushers'));
    }
    public function create()
    {
        try {
            return view('admin.createCrusher');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
    public function store(Request $request)
    {
        try {
            // Validation rules
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:crushers,name',
                'status' => 'required|in:active,inactive,maintenance',
                'location' => 'required|string|max:1000',
                'capacity' => 'required|numeric|min:0.01|max:99999.99',
                'gst_number' => 'nullable|string|unique:crushers,gst_number',
                'has_weight' => 'required|boolean'
            ], [
                // Custom error messages
                'name.required' => 'Crusher name is required.',
                'name.unique' => 'This crusher name already exists.',
                'status.required' => 'Please select an operational status.',
                'status.in' => 'Invalid status selected.',
                'location.required' => 'Complete address is required.',
                'location.max' => 'Address cannot exceed 1000 characters.',
                'capacity.required' => 'Processing capacity is required.',
                'capacity.numeric' => 'Capacity must be a valid number.',
                'capacity.min' => 'Capacity must be greater than 0.',
                'capacity.max' => 'Capacity cannot exceed 99,999.99 tons/hour.',
                'gst_number.regex' => 'GST number format is invalid. Use format: 22AAAAA0000A1Z5',
                'gst_number.unique' => 'This GST number is already registered.',
                'has_weight.required' => 'Please specify weight bridge availability.',
                'has_weight.boolean' => 'Invalid weight bridge selection.'
            ]);

            // Process GST number - remove if empty or whitespace
            if (empty(trim($validated['gst_number']))) {
                $validated['gst_number'] = null;
            } else {
                // Clean and format GST number
                $validated['gst_number'] = strtoupper(trim($validated['gst_number']));
            }

            // Convert has_weight to boolean
            $validated['has_weight'] = (bool) $validated['has_weight'];

            // Generate UUID
            $validated['uuid'] = Str::uuid()->toString();

            // Set default coordinates (you can modify this logic as needed)
            $validated['latitude'] = null;
            $validated['longitude'] = null;

            // Create the crusher
            $crusher = CrusherModel::create($validated);

            // Success response
            return redirect()
                ->route('crusher.list') // or wherever you want to redirect
                ->with('success', 'Crusher "' . $crusher->name . '" has been created successfully!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation failed
            return redirect()
                ->back()
                ->withErrors($e->validator)
                ->withInput();

        } catch (\Exception $e) {
            // User-friendly error message
            return redirect()
                ->back()
                ->withErrors(['error' => 'Something went wrong while creating the crusher. Please try again.'])
                ->withInput();
        }
    }
}
