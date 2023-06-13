<div class="row mb-2">
    <div class="col-md-12">
        <div
            class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary">World</strong>
                <h3 class="mb-0">{{ $newsTitle }}</h3>
                <div class="mb-1 text-body-secondary">{{ date('d M Y H:i', strtotime($newsDate)) }}</div>
                <p class="card-text mb-auto">{!! Str::limit($newsContent, 10, '(...)') !!}</p>
                <a href="{{ url("posts/$slug") }}" class="stretched-link">Continue reading</a>
            </div>
            <div class="col-auto d-none d-lg-block">
                <div class="card shadow-sm">
                    <img src="{{ url('storage/' . $newsImage) }}" class="card-img-top object-fit-cover"
                        width="100%" height="250" alt="photo">
                </div>
            </div>
        </div>
    </div>
</div>
