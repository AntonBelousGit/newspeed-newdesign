<div class="col-lg-3 col-md-6">
    <div class="card">
        <img class="card-img-top" src="{{ asset('adminka/img/promotions_themplate.jpg') }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Promotions Themplate</h5>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="title_input" >Title</span>
                </div>
                <input type="text" id="title" name="title" class="form-control" aria-label="Title" aria-describedby="title_input" required="true" value="{{old('title')}}">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <a href="javascript:void(0);" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
</div>
