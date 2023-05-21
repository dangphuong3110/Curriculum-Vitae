@extends('guest/profile/layout')

@section('content')

<div class="container mt-2">
    <div class="row d-flex justify-content-center mt-2">
        <div class="col-md-12">
            <div class="card p-0">
                <div class="card-header">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-md-6"><b class="fs-5">Portfolios</b></div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-9 d-flex justify-content-end">
                                    <a href="{{ route('portfolios.create') }}" class="btn btn-success fs-6">Add Project</a>
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
                                <th class="text-center align-middle fs-6">Project Name</th>
                                <th class="text-center align-middle fs-6">Project Link</th>
                                <th class="text-center align-middle fs-6">Project Description</th>
                                <th class="text-center align-middle fs-6">Project Image</th>
                                <th class="text-center align-middle fs-6">Edit</th>
                                <th class="text-center align-middle fs-6">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(count($portfolios) > 0)

                            @foreach($portfolios as $portfolio)

                                <tr>
                                    <td class="text-center fs-6">{{ $portfolio->project_name }}</td>
                                    <td class="text-center fs-6">{{ $portfolio->project_link}}</td>
                                    <td class="text-center fs-6">{{ $portfolio->project_desc}}</td>
                                    <td class="text-center fs-6"><img src="{{ asset('images/projects_img/' . $portfolio->image) }}" alt="Project Image" class="image-project-preview"></td>
                                    <td class="text-center fs-6"><a href="{{ route('portfolios.edit', $portfolio->portfolio_id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a></td>
                                    <td class="text-center fs-6">
                                        <form id="delete-form-{{ $portfolio->portfolio_id }}" method="post" action="{{ route('portfolios.destroy', $portfolio->portfolio_id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete-{{ $portfolio->portfolio_id }}">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="confirmDelete-{{ $portfolio->portfolio_id }}" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered text-center">
                                                    <div class="modal-content">
                                                    <div class="modal-header" style="background-color: #378c3f; color: #fff">
                                                        <h5 class="modal-title" id="confirmDeleteLabel">Delete Project</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body fs-5">
                                                        Do you really want delete this Project?
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
                                <td colspan="6" class="text-center">No Data Found</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    <div class="fw-bold skill-pagination">
                        {!! $portfolios->render('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection