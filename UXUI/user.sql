CREATE TABLE user (
    id INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    phone VARCHAR(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

<div class="top-header">
				<?php
					include "connection.php"; require "login.php";
					$records = mysqli_query($conn,"select email from user"); 
					while($data = mysqli_fetch_array($records))
					{
					?>
						<label class="text"><?php if($_SESSION['email'] == $data['email'] ) { echo $data['email'] ; } ?> </label>
					<?php
					}
				?>
				<?php mysqli_close($conn);  ?>
			</div>