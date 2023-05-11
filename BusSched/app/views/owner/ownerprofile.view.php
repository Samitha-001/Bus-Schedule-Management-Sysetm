<?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
// show($_SESSION['USER']->role)
if ($_SESSION['USER']->role == 'passenger') {
    redirect('home');
} else if ($_SESSION['USER']->role == 'driver') {
    redirect('drivers');
} else if ($_SESSION['USER']->role == 'admin') {
    redirect('admins');
} else if ($_SESSION['USER']->role == 'scheduler') {
    redirect('schedulers');
} else if ($_SESSION['USER']->role == 'conductor') {
    redirect('conductors');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style2.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/passenger_profile.css">
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <script src="<?= ROOT ?>/assets/js/passengerprofile.js"></script>
    <title>Bus Owner - Home</title>
</head>

<body>
<?php
include '../app/views/components/ownernavbar.php';
include '../app/views/components/ownersidebar.php';
$owner = $data[0];
$username = $owner->username;

?>

    <main class="container">

    <div class="card-container" id="info-card">
            <h2>
                <?php
                echo "Welcome " . $_SESSION['USER']->username . "!";
                ?>
            </h2>
     <div class="passenger-profile-card" id="profile-header">
        <?php
        // get profile picture if exists, else use default
        $pics = "assets/images/profile-pics/" . $username . ".*";
        $profile_pics = glob($pics);
        if (count($profile_pics) > 0) {
            $profile_pic = $profile_pics[0];
        } else {
            $profile_pic = "assets/images/icons/profile-pic-none.png";
        }
        ?>

        <img id="profile-pic" src="<?= $profile_pic ?>" alt="profile pic" style="border-radius: 50px;object-fit: cover;" width="100px" height="100px">
        <img id="edit-pencil" src="<?= ROOT ?>/assets/images/icons/edit-pencil.png">
        
     </div>

        <!-- div to add profile picture -->
        <div class="passenger-profile-card" id="profile-pic-from-div" style="display:none;">
        <!-- input to get image file as profile picture -->
        <form id="profile-pic-form">
            <input type="file" name="profile-pic" id="profile-pic-input" accept="image/*">
            <input type="hidden" name="username" id="username" value="<?= $username ?>">
            <button id="upload-profile-pic-btn">Upload</button>
        </form>
        </div>

        
            <ul>
                <p style="font-size: 32px;">Personal Info</p>
                <table class="styled-table">
                    <tr>
                        <th>Username: </th>
                        <td>
                            <?= $_SESSION['USER']->username ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Name: </th>
                        <td>
                            <?= $data[0]->name ?>
                        </td>
                    <tr>
                        <th>Email: </th>
                        <td>
                            <?= $_SESSION['USER']->email ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Phone: </th>
                        <td>
                            <?= $data[0]->phone ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Address: </th>
                        <td>
                            <?= $data[0]->address ?>
                        </td>
                    </tr>

                   
                  <tr> 
                  <th></th>
                   <td><button style="margin-left:50px;background-color:brown" href=# id='edit-passenger-info'>Edit</button></td> 
                 </tr>
                </table>
            </ul>
    </div>

       
    </main>


</body>

</html>