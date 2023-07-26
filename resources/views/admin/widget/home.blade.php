<div class="card card-developer-meetup">
    <div class="meetup-img-wrapper rounded-top text-center">
        <img src="{{ asset('assets') }}/images/illustration/email.svg" alt="Meeting Pic" height="170" />
    </div>
    <div class="card-body p-0">
        <div class="card">
            <div class="card-body">
                <div class="media mb-1">
                    <div class="avatar bg-light-primary rounded mr-1">
                        <div class="avatar-content">
                            <i data-feather="calendar" class="avatar-icon font-medium-3"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h6 class="mb-0">{{ $data['date'] }}</h6>
                        <small>{{ $data['time'] }}</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Agenda Informasi</h4>
            </div>
            <div class="card-body">
                <div class="list-group">
                    @forelse ($agendas as $agenda)
                    <a href="{{ $agenda->url }}" class="list-group-item list-group-item-action {{ $loop->index == 0 ? 'active' : '' }}">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1 {{ $loop->index == 0 ? 'text-white' : 'text-dark' }}">{{ $agenda->title }}</h5>
                        </div>
                        <span class="badge badge-dark"><small class="{{ $loop->index == 0 ? 'text-secondary' : '' }}">{{ $agenda->dateFormat }}</small></span>
                        <p class="card-text">
                            {{ \Illuminate\Support\Str::words($agenda->title, 15) }}
                        </p>
                    </a>
                    @empty
                        <h5>Agenda tidak tersedia</h5>
                    @endforelse
                    </div>
                </div>
        </div>

    </div>
</div>

