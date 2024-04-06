<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<?php
session_start();
if (isset($_SESSION['name'])||isset($_SESSION['uname'])) {
	session_destroy();
	echo "
      <script>
      alert('you are sucessfuly logout');
      location.href='index.php';
      </script>
	";
}else{
	echo "
      <script>
      alert('please login..');
      location.href='index.php';
      </script>
	";
}
?>