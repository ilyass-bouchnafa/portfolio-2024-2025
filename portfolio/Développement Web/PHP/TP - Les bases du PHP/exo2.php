<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table De Multiplication</title>

</head>
<body>
    <table 
        border="1" 
        style="
            border-collapse : collapse;
            text-align : center;
            padding : 50px;
            font-family : Arial, sans-serif;
    ">
        <?php
            $nombre = array();
            for($i=0; $i < 10; $i++) { 
                for($j=0; $j < 10; $j++) {
                    $nombre[$i][$j] = $i * $j;
                }
            }
            echo '<td style="background-color :  #66CDFF; padding : 6px 10px;"> </td>';
            for ($i=0; $i < 10; $i++) {
                echo '<td style="background-color :  #66CDFF; padding : 6px 10px;">' . $i . '</td>'; 
            }
            
            for($i=0; $i < 10; $i++) {
                echo '<tr style="padding : 6px 10px;">';
                echo '<td style="background-color : #66CDFF; padding : 6px 10px;">' . $i . '</td>';
                for($j=0; $j < 10; $j++) {
                    echo "<td>" . $nombre[$i][$j] . "</td>"; 

                }
                echo "</tr>";
            }

        ?>
    </table>
    <p>lorem100</p>


    
</body>
</html>

              
        
