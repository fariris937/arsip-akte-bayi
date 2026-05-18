<?php

namespace App\Http\Controllers;

use App\Models\AkteBayi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AkteBayiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = AkteBayi::query();

        // Filter by Search (Name)
        if ($request->has('search') && !empty($request->search)) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        // Filter by Month
        if ($request->has('month') && !empty($request->month)) {
            $query->where('bulan', $request->month);
        }

        // Filter by Year
        if ($request->has('year') && !empty($request->year)) {
            $query->where('tahun', $request->year);
        }

        $akteBayis = $query->orderBy('created_at', 'desc')->paginate(5)->withQueryString();

        // Global Stats (Independent of filters)
        $totalAkte = AkteBayi::count();
        $akteBulanIni = AkteBayi::where('tanggal_daftar', '>=', now()->startOfMonth())->count();
        $akteTahunIni = AkteBayi::where('tanggal_daftar', '>=', now()->startOfYear())->count();

        $cities = \App\Models\Kota::withCount([
            'akteBayis' => function ($query) use ($request) {
                if ($request->has('month') && !empty($request->month)) {
                    $query->where('bulan', $request->month);
                }
                if ($request->has('year') && !empty($request->year)) {
                    $query->where('tahun', $request->year);
                }
            }
        ])->get();

        return view('akte_bayi.index', compact('akteBayis', 'cities', 'totalAkte', 'akteBulanIni', 'akteTahunIni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('akte_bayi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nama_ibu' => 'nullable|string|max:255',
            'tanggal_daftar' => 'required|date',
            'bulan' => 'nullable|integer|min:1|max:12',
            'tahun' => 'nullable|integer|min:1900|max:' . (date('Y') + 10),
            'kota_id' => 'nullable|exists:kotas,id',
            'file.*' => 'nullable|file|mimes:pdf,jpg,jpeg|max:10240',
        ]);

        $data = $request->except('file');

        if ($request->hasFile('file')) {
            $filePaths = [];
            foreach ($request->file('file') as $file) {
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('akte_bayi', $fileName, 'public');
                $filePaths[] = $filePath;
            }
            $data['file'] = json_encode($filePaths);
        }

        AkteBayi::create($data);

        return redirect()->route('akte-bayi.index')->with('success', 'Akte Bayi berhasil ditambahkan.');
    }

    /**
     * Show the form for creating a new resource via folder upload.
     */
    public function createFolder()
    {
        return view('akte_bayi.create_folder');
    }

    /**
     * Store newly created resources from folder upload.
     */
    public function storeFolder(Request $request)
    {
        set_time_limit(120);
        try {
            $request->validate([
                'baby_name'      => 'required|string|max:255',
                'tanggal_daftar' => 'required|date',
                'files'          => 'required|array',
            ]);

            $babyName      = trim($request->input('baby_name'));
            $tanggalDaftar = $request->input('tanggal_daftar');
            $bulan         = date('n', strtotime($tanggalDaftar));
            $tahun         = date('Y', strtotime($tanggalDaftar));

            $allowedExtensions = ['pdf', 'jpg', 'jpeg'];
            $filePaths = [];

            foreach ($request->file('files') as $file) {
                $ext = strtolower($file->getClientOriginalExtension());
                if (!in_array($ext, $allowedExtensions)) continue;
                $fileName  = uniqid() . '_' . $file->getClientOriginalName();
                $filePath  = $file->storeAs('akte_bayi', $fileName, 'public');
                $filePaths[] = $filePath;
            }

            AkteBayi::create([
                'nama'           => $babyName,
                'tanggal_daftar' => $tanggalDaftar,
                'bulan'          => $bulan,
                'tahun'          => $tahun,
                'file'           => $filePaths,
            ]);

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Folder Upload Error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(AkteBayi $akteBayi)
    {
        return view('akte_bayi.show', compact('akteBayi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AkteBayi $akteBayi)
    {
        return view('akte_bayi.edit', compact('akteBayi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AkteBayi $akteBayi)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nama_ibu' => 'nullable|string|max:255',
            'tanggal_daftar' => 'required|date',
            'bulan' => 'nullable|integer|min:1|max:12',
            'tahun' => 'nullable|integer|min:1900|max:' . (date('Y') + 10),
            'kota_id' => 'nullable|exists:kotas,id',
            'file' => 'nullable|array',
            'file.*' => 'file|mimes:pdf,jpg,jpeg|max:10240',
        ]);

        $data = $request->except('file');

        if ($request->hasFile('file')) {
            $filePaths = is_array($akteBayi->file) ? $akteBayi->file : []; // Start with existing files
            foreach ($request->file('file') as $file) {
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('akte_bayi', $fileName, 'public');
                $filePaths[] = $filePath;
            }
            $data['file'] = json_encode($filePaths);
        }

        $akteBayi->update($data);

        return redirect()->route('akte-bayi.index')->with('success', 'Akte Bayi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AkteBayi $akteBayi)
    {
        $akteBayi->delete();

        // Reset ID to 1 if there are no records left
        if (AkteBayi::count() === 0) {
            \Illuminate\Support\Facades\DB::statement("ALTER TABLE akte_bayis AUTO_INCREMENT = 1");
        }

        return redirect()->route('akte-bayi.index')->with('success', 'Akte Bayi berhasil dihapus.');
    }

    /**
     * Serve file (PDF/JPG) from storage - avoids 404/403 when symlink missing.
     * Path is base64-encoded in URL to support slashes (e.g. akte_bayi/xxx.pdf).
     */
    public function serveFile(string $path)
    {
        $path = base64_decode($path, true);
        if ($path === false || $path === '') {
            abort(404);
        }
        $path = str_replace(['../', '..\\'], '', $path);
        if (!str_starts_with($path, 'akte_bayi/')) {
            abort(404);
        }
        if (!Storage::disk('public')->exists($path)) {
            abort(404);
        }
        $content = Storage::disk('public')->get($path);
        $mimeType = Storage::disk('public')->mimeType($path) ?: 'application/octet-stream';
        $filename = basename($path);

        return response($content, 200, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="' . $filename . '"',
        ]);
    }
}
