<?php 

require_once __DIR__ . "/db.php";

$firstname = $_POST['firstname'] ?? 'firstname';
$lastname = $_POST['lastname'] ?? 'lastname';
$email = $_POST['email'] ?? 'email';
$password = $_POST['password'] ?? 'password';

// $stmt = $pdo->prepare("SELECT id FROM form WHERE email = :email");
// $stmt->execute([':email' => $email]);
// $user = $stmt->fetch();

// if ($user) {
//     echo "Email already exists";
// }

$stmt = $pdo->prepare("INSERT INTO form (`firstname`, `lastname`, `email`, `password`) VALUES (:firstname, :lastname, :email, :password)");
$stmt->bindValue(':firstname', $firstname);
$stmt->bindValue(':lastname', $lastname);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':password', $password);
$stmt->execute();

if (!empty($_POST['submit']) && $_POST['submit'] == 'yes'){
    header("Location: succeed.php");
}

?>

<pre>
    <!-- <?php var_dump($_POST);?> -->
</pre>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="form__container">

        <div class="title-area">
            <h1>Register</h1>
        </div>

        <form method="POST">
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">First name</label>
                <input type="text" class="form-control" name="firstname" required>
            </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Last name</label>
                <input type="text" class="form-control" name="lastname" required>
            </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                <label class="form-check-label" for="exampleCheck1">I agree to <a href="https://www.youtube.com/watch?v=go0PwcwYuls" target="_blank" rel="noopener noreferrer">Terms and conditions</a></label>
            </div>

            <div class="button-area">
                <button type="submit" class="btn btn-primary" name="submit" value="yes">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>