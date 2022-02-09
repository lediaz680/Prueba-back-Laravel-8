<?php

namespace App\Http\Controllers;

use App\Mail\messageCompany;
use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.companies.index', [
            'companies' => DB::table('companies')->paginate(10)
        ]);
      
    }

    public function consultarName($dato)
    {
        return $dato;
    }
   
 
    public function store(Request $request)
    {
        $cont=0;
   
    $validated = $request->validate([
        'Name' =>  'required',
            'Email' => 'required',
            'Logo' => 'dimensions:min_width=100,min_height=100|max:5000',
    ]);
        $companie = $request->all();
        $companie = $request->except('_token');
        $buscarName = Companies::where('Name', $request->Name)->first();
        if($buscarName == NULL){
          $cont+= $cont;

        }else{
           
        return redirect()->route('adminCompanies')->with('errorName', 'El Nombre de la compañia ya existe');
        }

        $buscarEmail = Companies::where('Email', $request->Email)->first();
        if($buscarEmail == NULL){
            $cont+= $cont;
        }else{
           
            return redirect()->route('adminCompanies')->with('errorEmail', 'El Email de la compañia ya existe');

        }


        if($request->hasFile('Logo'))
        {
            $companie['Logo'] = $request->file('Logo')->store('uploads','public');

        }

        Companies::insert($companie);

        //LUEGO DE LA INSERSION DE DATOS SE REALIZA EL ENVIO DE EMAIL 
        // RECORDAR CAMBIAR LAS CONFIGURACIONES EN .ENV PARA EL ENVIO DE CORREOS
        Mail::to($request->Email)->send(new messageCompany);

        return redirect()->route('adminCompanies')->with('success', 'Compañia Registrada y Mensaje Enviado');

      
    }

   
    public function edit($id)
    {
      $company = Companies::findOrFail($id);

      return view('admin.companies.edit', compact('company'));
    }

  
    public function update(Request $request, $id)
    {

        $validated = $request->validate([
                'Name' =>  'required',
                'Email' => 'required',
                'Logo' => 'dimensions:min_width=100,min_height=100|max:5000',
        ]);

        $datosCompany = $request->except(['_token', '_method']);
    
        //buscar el email y el nombre de la compañia en los demás registros exceptuando este
         $buscarDatosEmail_o_Name = DB::select("SELECT count(*) as 'Encontrados' FROM companies WHERE  (Name = ? OR Email = ?) AND id != ?",
        [$request->Name, $request->Email, $id]);
        if($buscarDatosEmail_o_Name[0]->Encontrados <= 0){
            if($request->hasFile('Logo'))
            {
                $company = Companies::findOrFail($id);
                
                Storage::delete('public/'.$company->Logo);
                $datosCompany['Logo'] = $request->file('Logo')->store('uploads','public');
    
            }
    
            Companies::where('id', '=', $id)->update($datosCompany);
            $company = Companies::findOrFail($id);
            return redirect()->route('adminCompaniesEdit',compact('company'))
            ->with('successUpdate','Registro Actualizado Correctamente.');

        }else{
            $company = Companies::findOrFail($id);
            return redirect()->route('adminCompaniesEdit', compact('company'))->with('errorUpdate', 'Verifique el Email o el Name de la compañia, ya existen.');

        }

       
    }

   
    public function destroy($id)
    {
        //verificar si no tiene empleados asociados a esta
        $VerificarEmpleados = DB::select("SELECT COUNT(*) as 'EmpleadosEncontrados' FROM employes WHERE Company_id = ?", [$id]);
    
        if($VerificarEmpleados[0]->EmpleadosEncontrados){
            return redirect()->route('adminCompanies')->with('errorDelete', 'La compañia tiene empleados asociados, por ende no se puede eliminar');
        }else{
        Companies::destroy($id);
        return redirect()->route('adminCompanies')->with('successDelete', 'Registro Borrado Correctamente');
        }
        

    }
}
