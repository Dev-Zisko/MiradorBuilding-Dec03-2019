<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Bill;
use App\User;

class SendFacturas extends Mailable
{
    use Queueable, SerializesModels;
    public $newid;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($newid)
    {
        $this->newid = $newid;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $bill = Bill::find($this->newid);
        $user = User::find($bill->id_user);
        $validate = 0;
        $validate1 = 0;
        $details = \DB::table('details')->where('id_bill', $this->newid)->orderBy('prioridad', 'ASC')->get();
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
        return $this->from('condominio-grano@grano.methodologic.com.ve')->subject('Recibo de Condominio')->view('mails.sendfacturas')->with('bill', $bill)->with('user', $user)->with('details', $details)->with('total', $total)->with('validate', $validate)->with('validate1', $validate1);
    }
}
