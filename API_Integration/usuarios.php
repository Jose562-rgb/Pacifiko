<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://dummy.restapiexample.com/api/v1/employees',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;

$data = json_decode($response, true);
$contador = 0;
foreach ($data['data'] as $employee) {

  if($employee['employee_salary'] > 300000){
    $contador++;
  }

}

echo "El número de empleados que gana más de $300000 es: ". $contador;
?>