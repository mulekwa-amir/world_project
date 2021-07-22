<?php 
include "./db_connection.php";

$ch = curl_init();
$url = "https://restcountries.eu/rest/v2/all";

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if ($e = curl_error($ch)) {
    //display error
    echo $e;
} else {
    // Use returned data.
    $result = json_decode($response);
    //echo "<pre>";
    print_r($result);
    //echo "</pre>";

    foreach ($result as $country) {
        
        // echo 'Country code: '.$country->alpha2Code .'</br>';
        // echo 'Name: '.$country->name . '</br>';
        // echo 'City: '.$country->capital .'</br>';
        // echo 'Region: '.$country->region. '</br>';
        // echo 'Calling Code: '.$country->callingCodes[0]. '</br>';

        //*************** */
        // insert data ito the database..
        //**************** */

        $sql = "INSERT country (country_code, country_name, city, region, Calling_Code) VALUES (?, ?, ?, ?, ?)";
    }
}

?>