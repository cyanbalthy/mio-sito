<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>

    <?php
    require("utility/database.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // The request is using the POST method
    }else if ($_SERVER['REQUEST_METHOD'] === 'GET'){
      // aggiungere il content-type

      $query="select * from dipendenti";
      if($result=$mysqli->query($query)){
        while($row=$result->fetch_assoc()){
          $emparray[] = $row;
        }
      }

      $data = json_encode($emparray);
      
      header('Content-Type: application/json');
      echo $data;
    }else if ($_SERVER['REQUEST_METHOD'] === '\DELETE'){
        
    }else if ($_SERVER['REQUEST_METHOD'] === 'PUT'){
        
    }

    mysqli->close()
    or die ("<br>Chiusura connessione fallita " . $mysqli->error . " ". $mysqli->errno);

    //docker run --name some-mysql -v /home/informatica/mysqldata:/var/lib/mysql -v /home/lai2/dump:/dump -e MYSQL_ROOT_PASSWORD=my-secret-pw -d mysql:latest
    //docker exec -it "nome"
    ?>



    </body>
</html>