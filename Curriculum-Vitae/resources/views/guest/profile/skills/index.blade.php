@extends('guest/profile/layout')

@section('content')

<div class="container mt-2">
    <div class="row d-flex justify-content-center mt-4 pt-2">
        <div class="col-md-9">
            <div class="card p-0">
                <div class="card-header">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-md-6"><b class="fs-5">Skills</b></div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-8 d-flex justify-content-end">
                                    <a href="{{ route('skills.create') }}" class="btn btn-success fs-6">Add Skill</a>
                                </div>
                                <div class="col-md-4 d-flex justify-content-end">
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
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th class="text-center fs-6">Skill Name</th>
                            <th class="text-center fs-6">Skill Level (%)</th>
                            <th class="text-center fs-6">Edit</th>
                            <th class="text-center fs-6">Delete</th>
                        </tr>
                        @if(count($skills) > 0)

                            @foreach($skills as $skill)

                                <tr>
                                    <td class="text-center fs-6">{{ $skill->skill_name }}</td>
                                    <td class="text-center fs-6">{{ $skill->skill_percent}}</td>
                                    <td class="text-center fs-6"><a href="{{ route('skills.edit', $skill->skill_id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a></td>
                                    <td class="text-center fs-6">
                                        <form id="delete-form-{{ $skill->skill_id }}" method="post" action="{{ route('skills.destroy', $skill->skill_id) }}">
                                            @csrf
                                            @method('DELETE')
                                            
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete-{{ $skill->skill_id }}">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="confirmDelete-{{ $skill->skill_id }}" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered text-center">
                                                    <div class="modal-content">
                                                    <div class="modal-header" style="background-color: #378c3f; color: #fff">
                                                        <h5 class="modal-title" id="confirmDeleteLabel">Delete Skill</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body fs-5">
                                                        Do you really want delete this Skill?
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
                                <td colspan="3" class="text-center">No Data Found</td>
                            </tr>
                        @endif
                    </table>
                    <div class="fw-bold skill-pagination">
                        {!! $skills->render('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection