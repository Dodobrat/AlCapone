
<div style="font-family: 'sans-serif', Arial">
    <h2>@lang('contacts::email.leading_title')</h2><br>
    <p>
        @lang('contacts::email.request_from')
    </p>
    <div>

        <div>
            <span>
                @lang('contacts::email.first_name')
            </span>
            <b>{{ $data['first_name'] }}</b>
        </div>

        <div>
            <span>
                @lang('contacts::email.last_name')
            </span>
            <b>{{ $data['last_name'] }}</b>
        </div>

        <div>
            <span>
                @lang('contacts::email.phone')
            </span>
            <b>{{ $data['phone'] }}</b>
        </div>

        <div>
            <span>
                @lang('contacts::email.email')
            </span>
            <b>{{ $data['email'] }}</b>
        </div>

        <div>
           <span>
               @lang('contacts::email.message')
           </span>
            <b>{{ $data['message'] }}</b>&nbsp;
        </div>


    </div>
</div>