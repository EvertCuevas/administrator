<?php

namespace App\Controllers;

use App\Models\CategoriaModel;
use App\Models\InstitucionModel;
use App\Models\ReciboModel;
use App\Models\EstudianteModel;

class Transaccion extends BaseController
{
    protected $CategoriaModel;
    protected $InstitucionModel;
    protected $ReciboModel;
    protected $EstudianteModel;

    public function __construct()
    {
        $this->CategoriaModel       = new CategoriaModel();   
        $this->InstitucionModel     = new InstitucionModel();   
        $this->ReciboModel          = new ReciboModel();   
        $this->EstudianteModel     = new EstudianteModel();   
    }
    public function index()
    {
    }
    public function ingreso()
    {
        $array = session()->get('permisos');
        if($array){
            if(in_array(4, $array)){
                $lista_Institucion = $this->InstitucionModel->lista_School();
                $lista_Recibo = $this->ReciboModel->lista_Recibo(1);
                $lista_Categoria = $this->CategoriaModel->lista_Categoria(1);

                $data = [   'title'             => 'Página de trnsaccion - ingresos',
                            'contenido'         => 'transaccion/ingreso',
                            'lista_Institucion' => $lista_Institucion,
                            'lista_Recibo'      => $lista_Recibo,
                            'lista_Categoria'   => $lista_Categoria
                        ];
                return view('template/dashboard', $data);
            }else{
                return redirect('Home');
            }
        }else{
            return redirect('Home');
        }    
    }
    public function egreso()
    {
        $array = session()->get('permisos');
        if($array){
            if(in_array(4, $array)){
                $lista_Institucion = $this->InstitucionModel->lista_School();
                $lista_Recibo = $this->ReciboModel->lista_Recibo(2);
                $lista_Categoria = $this->CategoriaModel->lista_Categoria(2);

                $data = [   'title'             => 'Página de trnsaccion - egresos',
                            'contenido'         => 'transaccion/egreso',
                            'lista_Institucion' => $lista_Institucion,
                            'lista_Recibo'      => $lista_Recibo,
                            'lista_Categoria'   => $lista_Categoria
                        ];
                return view('template/dashboard', $data);
            }else{
                return redirect('Home');
            }
        }else{
            return redirect('Home');
        } 
    }
        
    public function registro_ingreso()
    {
        $array = session()->get('permisos');
        if($array){
            if(in_array(4, $array)){
                $consulta = $this->ReciboModel->numero_Receipt();
                if($consulta){
                    $number = $consulta->dato + 1;
                }else{
                    $number = 1;
                }

                $id_seat        = $this->request->getPost('cod_asiento');
                $id_school      = $this->request->getPost('cod_institucion');
                $carrier        = $this->request->getPost('nombre');
                $ci_carrier     = $this->request->getPost('ci_nombre');
                $description    = $this->request->getPost('descripcion');
                $type_pay       = $this->request->getPost('tipo');
                $amount         = $this->request->getPost('monto');
                $id_nivel       = $this->request->getPost('id_nivel');

                $this->ReciboModel->registro_Receipt($id_seat,$id_school,$carrier,$ci_carrier,$description,$type_pay,$amount,$number);
                
                if($id_nivel == 1){
                    return redirect('tran-ingreso');
                }else{
                    return redirect('tran-egreso');
                }
            }else{
                return redirect('Home');
            }
        }else{  
            return redirect('Home');
        } 
    }
    
    public function aporte()
    {
        $array = session()->get('permisos');
        if($array){
            if(in_array(4, $array)){

                $lista_Curso = $this->EstudianteModel->lista_Curso();

                $data = [   'title'         => 'Página de trnsaccion aporte - buscar estudiante',
                            'contenido'     => 'transaccion/buscar_est',
                            'lista_Curso'   => $lista_Curso
                        ];
                return view('template/dashboard', $data);
            }else{
                return redirect('Home');
            }
        }else{
            return redirect('Home');
        }  
    }

    public function pago_aporte($dato)
    {
        $array = session()->get('permisos');
        if($array){
            if(in_array(4, $array)){

                $data = [   'title'             => 'Página de trnsaccion - aporte',
                            'contenido'         => 'transaccion/aporte'
                        ];
                return view('template/dashboard', $data);
            }else{
                return redirect('Home');
            }
        }else{
            return redirect('Home');
        }  
    }
    
}