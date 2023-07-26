<!-- header begin -->
<header class="transparent header-light scroll-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="de-flex sm-pt10">
                    <div class="de-flex-col">
                        <div class="de-flex-col">
                            <!-- logo begin -->
                            <div id="logo">
                                @php
                                    $config = \App\Models\Admin\Configuration::orderBy('created_at')->first();
                                    $logo = asset('storage/images/logo').'/'.$config->logo;
                                @endphp
                                <a href="/">
                                    <img alt="" class="logo" src="{{ $logo }}" />
                                    <img alt="" class="logo-2" src="{{ $logo }}" />
                                </a>
                            </div>
                            <!-- logo close -->
                        </div>
                        <div class="de-flex-col">
                        </div>
                    </div>
                    <div class="de-flex-col header-col-mid text-dark">
                        <!-- mainmenu begin -->
                        <ul id="mainmenu">
                            <li>
                                <a href="/">Home<span></span></a>
                            </li>
                            <li>
                                <a href="/posts">Berita<span></span></a>
                            </li>
                            <li>
                                <a href="#">Seminar<span></span></a>
                                <ul>
                                    <li><a href="/seminar-nasional">Seminar Nasional</a></li>
                                    <li><a href="/seminar-internasional">Seminar Internasional</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Prosiding Nasional<span></span></a>
                                <ul>
                                    @foreach (\App\Models\LinkProsiding::where('category', 'nasional')->get() as $item)
                                        <li><a href="{{ $item->url }}">{{ $item->title }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="#">Prosiding Internasional<span></span></a>
                                <ul>
                                    @foreach (\App\Models\LinkProsiding::where('category', 'internasional')->get() as $item)
                                        <li><a href="{{ $item->url }}">{{ $item->title }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="#">Lainnya<span></span></a>
                                <ul>
                                    <li><a href="/contact">Kontak</a></li>
                                    <li>
                                        @php
                                            $document       = file_get_contents('JSON/template.json');
                                            $documentArray  = json_decode($document, true);
                                        @endphp
                                        <a href="/storage/files/template/{{ $documentArray['data']['data'][0]['name'] }}">Template</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="de-flex-col">
                        @if (Auth::check())
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <div class="menu_side_area">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();" class="btn-main"><i class="fa fa-sign-out"></i><span>LOGOUT</span></a>
                                </div>
                            </form>

                            <div class="menu_side_area">
                                <a href="{{ route('dashboard') }}" class="btn-main"><i class="fa fa-cog"></i><span>DASHBOARD</span></a>
                            </div>
                        @else
                            <div class="menu_side_area">
                                <a href="{{ route('login') }}" class="btn-main"><i class="fa fa-sign-in"></i><span>LOGIN</span></a>
                            </div>
                            <div class="menu_side_area">
                                <a href="{{ route('register') }}" class="btn-main"><i class="fa fa-user-plus"></i><span>REGISTRASI</span></a>
                            </div>
                        @endif
                        <div class="menu_side_area">
                            <span id="menu-btn"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header close -->
