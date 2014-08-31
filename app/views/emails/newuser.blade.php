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
            <span style="font-size: 20px; font-family: 'Arial', serif; color: #00A0B1;">Bienvenido<br></span><br>
            <span style="font-size: 16px; font-family: 'Arial', serif; color: #000;">Desde ahora puedes consultar los movimientos de tus procesos desde tu pc, smartphone o tablet.</span>
        </td>
    </tr>
</table>
<table style="width:100%;">
    <tr>
        <td style="padding: 0px 0px; margin:0px 0px 10px; 0px; display:block;">
            <span style="font-size: 16px; font-family: 'Arial', serif; color: #000;">Los datos para ingresar a tu cuenta son:</span>
        </td>
    </tr>
</table>
<table style="border: 1px solid #dddddd;width: 100%; font-family: Arial, Helvetica, sans-serif; font-size:13px;margin:0px;">
    <tbody>
        <tr>
            <td style="width:30%; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-bottom: 1px solid #dddddd; background-color: #f9f9f9;"><span style="color:#00A0B1;">URL</span></td>
            <td style="width:70%; border-left: 1px solid #dddddd; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-bottom: 1px solid #dddddd; background-color: #f9f9f9;"><a href="http://seguimientojudicial.javiervaron.co/index.php">Ingreso al sistema</a></td>
        </tr>
        <tr>
            <td style="width:30%; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-bottom: 1px solid #dddddd; background-color: #f9f9f9;"><span style="color:#00A0B1;">Usuario (E-mail)</span></td>
            <td style="width:70%; border-left: 1px solid #dddddd; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-bottom: 1px solid #dddddd; background-color: #f9f9f9;">{{ $user->email }}</td>
        </tr>
        <tr>
            <td style="width:30%; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-bottom: 1px solid #dddddd;"><span style="color:#00A0B1;">Contraseña</span></td>
            <td style="width:70%; border-left: 1px solid #dddddd; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-bottom: 1px solid #dddddd;">{{ $plain_pswd }}</td>
        </tr>
    </tbody>
</table>
</body>
</html>