<?php

include "config.php";

			$sql = "
SELECT bestelcode, winkel.winkelnaam, klant.voorletters, klant.tussenvoegsel, klant.achternaam, artikel.artikel, artikel.prijs, bestelling.aantal, (artikel.prijs * bestelling.aantal) AS 'Subtotaal'
FROM artikel, bestelling, klant, medewerker, winkel
WHERE artikel.artikelcode = bestelling.artikelcode
AND klant.klantcode = bestelling.klantcode
AND medewerker.medewerkerscode = bestelling.medewerkerscode
AND winkel.winkelcode = bestelling.winkelcode
ORDER BY winkel.winkelnaam ASC
			";
			$result = $db->query($sql); 
			echo"<center><br>";
			if ($result->num_rows > 0) {
				echo "<table border='1'>";
			while($row = $result->fetch_assoc()){ 
			
			$bestelcode = $row['bestelcode'];
			$winkelnaam = $row['winkelnaam'];
			$kvoorletters = $row['voorletters'];
			$ktussenvoegsel = $row['tussenvoegsel'];
			$kachternaam = $row['achternaam'];
			$artikel = $row['artikel'];
			$prijs = $row['prijs'];
			$aantal = $row['aantal'];
			
			echo "<tr>";
			echo "<td>$bestelcode</td>";
			echo "<td>$winkelnaam</td>";
			echo "<td>$kvoorletters</td>";
			echo "<td>$ktussenvoegsel</td>";
			echo "<td>$kachternaam</td>";
			echo "<td>$artikel</td>";
			echo "<td>$prijs</td>";
			echo "<td>$aantal</td>";
			echo "</tr>";
			
			}	
echo "</table>";			
			}


?>