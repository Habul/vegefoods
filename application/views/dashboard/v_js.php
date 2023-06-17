<script>
   $(function() {
      bsCustomFileInput.init();
   });

   var t = $('#index1').DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "columnDefs": [{
         "searchable": false,
         "orderable": false,
         "targets": 0
      }],
      "order": [],
   });

   t.on('order.dt search.dt', function() {
      t.column(0, {
         search: 'applied',
         order: 'applied'
      }).nodes().each(function(cell, i) {
         cell.innerHTML = i + 1;
      });
   }).draw();

   var x = $('#index2').DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "columnDefs": [{
         "searchable": false,
         "orderable": false,
         "targets": 0
      }],
      "order": [],
      "buttons": [{
            extend: 'copyHtml5',
            filename: 'Data',
            title: 'Report Complete Orders',
            footer: true,
            exportOptions: {
               columns: [1, 2, 3, 4, 5],
               orthogonal: 'export',
            },
         },
         {
            extend: 'excelHtml5',
            filename: 'Data',
            title: 'Report Complete Orders',
            footer: true,
            exportOptions: {
               columns: [1, 2, 3, 4, 5],
               orthogonal: 'export'
            },
         },
         {
            extend: 'pdfHtml5',
            filename: 'Data',
            title: 'Report Complete Orders',
            footer: true,
            exportOptions: {
               columns: [1, 2, 3, 4, 5],
               orthogonal: 'export',
               modifier: {
                  orientation: 'landscape'
               },
            },
         }, 'colvis'
      ],
   });

   x.on('order.dt search.dt', function() {
      x.column(0, {
         search: 'applied',
         order: 'applied'
      }).nodes().each(function(cell, j) {
         cell.innerHTML = j + 1;
      }).buttons().container().appendTo('#index2_wrapper .col-md-6:eq(0)');
   }).draw();

   <?php if ($this->session->flashdata('berhasil')) { ?>
      toastr.success("<?= $this->session->flashdata('berhasil'); ?>");
   <?php } else if ($this->session->flashdata('gagal')) {  ?>
      toastr.error("<?= $this->session->flashdata('gagal'); ?>");
   <?php } else if ($this->session->flashdata('ulang')) {  ?>
      toastr.warning("<?= $this->session->flashdata('ulang'); ?>");
   <?php } else if ($this->session->flashdata('info')) {  ?>
      toastr.info("<?= $this->session->flashdata('info'); ?>");
   <?php } ?>

   $(".toggle-password").click(function() {
      $(this).toggleClass("fa-lock fa-lock-open");
      let input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
         input.attr("type", "text");
      } else {
         input.attr("type", "password");
      }
   });

   function gethclock() {
      const d = new Date();
      weekdayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
      monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
      var dateString = d.getDate() + ' ' + monthNames[d.getMonth()] + ' ' + d.getFullYear() + ' - ' +
         ('00' + d.getHours()).slice(-2) + ':' + ('00' + d.getMinutes()).slice(-2) + ':' + ('00' + d.getSeconds()).slice(-
            2);
      document.getElementById('hclock').innerHTML = dateString;
      setTimeout(gethclock, 1000);
   }
   gethclock();
</script>