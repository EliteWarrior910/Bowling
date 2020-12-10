<!-- Populate the table by using Javascript to write to td id's plus the index number, starting at 2 and ending at 11. -->
<?php //place frame grids
    for($index = 2; $index < 12; $index++){
        echo"
            <div class='frame-grid' style='grid-column: $index; margin: auto;'>
                <table class='frame-table'>
                    <tr>
                        <!-- Split 1 -->
                        <td id='firstSplit$index' style='color:rgb(0, 0, 0);'></td>
                        <!-- Split 2 -->
                        <td id='secondSplit$index' style='color:rgb(0, 0, 0);'></td>
                    </tr>
                    <tr>
                        <!-- Frame Total -->
                        <td colspan='2' id='total$index' style='color:rgb(0, 0, 0);'></td>
                    </tr>
                </table>
            </div>
        ";                
    }
?>
<!-- <div class='frame-grid' style='grid-column: $index'>
<div class='frame-grid' style='grid-column: $index; margin: auto;'>
    <table class='frame-table'>
        <tr> -->
            <!-- Split 1 -->
            <!-- <td id='firstSplit$index' style='color:rgb(255, 255, 255);'></td>
            <td id='firstSplit$index' style='color:rgb(0, 0, 0);'></td> -->
            <!-- Split 2 -->
            <!-- <td id='secondSplit$index' style='color:rgb(255, 255, 255);'></td>
            <td id='secondSplit$index' style='color:rgb(0, 0, 0);'></td>
        </tr>
        <tr> -->
            <!-- Frame Total -->
            <!-- <td colspan='2' id='total$index' style='color:rgb(255, 255, 255);'></td>
            <td colspan='2' id='total$index' style='color:rgb(0, 0, 0);'></td>
        </tr>
    </table>
</div> -->