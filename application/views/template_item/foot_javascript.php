
<!-- core:js -->
<!-- endinject -->
<!-- plugin js for this page -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/promise-polyfill/polyfill.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/djibe/clockpicker@6d385d49ed6cc7f58a0b23db3477f236e4c1cd3e/dist/bootstrap4-clockpicker.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- end plugin js for this page -->
<!-- inject:js -->
<script src="<?php echo base_url() ?>assets/vendors/feather-icons/feather.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/template.js"></script>
<!-- endinject -->

<!-- custom js for this page -->
<?php if ($this->session->userdata('message') == 'save-success') {
  echo '<script>swal("Sukses!", "Data Berhasil Disimpan!", "success");</script>';
}elseif ($this->session->userdata('message') == 'save-failed') {
  echo '<script>swal("Oops!", "Data Gagal Disimpan", "error");</script>';
}elseif ($this->session->userdata('message') == 'not-found') {
  echo '<script>swal("Oops!", "Data Tidak Ditemukan", "error");</script>';
}elseif ($this->session->userdata('message') == 'upload-error') {
  echo '<script>swal("Oops!", "Upload File Gagal!", "error");</script>';
}elseif ($this->session->userdata('message') == 'success-tindaklanjut') {
  echo '<script>swal("Sukses!", "Surat Ditindaklanjut!", "success");</script>';
}elseif ($this->session->userdata('message') == 'error-username') {
  echo '<script>swal("Oops!", "Username sudah digunakan!", "error");</script>';
}
?>

<script type="text/javascript">
$(function() {
  'use strict';

  $(function() {
    $('#dataTableExample').DataTable({
      "aLengthMenu": [
        [10, 30, 50, -1],
        [10, 30, 50, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      }
    });
    $('#dataTableExample').each(function() {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Search');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });
  });

});

  if($('#datePickerExample').length) {
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#datePickerExample').datepicker({
      format: "dd/mm/yyyy",
      todayHighlight: true,
      autoclose: true
    });
  }

  $(function() {
    $('#daterangePromo').daterangepicker({
      opens: 'left',
      locale: {
          format: 'DD/MM/Y'
        }
    });
  });

  $(function() {
    $('.clockpicker').clockpicker({
      'default': 'now',
      vibrate: true,
      placement: "top",
      align: "left",
      autoclose: false,
      twelvehour: true
    });
    $('.clockpicker2').clockpicker({
      'default': 'now',
      vibrate: true,
      placement: "top",
      align: "left",
      autoclose: true,
      twelvehour: false
    });
  });
</script>

<!-- end custom js for this page -->
<script type="text/javascript">
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

<script type="text/javascript">
$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        locale: {
          format: 'DD/MM/Y'
        }
    }, cb);

    cb(start, end);

});

// show or hide password
$(".reveal").on('click',function() {
    var $pwd = $(".pwd");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
    } else {
        $pwd.attr('type', 'password');
    }
});
</script>