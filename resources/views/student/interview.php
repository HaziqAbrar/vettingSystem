


<?php
use Illuminate\Support\Facades\DB;
// $usertable = "seconds";
// $database  = new PDO( 'mysql:host=127.0.0.1;dbname=vetting', 'root', '' );
$query = DB::table('users')->select('name');
$statement = $database->prepare('SELECT * FROM $usertable');
$statement->execute();

$count = $statement->rowCount();

// $query = "SELECT * FROM $usertable WHERE id = $id LIMIT 1";
// $result = mysql_query($statement, $con);


if( $count > 0 ) {
    echo("tets");
     $R = $statement->fetchAll( PDO::FETCH_ASSOC );

     for( $x = 0; $x < count($R); $x++ ) {

        echo "<tr>";
        echo "<td>" . $R[ $x ]['id'] . "</td>";
        echo "<td>" . $R[ $x ]['name'] . "</td>";
        echo "<td>" . $R[ $x ]['age'] . "</td>";
        echo "</tr>";

     }

}
else { echo "Error!"; }

?>

