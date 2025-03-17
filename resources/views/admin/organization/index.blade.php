@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Organization" />
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class=" ">
                    <div class="table-responsive text-nowrap">
                        <table class="table  table-hover">
                            <thead>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Whatsapp Number</th>
                                <th>Email</th>
                                <th>Social Links</th>
                                <th>Actions</th>
                            </thead>
                            <tbody class="table-border-bottom-0">


                                <tr>
                                    <td>{{ $organization->name }}</td>
                                    <td>{{ $organization->address }}</td>
                                    <td>
                                        <ul>
                                            <li> {{ $organization->phone }}</li>
                                            <li> {{ $organization->alt_phone }}</li>
                                        </ul>
                                    </td>
                                    <td>{{ $organization->whatsapp_phone }}</td>
                                    <td>{{ $organization->email }}</td>
                                    <td>
                                        <ul>
                                            @if ($organization->facebook)
                                                <li><a href="{{ $organization->facebook }}">Facebook</a></li>
                                            @endif

                                            @if ($organization->linkedIn)
                                                <li><a href="{{ $organization->linkedIn }}">LinkedIn</a></li>
                                            @endif

                                            @if ($organization->twitter)
                                                <li><a href="{{ $organization->twitter }}">Twitter</a></li>
                                            @endif

                                            @if ($organization->instagram)
                                                <li><a href="{{ $organization->instagram }}">Instagram</a></li>
                                            @endif
                                            @if ($organization->youtube)
                                                <li><a href="{{ $organization->youtube }}">Youtube</a></li>
                                            @endif
                                            @if ($organization->pinterest)
                                                <li><a href="{{ $organization->pinterest }}">Pinterest</a></li>
                                            @endif
                                        </ul>
                                    </td>


                                    <td class="">
                                        <a href="{{ route('admin.organization.edit', [$organization->id]) }}"
                                            class="btn btn-secondary btn-sm mb-sm-1 ">
                                            <span class="mdi mdi-pencil"></span></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                </div>

            </div>
        </div>
    </div>
@endsection
