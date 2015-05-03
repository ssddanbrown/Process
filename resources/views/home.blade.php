@extends('app')

@section('content')
<div class="container">
	<div class="row">

        <div class="col-md-4">
            <div class="page-header">
                <h1>Welcome</h1>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">My projects</div>

                @include('parts/project/list-own')
            </div>
        </div>

	</div>
</div>
@endsection
