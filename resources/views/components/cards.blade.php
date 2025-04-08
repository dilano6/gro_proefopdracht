<section class="most-watched">
    <div class="most-watched-header">
        <h2>Most watched</h2>
        <div class="most-watched-button">
            <a href="#">
                <span>Button Style</span>
                <span class="icon-box">
                    <img src="{{ asset('images/arrow-right.png') }}">
                </span>
            </a>
        </div>
    </div>

    <div class="most-watched-grid">
        @for ($i = 0; $i < 3; $i++)
            <div class="card">
            <img src="{{ asset('images/card-image.png') }}" class="card-image">
            <div class="card-content">
                <p class="card-meta">
                    In <a href="#">Cases</a> • 4 min. read
                </p>
                <h3 class="card-title">
                    MultiChoice Group Picks Metrological to Deliver Premium OTT Services on DStv
                </h3>
                <a href="#" class="card-readmore">
                    Read more
                    <img class="card-readmore-icon" src="{{ asset('images/arrow-right.png') }}">
                </a>
            </div>
    </div>
    @endfor
    </div>
</section>