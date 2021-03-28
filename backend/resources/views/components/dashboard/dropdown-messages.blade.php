<li class="nav-item dropdown no-arrow mx-1">
  <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-envelope fa-fw"></i>
    <span class="badge badge-danger badge-counter">{{ $amount }}</span>
  </a>

  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
    aria-labelledby="messagesDropdown">
    <h6 class="dropdown-header">
      Mensagens
    </h6>
    @foreach ($data as $msg)
      @if ($loop->index <= 4)
      <a class="dropdown-item d-flex align-items-center" href="{{ route('contacts.show', $msg->id) }}">
        <div>
          <div class="text-truncate">{{ $msg->subject }}</div>
          <div class="small text-gray-500">{{ $msg->name }}</div>
        </div>
      </a>
      @endif
    @endforeach
    <a class="dropdown-item text-center small text-gray-500" href="{{ route('contacts.index') }}">Ver todas as
      mensagens</a>
  </div>
</li>
