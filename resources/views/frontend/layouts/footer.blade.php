<!-- footer begin -->
<footer class="footer-light">
    <div class="subfooter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="de-flex">
                        <div class="de-flex-col">
                            @php
                                $config = \App\Models\Admin\Configuration::orderBy('created_at')->first();
                                $logo = asset('storage/images/logo').'/'.$config->logo;
                            @endphp
                            <a href="/">
                                <img alt="" class="f-logo" src="{{ $logo }}" /><span class="copy">&copy; Copyright 2022 - {{ config('app.name') }}</span>
                            </a>
                        </div>
                        <div class="de-flex-col">
                            <div class="social-icons">
                                <a href="{{ $config->facebook }}"><i class="fa fa-facebook fa-lg"></i></a>
                                <a href="{{ $config->twitter }}"><i class="fa fa-twitter fa-lg"></i></a>
                                <a href="{{ $config->instagram }}"><i class="fa fa-instagram fa-lg"></i></a>
                                <a href="{{ $config->tiktok }}"><i class="fa fa-music fa-lg"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer close -->
