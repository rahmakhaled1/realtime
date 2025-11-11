@extends('dashboard.master')

@section('title', __('lang.company_name'))

@push('styles')
    <style>
        /* قائمة المستخدمين */
        #online-admin {
            max-height: 250px;
            overflow-y: auto;
        }

        #online-admin li {
            font-weight: 500;
            color: #333;
        }

        /* النقطة الخضراء */
        .status-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
            background-color: #28a745;
            margin-right: 10px;
        }

        /* Toast notifications */
        #toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
        }

        .toast {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            margin-bottom: 10px;
            background-color: #f8d7da;
            color: #721c24;
            border-radius: 4px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            animation: slideIn 0.3s ease forwards;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(100%);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
@endpush

@section('content')

    <div class="col-12">
        <div class="mb-3 border-0 shadow-sm card">
            <div class="card-header bg-light d-flex align-items-center justify-content-between">
                <h2 class="mb-0 h5">👥 Who Is Online (<span id="online-count">0</span>)</h2>
                <div>
                    <button type="button" class="btn btn-sm btn-outline-secondary me-1">
                        <span class="fe fe-refresh-ccw"></span>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        <span class="fe fe-filter"></span>
                    </button>
                </div>
            </div>

            <div class="p-3 card-body">
                <ul id="online-admin" class="list-group list-group-flush">
                    <!-- الأسماء هتضاف هنا -->
                </ul>
            </div>
        </div>


        <div class="mb-2 align-items-center">
            <div class="mb-4 shadow card">
                <div class="card-body">
                    <div class="mt-1 row align-items-center">
                        <div class="pl-4 text-left col-12 col-lg-4">
                            <p class="mb-1 small text-muted">Balance</p>
                            <span class="h3">$12,600</span>
                            <span class="small text-muted">+20%</span>
                            <span class="fe fe-arrow-up text-success fe-12"></span>
                            <p class="mt-2 text-muted"> Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies
                                nisi. Nam eget dui </p>
                        </div>
                        <div class="py-4 text-center col-6 col-lg-2">
                            <p class="mb-1 small text-muted">Today</p>
                            <span class="h3">$2600</span><br />
                            <span class="small text-muted">+20%</span>
                            <span class="fe fe-arrow-up text-success fe-12"></span>
                        </div>
                        <div class="py-4 mb-2 text-center col-6 col-lg-2">
                            <p class="mb-1 small text-muted">Goal Value</p>
                            <span class="h3">$260</span><br />
                            <span class="small text-muted">+6%</span>
                            <span class="fe fe-arrow-up text-success fe-12"></span>
                        </div>
                        <div class="py-4 text-center col-6 col-lg-2">
                            <p class="mb-1 small text-muted">Completions</p>
                            <span class="h3">26</span><br />
                            <span class="small text-muted">+20%</span>
                            <span class="fe fe-arrow-up text-success fe-12"></span>
                        </div>
                        <div class="py-4 text-center col-6 col-lg-2">
                            <p class="mb-1 small text-muted">Conversion</p>
                            <span class="h3">6%</span><br />
                            <span class="small text-muted">-2%</span>
                            <span class="fe fe-arrow-down text-danger fe-12"></span>
                        </div>
                    </div>
                    <div class="mr-4 chartbox">
                        <div id="areaChart"></div>
                    </div>
                </div> <!-- .card-body -->
            </div> <!-- .card -->
        </div>
        <div class="row items-align-baseline">
            <div class="col-md-12 col-lg-4">
                <div class="mb-4 shadow card eq-card">
                    <div class="card-body mb-n3">
                        <div class="row items-align-baseline h-100">
                            <div class="my-3 col-md-6">
                                <p class="mb-0"><strong class="mb-0 text-uppercase text-muted">Earning</strong></p>
                                <h3>$2,562</h3>
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <div class="my-4 text-center col-md-6">
                                <div lass="chart-box mx-4">
                                    <div id="radialbarWidget"></div>
                                </div>
                            </div>
                            <div class="py-3 col-md-6 border-top">
                                <p class="mb-1"><strong class="text-muted">Cost</strong></p>
                                <h4 class="mb-0">108</h4>
                                <p class="mb-0 small text-muted"><span>37.7% Last week</span></p>
                            </div> <!-- .col -->
                            <div class="py-3 col-md-6 border-top">
                                <p class="mb-1"><strong class="text-muted">Revenue</strong></p>
                                <h4 class="mb-0">1168</h4>
                                <p class="mb-0 small text-muted"><span>-18.9% Last week</span></p>
                            </div> <!-- .col -->
                        </div>
                    </div> <!-- .card-body -->
                </div> <!-- .card -->
            </div> <!-- .col -->
            <div class="col-md-12 col-lg-4">
                <div class="mb-4 shadow card eq-card">
                    <div class="card-body">
                        <div class="mb-2 chart-widget">
                            <div id="radialbar"></div>
                        </div>
                        <div class="row items-align-center">
                            <div class="text-center col-4">
                                <p class="mb-1 text-muted">Cost</p>
                                <h6 class="mb-1">$1,823</h6>
                                <p class="mb-0 text-muted">+12%</p>
                            </div>
                            <div class="text-center col-4">
                                <p class="mb-1 text-muted">Revenue</p>
                                <h6 class="mb-1">$6,830</h6>
                                <p class="mb-0 text-muted">+8%</p>
                            </div>
                            <div class="text-center col-4">
                                <p class="mb-1 text-muted">Earning</p>
                                <h6 class="mb-1">$4,830</h6>
                                <p class="mb-0 text-muted">+8%</p>
                            </div>
                        </div>
                    </div> <!-- .card-body -->
                </div> <!-- .card -->
            </div> <!-- .col -->
            <div class="col-md-12 col-lg-4">
                <div class="mb-4 shadow card eq-card">
                    <div class="card-body">
                        <div class="mt-3 mb-4 d-flex">
                            <div class="pt-2 flex-fill">
                                <p class="mb-0 text-muted">Total</p>
                                <h4 class="mb-0">108</h4>
                                <span class="small text-muted">+37.7%</span>
                            </div>
                            <div class="flex-fill chart-box mt-n2">
                                <div id="barChartWidget"></div>
                            </div>
                        </div> <!-- .d-flex -->
                        <div class="row border-top">
                            <div class="pt-4 col-md-6">
                                <h6 class="mb-0">108 <span class="small text-muted">+37.7%</span></h6>
                                <p class="mb-0 text-muted">Cost</p>
                            </div>
                            <div class="pt-4 col-md-6">
                                <h6 class="mb-0">1168 <span class="small text-muted">-18.9%</span></h6>
                                <p class="mb-0 text-muted">Revenue</p>
                            </div>
                        </div> <!-- .row -->
                    </div> <!-- .card-body -->
                </div> <!-- .card -->
            </div> <!-- .col-md -->
        </div>
        <div class="row">
            <!-- Recent Activity -->
            <div class="mb-4 col-md-12 col-lg-4">
                <div class="shadow card timeline">
                    <div class="card-header">
                        <strong class="card-title">Recent Activity</strong>
                        <a class="float-right small text-muted" href="#!">View all</a>
                    </div>
                    <div class="card-body" data-simplebar style="height:355px; overflow-y: auto; overflow-x: hidden;">
                        <h6 class="mb-4 text-uppercase text-muted">Today</h6>
                        <div class="pb-3 timeline-item item-primary">
                            <div class="pl-5">
                                <div class="mb-1"><strong>@Brown Asher</strong><span class="mx-2 text-muted small">Just
                                        create new layout Index, form, table</span><strong>Tiny Admin</strong></div>
                                <p class="small text-muted">Creative Design <span class="badge badge-light">1h ago</span>
                                </p>
                            </div>
                        </div>
                        <div class="pb-3 timeline-item item-warning">
                            <div class="pl-5">
                                <div class="mb-3"><strong>@Hester Nissim</strong><span class="mx-2 text-muted small">has
                                        upload new files to</span><strong>Tiny Admin</strong></div>
                                <div class="mb-3 row">
                                    <div class="col"><img src="{{ asset('assets') }}/assets//products/p1.jpg"
                                            alt="..." class="rounded img-fluid"></div>
                                    <div class="col"><img src="{{ asset('assets') }}/assets//products/p2.jpg"
                                            alt="..." class="rounded img-fluid"></div>
                                    <div class="col"><img src="{{ asset('assets') }}/assets//products/p3.jpg"
                                            alt="..." class="rounded img-fluid"></div>
                                    <div class="col"><img src="{{ asset('assets') }}/assets//products/p4.jpg"
                                            alt="..." class="rounded img-fluid"></div>
                                </div>
                                <p class="small text-muted">Front-End Development <span class="badge badge-light">1h
                                        ago</span>
                                </p>
                            </div>
                        </div>
                        <div class="pb-3 timeline-item item-success">
                            <div class="pl-5">
                                <div class="mb-3"><strong>@Kelley Sonya</strong><span class="mx-2 text-muted small">has
                                        commented on</span><strong>Advanced table</strong></div>
                                <div class="mb-2 card d-inline-flex">
                                    <div class="px-3 py-2 rounded card-body bg-light small"> Lorem ipsum dolor sit amet,
                                        consectetur adipiscing elit. Integer dignissim nulla eu quam cursus placerat.
                                        Vivamus non odio ullamcorper, lacinia ante nec, blandit leo. </div>
                                </div>
                                <p class="small text-muted">Back-End Development <span class="badge badge-light">1h
                                        ago</span>
                                </p>
                            </div>
                        </div>
                        <h6 class="mb-4 text-uppercase text-muted">Yesterday</h6>
                        <div class="pb-3 timeline-item item-warning">
                            <div class="pl-5">
                                <div class="mb-3"><strong>@Fletcher Everett</strong><span
                                        class="mx-2 text-muted small">created new group for</span><strong>Tiny
                                        Admin</strong></div>
                                <ul class="mb-3 avatars-list">
                                    <li>
                                        <a href="#!" class="avatar avatar-sm">
                                            <img alt="..." class="avatar-img rounded-circle"
                                                src="{{ asset('assets') }}/assets//avatars/face-1.jpg">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#!" class="avatar avatar-sm">
                                            <img alt="..." class="avatar-img rounded-circle"
                                                src="{{ asset('assets') }}/assets//avatars/face-4.jpg">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#!" class="avatar avatar-sm">
                                            <img alt="..." class="avatar-img rounded-circle"
                                                src="{{ asset('assets') }}/assets//avatars/face-3.jpg">
                                        </a>
                                    </li>
                                </ul>
                                <p class="small text-muted">Front-End Development <span class="badge badge-light">1h
                                        ago</span>
                                </p>
                            </div>
                        </div>
                        <div class="pb-3 timeline-item item-success">
                            <div class="pl-5">
                                <div class="mb-3"><strong>@Bertha Ball</strong><span class="mx-2 text-muted small">has
                                        commented on</span><strong>Advanced table</strong></div>
                                <div class="mb-2 card d-inline-flex">
                                    <div class="px-3 py-2 card-body bg-light"> Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit. Integer dignissim nulla eu quam cursus placerat. Vivamus non odio
                                        ullamcorper, lacinia ante nec, blandit leo. </div>
                                </div>
                                <p class="small text-muted">Back-End Development <span class="badge badge-light">1h
                                        ago</span>
                                </p>
                            </div>
                        </div>
                        <div class="pb-3 timeline-item item-danger">
                            <div class="pl-5">
                                <div class="mb-3"><strong>@Lillith Joseph</strong><span
                                        class="mx-2 text-muted small">has
                                        upload new files to</span><strong>Tiny
                                        Admin</strong></div>
                                <div class="mb-3 row">
                                    <div class="col"><img src="{{ asset('assets') }}/assets//products/p4.jpg"
                                            alt="..." class="rounded img-fluid"></div>
                                    <div class="col"><img src="{{ asset('assets') }}/assets//products/p1.jpg"
                                            alt="..." class="rounded img-fluid"></div>
                                    <div class="col"><img src="{{ asset('assets') }}/assets//products/p2.jpg"
                                            alt="..." class="rounded img-fluid"></div>
                                </div>
                                <p class="small text-muted">Front-End Development <span class="badge badge-light">1h
                                        ago</span>
                                </p>
                            </div>
                        </div>
                    </div> <!-- / .card-body -->
                </div> <!-- / .card -->
            </div> <!-- / .col-md-6 -->
            <!-- Striped rows -->
            <div class="col-md-12 col-lg-8">
                <div class="shadow card">
                    <div class="card-header">
                        <strong class="card-title">Recent Data</strong>
                        <a class="float-right small text-muted" href="#!">View all</a>
                    </div>
                    <div class="card-body my-n2">
                        <table class="table table-striped table-hover table-borderless">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2474</td>
                                    <th scope="col">Brown, Asher D.</th>
                                    <td>Ap #331-7123 Lobortis Avenue</td>
                                    <td>13/09/2020</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm dropdown-toggle more-vertical" type="button"
                                                id="dr1" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <span class="sr-only text-muted">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Remove</a>
                                                <a class="dropdown-item" href="#">Assign</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2786</td>
                                    <th scope="col">Leblanc, Yoshio V.</th>
                                    <td>287-8300 Nisl. St.</td>
                                    <td>04/05/2019</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm dropdown-toggle more-vertical" type="button"
                                                id="dr2" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <span class="sr-only text-muted">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr2">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Remove</a>
                                                <a class="dropdown-item" href="#">Assign</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2747</td>
                                    <th scope="col">Hester, Nissim L.</th>
                                    <td>4577 Cras St.</td>
                                    <td>04/06/2019</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm dropdown-toggle more-vertical" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="sr-only text-muted">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Remove</a>
                                                <a class="dropdown-item" href="#">Assign</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2639</td>
                                    <th scope="col">Gardner, Leigh S.</th>
                                    <td>P.O. Box 228, 7512 Lectus Ave</td>
                                    <td>04/08/2019</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm dropdown-toggle more-vertical" type="button"
                                                id="dr4" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <span class="sr-only text-muted">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr4">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Remove</a>
                                                <a class="dropdown-item" href="#">Assign</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2238</td>
                                    <th scope="col">Higgins, Uriah L.</th>
                                    <td>Ap #377-5357 Sed Road</td>
                                    <td>04/01/2019</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm dropdown-toggle more-vertical" type="button"
                                                id="dr5" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <span class="sr-only text-muted">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr5">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Remove</a>
                                                <a class="dropdown-item" href="#">Assign</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- Striped rows -->
        </div>
    </div>
    <div id="toast-container"></div>
@endsection


@push('scripts')
    <script>
        // دالة عرض الـ Toast
        function showToast(message) {
            const toast = document.createElement('div');
            toast.className = 'toast';
            toast.textContent = message;
            document.getElementById('toast-container').appendChild(toast);

            setTimeout(() => {
                toast.remove();
            }, 2000);
        }

        function showToast(message, type = 'danger') {
            const toast = document.createElement('div');
            toast.className = 'toast';
            toast.textContent = message;

            // تغيير اللون حسب النوع
            if (type === 'success') {
                toast.style.backgroundColor = '#d4edda';
                toast.style.color = '#155724';
            } else {
                toast.style.backgroundColor = '#f8d7da';
                toast.style.color = '#721c24';
            }

            document.getElementById('toast-container').appendChild(toast);

            setTimeout(() => {
                toast.remove();
            }, 2000);
        }
    </script>
@endpush
