<?php
  include('dbconnection.php') ;
  function payments_dashboard_page() {
    $con = connect(); // connect to db
    
    $query = mysqli_query($con, 'select * from pesapi_payment');

    if($query) {
      $records = array();
      while ($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
        array_push(
          $records,
          array(
            'amount' => $row['amount']/100,
            'receipt' => $row['receipt'],
            'time' => $row['time'],
            'phonenumber' => $row['phonenumber'],
            'name' => $row['name'],
            'account' => $row['account'],
            'status' => $row['status'],
            'post_balance' => $row['post_balance'],
            'note' => $row['note'],
            'transaction_cost' => $row['transaction_cost'],
            'type' => $row['type']
            )
        );
      }
    }
    ?>
    <style>
    .container {
      padding: 50px;
      background-color: white;
      margin-top: 20px;
      margin-right: 10px;
      -webkit-box-shadow: 0px 0px 70px -9px rgba(0,0,0,0.25);
      -moz-box-shadow: 0px 0px 70px -9px rgba(0,0,0,0.25);
      box-shadow: 0px 0px 70px -9px rgba(0,0,0,0.25);
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, "Ubuntu", Arial, sans-serif;
    }
    h1 {
      text-align: center;
    }
    table {
      margin: 0 auto;
      width: 100%;
      text-align: left;
      border-collapse: collapse;
    }
    td, th {
      border: 1px solid #eeeeee;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #eeeeee;
    }

    #search {
      background-image: url('http://www.w3schools.com/css/searchicon.png');
      background-position: 10px 12px;
      background-repeat: no-repeat;
      width: 100%;
      font-size: 16px;
      padding: 12px 20px 12px 40px;
      border: 1px solid #ddd;
      margin-bottom: 12px; 
    }
    </style>
    <div class="container">
      <h1>Payments Dashboard</h1>
      <input type="text" id="search" onkeyup="tableSearchAndFilter()" placeholder="Search name...">
        <table id="table">
          <th>Name</th>
          <th>Phone Number</th>
          <th>Amount</th>
          <th>Receipt</th>
          <th>Time</th>
      <?php
      foreach ($records as $value) {
        
        ?>
          <tr>
          <td><?php echo $value['name']; ?></td>
          <td><?php echo $value['phonenumber']; ?></td>
          <td><?php echo $value['amount'], ' KES'; ?></td>
          <td><?php echo $value['receipt']; ?></td>
          <td><?php echo $value['time']; ?></td>
          </tr>
        <?php
      };
      ?>
        </table>

    </div>
    <?php
  }
  payments_dashboard_page();
?>  

<script>
function tableSearchAndFilter() {
  // Declare variables 
  var input, filter, table, tr, td, i, j;
  input = document.getElementById("search");
  filter = input.value.toUpperCase();
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");
  tds = table.getElementsByTagName("th");
  
  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        } 
  }
}
</script>
