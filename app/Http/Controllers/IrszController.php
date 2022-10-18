<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Exports\IrszExport;
use Maatwebsite\Excel\Facades\Excel;

class IrszController extends Controller
{
    public function index(){
        return view('irsz.index');
    }
    public function upload(request $request){
        
        if($request->hasfile('filename'))
        {  $datas=[];
           $i=0; 
           foreach($request->file('filename') as $file)
           {
               
               $name=$i.'.txt';
               
               $file->move(public_path().DIRECTORY_SEPARATOR.'fileok', $name);  
               $filecontent = file_get_contents(public_path().DIRECTORY_SEPARATOR.'fileok'.DIRECTORY_SEPARATOR.$name, true);
               $exploded=explode('</caption>',$filecontent);
               $exploded=explode('</table>',$exploded[1]);
               $exploded=explode('</tr>',$exploded[0]);
               for($i2=0;$i2<count($exploded)-1;$i2++){
               $row=$exploded[$i2];
               $exploded2=explode('</td>',$row);
               $irsz=substr($exploded2[0],-4);
               $varos=explode('<td>',$exploded2[1])[1];
               $utca=explode('<td>',$exploded2[2])[1];
               $datas[]=array($irsz,$varos,$utca);
               }
               $i++; 
           }
        }
        //dd($datas);

        foreach($datas as $row){
            $sor=DB::table('irsz')->where('irsz','=',$row[0])->where('varos','=',$row[1])->where('utca','=',$row[2])->first();
            if(!$sor){
                $id = DB::table('irsz')->insertGetId(
                    array(
                    'irsz' => $row[0], 
                    'varos' => $row[1], 
                    'utca' => $row[2] 
                    ));
            }
        }
        return redirect()->route('wellcome.index');
    }

    public function export() 
    {
        return Excel::download(new IrszExport, 'irsz.xlsx');
    }
}
