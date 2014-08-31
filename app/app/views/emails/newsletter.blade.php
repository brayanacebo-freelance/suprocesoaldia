<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="javier varon saavedra">
</head>

<body>
<table style="background: #39444a; width:100%;">
    <tr>
        <td>
            <h2 style="font-size: 20px; font-family: 'Arial', serif; color: #F1F1F1;text-shadow: 0px 1px 1px #4d4d4d; padding:10px;"><span style="color: #00A0B1;">Seguimiento</span> Judicial</h2>
        </td>
    </tr>
</table>
<table style="width:100%;">
    <tr>
        <td style="padding: 10px 0px;">
            <span style="font-size: 16px; font-family: 'Arial', serif; color: #00A0B1;">Hola: {{ $client->name }}</span><br>
            <span style="font-size: 16px; font-family: 'Arial', serif; color: #000;">los siguientes procesos han tenido movimiento:</span>
        </td>
    </tr>
</table> 
@foreach($client->processes as $process)
<table style="border: 1px solid #dddddd;width: 100%; font-family: Arial, Helvetica, sans-serif; font-size:13px;margin:0px;">
    <tbody>
        <tr>
            <td style="width:30%; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-bottom: 1px solid #dddddd; background-color: #f9f9f9;">
            <span style="color:#00A0B1;">Cod. Proceso</span></td>
            <td style="width:70%; border-left: 1px solid #dddddd; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-bottom: 1px solid #dddddd; background-color: #f9f9f9;">{{ $process->id }}</td>
        </tr>
        <tr>
            <td style="width:30%; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-bottom: 1px solid #dddddd;">
            <span style="color:#00A0B1;">Demandante(s)</span></td>
            <td style="width:70%; border-left: 1px solid #dddddd; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-bottom: 1px solid #dddddd;">{{ $process->claimant }}</td>
        </tr>
        <tr>
            <td style="width:30%; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-bottom: 1px solid #dddddd; background-color: #f9f9f9;">
            <span style="color:#00A0B1;">Demandado(s)</span></td>
            <td style="width:70%; border-left: 1px solid #dddddd; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-bottom: 1px solid #dddddd; background-color: #f9f9f9;">{{ $process->defendant }}</td>
        </tr>
        <tr>
            <td style="width:30%; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-bottom: 1px solid #dddddd;">
            <span style="color:#00A0B1;">Ciudad</span></td>
            <td style="width:70%; border-left: 1px solid #dddddd; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-bottom: 1px solid #dddddd;">{{ $process->city->name }}</td>
        </tr>
        <tr>
            <td style="width:30%; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-bottom: 1px solid #dddddd; background-color: #f9f9f9;">
            <span style="color:#00A0B1;">Despacho</span></td>
            <td style="width:70%; border-left: 1px solid #dddddd; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-bottom: 1px solid #dddddd; background-color: #f9f9f9;">{{ $process->office->name }}</td>
        </tr>
        <tr>
            <td style="width:30%; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-bottom: 1px solid #dddddd; background-color: #f9f9f9;">
            <span style="color:#00A0B1;">Acción</span></td>
            <td style="width:70%; border-left: 1px solid #dddddd; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; background-color: #f9f9f9;"><a href="{{ route('client.movements.all') }}" style="color: #ffffff;text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);background-color: #5bb75b;padding: 10px 26px;font-size: 10.5px; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;line-height: 20px;vertical-align: middle; text-decoration:none;">Ampliar información</a></td>
        </tr>
    </tbody>
</table>
@endforeach
</body>
</html>