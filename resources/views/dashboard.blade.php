@extends('layout.app')

@section('content')
    <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">

        <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false"
            aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
        <a class="navbar-brand me-1 me-sm-3" href="../index.html">
            <div class="d-flex align-items-center"><img class="me-2"
                    src="../assets/img/icons/spot-illustrations/falcon.png" alt="" width="40" /><span
                    class="font-sans-serif">falcon</span>
            </div>
        </a>
        <ul class="navbar-nav align-items-center d-none d-lg-block">
            <li class="nav-item">
                <div class="search-box" data-list='{"valueNames":["title"]}'>
                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                        <input class="form-control search-input fuzzy-search" type="search" placeholder="Search..."
                            aria-label="Search" />
                        <span class="fas fa-search search-box-icon"></span>

                    </form>
                    <div class="btn-close-falcon-container position-absolute end-0 top-50 translate-middle shadow-none"
                        data-bs-dismiss="search">
                        <div class="btn-close-falcon" aria-label="Close"></div>
                    </div>
                    <div class="dropdown-menu border font-base start-0 mt-2 py-0 overflow-hidden w-100">
                        <div class="scrollbar list py-3" style="max-height: 24rem;">
                            <h6 class="dropdown-header fw-medium text-uppercase px-card fs--2 pt-0 pb-2">
                                Recently Browsed</h6><a class="dropdown-item fs--1 px-card py-1 hover-primary"
                                href="../app/events/event-detail.html">
                                <div class="d-flex align-items-center">
                                    <span class="fas fa-circle me-2 text-300 fs--2"></span>

                                    <div class="fw-normal title">Pages <span
                                            class="fas fa-chevron-right mx-1 text-500 fs--2"
                                            data-fa-transform="shrink-2"></span> Events</div>
                                </div>
                            </a>
                            <a class="dropdown-item fs--1 px-card py-1 hover-primary"
                                href="../app/e-commerce/customers.html">
                                <div class="d-flex align-items-center">
                                    <span class="fas fa-circle me-2 text-300 fs--2"></span>

                                    <div class="fw-normal title">E-commerce <span
                                            class="fas fa-chevron-right mx-1 text-500 fs--2"
                                            data-fa-transform="shrink-2"></span> Customers</div>
                                </div>
                            </a>

                            <hr class="bg-200 dark__bg-900" />
                            <h6 class="dropdown-header fw-medium text-uppercase px-card fs--2 pt-0 pb-2">
                                Suggested Filter</h6><a class="dropdown-item px-card py-1 fs-0"
                                href="../app/e-commerce/customers.html">
                                <div class="d-flex align-items-center"><span
                                        class="badge fw-medium text-decoration-none me-2 badge-soft-warning">customers:</span>
                                    <div class="flex-1 fs--1 title">All customers list</div>
                                </div>
                            </a>
                            <a class="dropdown-item px-card py-1 fs-0" href="../app/events/event-detail.html">
                                <div class="d-flex align-items-center"><span
                                        class="badge fw-medium text-decoration-none me-2 badge-soft-success">events:</span>
                                    <div class="flex-1 fs--1 title">Latest events in current month</div>
                                </div>
                            </a>
                            <a class="dropdown-item px-card py-1 fs-0" href="../app/e-commerce/product/product-grid.html">
                                <div class="d-flex align-items-center"><span
                                        class="badge fw-medium text-decoration-none me-2 badge-soft-info">products:</span>
                                    <div class="flex-1 fs--1 title">Most popular products</div>
                                </div>
                            </a>

                            <hr class="bg-200 dark__bg-900" />
                            <h6 class="dropdown-header fw-medium text-uppercase px-card fs--2 pt-0 pb-2">
                                Files</h6><a class="dropdown-item px-card py-2" href="#!">
                                <div class="d-flex align-items-center">
                                    <div class="file-thumbnail me-2"><img class="border h-100 w-100 fit-cover rounded-3"
                                            src="../assets/img/products/3-thumb.png" alt="" />
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-0 title">iPhone</h6>
                                        <p class="fs--2 mb-0 d-flex"><span class="fw-semi-bold">Antony</span><span
                                                class="fw-medium text-600 ms-2">27 Sep at 10:30 AM</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item px-card py-2" href="#!">
                                <div class="d-flex align-items-center">
                                    <div class="file-thumbnail me-2"><img class="img-fluid"
                                            src="../assets/img/icons/zip.png" alt="" /></div>
                                    <div class="flex-1">
                                        <h6 class="mb-0 title">Falcon v1.8.2</h6>
                                        <p class="fs--2 mb-0 d-flex"><span class="fw-semi-bold">John</span><span
                                                class="fw-medium text-600 ms-2">30 Sep at 12:30 PM</span>
                                        </p>
                                    </div>
                                </div>
                            </a>

                            <hr class="bg-200 dark__bg-900" />
                            <h6 class="dropdown-header fw-medium text-uppercase px-card fs--2 pt-0 pb-2">
                                Members</h6><a class="dropdown-item px-card py-2" href="../pages/user/profile.html">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-l status-online me-2">
                                        <img class="rounded-circle" src="../assets/img/team/1.jpg" alt="" />

                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-0 title">Anna Karinina</h6>
                                        <p class="fs--2 mb-0 d-flex">Technext Limited</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item px-card py-2" href="../pages/user/profile.html">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-l me-2">
                                        <img class="rounded-circle" src="../assets/img/team/2.jpg" alt="" />

                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-0 title">Antony Hopkins</h6>
                                        <p class="fs--2 mb-0 d-flex">Brain Trust</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item px-card py-2" href="../pages/user/profile.html">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-l me-2">
                                        <img class="rounded-circle" src="../assets/img/team/3.jpg" alt="" />

                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-0 title">Emma Watson</h6>
                                        <p class="fs--2 mb-0 d-flex">Google</p>
                                    </div>
                                </div>
                            </a>

                        </div>
                        <div class="text-center mt-n3">
                            <p class="fallback fw-bold fs-1 d-none">No Result Found.</p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
            <li class="nav-item">
                <div class="theme-control-toggle fa-icon-wait px-2">
                    <input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle"
                        type="checkbox" data-theme-control="theme" value="dark" />
                    <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to light theme"><span
                            class="fas fa-sun fs-0"></span></label>
                    <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to dark theme"><span
                            class="fas fa-moon fs-0"></span></label>
                </div>
            </li>

            <li class="nav-item dropdown"><a class="nav-link pe-0" id="navbarDropdownUser" href="#"
                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-xl">
                        <img class="rounded-circle" src="{{ asset('assets/img/team/3-thumb.png') }}" alt="" />

                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                    <div class="bg-white dark__bg-1000 rounded-2 py-2">
                        <a class="dropdown-item" href="../pages/user/profile.html">Profile &amp;
                            account</a>
                        <a class="dropdown-item" href="#!">Feedback</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../pages/authentication/card/logout.html">Logout</a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
    <div class="row g-3 mb-3">
        <div class="col-md-6 col-xxl-3">
            <div class="card h-md-100 ecommerce-card-min-width">
                <div class="card-header pb-0">
                    <h6 class="mb-0 mt-2 d-flex align-items-center">Weekly Sales<span class="ms-1 text-400"
                            data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Calculated according to last week's sales"><span class="far fa-question-circle"
                                data-fa-transform="shrink-1"></span></span>
                    </h6>
                </div>
                <div class="card-body d-flex flex-column justify-content-end">
                    <div class="row">
                        <div class="col">
                            <p class="font-sans-serif lh-1 mb-1 fs-4">$47K</p><span
                                class="badge badge-soft-success rounded-pill fs--2">+3.5%</span>
                        </div>
                        <div class="col-auto ps-0">
                            <div class="echart-bar-weekly-sales h-100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3">
            <div class="card h-md-100">
                <div class="card-header pb-0">
                    <h6 class="mb-0 mt-2">Total Order</h6>
                </div>
                <div class="card-body d-flex flex-column justify-content-end">
                    <div class="row justify-content-between">
                        <div class="col-auto align-self-end">
                            <div class="fs-4 fw-normal font-sans-serif text-700 lh-1 mb-1">58.4K</div>
                            <span class="badge rounded-pill fs--2 bg-200 text-primary"><span
                                    class="fas fa-caret-up me-1"></span>13.6%</span>
                        </div>
                        <div class="col-auto ps-0 mt-n4">
                            <div class="echart-default-total-order"
                                data-echarts='{"tooltip":{"trigger":"axis","formatter":"{b0} : {c0}"},"xAxis":{"data":["Week 4","Week 5","week 6","week 7"]},"series":[{"type":"line","data":[20,40,100,120],"smooth":true,"lineStyle":{"width":3}}],"grid":{"bottom":"2%","top":"2%","right":"10px","left":"10px"}}'
                                data-echart-responsive="true"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3">
            <div class="card h-md-100">
                <div class="card-body">
                    <div class="row h-100 justify-content-between g-0">
                        <div class="col-5 col-sm-6 col-xxl pe-2">
                            <h6 class="mt-1">Market Share</h6>
                            <div class="fs--2 mt-3">
                                <div class="d-flex flex-between-center mb-1">
                                    <div class="d-flex align-items-center"><span class="dot bg-primary"></span><span
                                            class="fw-semi-bold">samsung</span></div>
                                    <div class="d-xxl-none">33%</div>
                                </div>
                                <div class="d-flex flex-between-center mb-1">
                                    <div class="d-flex align-items-center"><span class="dot bg-info"></span><span
                                            class="fw-semi-bold">Huawei</span></div>
                                    <div class="d-xxl-none">29%</div>
                                </div>
                                <div class="d-flex flex-between-center mb-1">
                                    <div class="d-flex align-items-center"><span class="dot bg-300"></span><span
                                            class="fw-semi-bold">Huawei</span></div>
                                    <div class="d-xxl-none">20%</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto position-relative">
                            <div class="echart-market-share"></div>
                            <div class="position-absolute top-50 start-50 translate-middle text-dark fs-2">
                                26M</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3">
            <div class="card h-md-100">
                <div class="card-header d-flex flex-between-center pb-0">
                    <h6 class="mb-0">Weather</h6>
                    <div class="dropdown font-sans-serif btn-reveal-trigger">
                        <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                            type="button" id="dropdown-weather-update" data-bs-toggle="dropdown"
                            data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                class="fas fa-ellipsis-h fs--2"></span></button>
                        <div class="dropdown-menu dropdown-menu-end border py-2"
                            aria-labelledby="dropdown-weather-update"><a class="dropdown-item" href="#!">View</a><a
                                class="dropdown-item" href="#!">Export</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                href="#!">Remove</a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="row g-0 h-100 align-items-center">
                        <div class="col">
                            <div class="d-flex align-items-center"><img class="me-3"
                                    src="../assets/img/icons/weather-icon.png" alt="" height="60" />
                                <div>
                                    <h6 class="mb-2">New York City</h6>
                                    <div class="fs--2 fw-semi-bold">
                                        <div class="text-warning">Sunny</div>Precipitation: 50%
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto text-center ps-2">
                            <div class="fs-4 fw-normal font-sans-serif text-primary mb-1 lh-1">31&deg;
                            </div>
                            <div class="fs--1 text-800">32&deg; / 25&deg;</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-0">
        <div class="col-lg-6 pe-lg-2 mb-3">
            <div class="card h-lg-100 overflow-hidden">
                <div class="card-header bg-light">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="mb-0">Running Projects</h6>
                        </div>
                        <div class="col-auto text-center pe-card">
                            <select class="form-select form-select-sm">
                                <option>Working Time</option>
                                <option>Estimated Time</option>
                                <option>Billable Time</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="row g-0 align-items-center py-2 position-relative border-bottom border-200">
                        <div class="col ps-card py-1 position-static">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl me-3">
                                    <div class="avatar-name rounded-circle bg-soft-primary text-dark">
                                        <span class="fs-0 text-primary">F</span>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-0 d-flex align-items-center"><a class="text-800 stretched-link"
                                            href="#!">Falcon</a><span
                                            class="badge rounded-pill ms-2 bg-200 text-primary">38%</span>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col py-1">
                            <div class="row flex-end-center g-0">
                                <div class="col-auto pe-2">
                                    <div class="fs--1 fw-semi-bold">12:50:00</div>
                                </div>
                                <div class="col-5 pe-card ps-2">
                                    <div class="progress bg-200 me-2" style="height: 5px;">
                                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 38%"
                                            aria-valuenow="38" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-0 align-items-center py-2 position-relative border-bottom border-200">
                        <div class="col ps-card py-1 position-static">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl me-3">
                                    <div class="avatar-name rounded-circle bg-soft-success text-dark">
                                        <span class="fs-0 text-success">R</span>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-0 d-flex align-items-center"><a class="text-800 stretched-link"
                                            href="#!">Reign</a><span
                                            class="badge rounded-pill ms-2 bg-200 text-primary">79%</span>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col py-1">
                            <div class="row flex-end-center g-0">
                                <div class="col-auto pe-2">
                                    <div class="fs--1 fw-semi-bold">25:20:00</div>
                                </div>
                                <div class="col-5 pe-card ps-2">
                                    <div class="progress bg-200 me-2" style="height: 5px;">
                                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 79%"
                                            aria-valuenow="79" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-0 align-items-center py-2 position-relative border-bottom border-200">
                        <div class="col ps-card py-1 position-static">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl me-3">
                                    <div class="avatar-name rounded-circle bg-soft-info text-dark"><span
                                            class="fs-0 text-info">B</span></div>
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-0 d-flex align-items-center"><a class="text-800 stretched-link"
                                            href="#!">Boots4</a><span
                                            class="badge rounded-pill ms-2 bg-200 text-primary">90%</span>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col py-1">
                            <div class="row flex-end-center g-0">
                                <div class="col-auto pe-2">
                                    <div class="fs--1 fw-semi-bold">58:20:00</div>
                                </div>
                                <div class="col-5 pe-card ps-2">
                                    <div class="progress bg-200 me-2" style="height: 5px;">
                                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 90%"
                                            aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-0 align-items-center py-2 position-relative border-bottom border-200">
                        <div class="col ps-card py-1 position-static">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl me-3">
                                    <div class="avatar-name rounded-circle bg-soft-warning text-dark">
                                        <span class="fs-0 text-warning">R</span>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-0 d-flex align-items-center"><a class="text-800 stretched-link"
                                            href="#!">Raven</a><span
                                            class="badge rounded-pill ms-2 bg-200 text-primary">40%</span>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col py-1">
                            <div class="row flex-end-center g-0">
                                <div class="col-auto pe-2">
                                    <div class="fs--1 fw-semi-bold">21:20:00</div>
                                </div>
                                <div class="col-5 pe-card ps-2">
                                    <div class="progress bg-200 me-2" style="height: 5px;">
                                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-0 align-items-center py-2 position-relative">
                        <div class="col ps-card py-1 position-static">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl me-3">
                                    <div class="avatar-name rounded-circle bg-soft-danger text-dark"><span
                                            class="fs-0 text-danger">S</span></div>
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-0 d-flex align-items-center"><a class="text-800 stretched-link"
                                            href="#!">Slick</a><span
                                            class="badge rounded-pill ms-2 bg-200 text-primary">70%</span>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col py-1">
                            <div class="row flex-end-center g-0">
                                <div class="col-auto pe-2">
                                    <div class="fs--1 fw-semi-bold">31:20:00</div>
                                </div>
                                <div class="col-5 pe-card ps-2">
                                    <div class="progress bg-200 me-2" style="height: 5px;">
                                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 70%"
                                            aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light p-0"><a class="btn btn-sm btn-link d-block w-100 py-2"
                        href="#!">Show all projects<span class="fas fa-chevron-right ms-1 fs--2"></span></a></div>
            </div>
        </div>
        <div class="col-lg-6 ps-lg-2 mb-3">
            <div class="card h-lg-100">
                <div class="card-header">
                    <div class="row flex-between-center">
                        <div class="col-auto">
                            <h6 class="mb-0">Total Sales</h6>
                        </div>
                        <div class="col-auto d-flex">
                            <select class="form-select form-select-sm select-month me-2">
                                <option value="0">January</option>
                                <option value="1">February</option>
                                <option value="2">March</option>
                                <option value="3">April</option>
                                <option value="4">May</option>
                                <option value="5">Jun</option>
                                <option value="6">July</option>
                                <option value="7">August</option>
                                <option value="8">September</option>
                                <option value="9">October</option>
                                <option value="10">November</option>
                                <option value="11">December</option>
                            </select>
                            <div class="dropdown font-sans-serif btn-reveal-trigger">
                                <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                                    type="button" id="dropdown-total-sales" data-bs-toggle="dropdown"
                                    data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                        class="fas fa-ellipsis-h fs--2"></span></button>
                                <div class="dropdown-menu dropdown-menu-end border py-2"
                                    aria-labelledby="dropdown-total-sales"><a class="dropdown-item"
                                        href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                        href="#!">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body h-100 pe-0">
                    <!-- Find the JS file for the following chart at: src\js\charts\echarts\total-sales.js-->
                    <!-- If you are not using gulp based workflow, you can find the transpiled code at: public\assets\js\theme.js-->
                    <div class="echart-line-total-sales h-100" data-echart-responsive="true"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-0">
        <div class="col-lg-6 col-xl-7 col-xxl-8 mb-3 pe-lg-2 mb-3">
            <div class="card h-lg-100">
                <div class="card-body d-flex align-items-center">
                    <div class="w-100">
                        <h6 class="mb-3 text-800">Using Storage <strong class="text-dark">1775.06 MB
                            </strong>of 2 GB</h6>
                        <div class="progress mb-3 rounded-3" style="height: 10px;">
                            <div class="progress-bar bg-progress-gradient border-end border-white border-2"
                                role="progressbar" style="width: 43.72%" aria-valuenow="43.72" aria-valuemin="0"
                                aria-valuemax="100"></div>
                            <div class="progress-bar bg-info border-end border-white border-2" role="progressbar"
                                style="width: 18.76%" aria-valuenow="18.76" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-success border-end border-white border-2" role="progressbar"
                                style="width: 9.38%" aria-valuenow="9.38" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-200" role="progressbar" style="width: 28.14%"
                                aria-valuenow="28.14" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="row fs--1 fw-semi-bold text-500 g-0">
                            <div class="col-auto d-flex align-items-center pe-3"><span
                                    class="dot bg-primary"></span><span>Regular</span><span
                                    class="d-none d-md-inline-block d-lg-none d-xxl-inline-block">(895MB)</span>
                            </div>
                            <div class="col-auto d-flex align-items-center pe-3"><span
                                    class="dot bg-info"></span><span>System</span><span
                                    class="d-none d-md-inline-block d-lg-none d-xxl-inline-block">(379MB)</span>
                            </div>
                            <div class="col-auto d-flex align-items-center pe-3"><span
                                    class="dot bg-success"></span><span>Shared</span><span
                                    class="d-none d-md-inline-block d-lg-none d-xxl-inline-block">(192MB)</span>
                            </div>
                            <div class="col-auto d-flex align-items-center"><span
                                    class="dot bg-200"></span><span>Free</span><span
                                    class="d-none d-md-inline-block d-lg-none d-xxl-inline-block">(576MB)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
