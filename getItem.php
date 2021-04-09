<?php
    $q=$_GET['q'];
    $server="localhost";
    $user="root";
    $pass="";
    $db="task";
    $con=new mysqli($server,$user,$pass,$db);
    if($con->connect_error)
     {
      echo "unable to connect database";
     }
    else
    {
     
           $sql="select * from items where category='$q'";
      $result=$con->query($sql);
      if($result->num_rows>0)
       {
         echo "<div id='div1'>";
        while($row=$result->fetch_assoc())
        {
           echo '<div class="cdiv">';
          echo '<img src="'.$row['name'].'.jpg" id="'.$row['iid'].'" class="img1">';
          echo '<div class="pdiv">';
          echo '<h4><b>Price : Rs.'.$row['price'].'</b></h4>';
          echo '<p><button onclick="addcart('.$row['iid'].')">Add to Cart</button></p>'; 
          echo '</div>';
          echo '</div>';
        }
      echo "</div>";
       }
 
        
    }
?>