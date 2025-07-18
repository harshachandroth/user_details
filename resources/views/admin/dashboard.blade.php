<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mt-4">
    <div class="row">
        <!-- Box 1 -->
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-primary shadow rounded-3">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{route('departments')}}">Departments</a></h5>
                    <h2>{{$dept_count}}</h2>
                </div>
            </div>
        </div>

        <!-- Box 2 -->
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-success shadow rounded-3">
                <div class="card-body">
                    <h5 class="card-title">Devices</h5>
                    <h2>{{$device_count}}</h2>
                </div>
            </div>
        </div>

        <!-- Box 3 -->
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-warning shadow rounded-3">
                <div class="card-body">
                    <h5 class="card-title">Reminder & Notes</h5>
                    <h2>{{$rem_count}}</h2>
                </div>
            </div>
        </div>

        <!-- Box 4 -->
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-danger shadow rounded-3">
                <div class="card-body">
                    <h5 class="card-title">Passwords</h5>
                    <h2>{{$pasw_count}}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

            </div>
        </div>
    </div>
</x-app-layout>
