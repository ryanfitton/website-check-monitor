<?php
/**
 * website-check-monitor.php
 *
 * This small PHP script will check your MySQL status by attempting a connection.
 * It will then generate an appropriate response for use in StatusCake (https://www.statuscake.com/).
 * This code may be used with other monitoring services, however you may need to perform some extra coding modifications.
 *
 * Repository page: https://bitbucket.org/ryanfitton/website-check-monitor
 * More information: https://ryanfitton.co.uk/blog/using-statuscake-com-to-monitor-your-website-and-database-uptime/
 *
 * @author Ryan Fitton
 * @version 1.0
 * @website https://ryanfitton.co.uk
 * @license https://bitbucket.org/ryanfitton/website-check-monitor (Within README.md)
 * 
 **/


// Turn off all error reporting
error_reporting(0);


// *******************************
// MySQL server configuration
// *******************************

$DB_HOST 	 = 'DATABASE HOST HERE';          // Database host
$DB_USERNAME = 'DATABASE USERNAME HERE';      // Database username
$DB_PASSWORD = 'DATABASE PASSWORD HERE';      // Database password
$DB_NAME	 = 'DATABASE NAME HERE';          // Database name



// ***End configurations. You probably won't need to make any changes beyond this point.

// Get start time for the execution timer
// Execution time code from http://www.developerfusion.com
$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];
$startTime = $mtime;


// Check MySQL using the provided connection information
$mysqli = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// Display errors if establishing a connection fails
if ($mysqli->connect_errno) {
	// Set status as DOWN
	$mysqlStatus = 'DOWN. Reason: ' . $mysqli->connect_error;

	// Set a 404 (Not Found) response, this will trigger the StatusCake check to believe the site is down
	// Using PHP http_response_code() function: http://php.net/manual/en/function.http-response-code.php
	http_response_code(404);

//If no errors connecting, run more tests
} else {
	// Check if the MySQL server is available
	if ($mysqli->ping()) {
		// Set status as UP
		$mysqlStatus = 'UP';

		// Set a 200 (OK) response
		http_response_code(200);

		//Close the database connection
		$mysqli->close();

	} else {
		// Set status as DOWN
		$mysqlStatus = 'DOWN. Error: ' . $mysqli->error;

		// Set a 404 (Not Found) response, this will trigger the StatusCake check to believe the site is down
		// Using PHP http_response_code() function: http://php.net/manual/en/function.http-response-code.php
		http_response_code(404);
	}
}


// Get end time and calculate execution time
$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];
$endTime = $mtime;
$totalResponseTime = round(($endTime - $startTime) * 1000, 3); // Time in milliseconds
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">
	<head>
		<title>DB Check: <?php echo $_SERVER['SERVER_NAME']; ?></title>
	</head>

	<body>
		<ul>
			<li>Database Status: <?php echo $mysqlStatus; ?></li>
			<li>Response Time: <?php echo $totalResponseTime; ?></li>
		</ul>
	</body>
</html>