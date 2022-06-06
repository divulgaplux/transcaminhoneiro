<template>
  <div class="page-size content d-flex justify-content-center align-items-center">
    <div class="text-center">
      <div class="header"></div>
      <div class="body">
        <h1 class="title">Calcule a Distância</h1>
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <td>
                <label for="txtOrigem">
                  <strong>Endereço de origem</strong>
                </label>
                <input type="text" id="txtOrigem" class="field" style="width: 400px" />
              </td>
            </tr>
            <tr>
              <td>
                <label for="txtDestino">
                  <strong>Endereço de destino</strong>
                </label>
                <input type="text" style="width: 400px" class="field" id="txtDestino" />
              </td>
            </tr>
            <tr>
              <td>
                <input
                  type="button"
                  value="Calcular distancia"
                  onclick="CalculaDistancia()"
                  class="btnNew"
                />
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
function CalculaDistancia(origem, destino) {
  var service = new google.maps.DistanceMatrixService();
  service.getDistanceMatrix(
    {
      origins: [origem],
      destinations: [destino],
      travelMode: google.maps.TravelMode.DRIVING
    },
    callback
  );
}
function callback(response, status) {
  if (status == google.maps.DistanceMatrixStatus.OK) {
    alert("Distância:" + response.rows[0].elements[0].distance.text);
    alert("Duração:" + response.rows[0].elements[0].duration.text);
  }
}
</script>

