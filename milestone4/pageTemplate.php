<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Database Interaction Demonstration</title>

    <style>
    /* 
    <div class="box">
      <h3> Item Name </h3>

      <p>Item description</p>

      <p>Seller: </p>

      <p>Asking Price: </p>
    </div> 
    */
      .box {
        border: 1px solid black;
        padding: 10px;
        margin: 4px;
      }

      #workArea {
        border: 1px solid black;
        padding: 20px;
      }
    </style>

</head>
<body>
  
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">MidTrade</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Listings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">My Messages</a>
      </li>
    </ul>
  </div>
</nav>

<!-- End Navigation -->


<!-- Main Work Area -->

<div class="container" id="mainContainer">

<!-- Need to be able to pull information about the listing

    userID and username, ItemName, ItemDescription, AskingPrice.

-->
<br><br>

<div class="row">
    <div class="col-md-6 mx-auto">
      <div id="button">
        <button class="btn btn-primary" onclick="pullData()">Pull From Listings Table</button>
      </div>  
    </div> 

    <div class="col-md-6 mx-auto" id="workArea">
      <!-- Items will appear in here -->
    </div>
</div>



</div>

<script>
  //pullData()
  function pullData() {
    let req = new XMLHttpRequest();
    req.onreadystatechange = function() {
      if(this.readyState == 4 && this.status == 200) {
        
        let results = JSON.parse(this.responseText);

        let renderStr = '';
        for(let i = 0; i < results.length; i++) {
          let object = JSON.parse(results[i]);
          renderStr = renderStr + "<div class='box'><h3>" + object['ItemName'] + "</h3><p>Description: " + object['ItemDescription'] + "</p><p>Seller: " + object['username'] + "</p><p>Asking Price: " + object['AskingPrice'] + "</p></div>";
        }
        
        document.getElementById('workArea').innerHTML = renderStr;

      }
    };
    req.open('GET','pullListings.php', true);
    req.send();
  }

</script>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    
</body>
</html>
