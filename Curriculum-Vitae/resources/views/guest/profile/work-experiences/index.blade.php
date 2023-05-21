@extends('guest/profile/layout')

@section('content')

<div class="container mt-2">
    <div class="row d-flex justify-content-center mt-2">
        <div class="col-md-12">
            <div class="card p-0">
                <div class="card-header">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-md-6"><b class="fs-5">Work Experiences</b></div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-9 d-flex justify-content-end">
                                    <a href="{{ route('work-experiences.create') }}" class="btn btn-success fs-6">Add Work Experience</a>
                                </div>
                                <div class="col-md-3 d-flex justify-content-end">
                                    <a href="{{ route('guest') }}" class="btn btn-danger fs-6">Go Back</a>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
                @if($message = Session::get('success'))

                        <div class="alert alert-success">
                            {{ $message }}
                        </div>

                @endif
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center align-middle fs-6">Company</th>
                                <th class="text-center align-middle fs-6">Job Position</th>
                                <th class="text-center align-middle fs-6">Description</th>
                                <th class="text-center align-middle fs-6">Start Date</th>
                                <th class="text-center align-middle fs-6">Resignation Date</th>
                                <th class="text-center align-middle fs-6">Edit</th>
                                <th class="text-center align-middle fs-6">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(count($workExperiences) > 0)

                            @foreach($workExperiences as $workExperience)

                                <tr>
                                    <td class="text-center fs-6">{{ $workExperience->company }}</td>
                                    <td class="text-center fs-6">{{ $workExperience->job_position}}</td>
                                    <td class="text-center fs-6">{{ $workExperience->description}}</td>
                                    <td class="text-center fs-6">{{ $workExperience->start_date}}</td>
                                    <td class="text-center fs-6">{{ $workExperience->end_date}}</td>
                                    <td class="text-center fs-6"><a href="{{ route('work-experiences.edit', $workExperience->work_experience_id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a></td>
                                    <td class="text-center fs-6">
                                        <form id="delete-form-{{ $workExperience->work_experience_id }}" method="post" action="{{ route('work-experiences.destroy', $workExperience->work_experience_id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete-{{ $workExperience->work_experience_id }}">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="confirmDelete-{{ $workExperience->work_experience_id }}" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered text-center">
                                                    <div class="modal-content">
                                                    <div class="modal-header" style="background-color: #378c3f; color: #fff">
                                                        <h5 class="modal-title" id="confirmDeleteLabel">Delete Work Experience</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body fs-5">
                                                        Do you really want delete this Work Experience?
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-center">
                                                        <input type="submit" class="btn btn-danger me-2" value="Delete"/>
                                                        <button type="button" class="btn btn-secondary ms-2" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach

                        @else
                            <tr>
                                <td colspan="7" class="text-center">No Data Found</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    <div class="fw-bold skill-pagination">
                        {!! $workExperiences->render('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection