<div class="main py-4">
    <div class="d-block mb-md-0" style="position: relative">
        <h2>Manage Bus Drivers</h2>
        <button wire:click.prevent="addNew" class="buttonAdd-map btn btn-primary d-inline-flex align-items-center me-2" data-bs-toggle="modal" data-bs-target="#modalAdd">
            <i class="fa fa-plus-circle mr-1 fa-fw"></i>
            Add Bus Driver
        </button>
    </div>
    <div class="col-9 col-lg-8 d-md-flex">
        <select wire:model="selectedCompany" class="form-select fmxw-200 d-none d-md-inline"  >
            <option value="">Choose Company</option>
            @foreach($companies as $company)
                <option value="{{$company->id}}">{{$company->company_name}}</option>
            @endforeach
        </select>
    </div>
    <br>

    @if (!is_null($selectedCompany))
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            <h2 class="mb-4 h5">{{ __('All Buses By Company') }}</h2>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="border-gray-200">{{ __('Driver Name') }}</th>
                    <th class="border-gray-200">{{ __('Employee No') }}</th>
                    <th class="border-gray-200">{{ __('Driver Number') }}</th>
                    <th class="border-gray-200">{{ __('Driver Role') }}</th>
                    <th class="border-gray-200">{{ __('Hiring Company') }}</th>
                    <th class="border-gray-200">{{ __('Active Card Manu. No.') }}</th>
                    <th class="border-gray-200">{{ __('Status') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($drivers as $driver)
                    <tr>
                        <td><span class="fw-normal">{{ $driver->driver_name }}</span></td>
                        <td><span class="fw-normal">{{ $driver->employee_number }}</span></td>
                        <td><span class="fw-normal">{{ $driver->driver_number }}</span></td>
                        <td><span class="fw-normal">{{ $driver->driver_role }}</span></td>
                        <td><span class="fw-normal">{{ $driver->company->company_name }}</span></td>
                        <td><span class="fw-normal"> IN PROGRESS</span></td>
                        <td><span class="fw-normal">{{ $driver->status}}</span></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
                {{--{{ $users->links() }}--}}
            </div>
        </div>
    @endif

    <!-- Create Modal Content -->
    <div wire:ignore.self class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-md-5">
                    <h2 class="h4 text-center">
                        <span>Add New Bus Driver</span>
                    </h2>

                    <!-- Form -->
                    <form wire:submit.prevent="createBusDriver">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="name">Driver Name</label>
                            <div class="input-group">
                                 <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-user fa-fw"></i>
                                </span>
                                <input wire:model.defer="state.driver_name" class="form-control border-gray-300" id="name" placeholder="{{ __('Driver Name') }}" autofocus required>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="employeeNum">Employee Number</label>
                            <div class="input-group">
                                <span class="input-group-text border-gray-300" id="basic-addon3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-123" viewBox="0 0 16 16">
                                        <path d="M2.873 11.297V4.142H1.699L0 5.379v1.137l1.64-1.18h.06v5.961h1.174Zm3.213-5.09v-.063c0-.618.44-1.169 1.196-1.169.676 0 1.174.44 1.174 1.106 0 .624-.42 1.101-.807 1.526L4.99 10.553v.744h4.78v-.99H6.643v-.069L8.41 8.252c.65-.724 1.237-1.332 1.237-2.27C9.646 4.849 8.723 4 7.308 4c-1.573 0-2.36 1.064-2.36 2.15v.057h1.138Zm6.559 1.883h.786c.823 0 1.374.481 1.379 1.179.01.707-.55 1.216-1.421 1.21-.77-.005-1.326-.419-1.379-.953h-1.095c.042 1.053.938 1.918 2.464 1.918 1.478 0 2.642-.839 2.62-2.144-.02-1.143-.922-1.651-1.551-1.714v-.063c.535-.09 1.347-.66 1.326-1.678-.026-1.053-.933-1.855-2.359-1.845-1.5.005-2.317.88-2.348 1.898h1.116c.032-.498.498-.944 1.206-.944.703 0 1.206.435 1.206 1.07.005.64-.504 1.106-1.2 1.106h-.75v.96Z"/>
                                    </svg>
                                </span>
                                <input wire:model.defer="state.employee_number" class="form-control border-gray-300" id="employeeNum" placeholder="{{ __('Employee Number') }}" autofocus required>
                                @if ($errors->has('employeeNum'))
                                    <span class="text-danger">{{ $errors->first('employeeNum') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="idnum">Driver ID Number</label>
                            <div class="input-group">
                                <span class="input-group-text border-gray-300" id="basic-addon3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-123" viewBox="0 0 16 16">
                                        <path d="M2.873 11.297V4.142H1.699L0 5.379v1.137l1.64-1.18h.06v5.961h1.174Zm3.213-5.09v-.063c0-.618.44-1.169 1.196-1.169.676 0 1.174.44 1.174 1.106 0 .624-.42 1.101-.807 1.526L4.99 10.553v.744h4.78v-.99H6.643v-.069L8.41 8.252c.65-.724 1.237-1.332 1.237-2.27C9.646 4.849 8.723 4 7.308 4c-1.573 0-2.36 1.064-2.36 2.15v.057h1.138Zm6.559 1.883h.786c.823 0 1.374.481 1.379 1.179.01.707-.55 1.216-1.421 1.21-.77-.005-1.326-.419-1.379-.953h-1.095c.042 1.053.938 1.918 2.464 1.918 1.478 0 2.642-.839 2.62-2.144-.02-1.143-.922-1.651-1.551-1.714v-.063c.535-.09 1.347-.66 1.326-1.678-.026-1.053-.933-1.855-2.359-1.845-1.5.005-2.317.88-2.348 1.898h1.116c.032-.498.498-.944 1.206-.944.703 0 1.206.435 1.206 1.07.005.64-.504 1.106-1.2 1.106h-.75v.96Z"/>
                                    </svg>
                                </span>
                                <input wire:model.defer="state.id_number" class="form-control border-gray-300" id="idnum" placeholder="{{ __('Employee Number') }}" autofocus required>
                                @if ($errors->has('idnum'))
                                    <span class="text-danger">{{ $errors->first('idnum') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="role">Driver Role</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-user-lock fa-fw"></i>
                                </span>
                                <select wire:model.defer="state.driver_role" id="role" class="form-select border-gray-300" autofocus required>
                                    <option value="">Choose Driver Role</option>
                                    <option value="1">Driver</option>
                                    <option value="2">Inspector</option>
                                    <option value="3">Administrator</option>
                                </select>
                                @if ($errors->has('role'))
                                    <span class="text-danger">{{ $errors->first('role') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="status">Driver Status</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-user-check fa-fw"></i>
                                </span>
                                <select wire:model.defer="state.status" id="status" class="form-select border-gray-300" autofocus required>
                                    <option value="">Choose Driver Status</option>
                                    <option value="1">New</option>
                                    <option value="2">Active</option>
                                    <option value="3">Inactive</option>
                                    <option value="4">Blacklisted</option>
                                </select>
                                @if ($errors->has('status'))
                                    <span class="text-danger">{{ $errors->first('role') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="target">Target of Collection (RM)</label>
                            <div class="input-group">
                                <span class="input-group-text border-gray-300" id="basic-addon3">
                                    <i class="fas fa-money-bill fa-fw"></i>
                                </span>
                                </span>
                                <input wire:model.defer="state.target_collection" class="form-control border-gray-300" id="target" placeholder="{{ __('Target of Collection in RM') }}" autofocus required>
                                @if ($errors->has('target'))
                                    <span class="text-danger">{{ $errors->first('target') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="driverNum">Driver Number (For PDA Login)</label>
                            <div class="input-group">
                                <span class="input-group-text border-gray-300" id="basic-addon3">
                                    <i class="fas fa-user fa-fw"></i>
                                </span>
                                </span>
                                <input wire:model.defer="state.driver_number" class="form-control border-gray-300" id="driverNum" placeholder="{{ __('Driver Number (For PDA Login)') }}" autofocus required>
                                @if ($errors->has('driverNum'))
                                    <span class="text-danger">{{ $errors->first('driverNum') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="driver_password">Password (For PDA Login)</label>
                            <div class="input-group">
                                <span class="input-group-text border-gray-300" id="basic-addon3">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                                </span>
                                <input wire:model.defer="state.driver_password" type="password" class="form-control border-gray-300" id="driver_password" placeholder="{{ __('Password') }}" autofocus required>
                                @if ($errors->has('driver_password'))
                                    <span class="text-danger">{{ $errors->first('driver_password') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="driver_password_confirmation">Confirm Password (For PDA Login)</label>
                            <div class="input-group">
                                <span class="input-group-text border-gray-300" id="basic-addon3">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                                </span>
                                <input wire:model.defer="state.driver_password_confirmation" type="password" class="form-control border-gray-300" id="driver_password_confirmation" placeholder="{{ __('Password Confirmation') }}" autofocus required>
                                @if ($errors->has('driver_password_confirmation'))
                                    <span class="text-danger">{{ $errors->first('driver_password_confirmation') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="company">Company</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-building fa-fw"></i>
                                </span>
                                <select wire:model.defer="state.company_id" id="company" class="form-select border-gray-300" autofocus required>
                                    <option value="">Choose Company</option>
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}">{{$company->company_name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('company'))
                                    <span class="text-danger">{{ $errors->first('company') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="sector">Sector</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                   <i class="fa fa-project-diagram"></i>
                                </span>
                                <select wire:model.defer="state.sector_id" id="sector" class="form-select border-gray-300" autofocus required>
                                    <option value="">Choose Sector</option>
                                    @foreach($sectors as $sector)
                                        <option value="{{$sector->id}}">{{$sector->sector_name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('sector'))
                                    <span class="text-danger">{{ $errors->first('sector') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="route">Route</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-map-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"/>
                                        <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
                                    </svg>
                                </span>
                                <select wire:model.defer="state.route_id" id="route" class="form-select border-gray-300" autofocus required>
                                    <option value="">Choose Route</option>
                                    @foreach($routes as $route)
                                        <option value="{{$route->id}}">{{$route->route_name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('route'))
                                    <span class="text-danger">{{ $errors->first('route') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="bus">Bus</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                     <i class="fas fa-bus fa-fw"></i>
                                </span>
                                <select wire:model.defer="state.bus_id" id="bus" class="form-select border-gray-300" autofocus required>
                                    <option value="">Choose Bus</option>
                                    @foreach($buses as $bus)
                                        <option value="{{$bus->id}}">{{$bus->bus_registration_number}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('bus'))
                                    <span class="text-danger">{{ $errors->first('bus') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <span>Save</span>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-header"></div>
            </div>
        </div>
    </div>
    <!-- End of Edit User Modal Content -->
</div>
@section('script')
    <script>
        window.addEventListener('show-form', event => {
            $('#modalAdd').modal('show');
        });
        window.addEventListener('hide-form', event => {
            $('#modalAdd').modal('hide');
            toastr.success(event.detail.message, 'Success!');
        });
        window.addEventListener('show-delete-form', event => {
            $('#confirmationModal').modal('show');
        });
        window.addEventListener('hide-delete-modal', event => {
            $('#confirmationModal').modal('hide');
            toastr.success(event.detail.message, 'Success!');
        })
    </script>
@endsection