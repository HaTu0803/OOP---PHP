<!-- require 'oop_ex.php';
$pdo = require 'connect.php'; -->
<!-- 
// Lấy dữ liệu AdminUser từ cơ sở dữ liệu
// $stmt = $pdo->query('SELECT * FROM AdminUsers');
// $adminUsers = [];
// while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//     $adminUsers[] = new AdminUser($row['firstname'], $row['lastname'], $row['email'], $row['username']);
// }

// // Lấy dữ liệu Customer từ cơ sở dữ liệu
// $stmt = $pdo->query('SELECT * FROM Customers');
// $customers = [];
// while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//     $customers[] = new Customer($row['firstname'], $row['lastname'], $row['email'], $row['username'], $row['city'], $row['state'], $row['country']);
// }

// // Hiển thị thông tin AdminUser
// foreach ($adminUsers as $adminUser) {
//     $info = $adminUser->getInfo();
//     echo $info['name'] . ' - ' . $info['email'] . ' - ' . $info['username'] . ' - ' . ($info['is_admin'] ? 'ADMIN' : 'CUSTOMER') . '<br>';
// }

// // Hiển thị thông tin Customer
// foreach ($customers as $customer) {
//     $info = $customer->getInfo();
  
//     echo $info['name'] . ' - ' . $info['email'] . ' - ' . $info['username'] . ' - Location: ' . $info['location'] .' - '. ($info['is_admin'] ? 'ADMIN' : 'CUSTOMER') . '<br>';
// } -->


<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Information</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <h1 class="mt-5">Users Information</h1>

        <h3>Admin Users</h3>
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-hover table-bordered  table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        require 'oop_ex.php';
                        $pdo = require 'connect.php';
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $pdo->query('SELECT * FROM AdminUsers');
                        $adminUsers = [];
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $adminUsers[] = new AdminUser($row['firstname'], $row['lastname'], $row['email'], $row['username']);
                        }
                        foreach ($adminUsers as $adminUser) {
                            $info = $adminUser->getInfo();
                            echo '<tr>';
                            echo '<td>' . $info['name'] . '</td>';
                            echo '<td>' . $info['email'] . '</td>';
                            echo '<td>' . $info['username'] . '</td>';
                            echo '<td>' . ($info['is_admin'] ? 'ADMIN' : 'CUSTOMER') . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>



        </div>
        <h3>Customer Users</h3>
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-hover table-bordered  table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Location</th>
                            <th>Role</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stmt = $pdo->query('SELECT * FROM Customers');
                        $customers = [];
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $customers[] = new Customer($row['firstname'], $row['lastname'], $row['email'], $row['username'], $row['city'], $row['state'], $row['country']);
                        }
                        foreach ($customers as $customer) {
                            $info = $customer->getInfo();
                            echo '<tr>';
                            echo '<td>' . $info['name'] . '</td>';
                            echo '<td>' . $info['email'] . '</td>';
                            echo '<td>' . $info['username'] . '</td>';
                            echo '<td>' . $info['location'] . '</td>';
                            echo '<td>' . ($info['is_admin'] ? 'ADMIN' : 'CUSTOMER') . '</td>';

                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>

</html>