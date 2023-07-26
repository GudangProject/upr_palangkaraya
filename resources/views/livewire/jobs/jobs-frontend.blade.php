<div>
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="me-lg-5">
                        <div class="job-list-header">
                            <form action="#">
                                <div class="row g-2">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="filler-job-form">
                                            <i class="uil uil-briefcase-alt"></i>
                                            <input type="search" class="form-control filter-job-input-box" id="exampleFormControlInput1" placeholder="Job, company... ">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="filler-job-form">
                                            <i class="uil uil-location-point"></i>
                                            <select class="form-select" id="choices-single-location" aria-label="Default select example" wire:model='filterLocation'>
                                                @foreach ($location as $loc)
                                                    <option value="{{ $loc->work_location }}">{{ $loc->work_location }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="filler-job-form">
                                            <i class="uil uil-clipboard-notes"></i>
                                            <select class="form-select " data-trigger name="choices-single-categories" id="choices-single-categories" aria-label="Default select example">
                                                <option value="4">Accounting</option>
                                                <option value="1">IT & Software</option>
                                                <option value="3">Marketing</option>
                                                <option value="5">Banking</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="wedget-popular-title mt-4">
                            <h6>Popular</h6>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <div class="popular-box d-flex align-items-center">
                                        <div class="number flex-shrink-0 me-2">
                                            20
                                        </div>
                                        <a href="javascript:void(0)" class="primary-link stretched-link"><h6 class="fs-14 mb-0">UI/UX designer</h6></a>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="popular-box d-flex align-items-center">
                                        <div class="number flex-shrink-0 me-2">
                                            18
                                        </div>
                                        <a href="javascript:void(0)" class="primary-link stretched-link"><h6 class="fs-14 mb-0">HR manager</h6></a>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="popular-box d-flex align-items-center">
                                        <div class="number flex-shrink-0 me-2">
                                            10
                                        </div>
                                        <a href="javascript:void(0)" class="primary-link stretched-link"><h6 class="fs-14 mb-0">Product manager</h6></a>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="popular-box d-flex align-items-center">
                                        <div class="number flex-shrink-0 me-2">
                                            15
                                        </div>
                                        <a href="javascript:void(0)" class="primary-link stretched-link"><h6 class="fs-14 mb-0">Sales manager</h6></a>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="popular-box d-flex align-items-center">
                                        <div class="number flex-shrink-0 me-2">
                                            28
                                        </div>
                                        <a href="javascript:void(0)" class="primary-link stretched-link"><h6 class="fs-14 mb-0">Developer</h6></a>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div>
                            @foreach ($data as $item)
                            <div class="job-box card mt-4">
                                <div class="p-4">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div class="mt-3 mt-lg-0">
                                                <h5 class="fs-17 mb-1"><a href="{{ url('jobs/'.$item->slug) }}" class="text-dark">{{ $item->title }}</a> <small class="text-muted fw-normal">{{ $item->experience ? $item->experience.' year experience' : []}}</small></h5>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <p class="text-muted fs-14 mb-0">{{ ucfirst($item->position) }}</p>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <p class="text-muted fs-14 mb-0"><i class="mdi mdi-map-marker"></i> {{ $item->work_location }}</p>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <p class="text-muted fs-14 mb-0"><i class="uil uil-wallet"></i> {{ number_format($item->budget_min) }} - {{ number_format($item->budget_max) }} / Bulan</p>
                                                    </li>
                                                </ul>
                                                <div class="mt-2">
                                                    <span class="badge bg-soft-success mt-1">{{ $item->type }}</span>
                                                    <span class="badge bg-soft-primary mt-1">{{ $item->experience ? $item->experience.' tahun pengalaman' : []}}</span>
                                                </div>
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                    <div class="favorite-icon">
                                        <a href="javascript:void(0)"><i class="uil uil-heart-alt fs-18"></i></a>
                                    </div>
                                </div>
                                <div class="p-3 bg-light">
                                    <div class="row justify-content-between">
                                        <div class="col-md-8">
                                            <div>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item"><i class="uil uil-tag"></i> Perusahaan :</li>
                                                    <li class="list-inline-item"><a href="javascript:void(0)" class="primary-link text-muted">{{ $item->company_name }}</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="text-md-end">
                                                <a href="#applyNow{{ $item->id }}" data-bs-toggle="modal" class="primary-link">Apply Now <i class="mdi mdi-chevron-double-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="applyNow{{ $item->id }}" tabindex="-1" aria-labelledby="applyNow" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="apply" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body p-5">
                                                <div class="text-center mb-4">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Apply For This Job</h5>
                                                </div>
                                                <div class="position-absolute end-0 top-0 p-3">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nameControlInput" class="form-label">Name</label>
                                                    <input type="hidden" class="form-control" name="jobsId" value="{{ $item->id }}">
                                                    <input type="text" class="form-control" name="username" id="nameControlInput" placeholder="Enter your name">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="emailControlInput2" class="form-label">Email Address</label>
                                                    <input type="email" class="form-control"name="email" id="emailControlInput2" placeholder="Enter your email">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="messageControlTextarea" class="form-label">Message</label>
                                                    <textarea class="form-control" name="message" id="messageControlTextarea" rows="4" placeholder="Enter your message"></textarea>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label" for="inputGroupFile01">Resume Upload</label>
                                                    <input type="file" class="form-control" name="resume" id="inputGroupFile01">
                                                    @error('resume') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                                <button type="submit" class="btn btn-primary w-100">Send</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{-- <div class="row">
                            <div class="col-lg-12 mt-4 pt-2 d-flex justify-content-center">
                                {{ $data->links() }}
                            </div>
                        </div> --}}
                    </div>
                </div>

                <!-- START SIDE-BAR -->
                <div class="col-lg-3">
                    <div class="side-bar mt-5 mt-lg-0">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="locationOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#location" aria-expanded="true" aria-controls="location">
                                    Location
                                </button>
                                </h2>
                                <div id="location" class="accordion-collapse collapse show" aria-labelledby="locationOne">
                                    <div class="accordion-body">
                                        <div class="side-title">
                                            <div class="mb-3">
                                                <form class="position-relative">
                                                    <input class="form-control" type="search" placeholder="Search...">
                                                    <button class="bg-transparent border-0 position-absolute top-50 end-0 translate-middle-y me-2" type="submit"><span class="mdi mdi-magnify text-muted"></span></button>
                                                </form>
                                            </div>
                                            <div class="area-range">
                                                <div class="form-label mb-3">Area Range: <span class="example-val mt-2" id="slider1-span">0</span> miles</div>
                                                <div id="slider1"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end accordion-item -->

                            <div class="accordion-item mt-4">
                            <h2 class="accordion-header" id="experienceOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#experience" aria-expanded="true" aria-controls="experience">
                                    Work experience
                                </button>
                            </h2>
                            <div id="experience" class="accordion-collapse collapse show" aria-labelledby="experienceOne">
                                <div class="accordion-body">
                                    <div class="side-title">
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked1" />
                                            <label class="form-check-label ms-2 text-muted" for="flexCheckChecked1">No experience</label>
                                        </div>
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked2" checked />
                                            <label class="form-check-label ms-2 text-muted" for="flexCheckChecked2">0-3 years</label>
                                        </div>
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked3" />
                                            <label class="form-check-label ms-2 text-muted" for="flexCheckChecked3">3-6 years</label>
                                        </div>
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked4" />
                                            <label class="form-check-label ms-2 text-muted" for="flexCheckChecked4">More than 6 years</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div><!-- end accordion-item -->

                            <div class="accordion-item mt-3">
                                <h2 class="accordion-header" id="jobType">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#jobtype" aria-expanded="false" aria-controls="jobtype">
                                        Type of employment
                                    </button>
                                </h2>
                                <div id="jobtype" class="accordion-collapse collapse show" aria-labelledby="jobType">
                                    <div class="accordion-body">
                                        <div class="side-title">
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault6" checked>
                                                <label class="form-check-label ms-2 text-muted" for="flexRadioDefault6">
                                                    Freelance
                                                </label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                                <label class="form-check-label ms-2 text-muted" for="flexRadioDefault2">
                                                    Full Time
                                                </label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                                                <label class="form-check-label ms-2 text-muted" for="flexRadioDefault3">
                                                    Internship
                                                </label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                                                <label class="form-check-label ms-2 text-muted" for="flexRadioDefault4">
                                                    Part Time
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end accordion-item -->

                            <div class="accordion-item mt-3">
                                <h2 class="accordion-header" id="datePosted">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#dateposted" aria-expanded="false" aria-controls="dateposted">
                                        Date Posted
                                    </button>
                                </h2>
                                <div id="dateposted" class="accordion-collapse collapse show" aria-labelledby="datePosted">
                                    <div class="accordion-body">
                                        <div class="side-title form-check-all">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="checkAll" value="" />
                                                <label class="form-check-label ms-2 text-muted" for="checkAll">
                                                    All
                                                </label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox"  name="datePosted"  value="last" id="flexCheckChecked5" checked />
                                                <label class="form-check-label ms-2 text-muted" for="flexCheckChecked5">
                                                    Last Hour
                                                </label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" name="datePosted" value="last" id="flexCheckChecked6" />
                                                <label class="form-check-label ms-2 text-muted" for="flexCheckChecked6">
                                                    Last 24 hours
                                                </label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" name="datePosted" value="last" id="flexCheckChecked7" />
                                                <label class="form-check-label ms-2 text-muted" for="flexCheckChecked7">
                                                    Last 7 days
                                                </label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" name="datePosted" value="last" id="flexCheckChecked8" />
                                                <label class="form-check-label ms-2 text-muted" for="flexCheckChecked8">
                                                    Last 14 days
                                                </label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" name="datePosted" value="last" id="flexCheckChecked9" />
                                                <label class="form-check-label ms-2 text-muted" for="flexCheckChecked9">
                                                    Last 30 days
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end accordion-item -->

                            <div class="accordion-item mt-3">
                                <h2 class="accordion-header" id="tagCloud">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#tagcloud" aria-expanded="false" aria-controls="tagcloud">
                                        Tags Cloud
                                    </button>
                                </h2>
                                <div id="tagcloud" class="accordion-collapse collapse show" aria-labelledby="tagCloud">
                                    <div class="accordion-body">
                                        <div class="side-title">
                                            <a href="javascript:void(0)" class="badge tag-cloud fs-13 mt-2">design</a>
                                            <a href="javascript:void(0)" class="badge tag-cloud fs-13 mt-2">marketing</a>
                                            <a href="javascript:void(0)" class="badge tag-cloud fs-13 mt-2">business</a>
                                            <a href="javascript:void(0)" class="badge tag-cloud fs-13 mt-2">developer</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end accordion-item -->

                        </div><!--end accordion-->

                    </div><!--end side-bar-->
                </div><!--end col-->
                <!-- END SIDE-BAR -->
            </div><!--end row-->
        </div>
    </section>
</div>
