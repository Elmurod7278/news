@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger shadow" role="alert" style="border-left:#721C24 5px solid; border-radius: 0px">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="True" style="color:#721C24">&times;</span>
            </button>
            <div class="row">
                <svg width="1.25em" height="1.25em" viewBox="0 0 16 16" class="m-1 bi bi-exclamation-circle-fill"
                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                </svg>
                <p style="font-size:18px" class="mb-0 font-weight-light">{{ $error }}</p>
            </div>
        </div>
    @endforeach
@endif
