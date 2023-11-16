<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $amount = $_POST["amount"];
    $from_currency = $_POST["from_currency"];
    $to_currency = $_POST["to_currency"];

    // Replace 'YOUR_APP_ID' with your actual Open Exchange Rates API key
    $api_key = 'YOUR_APP_ID';
    
    // Call the Open Exchange Rates API
    $url = "https://open.er-api.com/v6/latest/{$from_currency}?apikey={$api_key}";
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    // Check if the API call was successful
    if ($data && isset($data['rates'][$to_currency])) {
        $exchange_rate = $data['rates'][$to_currency];
        $converted_amount = $amount * $exchange_rate;

        // Display the result
       
        echo "<p class='p1'>{$amount} {$from_currency} == {$converted_amount} {$to_currency}</p>";
    } else {
        // Output the API response for debugging
        echo "<pre>";
        var_dump($response);
        echo "</pre>";
        echo "<p>Error fetching exchange rates. Please try again later.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Amita:wght@700&family=Creepster&family=Merriweather:wght@300&family=Redressed&display=swap" rel="stylesheet">

    <style>
        body {
            



background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1600 800'%3E%3Cg %3E%3Cpath fill='%23ff5f19' d='M486 705.8c-109.3-21.8-223.4-32.2-335.3-19.4C99.5 692.1 49 703 0 719.8V800h843.8c-115.9-33.2-230.8-68.1-347.6-92.2C492.8 707.1 489.4 706.5 486 705.8z'/%3E%3Cpath fill='%23ff6d18' d='M1600 0H0v719.8c49-16.8 99.5-27.8 150.7-33.5c111.9-12.7 226-2.4 335.3 19.4c3.4 0.7 6.8 1.4 10.2 2c116.8 24 231.7 59 347.6 92.2H1600V0z'/%3E%3Cpath fill='%23ff7a18' d='M478.4 581c3.2 0.8 6.4 1.7 9.5 2.5c196.2 52.5 388.7 133.5 593.5 176.6c174.2 36.6 349.5 29.2 518.6-10.2V0H0v574.9c52.3-17.6 106.5-27.7 161.1-30.9C268.4 537.4 375.7 554.2 478.4 581z'/%3E%3Cpath fill='%23ff8817' d='M0 0v429.4c55.6-18.4 113.5-27.3 171.4-27.7c102.8-0.8 203.2 22.7 299.3 54.5c3 1 5.9 2 8.9 3c183.6 62 365.7 146.1 562.4 192.1c186.7 43.7 376.3 34.4 557.9-12.6V0H0z'/%3E%3Cpath fill='%23FF9517' d='M181.8 259.4c98.2 6 191.9 35.2 281.3 72.1c2.8 1.1 5.5 2.3 8.3 3.4c171 71.6 342.7 158.5 531.3 207.7c198.8 51.8 403.4 40.8 597.3-14.8V0H0v283.2C59 263.6 120.6 255.7 181.8 259.4z'/%3E%3Cpath fill='%23ff932a' d='M1600 0H0v136.3c62.3-20.9 127.7-27.5 192.2-19.2c93.6 12.1 180.5 47.7 263.3 89.6c2.6 1.3 5.1 2.6 7.7 3.9c158.4 81.1 319.7 170.9 500.3 223.2c210.5 61 430.8 49 636.6-16.6V0z'/%3E%3Cpath fill='%23ff943d' d='M454.9 86.3C600.7 177 751.6 269.3 924.1 325c208.6 67.4 431.3 60.8 637.9-5.3c12.8-4.1 25.4-8.4 38.1-12.9V0H288.1c56 21.3 108.7 50.6 159.7 82C450.2 83.4 452.5 84.9 454.9 86.3z'/%3E%3Cpath fill='%23ff964f' d='M1600 0H498c118.1 85.8 243.5 164.5 386.8 216.2c191.8 69.2 400 74.7 595 21.1c40.8-11.2 81.1-25.2 120.3-41.7V0z'/%3E%3Cpath fill='%23ff9962' d='M1397.5 154.8c47.2-10.6 93.6-25.3 138.6-43.8c21.7-8.9 43-18.8 63.9-29.5V0H643.4c62.9 41.7 129.7 78.2 202.1 107.4C1020.4 178.1 1214.2 196.1 1397.5 154.8z'/%3E%3Cpath fill='%23FF9F75' d='M1315.3 72.4c75.3-12.6 148.9-37.1 216.8-72.4h-723C966.8 71 1144.7 101 1315.3 72.4z'/%3E%3C/g%3E%3C/svg%3E");




         
            font-family: agbalumo, sans-serif;
            text-align:center;
            margin-top:3%;
        }
#main {
            background-color:navy;
            margin-left:10%;
            margin-right:10%;
            padding :4%;
            text-align:center;
           
        }
        input{
            width:30%;
            height:50px;
            background-color:gris;
            border:2px solid #ccc;
        }
        select {
            height :50px;
            width :30%;
            text-align:center;
            background-color:gris;
            border:2px solid #ccc;
        }
        .title{
           font-size :60px;
        }
        .p1{
            color :black;
            text-shadow:none;
            font-size : 250%;
        }
        p, label {
            color: #fff; /* Set text color to white or any color that suits your design */
            font-size:30px;
            z-index:1;
            text-shadow:3px 3px 3px black;
        }
       
        hr{
            width:30%;
            height:3px;
            background-color:darkred;
      
   
        }
    .button2 {
        margin-top:3%
    }
#button {
  background-color: #cf245f;
  background-image: linear-gradient(to bottom right, #fcd34d, #ef4444, #ec4899);
  border: 0;
  border-radius: .25rem;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  font-family: ui-sans-serif,system-ui,-apple-system,system-ui,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
  font-size: 1.125rem; /* 18px */
  font-weight: 800;
  line-height: 20px; /* 28px */
  padding: 1rem 1.25rem;
  text-align: center;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  margin-left:10%;
  margin-top:4%;
  width:50%;
}

#button:hover {
  box-shadow: none;
}

@media (max-width: 768px) {
    form {
            background-color:navy;
            margin-left:10%;
            margin-right:10%;
            padding :5%;
            text-align:center;
            display:flex;
            flex-direction:column;
            align-items:center;
          
        }
        input {
            width:100%;
        }
        select {
            width :100%;
        }
  #button {
    font-size: 1.5rem; /* 24px */
    padding: 1rem 1.5rem;
    line-height: 20px; /* 32px */
    margin-top:10%;
  }
  hr{
            width:30%;
            height:3px;
            background-color:darkred;
       
        }
}
        form {
            text-align:center;
        }
        select{
            font-size:20px;
        }
        .title svg {
  animation: move 2s linear infinite;
}

@keyframes move {
  0% { transform: translateY(0); }
  50% { transform: translateY(20px); }
  100% { transform: translateY(0); }
}
        /* Add more styling as needed */
    </style>
</head>
<body>
<hr>
<h1 class="title">World Currency <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M352 256c0 22.2-1.2 43.6-3.3 64H163.3c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64H348.7c2.2 20.4 3.3 41.8 3.3 64zm28.8-64H503.9c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64H380.8c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32H376.7c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0H167.7c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0H18.6C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192H131.2c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64H8.1C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6H344.3c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352H135.3zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6H493.4z"/></svg></h1>
   
    <div id="main"> 
    <form action="dream.php" method="post">
        <label for="amount">Amount:</label>
        <input type="number" name="amount" required step="0.01">
        
        <label for="from_currency">From Currency:</label>
        <select name="from_currency" required>
            <option value="USD">US Dollar &#36</option>
            <option value="EUR">Euro &#8364</option>
            <option value="TND">Tunisian Dinar DT</option> <!-- Added TND -->
            <option value="CHF">Swiss Franc CHF</option>
            <option value="TRY">Turkish Lira TRY</option>
            <option value="CNY">Chinese Yuan CNY</option>
            <!-- Add more currencies as needed -->
        </select>
        <div class="button2">
        <label for="to_currency">To Currency:</label>
        <select name="to_currency" required>
            <option value="USD">US Dollar &#36</option>
            <option value="EUR">Euro &#8364</option>
            <option value="TND">Tunisian Dinar DT</option> <!-- Added TND -->
            <option value="CHF">Swiss Franc CHF</option>
            <option value="TRY">Turkish Lira TRY</option>
            <option value="CNY">Chinese Yuan CNY</option>
            <!-- Add more currencies as needed -->
        </select>
        
        <button id="button" type="submit">Convert</button>
        </div>
    </form>
    </div>   
</body>
</html>
