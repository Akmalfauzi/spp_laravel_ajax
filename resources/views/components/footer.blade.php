<footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <script src="{{ urlTemplate() }}assets/modules/jquery.min.js"></script>
  <script src="{{ urlTemplate() }}assets/modules/popper.js"></script>
  {{-- <script src="{{ urlTemplate() }}assets/modules/tooltip.js"></script> --}}
  <script src="{{ urlTemplate() }}assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="{{ urlTemplate() }}assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="{{ urlTemplate() }}assets/modules/moment.min.js"></script>
  <script src="{{ urlTemplate() }}assets/js/stisla.js"></script>
  <script src="{{ urlTemplate() }}assets/modules/datatables/datatables.min.js"></script>
  <script src="{{ urlTemplate() }}assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{ urlTemplate() }}assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="{{ urlTemplate() }}assets/modules/jquery-ui/jquery-ui.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="{{ urlTemplate() }}assets/js/page/modules-datatables.js"></script>

  <script src="{{ urlTemplate() }}assets/modules/izitoast/js/iziToast.min.js"></script>
  <script src="{{ urlTemplate() }}assets/modules/select2/dist/js/select2.full.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="{{ urlTemplate() }}assets/js/page/modules-toastr.js"></script>
  
  <!-- Template JS File -->
  <script src="{{ urlTemplate() }}assets/js/scripts.js"></script>
  

  @stack('js')

  <script>

    function removeValidation() {
      $('.validation').removeClass('is-invalid').removeClass('is-valid');
      $('.text-error').remove();
    }

    function addValidation() {
      $('.validation').removeClass('is-invalid').addClass('is-valid');
      $('.text-error').remove();
    }

    function success() {
      iziToast.success({
        title: 'Success!',
        message: '',
        theme: 'dark',
        backgroundColor: 'green',
        position: 'topRight',
        timeout: 2000
      });
    }

    function hapus() {
      iziToast.success({
        title: 'Success!',
        message: 'Menghapus Data!',
        theme: 'dark',
        backgroundColor: 'green',
        position: 'topRight',
        timeout: 2000
      });
    }

    function update() {
      iziToast.success({
        title: 'Success!',
        message: 'Perbarui Data!',
        theme: 'dark',
        backgroundColor: 'green',
        position: 'topRight',
        timeout: 2000
      });
    }

    function gagal() {
      iziToast.error({
        title: 'Error!',
        message: 'Gagal menyimpan data!',
        theme: 'dark',
        backgroundColor: 'red',
        position: 'topRight',
        timeout: 2000
      });
    }

    @if(Session::has('alertlogin'))
        iziToast.success({
            title: 'Welcome!',
            message: '',
            theme: 'dark',
            backgroundColor: 'green',
            position: 'topRight',
            timeout: 4000
        });
      @endif

    function warning() {
      iziToast.warning({
        title: 'Warning!',
        message: '',
        theme: 'dark',
        backgroundColor: 'orange',
        position: 'topRight'
      });
    }

    function custom_msg(msg){
      iziToast.info({
        title: 'Info!',
        message: msg,
        theme: 'dark',
        backgroundColor: 'blue',
        position: 'topRight'
      });
    }

  </script>

</body>
</html>