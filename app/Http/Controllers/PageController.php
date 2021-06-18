<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ExpenseRequest;
use App\Http\Requests\BillRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendFacturas;
use Auth;
use App\User;
use App\Expense;
use App\Bill;
use App\Detail;
use Exception;

class PageController extends Controller
{
    //**************************************************************************
    //CONTROLADORA PARA LAS VISTAS
    //**************************************************************************
    public function view_index(){
        try{
            return view('grano');
        }catch(Exception $ex){
            $mensaje = "Error inesperado. Asegurese de tener conexión a internet e intente nuevamente.";
            return view('error');
        } 
    }

    public function view_error(){
        $mensaje = "Error inesperado. Asegurese de tener conexión a internet e intente nuevamente.";
        return view('error', compact('mensaje'));
    }

    public function view_login(){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                return view('dashboard');
            }
            else if($rol == "User"){
                $iduser = Auth::user()->id;
                $bills = \DB::table('bills')->where('id_user', $iduser)->orderBy('año','DESC')->orderBy('mes', 'DESC')->paginate(60);
                return view('principal', compact('bills'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_sinpagar(){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $users = \DB::table('users')->orderBy('id', 'ASC')->get();
                $bills = \DB::table('bills')->where('estado', 'Sin Pagar')->orderBy('año', 'DESC')->orderBy('mes', 'DESC')->paginate(60);
                return view('sinpagar', compact('bills', 'users'));
            }
            else if($rol == "User"){
                return view('grano');
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_procesando(){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $users = \DB::table('users')->orderBy('id', 'ASC')->get();
                $bills = \DB::table('bills')->where('estado', 'Procesando')->orderBy('año', 'DESC')->orderBy('mes', 'DESC')->paginate(60);
                return view('procesando', compact('bills', 'users'));
            }
            else if($rol == "User"){
                return view('grano');
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_pagado(){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $users = \DB::table('users')->orderBy('id', 'ASC')->get();
                $añomayor = \DB::table('bills')->max('año');
                $mesmayor = \DB::table('bills')->where('año', $añomayor)->max('mes');
                $bills = \DB::table('bills')->where('estado', 'Pagada')->where('mes', $mesmayor)->where('año', $añomayor)->paginate(53);
                $contbills = count($bills);
                return view('pagado', compact('bills', 'users', 'contbills'));
            }
            else if($rol == "User"){
                return view('grano');
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }
    
    public function view_sinvalidez(){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $users = \DB::table('users')->orderBy('id', 'ASC')->get();
                $bills = \DB::table('bills')->where('estado', 'Sin Validez')->orderBy('año', 'DESC')->orderBy('mes', 'DESC')->paginate(60);
                return view('sinvalidez', compact('bills', 'users'));
            }
            else if($rol == "User"){
                return view('grano');
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_reportar(){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $iduser = Auth::user()->id;
                $bills = \DB::table('bills')->where('id_user', $iduser)->orderBy('año','DESC')->orderBy('mes', 'DESC')->paginate(60);
                return view('reportar', compact('bills'));
            }
            else if($rol == "User"){
                $iduser = Auth::user()->id;
                $bills = \DB::table('bills')->where('id_user', $iduser)->orderBy('año','DESC')->orderBy('mes', 'DESC')->paginate(60);
                return view('reportar', compact('bills'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_pendientes(){
        try{
            $users = \DB::table('users')->orderBy('id', 'ASC')->get();
            $bills = \DB::table('bills')->where('estado', 'Sin Pagar')->orderBy('año', 'DESC')->orderBy('mes', 'DESC')->paginate(60);
            return view('pendientes', compact('bills', 'users'));
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_pago($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "User"){
                $newid = Crypt::decrypt($id);
                $bill = Bill::find($newid);
                return view('pago', compact('bill'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_pagou($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "User"){
                $newid = Crypt::decrypt($id);
                $bill = Bill::find($newid);
                return view('pagou', compact('bill'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_pagoa($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                $bill = Bill::find($newid);
                return view('pago', compact('bill'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_pagoau($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                $bill = Bill::find($newid);
                return view('pagou', compact('bill'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_perfil(){
        try{
            $rol = Auth::user()->rol;
            if($rol == "User"){
                return view('perfil');
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_gastos(){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $expenses = \DB::table('expenses')->orderBy('prioridad', 'ASC')->paginate(60);
                return view('gastos', compact('expenses'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_gastosr(){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                return view('gastosr');
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_gastosu($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                $expense = Expense::find($newid);
                return view('gastosu', compact('expense'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_gastosd($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                $expense = Expense::find($newid);
                return view('gastosd', compact('expense'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_facturas(){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $bills = \DB::table('bills')->orderBy('año', 'DESC')->orderBy('mes', 'DESC')->paginate(53);
                $users = \DB::table('users')->orderBy('id','ASC')->get();
                $mensaje = ""; 
                return view('facturas', compact('bills', 'users', 'mensaje'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_facturasr(){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $expenses = Expense::All();
                return view('facturasr', compact('expenses'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_facturasd(){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $billsmes = \DB::table('bills')->select('mes')->get();
                $meses = $billsmes->unique();
                $billsaño = \DB::table('bills')->select('año')->get();
                $años = $billsaño->unique();
                return view('facturasd', compact('meses', 'años'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }


    public function view_usuarios(){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $users = \DB::table('users')->orderBy('id', 'ASC')->paginate(60);
                return view('usuarios', compact('users'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_usuariosr(){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                return view('usuariosr');
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_usuariosu($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                $user = User::find($newid);
                return view('usuariosu', compact('user'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_usuariosd($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                $user = User::find($newid);
                return view('usuariosd', compact('user'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_confirmar($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                $bill = Bill::find($newid);
                $user = User::find($bill->id_user);
                return view('confirmar', compact('bill', 'user'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_facturasa(){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $iduser = Auth::user()->id;
                $bills = \DB::table('bills')->where('id_user', $iduser)->orderBy('año','DESC')->orderBy('mes', 'DESC')->paginate(53);
                return view('facturasa', compact('bills'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_gastoextra($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                return view('gastoextra');
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }
    
    public function view_gastoextrau($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                $bill = Bill::find($newid);
                $user = User::find($bill->id_user);
                $details = \DB::table('details')->where('id_bill', $newid)->where('prioridad', '100000000')->orwhere('prioridad', '200000000')->get();
                return view('gastoextrau', compact('details', 'user', 'bill'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_aldia(){
        try{
            $users = \DB::table('users')->orderBy('id', 'ASC')->get();
            $aldia = array();
            $validate = 1;
            foreach($users as $user){
                $bills = \DB::table('bills')->where('id_user', $user->id)->get();
                $estado = 0;
                foreach($bills as $bill){
                    if($bill->estado == "Sin Pagar"){
                        $estado = 1;
                    }
                }
                if($estado == 0){
                    array_push($aldia, $user->apartamento);
                }
            }
            if(count($aldia) == 0){
                $validate = 0;
            }
            return view('aldia', compact('aldia', 'validate', 'users'));
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }
    
    public function view_facturamail($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                /*
                $añomayor = \DB::table('bills')->max('año');
                $mesmayor = \DB::table('bills')->where('año', $añomayor)->max('mes');
                $bills1 = \DB::table('bills')->where('mes', $mesmayor)->where('año', $añomayor)->orderBy('id_user', 'ASC')->get();
                $validate = 1;
                if($id == 1){
                    foreach($bills1 as $bill){
                        if($validate <= 27){
                            $user = User::find($bill->id_user);
                            if($validate <= 10){
                                Mail::to("jfelmejor@gmail.com")->send(new SendFacturas($bill->id));
                            }
                            else if($validate > 10 && $validate <= 20){
                                Mail::to("eldiegox300@gmail.com")->send(new SendFacturas($bill->id));
                            }
                            else if($validate > 20 && $validate <= 27){
                                Mail::to("olizisko@gmail.com")->send(new SendFacturas($bill->id));
                            }
                            
                        }
                        $validate++;
                    }
                }
                else if($id == 2){
                    foreach($bills1 as $bill){
                        if($validate > 27 && $validate <= 53){
                            $user = User::find($bill->id_user);
                            Mail::to("jfelmejor@gmail.com")->send(new SendFacturas($bill->id));  
                        }
                        $validate++;
                    }   
                }
                $bills = \DB::table('bills')->orderBy('año', 'DESC')->orderBy('mes', 'DESC')->paginate(53);
                $users = \DB::table('users')->orderBy('id','ASC')->get();
                $mensaje = "Mensajes enviados correctamente."; 
                return view('facturas', compact('bills', 'users', 'mensaje'));
                */
                $newid = Crypt::decrypt($id);
                $bill = Bill::find($newid);
                $user = User::find($bill->id_user);
                \DB::table('bills')->where('id', $bill->id)->update(['fondo'=>1]);
                Mail::to($user->email)->send(new SendFacturas($newid)); 
                $bills = \DB::table('bills')->orderBy('año', 'DESC')->orderBy('mes', 'DESC')->paginate(60);
                $users = \DB::table('users')->orderBy('id','ASC')->get();
                $mensaje = "Mensaje enviado correctamente."; 
                return view('facturas', compact('bills', 'users', 'mensaje'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Error al enviar el recibo por correo electrónico, por favor compruebe su conexión e intente nuevamente.";
            return view('error', compact('mensaje'));
        } 
    }

    //**************************************************************************
    //CONTROLADORA PARA LAS USUARIOS
    //**************************************************************************
    public function edit_perfil(UserRequest $request){
        try{
            $rol = Auth::user()->rol;
            if($rol == "User"){
                $iduser = Auth::user()->id;
                \DB::table('users')->where('id', $iduser)->update(['nombre'=>$request->nombre]);
                \DB::table('users')->where('id', $iduser)->update(['apellido'=>$request->apellido]);
                \DB::table('users')->where('id', $iduser)->update(['telefono'=>$request->telefono]);
                \DB::table('users')->where('id', $iduser)->update(['email'=>$request->email]);
                if($request->password != "" || $request->password != null){
                    \DB::table('users')->where('id', $iduser)->update(['password'=>Hash::make($request->password)]);  
                }
                return redirect('main');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar sus datos del perfil correctamente en el formulario. Puede que algún campo único como el apartamento o el correo ya esten en uso.";
            return view('error', compact('mensaje'));
        }   
    }

    public function register_usuario(UserRequest $request){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $user = new User;
                $user->nombre = $request->nombre;
                $user->apellido = $request->apellido;
                $user->telefono = $request->telefono;
                $user->email = $request->email;
                $user->apartamento = $request->apartamento;
                $user->alicuota = $request->alicuota;
                $user->rol = $request->rol;
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect('usuarios');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos del usuario correctamente.";
            return view('error', compact('mensaje'));
        }  
    }

    public function update_usuario(UserRequest $request, $id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                \DB::table('users')->where('id', $newid)->update(['nombre'=>$request->nombre]);
                \DB::table('users')->where('id', $newid)->update(['apellido'=>$request->apellido]);
                \DB::table('users')->where('id', $newid)->update(['telefono'=>$request->telefono]);
                \DB::table('users')->where('id', $newid)->update(['email'=>$request->email]);
                \DB::table('users')->where('id', $newid)->update(['apartamento'=>$request->apartamento]);
                \DB::table('users')->where('id', $newid)->update(['alicuota'=>$request->alicuota]);
                \DB::table('users')->where('id', $newid)->update(['rol'=>$request->rol]);
                if($request->password != "" || $request->password != null){
                    \DB::table('users')->where('id', $newid)->update(['password'=>Hash::make($request->password)]);  
                }
                return redirect('usuarios');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos del perfil correctamente en el formulario. Puede que algún campo único como el apartamento o el correo ya esten en uso.";
            return view('error', compact('mensaje'));
        }   
    }

    public function delete_usuario($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                \DB::table('details')->where('id_user', $newid)->delete();
                \DB::table('bills')->where('id_user', $newid)->delete();
                \DB::table('users')->where('id', $newid)->delete();
                return redirect('usuarios');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Error al eliminar el usuario.";
            return view('error', compact('mensaje'));
        }  
    }
    //**************************************************************************
    //CONTROLADORA PARA LOS GASTOS
    //**************************************************************************
    public function register_gasto(ExpenseRequest $request){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $expense = new Expense;
                $expense->nombre = $request->nombre;
                $expense->monto = $request->monto;
                $expense->prioridad = $request->prioridad;
                $expense->save();
                return redirect('gastos');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos de la categoría correctamente.";
            return view('error', compact('mensaje'));
        }  
    }

    public function update_gasto(ExpenseRequest $request, $id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                \DB::table('expenses')->where('id', $newid)->update(['nombre'=>$request->nombre]);
                \DB::table('expenses')->where('id', $newid)->update(['monto'=>$request->monto]);
                \DB::table('expenses')->where('id', $newid)->update(['prioridad'=>$request->prioridad]);
                return redirect('gastos');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos del gasto correctamente.";
            return view('error', compact('mensaje'));
        }  
    }

    public function delete_gasto($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                \DB::table('expenses')->where('id', $newid)->delete();
                return redirect('gastos');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Error al eliminar el gasto.";
            return view('error', compact('mensaje'));
        }  
    }
    //**************************************************************************
    //CONTROLADORA PARA LAS FACTURAS
    //**************************************************************************
    public function register_factura(BillRequest $request){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $idgastos = $request->gastos;
                $montototal = 0;
                $expenses = collect();
                foreach($idgastos as $id){
                   $expense = Expense::find($id);
                   $expenses->push($expense);
                }
                foreach($expenses as $expense){
                    $montototal = $montototal + $expense->monto;
                }
                $users = User::All();
                foreach ($users as $user) {
                   $fecha = explode("-", $request->fechavencimiento);
                    $bill = new Bill;
                    $bill->mes = $request->mes;
                    $bill->año = $request->año;
                    $reserva = $montototal * 0.1;
                    if($user->alicuota == "0"){
                        $bill->monto = 0;
                        $bsmonto = 0;
                    }
                    else{
                        if($user->alicuota == "1.775"){
                            if($user->apartamento == "33"){
                                $bill->monto = round(($montototal + $reserva + $request->newfondo) * (1.775/100), 2);
                                $bsmonto = round(($montototal + $reserva + $request->newfondo) * (1.775/100), 2); 
                            }else{
                                $bill->monto = round(($montototal + $reserva + $request->newfondo) * (1.8070755917536/100), 2);
                                $bsmonto = round(($montototal + $reserva + $request->newfondo) * (1.8070755917536/100), 2);
                            }
                        }
                        else if($user->alicuota == "1.622"){
                            $bill->monto = round(($montototal + $reserva + $request->newfondo) * (1.6513107660982/100), 2);
                            $bsmonto = round(($montototal + $reserva + $request->newfondo) * (1.6513107660982/100), 2);
                        }
                        else if($user->alicuota == "1.990"){
                            $bill->monto = round(($montototal + $reserva + $request->newfondo) * (2.0259608042759/100), 2);
                            $bsmonto = round(($montototal + $reserva + $request->newfondo) * (2.0259608042759/100), 2);
                        }
                        else if($user->alicuota == "2.974"){
                            $bill->monto = round(($montototal + $reserva + $request->newfondo) * (3.0277424280988/100), 2);
                            $bsmonto = round(($montototal + $reserva + $request->newfondo) * (3.0277424280988/100), 2);
                        }
                        else if($user->alicuota == "5.887"){
                            $bill->monto = round(($montototal + $reserva + $request->newfondo) * (5.9933825400865/100), 2);
                            $bsmonto = round(($montototal + $reserva + $request->newfondo) * (5.9933825400865/100), 2);
                        }
                        else if($user->alicuota == "2.835"){
                            $bill->monto = round(($montototal + $reserva + $request->newfondo) * (2.8862305930262/100), 2);
                            $bsmonto = round(($montototal + $reserva + $request->newfondo) * (2.8862305930262/100), 2);
                        }
                        else if($user->alicuota == "4.877"){
                            $bill->monto = round(($montototal + $reserva + $request->newfondo) * (4.9651310766098/100), 2);
                            $bsmonto = round(($montototal + $reserva + $request->newfondo) * (4.9651310766098/100), 2);
                        }
                    }
                    $bill->newfondo = $request->newfondo;
                    $bill->total = round($montototal + $reserva + $request->newfondo, 2);
                    $bill->reserva = round($reserva, 2);
                    $bill->tasa = $request->tasa;
                    $dolares = round($bsmonto/$request->tasa, 2);
                    $bill->dolares = $dolares;
                    $bill->fechavencimiento = $fecha[2] . "/" . $fecha[1] . "/" . $fecha[0];
                    $bill->estado = "Sin Pagar";
                    $bill->id_user = $user->id;
                    $bill->fondo = 0;
                    $bill->pagado = "-";
                    $bill->save();
                    $ultima = Bill::All()->last();
                    foreach($expenses as $expense){
                        $detail = new Detail;
                        $detail->gasto = $expense->nombre;
                        $detail->monto = $expense->monto;
                        $detail->prioridad = $expense->prioridad;
                        $detail->id_bill = $ultima->id;
                        $detail->save(); 
                    } 
                }
                return redirect('facturas');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos de la factura correctamente.";
            return view('error', compact('mensaje'));
        }  
    }
    
    public function update_facturas(Request $request, $id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                $bill = Bill::find($newid);
                $id_details = $request->gastos;
                $montototal = 0;
                $montototal1 = 0;
                foreach($id_details as $id){
                    $detail = Detail::find($id);
                    if($detail->prioridad == 100000000){
                        $montototal = $montototal + $detail->monto;
                    }
                    if($detail->prioridad == 200000000){
                        $montototal1 = $montototal1 + $detail->monto;
                    }
                    \DB::table('details')->where('id', $id)->delete();
                }
                $montonew = $bill->monto - $montototal;
                $montonew1 = $montonew + $montototal1;
                $dolares = round($montonew/$bill->tasa, 2);
                $dolares1 = round($montonew1/$bill->tasa, 2);
                \DB::table('bills')->where('id', $newid)->update(['monto'=>$montonew1]);
                \DB::table('bills')->where('id', $newid)->update(['dolares'=>$dolares1]);
                return redirect('facturas');
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Error al enviar el recibo por correo electrónico, por favor compruebe su conexión e intente nuevamente.";
            return view('error', compact('mensaje'));
        } 
    }

    public function delete_facturas(Request $request){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $bills = \DB::table('bills')->where('mes', $request->mes)->where('año', $request->año)->get();
                if(count($bills) == 0){
                    $mensaje = "Error al eliminar la factura. El mes y año no coincide con ninguna factura registrada.";
                    return view('error', compact('mensaje'));
                }
                else{
                    foreach ($bills as $bill) {
                        \DB::table('details')->where('id_bill', $bill->id)->delete();
                    }
                    \DB::table('bills')->where('mes', $request->mes)->where('año', $request->año)->delete();
                    return redirect('facturas'); 
                } 
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Error al eliminar la factura.";
            return view('error', compact('mensaje'));
        }  
    }

    public function register_gastoextra(Request $request, $id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                $bill = Bill::find($newid);
                $monto = $bill->monto;
                $detail = new Detail;
                $detail->gasto = $request->nombre;
                $detail->monto = $request->monto;
                if($request->tipo == "GastoExtra"){
                    $detail->prioridad = 100000000;
                    $montototal = $bill->monto + $request->monto;
                    $dolares = round($montototal/$bill->tasa, 2);
                    \DB::table('bills')->where('id', $newid)->update(['monto'=>$montototal]);
                    \DB::table('bills')->where('id', $newid)->update(['dolares'=>$dolares]);
                }
                if($request->tipo == "Abono"){
                    $detail->prioridad = 200000000;
                    $montototal = $bill->monto - $request->monto;
                    $dolares = round($montototal/$bill->tasa, 2);
                    \DB::table('bills')->where('id', $newid)->update(['monto'=>$montototal]);
                    \DB::table('bills')->where('id', $newid)->update(['dolares'=>$dolares]);
                }
                $detail->id_bill = $newid;
                $detail->save(); 
                return redirect('facturas');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos de la factura correctamente.";
            return view('error', compact('mensaje'));
        }  
    }

    //**************************************************************************
    //CONTROLADORA PARA LOS PAGOS
    //**************************************************************************
    public function register_pago(Request $request, $id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "User"){
                $newid = Crypt::decrypt($id);
                \DB::table('bills')->where('id', $newid)->update(['transferencia'=>$request->transferencia]);
                $fechacortada = explode("-", $request->fechatrans);
                $fecha = $fechacortada[2] . "/" . $fechacortada[1] . "/" . $fechacortada[0];
                \DB::table('bills')->where('id', $newid)->update(['pagado'=>$request->monto]);
                \DB::table('bills')->where('id', $newid)->update(['fechatrans'=>$fecha]);
                \DB::table('bills')->where('id', $newid)->update(['estado'=>"Procesando"]);
                return redirect('main');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos del pago correctamente.";
            return view('error', compact('mensaje'));
        }  
    }

    public function register_pagou(Request $request, $id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "User"){
                $newid = Crypt::decrypt($id);
                \DB::table('bills')->where('id', $newid)->update(['transferencia'=>$request->transferencia]);
                $fechacortada = explode("-", $request->fechatrans);
                $fecha = $fechacortada[2] . "/" . $fechacortada[1] . "/" . $fechacortada[0];
                \DB::table('bills')->where('id', $newid)->update(['pagado'=>$request->monto]);
                \DB::table('bills')->where('id', $newid)->update(['fechatrans'=>$fecha]);
                \DB::table('bills')->where('id', $newid)->update(['estado'=>"Procesando"]);
                return redirect('main');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos del pago correctamente.";
            return view('error', compact('mensaje'));
        }  
    }

    public function register_pagoa(Request $request, $id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                \DB::table('bills')->where('id', $newid)->update(['transferencia'=>$request->transferencia]);
                $fechacortada = explode("-", $request->fechatrans);
                $fecha = $fechacortada[2] . "/" . $fechacortada[1] . "/" . $fechacortada[0];
                \DB::table('bills')->where('id', $newid)->update(['pagado'=>$request->monto]);
                \DB::table('bills')->where('id', $newid)->update(['fechatrans'=>$fecha]);
                \DB::table('bills')->where('id', $newid)->update(['estado'=>"Procesando"]);
                return redirect('facturasa');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos del pago correctamente.";
            return view('error', compact('mensaje'));
        }  
    }

    public function register_pagoau(Request $request, $id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                \DB::table('bills')->where('id', $newid)->update(['transferencia'=>$request->transferencia]);
                $fechacortada = explode("-", $request->fechatrans);
                $fecha = $fechacortada[2] . "/" . $fechacortada[1] . "/" . $fechacortada[0];
                \DB::table('bills')->where('id', $newid)->update(['pagado'=>$request->monto]);
                \DB::table('bills')->where('id', $newid)->update(['fechatrans'=>$fecha]);
                \DB::table('bills')->where('id', $newid)->update(['estado'=>"Procesando"]);
                return redirect('facturasa');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos del pago correctamente.";
            return view('error', compact('mensaje'));
        }  
    }

    public function update_estado(Request $request, $id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                $bill = Bill::find($newid);
                $validacionState = $bill->estado;
                if($request->estado == "Sin Pagar"){
                    \DB::table('bills')->where('id', $newid)->update(['pagado'=>"-"]);
                    \DB::table('bills')->where('id', $newid)->update(['transferencia'=>null]);
                    \DB::table('bills')->where('id', $newid)->update(['fechatrans'=>null]);
                    \DB::table('bills')->where('id', $newid)->update(['estado'=>"Sin Pagar"]); 
                }
                else if($request->estado == "Procesando"){
                    if($request->transferencia != ""){
                        \DB::table('bills')->where('id', $newid)->update(['transferencia'=>$request->transferencia]);
                    }
                    if($request->fechatrans != ""){
                        $fechacortada = explode("-", $request->fechatrans);
                        $fecha = $fechacortada[2] . "/" . $fechacortada[1] . "/" . $fechacortada[0];
                        \DB::table('bills')->where('id', $newid)->update(['fechatrans'=>$fecha]);
                    }
                    if($request->monto != ""){
                        \DB::table('bills')->where('id', $newid)->update(['pagado'=>$request->monto]);
                    }
                    \DB::table('bills')->where('id', $newid)->update(['estado'=>"Procesando"]); 
                }
                else if($request->estado == "Pagada"){
                    if($request->transferencia != ""){
                        \DB::table('bills')->where('id', $newid)->update(['transferencia'=>$request->transferencia]);
                    }
                    if($request->fechatrans != ""){
                        $fechacortada = explode("-", $request->fechatrans);
                        $fecha = $fechacortada[2] . "/" . $fechacortada[1] . "/" . $fechacortada[0];
                        \DB::table('bills')->where('id', $newid)->update(['fechatrans'=>$fecha]);
                    }
                    if($request->monto != ""){
                        \DB::table('bills')->where('id', $newid)->update(['pagado'=>$request->monto]);
                    }
                    \DB::table('bills')->where('id', $newid)->update(['estado'=>"Pagada"]); 
                }
                else if($request->estado == "Sin Validez"){
                    \DB::table('bills')->where('id', $newid)->update(['pagado'=>"-"]);
                    \DB::table('bills')->where('id', $newid)->update(['transferencia'=>null]);
                    \DB::table('bills')->where('id', $newid)->update(['fechatrans'=>null]);
                    \DB::table('bills')->where('id', $newid)->update(['estado'=>"Sin Validez"]); 
                }
                if($validacionState == "Sin Pagar"){
                    return redirect('sinpagar');
                }
                if($validacionState == "Procesando"){
                    return redirect('procesando');
                }
                if($validacionState == "Pagada"){
                    return redirect('pagado');
                }
                if($validacionState == "Sin Validez"){
                    return redirect('sinvalidez');
                }
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos del pago correctamente.";
            return view('error', compact('mensaje'));
        }  
    }
    //**************************************************************************
    //CONTROLADORA PARA LOS PDFS
    //**************************************************************************
    public function generate_pdf($id) 
    {
        $newid = Crypt::decrypt($id);
        $bill = Bill::find($newid);
        $user = User::find($bill->id_user);
        $validate = 0;
        $validate1 = 0;
        $details = \DB::table('details')->where('id_bill', $newid)->orderBy('prioridad', 'ASC')->get();
        foreach($details as $detail){
            if($detail->prioridad == 100000000){
                $validate = 1;
            }
            if($detail->prioridad == 200000000){
                $validate1 = 1;
            }
        }
        if($bill->newfondo != "-"){
           $total = $bill->total - $bill->reserva - $bill->newfondo; 
        }
        else{
            $total = $bill->total - $bill->reserva;
        }
        $view =  \View::make('factura', compact('bill', 'details', 'total', 'validate', 'validate1', 'user'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('factura');
    }

}
