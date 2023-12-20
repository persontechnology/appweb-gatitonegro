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
            </div>
        </div>
    </x-slot>

    <!-- Blocks with chart -->
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header d-flex border-bottom-0 pb-1 mb-0">
                    <div>
                        <span class="fw-medium mb-1">Total solicitados</span>
                        <h2 class="fw-bold mb-0">{{ $solicitados->count() }} </h2>
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
                        <span class="fw-medium mb-1">Total solicitados</span>
                        <h2 class="fw-bold mb-0">{{ $reservados->count() }}</h2>
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
                        <span class="fw-medium mb-1">Total rechazados</span>
                        <h2 class="fw-bold mb-0">{{ $rechazados->count() }}</h2>
                    </div>
                </div>
            
                <div class="chart-container">
                    <div class="chart" id="area_gradient_green" style="height: 100px"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /blocks with chart -->
    
</x-app-layout>
