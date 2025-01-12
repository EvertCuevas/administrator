<?php
namespace App\Controllers;

use App\Models\CategoriaModel;
class Categoria extends BaseController
{
    protected $CategoriaModel;
    public function __construct()
    {
        $this->CategoriaModel = new CategoriaModel();   
    }
    public function index()
    {
    }
    public function ingreso()
    {
        $array = session()->get('permisos');
        if($array){
            if(in_array(3, $array)){
                $list_asiento = $this->CategoriaModel->lista_Asiento(1);
                $lista_Categoria = $this->CategoriaModel->lista_Categoria(1);

                $data = [   'title'             => 'Página de categoria - ingresos',
                            'contenido'         => 'categoria/ingreso',
                            'lista_Categoria'   => $lista_Categoria,
                            'list_asiento'      => $list_asiento
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
            if(in_array(3, $array)){
                $list_asiento = $this->CategoriaModel->lista_Asiento(2);
                $lista_Categoria = $this->CategoriaModel->lista_Categoria(2);

                $data = [   'title'             => 'Página de categoria - ingresos',
                            'contenido'         => 'categoria/egreso',
                            'lista_Categoria'   => $lista_Categoria,
                            'list_asiento'      => $list_asiento
                        ];
                return view('template/dashboard', $data);
            }else{
                return redirect('Home');
            }
        }else{  
            return redirect('Home');
        }  
    }

    public function registro_categoria()
    {
        $array = session()->get('permisos');
        if($array){
            if(in_array(3, $array)){
                $id_nivel = $this->request->getPost('id_nivel');
                $nom_categoria = $this->request->getPost('nom_categoria');

                $this->CategoriaModel->registro_Categoria($id_nivel, $nom_categoria);
                
                if($id_nivel == 1){
                    return redirect('cat-ingreso');
                }else{
                    return redirect('cat-egreso');
                }
            }else{
                return redirect('Home');
            }
        }else{  
            return redirect('Home');
        }        
    }

    public function registro_asiento()
    {
        $array = session()->get('permisos');
        if($array){
            if(in_array(3, $array)){
                $id_nivel = $this->request->getPost('id_nivel');
                $id_categoria = $this->request->getPost('id_categoria');
                $nom_asiento = $this->request->getPost('nom_asiento');
                $cod_asiento = $this->request->getPost('cod_asiento');

                $this->CategoriaModel->registro_Asiento($id_categoria, $nom_asiento,$cod_asiento);
                
                if($id_nivel == 1){
                    return redirect('cat-ingreso');
                }else{
                    return redirect('cat-egreso');
                }
            }else{
                return redirect('Home');
            }
        }else{  
            return redirect('Home');
        }      
    }

    public function lista_asiento()
    {
        $array = session()->get('permisos');
        if($array){
            if(in_array(3, $array)){
                $id_Categoria = $this->request->getPost('idCategoria');
            
                if($id_Categoria){
                    $lista = $this->CategoriaModel->lista_Categoria_Asiento($id_Categoria);
                
                    foreach($lista as $fila){
                        echo '<option value="'. $fila->ID_SEAT .'">'. $fila->NAME_SEAT .'</option>';
                    }
                }  else {
                    echo '<option selected disabled value="">Registre categoria</option>';
                }
            }else{
                return redirect('Home');
            }
        }else{  
            return redirect('Home');
        }         
    }
}

// session()->setFlashdata('toast_success', '¡La acción fue exitosa!');
// session()->setFlashdata('toast_waning', 'Datos Actualizados');
// session()->setFlashdata('toast_error', '¡ERROR al realizar la acción!');