$(document).ready(function () {
   // hilangkan tombol cari
   $("#tombol-cari").hide();

   // event ketika keyword ditulis
   $("#keyword").on("keyup", function () {
      $("#container").load("ajax/pemain.php?keyword=" + $("#keyword").val());
   });
});
