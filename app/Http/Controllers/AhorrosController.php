<?php

namespace WP\Http\Controllers;

use Illuminate\Http\Request;

use WP\Http\Requests;
use Session;
use Redirect;
use WP\Empleado;

class AhorrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function actionIndex()
 {
  Excel::create('Mi primer archivo excel desde Laravel', function($excel)
  {
   $excel->sheet('Sheetname', function($sheet)
   {
    $sheet->mergeCells('A1:C1');

    $sheet->setBorder('A1:F1', 'thin');

    $sheet->cells('A1:F1', function($cells)
    {
     $cells->setBackground('#000000');
     $cells->setFontColor('#FFFFFF');
     $cells->setAlignment('center');
     $cells->setValignment('center');
    });

    $sheet->setWidth(array
     (
      'D' => '50'
     )
    );

    $sheet->setHeight(array
     (
      '1' => '50'
     )
    );

    $data=[];

    array_push($data, array('Kevin', '', '', 'Arnold', 'Arias', 'Figueroa'));

    $sheet->fromArray($data, null, 'A1', false, false);
   });
  })->download('xlsx');

  //return View::make('index');
 }

    public function index()
    {
        $aho = \WP\Ahorro::paginate(3);
        return view('ahorros.lista',compact('aho'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $emp = Empleado::pluck('nomb','id');
        return view('ahorros.crear',compact('emp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         \WP\Ahorro::create($request->all());

       Session::flash('message','Ahorro Ingresado Correctamente');
        return Redirect::to('/ahorros');
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
        $emp = Empleado::pluck('nomb','id');
        $aho = \WP\Ahorro::find($id);
        return view ('ahorros.editar',['aho'=>$aho],compact('emp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $aho = \WP\Ahorro::find($id);
        $aho -> fill($request->all());
        $aho -> save();

        //dept = ahorros

        Session::flash('message','Ahorro Editado Correctamente');
        return Redirect::to('/ahorros');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \WP\Ahorro::destroy($id);
        Session::flash('message','Ahorro Eliminado Correctamente');
        return Redirect::to('/ahorros');
    }
}
