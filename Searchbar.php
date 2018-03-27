<?php
    $con = mysql_connect('localhost','root','');
    $db = mysql_select_db('fyp2');
 ?>
 <!Doctype html>
<html>
  <head>
  <title>Professional Search Bar</title>
  <link rel="stylesheet" href="css/style.css" />
  <script>
      function active() {
          var searchBar = document.getElementById('searchBar');

          if(searchBar.value == 'Search...'){
              searchBar.value = ''
              searchBar.placeholder = 'Search...'
          }
      }
      function inactive() {
          var searchBar = document.getElementById('searchBar');

          if(searchBar.value == ''){
              searchBar.value = 'Search...'
              searchBar.placeholder = ''
          }
      }
  </script>
  </head>
  <body>
    <form action="" method="" />
      <input type="text" id="searchBar" placeholder="" value="Search..." maxlength="25" autocomplete="off" onMouseDown="active();" onBlur="inactive();" /><input type="submit" id="searchBtn" value="Go!" />
    </form>
    <?php
        $query = mysql_query("SELECT * FROM accounts");
        $num_rows = mysql_num_rows($query);

        while($row = mysqli_fetch_array($query)){
          $Username = $row['Username'];


          echo $Username;
        }
          ?>
  </body>
</html>
