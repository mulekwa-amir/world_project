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
    //print_r($result);
    //echo "</pre>";

    foreach ($result as $country) {

        if (is_array($country->languages)) {
            # code...
            $languages = $country->languages;
            foreach ($languages as $language) {
                # code...
                
                echo"<ul>";
                echo " <li> Languages:".$language->name . "</li>";
                echo"</ul>";
            }
        }
        
        // echo '1.Country code: '.$country->alpha2Code .'</br>';
        // echo '2.Name: '.$country->name . '</br>';
        // echo '3.City: '.$country->capital .'</br>';
        // echo '4.Region: '.$country->region. '</br>';
        // echo '5.Calling Code: '.$country->callingCodes[0]. '</br>';
        // echo '6.Population: ' . $country->population . '</br>';
        // echo '7.Subregion: ' . $country->subregion . '</br>';
        // echo '8.Area: ' . $country->area . '</br> </br>';
        //echo 'Languages: ' . $country->languages[1] . '</br>';
        $countryCode = $country->alpha2Code;
        $name = $country->name;
        $city = $country->capital;
        $region = $country->region;
        $callingCode = $country->callingCodes[0];
        $population = $country->population;
        $subregion = $country->subregion;
        $area = $country->area;

        
    }
    //*************** */
    // insert data ito the database..
    //**************** */

    //continet table
    $sql_c = "INSERT continet (region_name) VALUES (?)";

    if($stmt != $db->prepare($sql_c)){
        //error
        echo "ERROR: Could not prepare query: $sql. ";
    }else{ //success
        $stmt->bind_param("s",$region);
        mysqli_stmt_execute($stmt);
    }
    
    //country table
    $sql_ctry = "INSERT country (country_name, alphacode2, population_density, capital, Calling-code, native_name, area)
             VALUES (?, ?, ?, ?, ?, ?)";

    if($stmt != $db->prepare($sql_ctry)){
        //error
        echo "ERROR: Could not prepare query: $sql. ";
    }else{
        $stmt->bind_param("ssssisi",$name, $countryCode, $population , $city, $callingCode, $native, $area );
        mysqli_stmt_execute($stmt);
    }
    

    //subregion table
    $sql_sub = "INSERT sub-region (country_name)VALUES (?)";

    if($stmt != $db->prepare($sql_sub)){
        //error
        echo "ERROR: Could not prepare query: $sql. ";
    }else{ //success
        $stmt->bind_param("s",$subregion);
        mysqli_stmt_execute($stmt);
    }
    

    //languages table
    // $sql_lang = "INSERT languages (lang_name)VALUES (?)";

    // $stmt = $db->prepare($sql_lang);
    // $stmt->bind_param("s",$language, );
    // mysqli_stmt_execute($stmt);

    // //currency table
    // $sql_cc = "INSERT country (currency_name, symbol) VALUES (?, ?)";

    // $stmt = $db->prepare($sql_cc);
    // $stmt->bind_param("ss",$currency_ame, $symbol );
    // mysqli_stmt_execute($stmt);
    

    //******* */
    //curl close
    curl_close($ch);
}

?>