<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\TipoReserva;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('servicios.index',['servicios'=>Servicio::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicios.create',['TipoReservas'=>TipoReserva::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ser=Servicio::create($request->all());
        return redirect()->route('servicios.index')->with('success',$ser->nombre.' CREADO EXITOSAMENTE');
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        return view('servicios.show',['servicio'=>$servicio]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio)
    {
        
        return view('servicios.edit',[
            'TipoReservas'=>TipoReserva::all(),
            'servicio'=>$servicio
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servicio $servicio)
    {
        $servicio->update($request->all());
        return redirect()->route('servicios.index')->with('success',$servicio->nombre.' ACTUALIZADO EXITOSAMENTE');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio)
    {
        $msg=$servicio->nombre.' ELIMINADO EXITOSAMENTE';
        $type='success';
        try {
            $servicio->delete();
        } catch (\Throwable $th) {
            $msg=$servicio->nombre.' NO ELIMINADO YA QUE SE ENCUENTRA RELACIONADO CON OTRAS AREAS DEL SISTEMA';
            $type='info';
        }
        return redirect()->route('servicios.index')->with($type,$msg);
    }

    public function fotos($id){
        $ser=Servicio::findOrFail($id);
        return view('servicios.fotos',['servicio'=>$ser]);
    }

    public function fotosGuardar(Request $request) {
        
        $cancha=Servicio::findOrFail($request->id);

        if ($request->hasFile('foto1')) {
            $archivo = $request->file('foto1');
            if ($archivo->isValid()) {
                Storage::delete($cancha->foto_1??'');
                $path = Storage::putFileAs(
                    'public/servicio1',
                    $archivo,
                    $cancha->id . '.' . $archivo->extension()
                );
                $cancha->foto_1 = $path;
            }
        }

        if ($request->hasFile('foto2')) {
            $archivo = $request->file('foto2');
            if ($archivo->isValid()) {
                Storage::delete($cancha->foto_2??'');
                $path = Storage::putFileAs(
                    'public/servicio2',
                    $archivo,
                    $cancha->id . '.' . $archivo->extension()
                );
                $cancha->foto_2 = $path;
            }
        }
        if ($request->hasFile('foto3')) {
            $archivo = $request->file('foto3');
            if ($archivo->isValid()) {
                Storage::delete($cancha->foto_3??'');
                $path = Storage::putFileAs(
                    'public/servicio3',
                    $archivo,
                    $cancha->id . '.' . $archivo->extension()
                );
                $cancha->foto_3 = $path;
            }
        }
        if ($request->hasFile('foto4')) {
            $archivo = $request->file('foto4');
            if ($archivo->isValid()) {
                Storage::delete($cancha->foto_4??'');
                $path = Storage::putFileAs(
                    'public/servicio4',
                    $archivo,
                    $cancha->id . '.' . $archivo->extension()
                );
                $cancha->foto_4 = $path;
            }
        }

        $cancha->save();
        return redirect()->route('servicios.fotos',$cancha->id)->with('success','FOTO GUARDADO');

    }

    public function verFoto($servicioId,$numero) {
        $servicio=Servicio::find($servicioId);
        switch ($numero) {
            case 1:
                return Storage::get($servicio->foto_1);
                break;
            case 2:
                return Storage::get($servicio->foto_2);
                break;
            case 3:
                return Storage::get($servicio->foto_3);
                break;
            case 4:
                return Storage::get($servicio->foto_4);
                break;
            default:
                # code...
                break;
        }
    }
}
