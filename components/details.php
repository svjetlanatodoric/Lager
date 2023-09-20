<?php
// get the racunId from the request
$racunId = $_GET["racunId"];

// query the database to get the additional data
include_once("../constants.php");
$conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);
$query = "
SELECT
a.ArtikalId,
a.Naziv,
r.RacunId,
r.Kolicina,
r.Cijena
FROM artikal as a
JOIN racunstavka as r
ON a.ArtikalId = r.ArtikalId
WHERE r.RacunId = '$racunId'
";
        $response = $conn->query($query);

// loop through the query result and create an array of data
$data = array();
while ($row = $response->fetch_assoc()) {
  $data[] = array(
    "artikalId" => $row["ArtikalId"],
    "naziv" => $row["Naziv"],
    "kolicina" => $row["Kolicina"],
    "cijena" => $row["Cijena"]
  );
}
// return the data in a JSON format
echo json_encode($data);

?>