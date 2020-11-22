<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Data of Max Mayr</title>
  </head>
  <body>

    <table class="table" id="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Temperature</th>
      <th scope="col">Time</th>
    </tr>
  </thead>
<tbody id="table-body">
  </tbody>
 </table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script>
    function fetchdata(){
      var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
           //alert(this.responseText);
           var fullstring = "";
           var obj = JSON.parse(this.responseText);
           var objCount = obj.length;
           var element = document.getElementById("table");
          for ( var x=0; x < objCount ; x++ ) {
            var curitem = obj[x];
            fullstring += "<tr><td>"+(x+1)+"</td><td>"+obj[x].temperature+"</td><td>"+obj[x].__dt+"</td></tr>"
          }
           document.getElementById("table-body").innerHTML =fullstring;
         }
       };
       xhttp.open("GET", "ajax.php", true);
       xhttp.send();
    }

    $(document).ready(function(){
     setInterval(fetchdata,1000);
    });
    </script>

  </body>
</html>
