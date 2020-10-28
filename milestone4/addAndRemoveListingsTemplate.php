<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>Hello, world!</title>

  <style>
    #body {
      margin-top: 20px;
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

<div class="container" id="body">

  <!-- FORM TO ADD A NEW LISTING AND ALL LISTINGS SHOWN BELOW -->
  <div class="row text-center justify-content-center">

    <!-- The form is going here -->
    <div class="col-md-12">
      <h3>Add a New Listing</h3>

      <!-- Form needs to be processed by some php script to execute SQL Calls.
          Furthermore, onsubmission, we need to be able to scrub input. -->
      <form action="" onsubmit="" method="POST">
        <div class="form-group">
          <label>Username: </label>
          <input type="text" name='add_listing_username' id="add_username" required />
        </div>

        <div class="form-group">
          <label>Item Name: </label>
          <input type="text" name="add_listing_itemname" id="add_itemname" required />
        </div>

        <div class="form-group">
          <label>Asking price: </label>
          <input type="number" step=".01" min="0" name="add_listing_price" id="add_itemprice" required />
        </div>

        <div class="form-group">
          <label>Item description</label>
          <textarea name="add_item_description" id="item_description" required></textarea>
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Add Listing">
        </div>
      </form>
    </div> 
  </div>


  <!-- This is where the table of listings will go. Needs to be rendered server-side -->
  <!-- I'll need to have a recurring AJAX call that's pulling from the SQL listings table constantly, that way any modifications to that table
       are reflected asynchronously. -->
  <div class="row text-center justify-content-center">
    <div class="col-md-12">

      <table class="table">
      <table class="table">
        
        <thead>
          <tr>
            <th scope="col">ItemID</th>
            <th scope="col">Seller</th>
            <th scope="col">Item Name</th>
            <th scope="col">Asking Price</th>
            <th scope="col">Item Description</th>
            <th scope="col">Remove?</th>
          </tr>
        </thead>

        <!-- You can use the pullListings.php file to pull information using recurring AJAX call -->
        <tbody id="listingtable">

        </tbody>

      </table>

    </div>
  </div>

</div>



<!-- Custom Javascript Functions -->
<script>

/**
*
* This function will render all of the rows received from the listings table. 
* The data is received via a SELECT statment made in the pullListings.php file.
*
*/

function pullData() {
  let req = new XMLHttpRequest();
  req.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      
      let results = JSON.parse(this.responseText);

      let renderStr = '';
      for(let i = 0; i < results.length; i++) {
        let object = JSON.parse(results[i]);
        renderStr = renderStr + "<tr><td>" + object['ItemID'] + "</td><td>" + object['username'] + "</td><td>" + object['ItemName'] + "</td><td>" + object['AskingPrice'] + "</td><td>" + object['ItemDescription'] + "</td><td><button class='btn btn-danger'>Remove Listing</button></td></tr>";
      }
      
      document.getElementById('listingtable').innerHTML = renderStr;

    }
  };
  req.open('GET','pullListings.php', true);
  req.send();
}

// Execute pullData every 500ms.
setInterval(pullData, 500);

</script>



  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  -->
</body>
</html>
