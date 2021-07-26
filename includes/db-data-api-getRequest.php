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
                $languages = $language->name;              
                // echo"<ul>";
                // echo " <li> Languages:".$language->name . "</li>";
                // echo"</ul>";
            }
        }

        if (is_array($country->currencies)) {
            # code...
            $currencies = $country->currencies;
            foreach ($currencies as $item) {
                # code...
                $currency = $item->name; 
                $symbol = $item->symbol;             
                
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
        $name = mysqli_real_escape_string($db, $country->name);
        $city = $country->capital;
        $region = $country->region;
        $callingCode = $country->callingCodes[0];
        $population = $country->population;
        $subregion = $country->subregion;
        $area = $country->area > 0 ? $country->area : 0;
        $native = mysqli_real_escape_string($db, $country->nativeName);

        //*************** */
    // insert data ito the database..
    //**************** */

    //  // subregion table
    //  $result = $db->query("SELECT * FROM subregion WHERE sub_name='".$subregion."'");

    //  if($result->num_rows == 0){ 
 
    //      $insert_result = $db->query("INSERT subregion (sub_name) VALUES ('$subregion')");
    //      if($insert_result){
    //          echo $subregion." Has been Inserted successfully.";
    //      }
    //  }

    // //continet table
    // $result = $db->query("SELECT * FROM region WHERE region_name='".$region."'");

    // if($result->num_rows == 0){ 

    //     $insert_result = $db->query("INSERT region (region_name) VALUES ('$region')");
    //     if($insert_result){
    //         echo $region." Has been Inserted successfully.";
    //     }
    // }
 
    //country table
    $sql_ctry = "INSERT country (country_name, alphacode2, population_density, capital, Calling_code, native_name, area)
                 VALUES ('$name', '$countryCode', $population , '$city', $callingCode, '$native', $area)";

    if($db->query($sql_ctry)){
        //error
        echo "success.";
        
    }else{
        echo "ERROR: Could not able to execute $sql_ctry. " . mysqli_error($db);
    }
    

    // //languages table
    // $sql_lang = "INSERT languages (lang_name)VALUES (?)";

    // $stmt = $db->prepare($sql_lang);
    // $stmt->bind_param("s",$language, );
    // $stmt->execute();

    // //currency table
    // $sql_cc = "INSERT country (currency_name, symbol) VALUES (?, ?)";

    // $stmt = $db->prepare($sql_cc);
    // $stmt->bind_param("ss",$currency_ame, $symbol );
    // $stmt->execute();
    

    //******* */
    //curl close
    curl_close($ch);

        
    }
    
}

?>