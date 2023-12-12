<x-app-layout>
    <x-slot name="header">
        <div class="page-header">
            <div class="page-header-content container d-lg-flex">
                <div class="d-flex">
                    <h4 class="page-title mb-0">
                        Inicio - <span class="fw-normal">Dashboard</span>
                    </h4>

                    <a href="#page_header" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>

                <div class="collapse d-lg-block my-lg-auto ms-lg-auto" id="page_header">
                    <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">

                        <div class="d-inline-flex mt-3 mt-sm-0">
                            
                            <a href="#" class="btn btn-outline-primary btn-icon w-32px h-32px rounded-pill ms-3">
                                <i class="ph-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <!-- Blocks with chart -->
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header d-flex border-bottom-0 pb-1 mb-0">
                    <div>
                        <span class="fw-medium mb-1">Total visitors</span>
                        <h2 class="fw-bold mb-0">5,274 <small class="text-success fs-base fw-normal ms-2">+ 3.6%</small></h2>
                    </div>

                    <div class="dropdown ms-auto">
                        <button type="button" data-bs-toggle="dropdown" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill">
                            <i class="ph-dots-three-vertical"></i>
                        </button>

                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="#" class="dropdown-item">
                                <i class="ph-eye me-2"></i>
                                View report
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="ph-printer me-2"></i>
                                Print report
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="ph-file-pdf me-2"></i>
                                Export report
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="ph-gear me-2"></i>
                                Configure
                            </a>
                        </div>
                    </div>
                </div>
            
                <div class="chart-container">
                    <div class="chart" id="area_gradient_blue" style="height: 100px"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header d-flex border-bottom-0 pb-1 mb-0">
                    <div>
                        <span class="fw-medium mb-1">New opportunities</span>
                        <h2 class="fw-bold mb-0">2,785 <small class="text-success fs-base fw-normal ms-2">+ 5.9%</small></h2>
                    </div>

                    <div class="dropdown ms-auto">
                        <button type="button" data-bs-toggle="dropdown" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill">
                            <i class="ph-dots-three-vertical"></i>
                        </button>

                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="#" class="dropdown-item">
                                <i class="ph-eye me-2"></i>
                                View report
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="ph-printer me-2"></i>
                                Print report
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="ph-file-pdf me-2"></i>
                                Export report
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="ph-gear me-2"></i>
                                Configure
                            </a>
                        </div>
                    </div>
                </div>
            
                <div class="chart-container">
                    <div class="chart" id="area_gradient_orange" style="height: 100px"></div>
                </div>
            </div>
        </div>
            
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header d-flex border-bottom-0 pb-1 mb-0">
                    <div>
                        <span class="fw-medium mb-1">New leads</span>
                        <h2 class="fw-bold mb-0">1,589 <small class="text-danger fs-base fw-normal ms-2">- 1.8%</small></h2>
                    </div>

                    <div class="dropdown ms-auto">
                        <button type="button" data-bs-toggle="dropdown" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill">
                            <i class="ph-dots-three-vertical"></i>
                        </button>

                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="#" class="dropdown-item">
                                <i class="ph-eye me-2"></i>
                                View report
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="ph-printer me-2"></i>
                                Print report
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="ph-file-pdf me-2"></i>
                                Export report
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="ph-gear me-2"></i>
                                Configure
                            </a>
                        </div>
                    </div>
                </div>
            
                <div class="chart-container">
                    <div class="chart" id="area_gradient_green" style="height: 100px"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /blocks with chart -->


    <!-- Sales by country -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Daily sales by country</h5>
        </div>
    
        <div class="card-body">
            <div class="row">
                <div class="col-xl-6">
                    <div class="map-container map-echarts overflow-hidden rounded mb-3 mb-xl-0" id="map_europe_effect" style="height: 400px;"></div>
                </div>

                <div class="col-xl-6">
                    <div class="d-sm-flex justify-content-sm-around">
                        <div class="d-flex align-items-center justify-content-sm-center mb-3">
                            <span class="bg-pink bg-opacity-10 text-pink lh-1 rounded p-2 me-3">
                                <i class="ph-shopping-cart"></i>
                            </span>
                            <div>
                                <h6 class="fw-bold mb-0">1,890</h6>
                                <span class="text-muted">Total sales</span>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-sm-center mb-3">
                            <span class="bg-teal bg-opacity-10 text-teal lh-1 rounded p-2 me-3">
                                <i class="ph-currency-eur"></i>
                            </span>
                            <div>
                                <h6 class="fw-bold mb-0">€11,781</h6>
                                <span class="text-muted">Total revenue</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="chart-container">
                        <div class="chart" id="progress_bar_sorted" style="height: 333px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /sales by country -->


    <!-- Latest orders -->
    <div class="card">
        <div class="card-header d-flex py-0">
            <h5 class="py-3 mb-0">Latest orders</h5>
        
            <div class="d-inline-flex align-items-center ms-auto">
                <span class="badge bg-success fw-semibold">29 new</span>
                <div class="dropdown ms-2">
                    <button type="button" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-bs-toggle="dropdown">
                        <i class="ph-dots-three-vertical"></i>
                    </button>
            
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="#" class="dropdown-item">
                            <i class="ph-eye me-2"></i>
                            View report
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="ph-printer me-2"></i>
                            Print report
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="ph-file-pdf me-2"></i>
                            Export report
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="ph-gear me-2"></i>
                            Configure
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table text-nowrap">
                <thead>
                    <tr>
                        <th>Company</th>
                        <th>Delivery date</th>
                        <th>Delivery method</th>
                        <th>Status</th>
                        <th class="text-center" style="width: 20px;"><i class="ph-arrow-circle-down"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="#" class="me-3">
                                    <img src="../../../assets/images/brands/klm.svg" class="rounded-circle" width="32" height="32" alt="">
                                </a>

                                <div>
                                    <a href="#" class="text-body fw-semibold">KLM Royal Dutch Airlines</a>
                                    <div class="text-muted fs-sm">May 21st</div>
                                </div>
                            </div>
                        </td>
                        <td>June 12th</td>
                        <td><img src="../../../assets/images/brands/ups.svg" class="me-1" width="20" alt=""> UPS Express</td>
                        <td><span class="badge bg-success bg-opacity-10 text-success">Delivered</span></td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button type="button" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-bs-toggle="dropdown">
                                    <i class="ph-dots-three-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-receipt me-2"></i>
                                        Order details
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-file-pdf me-2"></i>
                                        Download invoice
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-chart-bar me-2"></i>
                                        Statistics
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="#" class="me-3">
                                    <img src="../../../assets/images/brands/amazon.svg" class="rounded-circle" width="32" height="32" alt="">
                                </a>

                                <div>
                                    <a href="#" class="text-body fw-semibold">Amazon Inc.</a>
                                    <div class="text-muted fs-sm">May 22nd</div>
                                </div>
                            </div>
                        </td>
                        <td>June 13th</td>
                        <td><img src="../../../assets/images/brands/deutsche-post.svg" class="rounded-sm me-1" width="20" alt=""> Deutsche post</td>
                        <td><span class="badge bg-danger bg-opacity-10 text-danger">Delayed</span></td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button type="button" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-bs-toggle="dropdown">
                                    <i class="ph-dots-three-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-receipt me-2"></i>
                                        Order details
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-file-pdf me-2"></i>
                                        Download invoice
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-chart-bar me-2"></i>
                                        Statistics
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="#" class="me-3">
                                    <img src="../../../assets/images/brands/honda.svg" class="rounded-circle" width="32" height="32" alt="">
                                </a>

                                <div>
                                    <a href="#" class="text-body fw-semibold">Honda Motor Company</a>
                                    <div class="text-muted fs-sm">May 22nd</div>
                                </div>
                            </div>
                        </td>
                        <td>June 14th</td>
                        <td><img src="../../../assets/images/brands/postnl.svg" class="me-1" width="20" alt=""> PostNL</td>
                        <td><span class="badge bg-secondary bg-opacity-10 text-secondary">Processing</span></td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button type="button" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-bs-toggle="dropdown">
                                    <i class="ph-dots-three-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-receipt me-2"></i>
                                        Order details
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-file-pdf me-2"></i>
                                        Download invoice
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-chart-bar me-2"></i>
                                        Statistics
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="#" class="me-3">
                                    <img src="../../../assets/images/brands/holiday-inn.svg" class="rounded-circle" width="32" height="32" alt="">
                                </a>

                                <div>
                                    <a href="#" class="text-body fw-semibold">Holiday Inn Hotels</a>
                                    <div class="text-muted fs-sm">May 23rd</div>
                                </div>
                            </div>
                        </td>
                        <td>June 15th</td>
                        <td><img src="../../../assets/images/brands/fedex.svg" class="rounded-sm me-1" width="20" alt=""> Fedex Express</td>
                        <td><span class="badge bg-success bg-opacity-10 text-success">Delivered</span></td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button type="button" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-bs-toggle="dropdown">
                                    <i class="ph-dots-three-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-receipt me-2"></i>
                                        Order details
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-file-pdf me-2"></i>
                                        Download invoice
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-chart-bar me-2"></i>
                                        Statistics
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="#" class="me-3">
                                    <img src="../../../assets/images/brands/apple.svg" class="rounded-circle" width="32" height="32" alt="">
                                </a>

                                <div>
                                    <a href="#" class="text-body fw-semibold">Apple Inc.</a>
                                    <div class="text-muted fs-sm">May 23rd</div>
                                </div>
                            </div>
                        </td>
                        <td>June 16th</td>
                        <td><img src="../../../assets/images/brands/deutsche-post.svg" class="rounded-sm me-1" width="20" alt=""> Deutsche post</td>
                        <td><span class="badge bg-indigo bg-opacity-10 text-indigo">Dispatched</span></td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button type="button" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-bs-toggle="dropdown">
                                    <i class="ph-dots-three-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-receipt me-2"></i>
                                        Order details
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-file-pdf me-2"></i>
                                        Download invoice
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-chart-bar me-2"></i>
                                        Statistics
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="#" class="me-3">
                                    <img src="../../../assets/images/brands/debijenkorf.svg" class="rounded-circle" width="32" height="32" alt="">
                                </a>

                                <div>
                                    <a href="#" class="text-body fw-semibold">de Bijenkorf</a>
                                    <div class="text-muted fs-sm">May 23rd</div>
                                </div>
                            </div>
                        </td>
                        <td>June 17th</td>
                        <td><img src="../../../assets/images/brands/tnt.svg" class="rounded-sm me-1" width="20" alt=""> TNT</td>
                        <td><span class="badge bg-indigo bg-opacity-10 text-indigo">Dispatched</span></td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button type="button" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-bs-toggle="dropdown">
                                    <i class="ph-dots-three-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-receipt me-2"></i>
                                        Order details
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-file-pdf me-2"></i>
                                        Download invoice
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-chart-bar me-2"></i>
                                        Statistics
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="#" class="me-3">
                                    <img src="../../../assets/images/brands/texaco.svg" class="rounded-circle" width="32" height="32" alt="">
                                </a>

                                <div>
                                    <a href="#" class="text-body fw-semibold">Texaco Inc.</a>
                                    <div class="text-muted fs-sm">May 24th</div>
                                </div>
                            </div>
                        </td>
                        <td>June 18th</td>
                        <td><img src="../../../assets/images/brands/dpd.svg" class="me-1" width="20" alt=""> DPD</td>
                        <td><span class="badge bg-danger bg-opacity-10 text-danger">Delayed</span></td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button type="button" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-bs-toggle="dropdown">
                                    <i class="ph-dots-three-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-receipt me-2"></i>
                                        Order details
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-file-pdf me-2"></i>
                                        Download invoice
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-chart-bar me-2"></i>
                                        Statistics
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="#" class="me-3">
                                    <img src="../../../assets/images/brands/shell.svg" class="rounded-circle" width="32" height="32" alt="">
                                </a>

                                <div>
                                    <a href="#" class="text-body fw-semibold">Royal Dutch Shell</a>
                                    <div class="text-muted fs-sm">May 25th</div>
                                </div>
                            </div>
                        </td>
                        <td>June 19th</td>
                        <td><img src="../../../assets/images/brands/ups.svg" class="me-1" width="20" alt=""> UPS Express</td>
                        <td><span class="badge bg-success bg-opacity-10 text-success">Delivered</span></td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button type="button" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-bs-toggle="dropdown">
                                    <i class="ph-dots-three-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-receipt me-2"></i>
                                        Order details
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-file-pdf me-2"></i>
                                        Download invoice
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-chart-bar me-2"></i>
                                        Statistics
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="#" class="me-3">
                                    <img src="../../../assets/images/brands/tesla.svg" class="rounded-circle" width="32" height="32" alt="">
                                </a>

                                <div>
                                    <a href="#" class="text-body fw-semibold">Tesla Inc.</a>
                                    <div class="text-muted fs-sm">May 26th</div>
                                </div>
                            </div>
                        </td>
                        <td>June 21st</td>
                        <td><img src="../../../assets/images/brands/dpd.svg" class="me-1" width="20" alt=""> DPD</td>
                        <td><span class="badge bg-secondary bg-opacity-10 text-secondary">Processing</span></td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button type="button" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-bs-toggle="dropdown">
                                    <i class="ph-dots-three-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-receipt me-2"></i>
                                        Order details
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-file-pdf me-2"></i>
                                        Download invoice
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-chart-bar me-2"></i>
                                        Statistics
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /latest orders -->


    <!-- Reports -->
    <div class="row">
        <div class="col-xl-6">

            <!-- Annual sales report -->
            <div class="card">
                <div class="card-header d-flex py-0">
                    <h6 class="py-3 mb-0">Annual sales report</h6>

                    <div class="dropdown align-self-center ms-auto">
                        <button type="button" data-bs-toggle="dropdown" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill">
                            <i class="ph-dots-three-vertical"></i>
                        </button>
                
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="#" class="dropdown-item">
                                <i class="ph-eye me-2"></i>
                                View report
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="ph-printer me-2"></i>
                                Print report
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="ph-file-pdf me-2"></i>
                                Export report
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="ph-gear me-2"></i>
                                Configure
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="d-sm-flex justify-content-sm-around">
                        <div class="d-flex align-items-center justify-content-sm-center mb-3">
                            <span class="bg-primary bg-opacity-10 text-primary lh-1 rounded p-2 me-3">
                                <i class="ph-stack"></i>
                            </span>
                            <div>
                                <h6 class="mb-0">4,485</h6>
                                <span class="text-muted">Campaigns</span>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-sm-center mb-3">
                            <span class="bg-success bg-opacity-10 text-success lh-1 rounded p-2 me-3">
                                <i class="ph-user-switch"></i>
                            </span>
                            <div>
                                <h6 class="mb-0">1,255</h6>
                                <span class="text-muted">Leads</span>
                            </div>
                        </div>
                    </div>
            
                    <div class="chart-container">
                        <div class="chart" id="bars_grouped" style="height: 333px;"></div>
                    </div>
                </div>
            
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Campaign</th>
                                <th>Leads</th>
                                <th>Rate</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        April campaign
                                        <a href="#" class="text-muted ms-auto"><i class="ph-arrow-square-out"></i></a>
                                    </div>
                                </td>
                                <td>4,890</td>
                                <td>
                                    <div class="hstack gap-2 text-success">
                                        <i class="ph-trend-up"></i>
                                        0.25%
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        Flash sale
                                        <a href="#" class="text-muted ms-auto"><i class="ph-arrow-square-out"></i></a>
                                    </div>
                                </td>
                                <td>1,896</td>
                                <td>
                                    <div class="hstack gap-2 text-danger">
                                        <i class="ph-trend-down"></i>
                                        1.2%
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        Up to 40% off
                                        <a href="#" class="text-muted ms-auto"><i class="ph-arrow-square-out"></i></a>
                                    </div>
                                </td>
                                <td>2,880</td>
                                <td>
                                    <div class="hstack gap-2 text-danger">
                                        <i class="ph-trend-down"></i>
                                        0.59%
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        Extended trial version
                                        <a href="#" class="text-muted ms-auto"><i class="ph-arrow-square-out"></i></a>
                                    </div>
                                </td>
                                <td>982</td>
                                <td>
                                    <div class="hstack gap-2 text-success">
                                        <i class="ph-trend-up"></i>
                                        1.05%
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        50% off second license
                                        <a href="#" class="text-muted ms-auto"><i class="ph-arrow-square-out"></i></a>
                                    </div>
                                </td>
                                <td>3,780</td>
                                <td>
                                    <div class="hstack gap-2 text-success">
                                        <i class="ph-trend-up"></i>
                                        0.58%
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        50% off second license
                                        <a href="#" class="text-muted ms-auto"><i class="ph-arrow-square-out"></i></a>
                                    </div>
                                </td>
                                <td>4,551</td>
                                <td>
                                    <div class="hstack gap-2 text-danger">
                                        <i class="ph-trend-down"></i>
                                        1.04%
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /annual sales report -->

        </div>

        <div class="col-xl-6">

            <!-- Daily visitors report -->
            <div class="card">
                <div class="card-header d-flex py-0">
                    <h6 class="py-3 mb-0">Daily visitors report</h6>

                    <div class="dropdown align-self-center ms-auto">
                        <button type="button" data-bs-toggle="dropdown" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill">
                            <i class="ph-dots-three-vertical"></i>
                        </button>
                
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="#" class="dropdown-item">
                                <i class="ph-eye me-2"></i>
                                View report
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="ph-printer me-2"></i>
                                Print report
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="ph-file-pdf me-2"></i>
                                Export report
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="ph-gear me-2"></i>
                                Configure
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="d-sm-flex justify-content-sm-around">
                        <div class="d-flex align-items-center justify-content-sm-center mb-3">
                            <span class="bg-indigo bg-opacity-10 text-indigo lh-1 rounded p-2 me-3">
                                <i class="ph-user-circle-plus"></i>
                            </span>
                            <div>
                                <h6 class="mb-0">4,782</h6>
                                <span class="text-muted">New users</span>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-sm-center mb-3">
                            <span class="bg-indigo bg-opacity-10 text-indigo lh-1 rounded p-2 me-3">
                                <i class="ph-user-switch"></i>
                            </span>
                            <div>
                                <h6 class="mb-0">6,478</h6>
                                <span class="text-muted">Returned</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="chart-container">
                        <div class="chart" id="line_label_marks" style="height: 333px;"></div>
                    </div>
                </div>
            
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Browser</th>
                                <th>Diff</th>
                                <th>Count</th>
                                <th>Share</th>
            
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="../../../assets/images/browsers/chrome.svg" class="me-2" alt=""
                                            style="height: 32px;">
                                        Chrome
                                    </div>
                                </td>
                                <td>
                                    <div class="hstack gap-2 text-success">
                                        <i class="ph-trend-up"></i>
                                        4.84%
                                    </div>
                                </td>
                                <td>728</td>
                                <td>34.6%</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="../../../assets/images/browsers/firefox.svg" class="me-2" alt=""
                                            style="height: 32px;">
                                        Firefox
                                    </div>
                                </td>
                                <td>
                                    <div class="hstack gap-2 text-danger">
                                        <i class="ph-trend-down"></i>
                                        0.89%
                                    </div>
                                </td>
                                <td>550</td>
                                <td>20.4%</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="../../../assets/images/browsers/edge.svg" class="me-2" alt=""
                                            style="height: 32px;">
                                        Edge
                                    </div>
                                </td>
                                <td>
                                    <div class="hstack gap-2 text-success">
                                        <i class="ph-trend-up"></i>
                                        2.86%
                                    </div>
                                </td>
                                <td>458</td>
                                <td>15.5%</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="../../../assets/images/browsers/safari.svg" class="me-2" alt=""
                                            style="height: 32px;">
                                        Safari
                                    </div>
                                </td>
                                <td>
                                    <div class="hstack gap-2 text-success">
                                        <i class="ph-trend-up"></i>
                                        1.5%
                                    </div>
                                </td>
                                <td>690</td>
                                <td>12.5%</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="../../../assets/images/browsers/opera.svg" class="me-2" alt=""
                                            style="height: 32px;">
                                        Opera
                                    </div>
                                </td>
                                <td>
                                    <div class="hstack gap-2 text-danger">
                                        <i class="ph-trend-down"></i>
                                        2.45%
                                    </div>
                                </td>
                                <td>886</td>
                                <td>10.2%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /daily visitors report -->

        </div>
    </div>
    <!-- /reports -->
</x-app-layout>
