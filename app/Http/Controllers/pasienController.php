<?php

namespace App\Http\Controllers;

use App\Models\pasien;
use Illuminate\Http\Request;

class pasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
	{
        # menggunakan model pasien untuk select data 
		$pasiens = pasien::all();

		if (!empty($pasiens)) {
			$response = [
				'message' => 'Menampilkan Data Semua pasien',
				'data' => $pasiens,
			];
			return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Data tidak ada'
			];
			return response()->json($response, 404);
		}
	}

	public function store(Request $request) 
	{
        #validate
        $validateData = $request->validate([
            'nama' => 'required',
            'no' => 'numeric|required',
            'alamat' => 'email|required',
            'setatus' => 'required',
            'in_date_at' => 'numeric',
            'out_date_at' => 'numeric'
        ]);

        $pasien = pasien::create($validateData);


        $data = [
            'message' => 'data pasien berhasil di buat',
            'data' => $pasien,
        ];

        // mengembalikan data (json) dan kode 201
        return response()->json($data, 201);
    }

    # memberikan audhentication 
	public function show($id)
	{
		$pasien = pasien::find($id);

		if ($pasien) {
			$response = [
				'message' => 'Get detail pasien',
				'data' => $pasien
			];
	
			return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Data not found'
			];
			
			return response()->json($response, 404);
		}
	}
    # meng update date pasien 
	public function update(Request $request, $id)
	{
		$pasien = pasien::find($id);

		if ($pasien) {
			$response = [
				'message' => 'data pasien berhasil di update',
				'data' => $pasien->update($request->all())
			];
	
			return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Data not found'
			];

			return response()->json($response, 404);
		}
	}

     # menghapus data pasien
	public function destroy($id)
	{
		$pasien = pasien::find($id);

		if ($pasien) {
			$response = [
				'message' => 'data pasin berhasil di hapus',
				'data' => $pasien->delete()
			];

			return response()->json($response, 200); 
		} else {
			$response = [
				'message' => 'Data not found'
			];

			return response()->json($response, 404);
		}
	}
}
