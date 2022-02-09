<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\Employes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employes = DB::select('SELECT employes.*, companies.Name FROM companies INNER JOIN employes WHERE companies.id = employes.Company_id');
        $companies = Companies::all();
        return view('admin.employes.index', [
            'employes' => $employes,
            'companies' => $companies      
        ]);
        
    }

    

    public function store(Request $request)
    {
      
        $validated = $request->validate([
            'FirstName' =>  'required',
            'LastName' => 'required',
        ],
    [
       'FirstName.required' => 'Primer Nombre es Requerido' ,
       'LastName.required' => 'Segundo Nombre es Requerido' ,
    ]);
         $request->except('_token');
         $employe = $request->all();
         $employe = $request->except('_token');
         $buscarPhoneEmail = DB::select("SELECT count(*) as 'Encontrados' FROM employes WHERE (Email = ? OR Phone = ?)",
            [$request->Email, $request->Phone]);
         if($buscarPhoneEmail[0]->Encontrados <= 0){

            Employes::insert($employe);
            // return response()->json($companie);
            return redirect()->route('adminEmployes')->with('success', 'Empleado Registrado');
         }else{
            return redirect()->route('adminEmployes')->with('error', 'Email o Telefono repetido');

         }
    }
 
    public function edit($id)
    {
      $employe = Employes::findOrFail($id);
      $companies = Companies::all();
      return view('admin.employes.edit', [
        'employe' => $employe,
        'companies' => $companies  
      ]);
    }

  
    public function update(Request $request, $id)
    {
        $datosEmploye = $request->except(['_token', '_method']);
    
        //buscar el email y el nombre de la compañia en los demás registros exceptuando este
         $buscarDatosEmail_o_Phone= DB::select("SELECT count(*) as 'Encontrados' FROM employes WHERE 
          (Phone = ? OR Email = ?) AND id != ?",
        [$request->Phone, $request->Email, $id]);
        if($buscarDatosEmail_o_Phone[0]->Encontrados <= 0){
           
    
            employes::where('id', '=', $id)->update($datosEmploye);
            $employe = Employes::findOrFail($id);
            return redirect()->route('adminEmployesEdit',compact('employe'))
            ->with('successUpdate','Registro Actualizado Correctamente.');

        }else{
            $employe = Employes::findOrFail($id);
            return redirect()->route('adminEmployesEdit', compact('employe'))->with('errorUpdate', 'Telefono o Email ya registrados, no se pudo modificar');

        }

    }

  
    public function destroy($id)
    {
        Employes::destroy($id);
        return redirect()->route('adminEmployes')->with('successDelete', 'Registro Borrado Correctamente');
    }
}
