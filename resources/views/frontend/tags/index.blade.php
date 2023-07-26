<x-frontend-master>
    <section id="subheader" class="text-light" data-bgimage="url({{ asset('frontend')}}/images/background/subheader.jpg) top">
        <div class="center-y relative text-center">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 text-center">
                        <h1>ARTIKEL</h1>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>

    <section aria-label="section">
        <div class="container">
            @livewire('frontend.articles', ['tag' => $slug])
        </div>
    </section>
    </x-frontend-master>
