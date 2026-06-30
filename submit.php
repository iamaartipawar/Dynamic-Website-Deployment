<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$name = $_POST['name'];
$email = $_POST['email'];
$website = $_POST['website'];
$comment = $_POST['comment'];
$gender = $_POST['gender'];

// Database connection
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "FCT";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert query
$sql = "INSERT INTO users (name, email, website, comment, gender)
        VALUES ('$name', '$email', '$website', '$comment', '$gender')";
?>
<!DOCTYPE html>
<html>
<head>
<style>
body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: radial-gradient(circle at top, #1a2a6c, #16222a);
    color: white;

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start; /* message upar */
    height: 100vh;
    padding-top: 30px;
}

/* SUCCESS MESSAGE TOP */
h2 {
    color: #00ffcc;
    margin-bottom: 20px;
    text-align: center;
    text-shadow: 0 0 10px #00ffcc;
}

/* OUTPUT CENTER CARD */
ul {
    list-style: none;
    padding: 20px;
    margin: auto; /* 🔥 center */
   background: rgba(255,255,255,0.05);
    backdrop-filter: blur(15px);
    border-radius: 15px;
    box-shadow: 0 0 30px rgba(0,0,0,0.4);
    width: 300px;
    text-align: center;
}

/* EACH FIELD */
li {
    background: rgba(255,255,255,0.1);
    margin: 10px 0;
    padding: 10px;
    border-radius: 10px;
}
</style>
<title>Form Submission Result</title>
</head>
<body>
<?php
    if (mysqli_query($conn, $sql)) {
        echo "<h2>✅ New record created successfully!</h2>";
        echo "<h3>Submitted Information:</h3>";
        echo "<ul>";
        echo "<li><strong>Name:</strong> " . htmlspecialchars($name) . "</li>";
        echo "<li><strong>Email:</strong> " . htmlspecialchars($email) . "</li>";
        echo "<li><strong>Website:</strong> " . htmlspecialchars($website) . "</li>";
        echo "<li><strong>Comment:</strong> " . htmlspecialchars($comment) . "</li>";
        echo "<li><strong>Gender:</strong> " . htmlspecialchars($gender) . "</li>";
        echo "</ul>";
    } else {
 echo "<h3>❌ Error: " . $sql . "<br>" . mysqli_error($conn) . "</h3>";
    }

    mysqli_close($conn);
?>

</body>
</html>
