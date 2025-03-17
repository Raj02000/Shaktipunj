@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Review" />

    <form action="{{ route('review.updateAndChangeStatus', ['review' => $review]) }}" method="post">
        @csrf
        <div class="mb-4">
            @if ($review->status?->value == 'pending')
                <a href="{{ route('review.changeStatus', ['review' => $review, 'status' => 'approved']) }}"
                    class="btn btn-primary">Approve</a>
                <button type="submit" class="btn btn-primary">Change & Approve</button>
                <a href="{{ route('review.changeStatus', ['review' => $review, 'status' => 'rejected']) }}"
                    class="btn btn-danger">Reject</a>
            @elseif($review->status?->value == 'approved')
                <a href="{{ route('review.changeStatus', ['review' => $review, 'status' => 'rejected']) }}"
                    class="btn btn-danger">Reject</a>
            @else
                <a href="{{ route('review.changeStatus', ['review' => $review, 'status' => 'approved']) }}"
                    class="btn btn-primary">Approve</a>
                <button type="submit" class="btn btn-primary">Change & Approve</button>
            @endif
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">View</h4>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Package</td>
                                <td>
                                    {{ $review->package->name }}
                                </td>
                            </tr>
                            <tr>
                                <td>Person Name</td>
                                <td>
                                    {{ $review->name }}
                                </td>
                            </tr>
                            <tr>
                                <td>Rating</td>
                                <td>
                                    {{ $review->rating }}
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    {{ $review->status }}
                                </td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td>
                                    <input type="date" name="date"
                                        value="{{ \Carbon\Carbon::parse($review->date)->format('Y-m-d') }}">
                                </td>
                            </tr>
                            <tr>
                                <td>Message</td>
                                <td>
                                    {{ $review->message }}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- Action Buttons --}}
                    <div class="d-flex justify-content-end mt-3">
                        <a href="{{ url()->previous() }}" class="btn px-3 mx-2 btn-sm btn-info">
                            <span class="mdi mdi-arrow-left"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
