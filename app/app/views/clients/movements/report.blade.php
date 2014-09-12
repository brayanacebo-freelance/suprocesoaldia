<div style="text-align: center">
  <strong style="font-family: 38px">Informe de procesos - Ultimo movimiento</strong>
</div>
<table class="table" border="1">
  <thead>
    <tr>
      <th>Cód.</th>
      <th>Carpeta</th>
      <th>Radicación</th>
      <th>Demandante</th>
      <th>Demandado</th>
      <th> - </th>
      <th>Actuación</th>
      <th>Tipo de notificación</th>
      <th>Fecha de notificación</th>
      <th>Fecha auto</th>
      <th>Comentario</th>
    </tr>
  </thead>
  <tbody>
    @foreach($object as $item)
      <tr>
        <td>{{ $item['cod'] }}</td>
        <td>{{ $item['folder_number'] }}</td>
        <td>{{ $item['creation_number'] }}</td>
        <td>{{ $item['claimant'] }}</td>
        <td>{{ $item['defendant'] }}</td>
        <th> - </th>
        <td>{{ (isset($item['action'])) ? $item['action'] : null }}</td>
        <td>{{ (isset($item['notification'])) ? $item['notification'] : null }}</td>
        <td>{{ (isset($item['notification_date']) ? $item['notification_date'] : null) }}</td>
        <td>{{ (isset($item['auto_date'])) ? $item['auto_date'] : null }}</td>
        <td>{{ (isset($item['comments'])) ? $item['comments'] : null }}</td>
      </tr>
    @endforeach
  </tbody>
</table>