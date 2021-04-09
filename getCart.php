<?php
    $a=$_GET['q'];
    $n=$_GET['n']; 
    $data=explode(',',$a);
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
      if($n>0)
       {
       echo '<center><h1>SELECTED PRODUCTS</h1></center><br><br><br><hr>';
 
      for($i=0;$i<$n;$i++)
        {
           $sql="select * from items where iid=$data[$i]";
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
     
        }
      else
      echo '<center><h1>There are no selected products</h1></center><br><br><br><hr>';
    }
?>