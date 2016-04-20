<?php
// connection to the base //
$link = mysql_connect("localhost", "test", "password");
$db_selected = mysql_select_db("wilson_test", $link);

// first query //
$result1 = mysql_query("SELECT * FROM productos", $link);
$num_rows = mysql_num_rows($result1);

// required data //
$total_results = $num_rows; // total results from a query
$maximum_per_page = 3; // maximum results to show per page
$maximum_links = 5; // maximum links to show

// pagination process //
require_once("paginator/paginator.class.php");
$page = new Paginator();
$pagination = $page->paginate($total_results, $maximum_per_page, $maximum_links, "Light");

// second query //
$result2 = mysql_query("SELECT * FROM productos LIMIT $page->limit", $link);

// query results //
echo "<h1>Mini Paginator demo</h1>";
echo "<table border='1' align='center'>";
while ($row = mysql_fetch_array($result2))
{
	echo "<tr><td>".$row['codigo']."</td><td>".$row['producto']."</td><td>".$row['precio']."</td></tr>";
}
echo "</table>";

// paginator //
echo $pagination;
?>