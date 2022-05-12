<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require('connection.php')
    ?>
    <script>
        function generate_table() {
            var headers = ['Nazwa','Data','Powtarzaj co','Kalendarz']
            var zadanieIndex = ['nazwa','data','powtarzanie','kalendarz_id']
            var body = document.getElementsByTagName("body")[0];

            var tbl = document.createElement("table");
            var tblBody = document.createElement("tbody");
            
            //header
            var row1 = document.createElement("tr");
            for (var j = 0; j < 4; j++) {
                var cell = document.createElement("th");
                var cellText = document.createTextNode(headers[j]);
                cell.appendChild(cellText);
                row1.appendChild(cell);
            }
            tblBody.appendChild(row1);
            

            for (var i = 0; i < wydarzenia.length; i++) {
              var row = document.createElement("tr");
            
              for (var j = 0; j < 5; j++) {
                var cell = document.createElement("td");
                if (j==4){
                    var cellText = document.createTextNode(kalendarze[wydarzenia[i].kalendarz_id-1].nazwa);
                    cell.style.color = kalendarze[wydarzenia[i].kalendarz_id-1].kolor
                }
                else if (j==1){
                    var cellText = document.createTextNode(wydarzenia[i][zadanieIndex[j]].toLocaleDateString())
                }
                else {var cellText = document.createTextNode(wydarzenia[i][zadanieIndex[j]]);}
                
                cell.appendChild(cellText);
                row.appendChild(cell);
              }
              tblBody.appendChild(row);
            }
            tbl.appendChild(tblBody);
            body.appendChild(tbl);
            tbl.setAttribute("border", "2");
        }
        generate_table();
    </script>
</body>
</html>
