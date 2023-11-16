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
        echo "<h1>Conversion Result</h1>";
        echo "<p>{$amount} {$from_currency} == {$converted_amount} {$to_currency}</p>";
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
            




background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 100 60'%3E%3Cg %3E%3Crect fill='%23cc5577' width='11' height='11'/%3E%3Crect fill='%23ce5776' x='10' width='11' height='11'/%3E%3Crect fill='%23d05a76' y='10' width='11' height='11'/%3E%3Crect fill='%23d15c75' x='20' width='11' height='11'/%3E%3Crect fill='%23d35f74' x='10' y='10' width='11' height='11'/%3E%3Crect fill='%23d46174' y='20' width='11' height='11'/%3E%3Crect fill='%23d66473' x='30' width='11' height='11'/%3E%3Crect fill='%23d76673' x='20' y='10' width='11' height='11'/%3E%3Crect fill='%23d96972' x='10' y='20' width='11' height='11'/%3E%3Crect fill='%23da6c72' y='30' width='11' height='11'/%3E%3Crect fill='%23db6e71' x='40' width='11' height='11'/%3E%3Crect fill='%23dc7171' x='30' y='10' width='11' height='11'/%3E%3Crect fill='%23dd7471' x='20' y='20' width='11' height='11'/%3E%3Crect fill='%23de7671' x='10' y='30' width='11' height='11'/%3E%3Crect fill='%23df7971' y='40' width='11' height='11'/%3E%3Crect fill='%23e07c71' x='50' width='11' height='11'/%3E%3Crect fill='%23e17e71' x='40' y='10' width='11' height='11'/%3E%3Crect fill='%23e28171' x='30' y='20' width='11' height='11'/%3E%3Crect fill='%23e38471' x='20' y='30' width='11' height='11'/%3E%3Crect fill='%23e38771' x='10' y='40' width='11' height='11'/%3E%3Crect fill='%23e48972' y='50' width='11' height='11'/%3E%3Crect fill='%23e58c72' x='60' width='11' height='11'/%3E%3Crect fill='%23e58f73' x='50' y='10' width='11' height='11'/%3E%3Crect fill='%23e69173' x='40' y='20' width='11' height='11'/%3E%3Crect fill='%23e69474' x='30' y='30' width='11' height='11'/%3E%3Crect fill='%23e79775' x='20' y='40' width='11' height='11'/%3E%3Crect fill='%23e79a75' x='10' y='50' width='11' height='11'/%3E%3Crect fill='%23e89c76' x='70' width='11' height='11'/%3E%3Crect fill='%23e89f77' x='60' y='10' width='11' height='11'/%3E%3Crect fill='%23e8a278' x='50' y='20' width='11' height='11'/%3E%3Crect fill='%23e9a47a' x='40' y='30' width='11' height='11'/%3E%3Crect fill='%23e9a77b' x='30' y='40' width='11' height='11'/%3E%3Crect fill='%23e9aa7c' x='20' y='50' width='11' height='11'/%3E%3Crect fill='%23e9ac7e' x='80' width='11' height='11'/%3E%3Crect fill='%23eaaf7f' x='70' y='10' width='11' height='11'/%3E%3Crect fill='%23eab281' x='60' y='20' width='11' height='11'/%3E%3Crect fill='%23eab482' x='50' y='30' width='11' height='11'/%3E%3Crect fill='%23eab784' x='40' y='40' width='11' height='11'/%3E%3Crect fill='%23eaba86' x='30' y='50' width='11' height='11'/%3E%3Crect fill='%23ebbc88' x='90' width='11' height='11'/%3E%3Crect fill='%23ebbf8a' x='80' y='10' width='11' height='11'/%3E%3Crect fill='%23ebc18c' x='70' y='20' width='11' height='11'/%3E%3Crect fill='%23ebc48e' x='60' y='30' width='11' height='11'/%3E%3Crect fill='%23ebc790' x='50' y='40' width='11' height='11'/%3E%3Crect fill='%23ebc992' x='40' y='50' width='11' height='11'/%3E%3Crect fill='%23ebcc94' x='90' y='10' width='11' height='11'/%3E%3Crect fill='%23ebce97' x='80' y='20' width='11' height='11'/%3E%3Crect fill='%23ebd199' x='70' y='30' width='11' height='11'/%3E%3Crect fill='%23ecd39c' x='60' y='40' width='11' height='11'/%3E%3Crect fill='%23ecd69e' x='50' y='50' width='11' height='11'/%3E%3Crect fill='%23ecd8a1' x='90' y='20' width='11' height='11'/%3E%3Crect fill='%23ecdba4' x='80' y='30' width='11' height='11'/%3E%3Crect fill='%23ecdda6' x='70' y='40' width='11' height='11'/%3E%3Crect fill='%23ece0a9' x='60' y='50' width='11' height='11'/%3E%3Crect fill='%23ede2ac' x='90' y='30' width='11' height='11'/%3E%3Crect fill='%23ede4af' x='80' y='40' width='11' height='11'/%3E%3Crect fill='%23ede7b2' x='70' y='50' width='11' height='11'/%3E%3Crect fill='%23ede9b5' x='90' y='40' width='11' height='11'/%3E%3Crect fill='%23eeecb8' x='80' y='50' width='11' height='11'/%3E%3Crect fill='%23EEB' x='90' y='50' width='11' height='11'/%3E%3C/g%3E%3C/svg%3E");


         
            font-family: agbalumo, sans-serif;
            text-align:center;
            margin-top:5%;
        }
#main {
            background-color:navy;
            margin-left:10%;
            margin-right:10%;
            padding :5%;
            text-align:center;
           
        }
        input{
            width:30%;
            height:50px;
            background-color:#cf245f;
            border:2px solid #ccc;
        }
        select {
            height :50px;
            width :30%;
            text-align:center;
            background-color:#cf245f;
            border:2px solid #ccc;
        }
        .title{
           font-size :60px;
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
            margin-bottom:2%;
   
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
            margin-bottom:3%;
        }
}
        form {
            text-align:center;
        }
        select{
            font-size:20px;
        }

        /* Add more styling as needed */
    </style>
</head>
<body>

<h1 class="title">Currency Convert $</h1>
    <hr>
    <div id="main"> 
    <form action="dream.php" method="post">
        <label for="amount">Amount:</label>
        <input type="number" name="amount" required step="0.01">
        
        <label for="from_currency">From Currency:</label>
        <select name="from_currency" required>
            <option value="USD">US Dollar &#36</option>
            <option value="EUR">Euro &#8364</option>
            <option value="TND">Tunisian Dinar DT</option> <!-- Added TND -->
            <!-- Add more currencies as needed -->
        </select>
        <div class="button2">
        <label for="to_currency">To Currency:</label>
        <select name="to_currency" required>
            <option value="USD">US Dollar &#36</option>
            <option value="EUR">Euro &#8364</option>
            <option value="TND">Tunisian Dinar DT</option> <!-- Added TND -->
            <!-- Add more currencies as needed -->
        </select>
        
        <button id="button" type="submit">Convert</button>
        </div>
    </form>
    </div>   
</body>
</html>
