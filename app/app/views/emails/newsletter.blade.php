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
            <span style="font-size: 16px; font-family: 'Arial', serif; color: #00A0B1;">Hola {{ $name }}</span><br>
            <span style="font-size: 16px; font-family: 'Arial', serif; color: #000;">Si desea ver los procesos del dia haga clic <a href="{{ route('client.movements.daily') }}?{{ $id }}">aquí</></span>
        </td>
    </tr>
</table> 

</body>
</html>