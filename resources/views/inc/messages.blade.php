{{-- @if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endforeach
    
@endif --}}

@if (session('success'))
        <div class="alert alert-success" id="alert">
            {{-- <button type="button" class="close" data-dismiss="alert">x</button> --}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            {{ session('success') }}
        </div>
@endif

@if (session('error'))
        <div class="alert alert-success" id="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ session('error') }}
        </div>
@endif

{{-- @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif --}}
@if ($errors->any())
<div class="alert alert-danger" id="alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
<ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
</div>
@endif
{{-- @section('script')
<script type="text/javascript">

    $("document").ready(function(){

        setTimeout(function(){
            $("div.alert").remove();
            
        }, 5000);

    })

</script>
@endsection --}}