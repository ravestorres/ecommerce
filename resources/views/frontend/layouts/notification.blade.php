<!-- Bootstrap CSS (you can skip if already included in your main layout) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Modal -->
<div class="modal fade" id="sessionModal" tabindex="-1" aria-labelledby="sessionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header
          @if(session('success')) bg-success text-white @elseif(session('error')) bg-danger text-white @endif
      ">
        <h5 class="modal-title" id="sessionModalLabel">
          @if(session('success')) Success @elseif(session('error')) Error @endif
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        @if(session('success'))
          {{ session('success') }}
        @elseif(session('error'))
          {{ session('error') }}
        @endif
      </div>
    </div>
  </div>
</div>

