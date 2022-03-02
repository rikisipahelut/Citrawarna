<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Company::paginate(5);
        return view('company.index',['companies'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'logo' => 'mimes:png|max:2000',
                'website' => 'required',
            ]);
            
            if($request->logo){
                $logo = explode('.',$request->logo->getClientOriginalName());
                $logo=$logo[0];
                $logo_name = $logo.'-'.time().'.'.$request->logo->extension();
                $request->logo->move(public_path('image/company'),$logo_name);
            }
           

            Company::create([
                'name' => $request->name,
                'email' => $request->email,
                'logo' => $logo_name ? $logo_name : null,
                'website' => $request->website,
            ]);
            return redirect('/company')->with('status','Data Company Berhasil Ditambahkan!!!');
     

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $data = Company::where('id',$id)->get();
        // dd($data);
        return view('company.form-edit',['details'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $logo_name = $company->logo;
        if(empty($request->logo)){
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'website' => 'required',
            ]);
            
            
        }else{
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'logo' => 'mimes:png|max:2000',
                'website' => 'required',
            ]);

            $logo = explode('.',$request->logo->getClientOriginalName());
            $logo=$logo[0];
            $logo_name = $logo.'-'.time().'.'.$request->logo->extension();
            $request->logo->move(public_path('image/company'),$logo_name);
            $logo_name = $logo_name;

            $image_path = public_path("/image/company/".$company->logo);
            if(file_exists($image_path)) {
                unlink($image_path);
            }



        }

            $company->update([
                'name' => $request->name,
                'email' => $request->email,
                'logo' => $logo_name,
                'website' => $request->website,
        ]);

        return redirect('/company')->with('status','Data Company Berhasil DiUpdate!');


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        // dd($company);
        $image_path = public_path("/image/company/".$company->logo);
        // dd($image_path);
        if(file_exists($image_path)) {
            unlink($image_path);
            $company->delete();
            return redirect('/company')->with('status','data berhasil dihapus');
        }else{
            return "gagal";
        }
        
    }
}
