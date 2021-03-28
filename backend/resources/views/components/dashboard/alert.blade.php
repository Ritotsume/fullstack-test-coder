<div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <h4 class="alert-heading">{{ $title }}</h4>
  <p>{{ $message }}</p>
  @if (!is_null($errors))
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
  @endif
  @if (!empty($footerMessage))
  <hr>
  <p class="mb-0">{{ $footerMessage }}</p>
  @endif
</div>
