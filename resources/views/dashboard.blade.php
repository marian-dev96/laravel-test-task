
<div class="col-xl-5">
    <p>@lang('sleeping_owl::lang.my_referral_link')</p>
    <div class="input-group mb-3">
        <input type="text" class="form-control" id="copy"
               value="{{ route('register', ['ref' => auth()->user()->id]) }}" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" onclick="copyText()" type="button">@lang('sleeping_owl::lang.copy')</button>
        </div>
    </div>
</div>


