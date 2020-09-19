
<!-- ***************************************************************************** -->
<!-- PHP  code for automation of preparation databasetable for mailinglist app     -->
<!-- ***************************************************************************** -->
<!-- Vrsion: 1.0        Date: 8.9.2020 by CDesigner.eu                             -->
<!-- ***************************************************************************** -->

<?php // script for accessing database and first table structure establishement

/* Attempt MySQL server connection. Assuming you are running MySQL
server with  (user 'admin' with  password test*555) */
$dbc = mysqli_connect("localhost", "admin", "test*555", "test");
 
// Check connection
if($dbc === false){
    die("ERROR: Could not connect to database. " . mysqli_connect_error());
}
 
// Attempt create table query execution
$sql = "CREATE TABLE mailinglist(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    firstname_of_subscriber VARCHAR(40) NOT NULL,
    secondname_of_subscriber VARCHAR(40) NOT NULL,
    write_date DATETIME NOT NULL,
    email VARCHAR(70) NOT NULL UNIQUE, /* UNIQUE e-mails enabled only as security befor sending duplicite messages */
   /* message_text TEXT */ /* optionally add boolean fields for subscription */
    GDPR_accept BOOLEAN, /* BOOLEAN value if user accepted GDPR */
    news_accept BOOLEAN  /* BOOLEAN value if user accepted newsletter */
)";
if(mysqli_query($dbc, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbc);
}
 
// Close connection
mysqli_close($dbc);
?>