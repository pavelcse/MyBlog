@if(count($errors)> 0)
    <div class="alert alert-danger">
        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="list-group-item"> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif