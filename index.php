<?php
    require("utility/database.php");

    $page=0;
    $size=20;
    $totalElements=0;
    $query="SELECT count(id) as conteggio FROM employees";
    if($result=$mysqli->query($query)){
      while($row=$result->fetch_assoc()){
        $totalElements = $row["conteggio"];
      }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // The request is using the POST method
    }else if ($_SERVER['REQUEST_METHOD'] === 'GET'){
      // aggiungere il content-type

      if(isset($_GET["page"])){
        $page=$_GET["page"];
      }

      if(isset($_GET["size"])){
        $size=$_GET["size"];
      }

      $limitA=$page*$size;
      $totalPages=ceil($totalElements/$size);


      $query="select * from employees ORDER BY id LIMIT ".$limitA.",".$size."";
      if($result=$mysqli->query($query)){
        while($row=$result->fetch_assoc()){
          $emparray[] = $row;
        }
      }

      $tmp=array(
        "size" => $size,
        "total_Elements" => $totalElements,
        "total_Pages" => $totalPages,
        "number" => $page
      );

      $emparray[]=["pages" => $tmp];

      $data = json_encode($emparray);
      
      //header('Content-Type: application/json');
      echo $data;
    }else if ($_SERVER['REQUEST_METHOD'] === '\DELETE'){
        
    }else if ($_SERVER['REQUEST_METHOD'] === 'PUT'){
        
    }

    $mysqli->close()
    or die ("<br>Chiusura connessione fallita " . $mysqli->error . " ". $mysqli->errno);

    //docker run --name some-mysql -v /home/informatica/mysqldata:/var/lib/mysql -v /home/lai2/dump:/dump -e MYSQL_ROOT_PASSWORD=my-secret-pw -d mysql:latest
    //docker exec -it "nome"
    ?>