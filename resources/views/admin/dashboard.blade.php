<x-admin.layout>
    <x-slot name="title">Dashboard</x-slot>
    <x-slot name="heading">Dashboard</x-slot>
    @php
    $user = auth()->user();

    $role = $user->roles->pluck('name')[0];

    @endphp
    <div class="row project-wrapper">
        <div class="col-xxl-8">
            <div class="row">
                @if ($role == 'Department' || $role == 'Super Admin')
                    <div class="col-xl-4">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle rounded-2 fs-2">
                                            <i class="mdi mdi-arrow-bottom-left-bold-box text-primary"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden ms-3">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-3">INWARD</p>
                                        <div class="d-flex align-items-center mb-3">
                                            <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="825">0</span></h4>

                                        </div>
                                        <p class="text-muted text-truncate mb-0">Inwards this Year</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle rounded-2 fs-2">
                                            <i class="mdi mdi-arrow-top-right-bold-box text-primary"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="text-uppercase fw-medium text-muted mb-3">Outward</p>
                                        <div class="d-flex align-items-center mb-3">
                                            <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="7522">0</span></h4>

                                        </div>
                                        <p class="text-muted mb-0">Outwards this Year</p>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div>
                    </div>

                @endif
            </div>


        </div>

        <div class="col-xxl-8">
            <div class="row">
                @if ($role == 'inward/outward' || $role == 'Super Admin')
                    <div class="col-xl-4">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle rounded-2 fs-2">
                                            <i class="mdi mdi-arrow-bottom-left-bold-box text-primary"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden ms-3">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-3">ACKNOWLEGE</p>
                                        <div class="d-flex align-items-center mb-3">
                                            <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="825">0</span></h4>

                                        </div>
                                        <p class="text-muted text-truncate mb-0">Acknowlege this Year</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle rounded-2 fs-2">
                                            <i class="mdi mdi-arrow-top-right-bold-box text-primary"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="text-uppercase fw-medium text-muted mb-3">ACCEPT ACKNOWLEGE</p>
                                        <div class="d-flex align-items-center mb-3">
                                            <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="7522">0</span></h4>

                                        </div>
                                        <p class="text-muted mb-0">Accept Acknowlege this Year</p>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div>
                    </div>
                @endif

            </div>


        </div>


    </div>
</x-admin.layout>
