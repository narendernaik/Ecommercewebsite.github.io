<html>
 <head>
  <style>
   .img1{
     width:100%;
     
   }
  .c1{
    background-color:orange;
    color:white;
    padding:15px 26px;
    position:fixed;
    top:10px;
    right:0px;
    display:inline-block;
    border-radius:2px;
   }
  .c1:hover{
    background:green;
  }
   .c2
   {
     position:absolute;
     top:-10px;
     right:0px;
     padding:5px 10px;
     border-radius:50%;
     background:yellow;
     color:black; 
  }
   .cdiv{
     width:400px;
     margin:30px;
     box-shadow:0 4px 8px 0 rgba(0,0,0,0.2);
     transition:0.3s;
    float:right;
   }
  .cdiv:hover{
      box-shadow:0 8px 16px 0 rgba(0,0,0,0.2);
   }
   .pdiv{
     padding:2px 16px;
  }
  </style>
 <script>
   var a=new Array();
    var i=0;
  function addcart(str)
  {
   
    a[i]=str;
    i=i+1;
   document.getElementById('update').innerHTML=i;
   
  }
 function getcart()
 {
  /* var j=0;
    for(j=0;j<i;j++)
    {
      alert("array value: "+a[j]);
    }*/
  var obj=new XMLHttpRequest();
  obj.onreadystatechange=function(){
     if(this.readyState==4&&this.status==200)
      {
          document.getElementById('select1').style.display="none";
         document.getElementById('bt1').style.display="none";
        document.getElementById('div1').innerHTML=this.responseText;
      }
   };
 obj.open("GET","getCart.php?q="+a+"&n="+i,true);
 obj.send();
 }
 function getItem(str)
 {
   
   var obj=new XMLHttpRequest();
  obj.onreadystatechange=function(){
     if(this.readyState==4&&this.status==200)
      {
        
        document.getElementById('div1').innerHTML=this.responseText;
      }
   };
 obj.open("GET","getItem.php?q="+str,true);
 obj.send();
 }
 </script>
 </head>
 <body>
   <button onclick="getcart()" id="bt1" class="c1"><span>Cart</span><span class="c2" id="update">0</span></button>
   <center><select style="font-size:50px;" onchange="getItem(this.value)" id="select1"><option value="">select category</option>
   <option value="laptop">Laptop</option>
   <option value="mobile">Mobile</option>
   <option value="watch">Watch</option>
   <option value="tv">TV</option>
    </select></center>
  <?php
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
      $sql="select * from items";
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
 </body>
</html>
