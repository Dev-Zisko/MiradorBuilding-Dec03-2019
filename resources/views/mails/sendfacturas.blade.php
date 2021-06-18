<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">
    table,thead,tbody,tfoot,tr,th,td,p { font-family: 'Calibri'; padding: 1px; }
</style>
<body>
<h3 style="text-align: justify; font-weight: bold; font-size: 1.3em;">Estimados vecinos del Edificio Grano, aparte de saludarles cordialmente, les recordamos los siguientes puntos:</h3>
<p style="text-align: justify; font-size: 1.3em; font-weight: bold;">1.  REPORTE SU PAGO ANTES DEL DÍA 8 DE CADA MES. <u>Pago no reportado, es pago NO realizado.</u> Es muy importante que reporten sus pagos en la pag web del edificio: http://www.methodologic.com.ve/grano/</p>
<p style="text-align: justify; font-size: 1.3em; font-weight: bold;">2.  REALICE SU PAGO EXACTO . Todo  excedente pasará a formar parte del fondo de reserva. <u>No se realizarán reembolsos.</u></p>
<p style="text-align: justify; font-size: 1.3em; font-weight: bold;">3.  PAGO MOVIL: Motivado a la cuarentena y a problemas de sistema del banco, no hemos podido hacer los cambios pertinentes a la nueva junta, por lo que solicitamos NO HACER PAGOS POR ESTE MEDIO hasta nuevo aviso.  Por otra parte, el banco <u>descuenta</u> cierta cantidad de dinero del monto depositado por la prestación de este servicio (NO es una comisión). Por lo que nos veremos obligados a cargar este monto de dinero en su próximo recibo de condominio.</p>
<h3 style="text-align: justify; font-weight: bold; font-size: 1.3em;">Agradecemos la atención prestada y les recordamos que juntos lo seguimos haciendo bien.</h3>
<h3 style="font-weight: bold;">Si quiere descargar el recibo de condominio:</h3>
<a href="http://www.methodologic.com.ve/grano/factura/{{ Crypt::encrypt($bill->id) }}" target="_blank" style="width: 150px; font-size: 18px; font-family: Open Sans; color: #ffffff; text-decoration: none; border-radius: 5px; background-color: #0094FF; padding: 15px 30px; border: 1px solid #000000; display: block; text-align: center; font-style: bold;">Haga click aquí</a>
</br>
<h3 style="margin-top: 15px;"></h3>
</br>
<table style="margin: 0 auto; position: absolute; z-index: 1;" border="0" cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
        @if($bill->estado == "Pagada")
        <td style="border-left: 2px solid #000000; border-top: 2px solid #000000;  vertical-align:middle; text-align:center;" rowspan="6"><img style="height: 110px;" src="http://methodologic.com.ve/grano/images/logopdfpagado.jpg" /></td>
        @endif
        @if($bill->estado != "Pagada")
        <td style="border-left: 2px solid #000000; border-top: 2px solid #000000;  vertical-align:middle; text-align:center;" rowspan="6"><img style="height: 110px;" src="http://methodologic.com.ve/grano/images/logopdf.jpg" /></td>
        @endif
        <td style="border-left: 2px solid #000000; border-top: 2px solid #000000; border-right: 2px solid #000000; background-color:#EDF7FF; text-align: center; font-weight: bold; font-size: 18px !important;" colspan="2">RECIBO DE CONDOMINIO</td>
    </tr>
    <tr>
        <td style="border-left: 2px solid #000000; border-bottom: 2px solid #000000; border-right: 2px solid #000000; background-color:#EDF7FF; text-align: center; font-weight: bold; font-size: 18px !important;" colspan="2">E D I F I C I O - G R A N O</td>
    </tr>
    <tr>
        <td style="border-left: 2px solid #000000; border-right: 2px solid #000000; text-align: right; font-weight: bold; font-size: 14px !important;" colspan="2">Rif: J-30269663-7</td>
    </tr>
    <tr>
        <td style="border-left: 2px solid #000000; border-right: 2px solid #000000; text-align: right; font-weight: bold; font-size: 14px !important;" colspan="2">La Candelaria - Esq. de Miguelacho a Misericordia<br/></td>
    </tr>
    <tr>
        <td style="border-left: 2px solid #000000; border-bottom: 2px solid #000000; border-right: 2px solid #000000; text-align: right; font-weight: bold; font-size: 14px !important;" colspan="2">Municipio Libertador - Distrito Capital</td>
    </tr>
    <tr>
        <td style="border-left: 2px solid #000000; border-top: 2px solid #000000; border-right: 2px solid #000000; border-bottom: 2px solid #000000; background-color:#EDF7FF; text-align: right; font-weight: bold; font-size: 14px !important;" colspan="2">Email: juntacondominiograno@gmail.com</td>
    </tr>
    <tr>
        <td style="border-left: 2px solid #000000; border-top: 2px solid #000000; text-align: right; font-weight: bold;" colspan="1">CORREO DEL PROPIETARIO</td>
        <td style="text-align: right; font-weight: bold;" colspan="1">{{ $user->email }}</td>
        <td style="border-right: 2px solid #000000; text-align: center; font-weight: bold;" colspan="1">MES A COBRAR</td>
    </tr>
    <tr>
        <td style="border-left: 2px solid #000000; text-align: right; font-weight: bold;" colspan="1">NOMBRE DEL PROPIETARIO</td>
        <td style="text-align: right; font-weight: bold;" colspan="1">{{ $user->nombre }} {{ $user->apellido }}</td>
        <td style="border-right: 2px solid #000000; text-align: center; font-weight: bold;" colspan="1">{{ $bill->mes }}/{{ $bill->año }}</td>
    </tr>
    <tr>
        <td style="border-left: 2px solid #000000; text-align: right; font-weight: bold;" colspan="1">FECHA DE EMISION</td>
        @if($bill->mes == "02")
            <td style="text-align: right; font-weight: bold;" colspan="1">28/{{ $bill->mes }}/{{ $bill->año }}</td>
        @endif
        @if($bill->mes != "02")
            <td style="text-align: right; font-weight: bold;" colspan="1">30/{{ $bill->mes }}/{{ $bill->año }}</td>
        @endif
        <td style="border-right: 2px solid #000000; text-align: center; font-weight: bold;" colspan="1">FECHA DE VENCIMIENTO</td>
    </tr>
    <tr>
        <td style="border-left: 2px solid #000000; text-align: right; font-weight: bold;" colspan="1">N° DE APARTAMENTO</td>
        <td style="text-align: right; font-weight: bold;" colspan="1">{{ $user->apartamento }}</td>
        <td style="border-right: 2px solid #000000; text-align: center; font-weight: bold;" colspan="1">{{ $bill->fechavencimiento }}</td>
    </tr>
    <tr>
        <td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-right: 2px solid #000000; border-left: 2px solid #000000;" colspan="3"><br/></td>
    </tr>
    <tr>
        <td style="border-left: 2px solid #000000; text-align: left; font-weight: bold; font-size: 12px !important;" colspan="2">GASTOS COMUNES GENERADOS DURANTE EL MES</td>
        <td style="border-right: 2px solid #000000; text-align: center; font-weight: bold; font-size: 12px !important;" colspan="1">Monto Bs.</td>
    </tr>
    @foreach($details as $detail)
        @if($detail->prioridad != "100000000")
        <tr>
          <td style="border-left: 2px solid #000000; text-align: left;" colspan="2">{{ $detail->gasto }}</td>
          <td style="border-right: 2px solid #000000; text-align: center;" colspan="1">Bs. {{ number_format($detail->monto, 2, ',', '.') }}</td>
        </tr>
        @endif
    @endforeach
    @if($validate == 1)
    <tr>
        <td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-right: 2px solid #000000; border-left: 2px solid #000000; background-color:#C9E7FF;" colspan="3"><br/></td>
    </tr>
        <tr>
          <td style="border-left: 2px solid #000000; text-align: left; font-weight: bold; font-size: 12px !important;" colspan="2">GASTOS NO COMUNES (SOLO SE VERA REFLEJADO EN SU TOTAL)</td>
          <td style="border-right: 2px solid #000000; text-align: center; font-weight: bold; font-size: 12px !important;" colspan="1">Monto Bs.</td>
        </tr>
    @endif
    @foreach($details as $detail)
        @if($detail->prioridad == "100000000")
              <tr>
                <td style="border-left: 2px solid #000000; text-align: left;" colspan="2">{{ $detail->gasto }}</td>
                <td style="border-right: 2px solid #000000; text-align: center;" colspan="1">Bs. {{ number_format($detail->monto, 2, ',', '.') }}</td>
              </tr>
        @endif
    @endforeach
    @if($validate1 == 1)
    <tr>
        <td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-right: 2px solid #000000; border-left: 2px solid #000000; background-color:#C9E7FF;" colspan="3"><br/></td>
    </tr>
        <tr>
          <td style="border-left: 2px solid #000000; text-align: left; font-weight: bold; font-size: 12px !important;" colspan="2">ABONOS (SOLO SE VERA REFLEJADO EN SU TOTAL)</td>
          <td style="border-right: 2px solid #000000; text-align: center; font-weight: bold; font-size: 12px !important;" colspan="1">Monto Bs.</td>
        </tr>
    @endif
    @foreach($details as $detail)
        @if($detail->prioridad == "200000000")
              <tr>
                <td style="border-left: 2px solid #000000; text-align: left;" colspan="2">{{ $detail->gasto }}</td>
                <td style="border-right: 2px solid #000000; text-align: center;" colspan="1">Bs. {{ number_format($detail->monto, 2, ',', '.') }}</td>
              </tr>
        @endif
    @endforeach
    <tr>
        <td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-right: 2px solid #000000; border-left: 2px solid #000000;" colspan="3"><br/></td>
    </tr>
    <tr>
        <td style="border-left: 2px solid #000000; background-color:#EDF7FF; text-align: right; font-weight: bold; font-size: 12px !important;" colspan="2">TOTAL DE GASTOS GENERADOS POR EL CONDOMINIO ESTE MES</td>
        <td style="border-right: 2px solid #000000; background-color:#EDF7FF; text-align: center; font-weight: bold; font-size: 12px !important;" colspan="1">Bs. {{ number_format($total, 2, ',', '.') }}</td>
    </tr>
    <tr>
        <td style="border-left: 2px solid #000000; background-color:#EDF7FF; text-align: right;" colspan="2">FONDO DE RESERVA (10% DE LOS GASTOS COMUNES)</td>
        <td style="border-right: 2px solid #000000; background-color:#EDF7FF; text-align: center;" colspan="1">Bs. {{ number_format($bill->reserva, 2, ',', '.') }}</td>
    </tr>
    @if($bill->newfondo != "-")
    <tr>
        <td style="border-left: 2px solid #000000; background-color:#EDF7FF; text-align: right;" colspan="2">FONDOS PARA REPARACIONES DEL EDIFICIO</td>
        <td style="border-right: 2px solid #000000; background-color:#EDF7FF; text-align: center;" colspan="1">Bs. {{ number_format($bill->newfondo, 2, ',', '.') }}</td>
    </tr>
    @endif
    <tr>
        <td style="border-left: 2px solid #000000; background-color:#EDF7FF; text-align: right; font-weight: bold; font-size: 12px !important;" colspan="2">TOTAL GENERAL GASTOS COMUNES</td>
        <td style="border-right: 2px solid #000000; background-color:#EDF7FF; text-align: center; font-weight: bold; font-size: 12px !important;" colspan="1">Bs. {{ number_format($bill->total, 2, ',', '.') }}</td>
    </tr>
    <tr>
        <td style="border-left: 2px solid #000000; background-color:#EDF7FF; text-align: right;" colspan="2">ALICUOTA A PAGAR DE ESTE APARTAMENTO</td>
        <td style="border-right: 2px solid #000000; background-color:#EDF7FF; text-align: center;" colspan="1">{{ $user->alicuota }}%</td>
    </tr>
    @if($bill->tasa != "-")
        <tr>
            <td style="border-top: 2px solid #000000; border-left: 2px solid #000000; background-color:#FFE630; text-align: right; font-weight: bold; font-size: 14px !important;" colspan="2">TOTAL A PAGAR EN ESTE MES</td>
            <td style="border-top: 2px solid #000000; border-right: 2px solid #000000; background-color:#FFE630; text-align: center; font-weight: bold; font-size: 14px !important;" colspan="1">Bs. {{ number_format($bill->monto, 2, ',', '.') }}</td>
        </tr>
    @endif
    @if($bill->tasa == "-")
        <tr>
            <td style="border-top: 2px solid #000000; border-left: 2px solid #000000; border-bottom: 2px solid #000000; background-color:#FFE630; text-align: right; font-weight: bold; font-size: 14px !important;" colspan="2">TOTAL A PAGAR EN ESTE MES</td>
            <td style="border-top: 2px solid #000000; border-right: 2px solid #000000; background-color:#FFE630; border-bottom: 2px solid #000000; text-align: center; font-weight: bold; font-size: 14px !important;" colspan="1">Bs. {{ number_format($bill->monto, 2, ',', '.') }}</td>
        </tr>
    @endif
    @if($bill->tasa != "-")
        <tr>
            <td style="border-left: 2px solid #000000; border-bottom: 2px solid #000000; background-color:#FFE630; text-align: right;" colspan="1">Tasa de Cambio Promedio al emitir este recibo</td>
            <td style="border-bottom: 2px solid #000000; background-color:#FFE630; text-align: right;" colspan="1">Bs. {{ number_format($bill->tasa, 2, ',', '.') }}</td>
            <td style="border-right: 2px solid #000000; border-bottom: 2px solid #000000; background-color:#FFE630; text-align: center; font-weight: bold; font-size: 14px !important;" colspan="1">$ {{ number_format($bill->dolares, 2, ',', '.') }}</td>
        </tr>
    @endif
    <tr>
        <td colspan="3"><br/></td>
    </tr>
    <tr>
        <td style="text-align: left; font-size: 1em; font-weight: bold;" colspan="3">NOTA: Estos Gastos deben ser Cancelados a más tardar el día 8 del presente mes. De No hacerlo, deberá cancelarlo en su equivalente en $ a la tasa de cambio del dia en que realice su pago.</td>
    </tr>
    </tbody>
</table>
<p>Esto es un mensaje automático de la página, por favor no responder ni realizar preguntas a este correo. El correo real del edificio es: juntacondominiograno@gmail.com</p>
</body>
</html>