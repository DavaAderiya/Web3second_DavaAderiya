<!DOCTYPE html>
<html lang="en">
<?php
include "komponen/header.php";
?>

<body data-bs-spy="scroll" data-bs-target="#header" tabindex="0">
   <?php
   include "komponen/navbar.php";
   include "page/admin/page/dashboard.php";



   // konten
   $page = isset($_GET['page']) ? $_GET['page'] : 'home';


//    include "komponen/footer.php";
   ?>
   <script src="https://unpkg.com/feather-icons"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <script>
      feather.replace();
   </script>
    <script>
        const totalProduk = document.querySelectorAll('.show-produk').length;
        document.getElementById('total-items').textContent = totalProduk;

        function navigateSelect(selectElement) {
            const selectedValue = selectElement.value;
            if (selectedValue) {
                window.location.href = selectedValue;
            }
        }
    </script>
</body>

</html>