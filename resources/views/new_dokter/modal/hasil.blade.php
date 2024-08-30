<style>
  .modal-dialog.custom-width {
    max-width: 80%; 
    width: 80%; 
    max-height: 90%; 
    height: 90%; 
  }

  .modal-body iframe {
    width: 100%;
    height: 100%;
  }
</style>

<div class="modal fade" id="resultModal" tabindex="-1" role="dialog" aria-labelledby="resultModalLabel" aria-hidden="true">
  <div class="modal-dialog custom-width" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-between">
        <h5 class="modal-title" id="resultModalLabel">Hasil Pemeriksaan</h5>
        <div class="d-flex align-items-center">
          <button id="printButton" class="btn" style="border: 1px solid black; color: black; margin-right: 10px;">Cetak Halaman</button>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
      <div class="modal-body">
        <iframe src="" style="border:none; width: 100%; height: calc(100vh - 150px);"></iframe>
      </div>
    </div>
  </div>
</div>

<script>
  document.getElementById('printButton').addEventListener('click', function() {
    var iframe = document.querySelector('.modal-body iframe');
    iframe.contentWindow.print();
  });
</script>