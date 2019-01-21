@extends('layouts.app')

@section('content')

    <div class="bg-white">
        <div class="container">
            <div class="breadcrumbs-wrapper">
                {!! Breadcrumbs::render('index') !!}
            </div>
        </div>
    </div>

    @include('index::front.boxes.map')

    <section id="contacts">
        <div class="container-fluid container-xl">
            @foreach($contacts as $contact)
                <div class="row align-items-stretch">
                    <div class="col-12 col-md-6">
                        <div class="box-wrapper light">
                            {!! Form::open(array('url' => null, 'method' => 'POST', 'id' => 'contacts-form', 'class' => 'form-validation mw-100')) !!}
                                <div class="top">
                                    <h5 class="header-1">
                                        @lang('contacts::front.form_title')
                                    </h5>
                                    <span class="sub-title">
                                        @lang('contacts::front.form_sub_title')
                                    </span>
                                </div>
                                <div class="row align-items-stretch">
                                    <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="contacts-first-name">
                                                @lang('contacts::front.first_name')
                                            </label>
                                            <div class="form-control-wrapper">
                                                {!! Form::text('first_name', null, array('class' => 'form-control', 'id' => 'contacts-first-name', 'required' => 'required')) !!}
                                            </div>
                                            <div class="error-wrapper"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="contacts-last-name">
                                                @lang('contacts::front.last_name')
                                            </label>
                                            <div class="form-control-wrapper">
                                                {!! Form::text('last_name', null, array('class' => 'form-control', 'id' => 'contacts-last-name', 'required' => 'required')) !!}
                                            </div>
                                            <div class="error-wrapper"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="contacts-email">
                                                @lang('contacts::front.email')
                                            </label>
                                            <div class="form-control-wrapper">
                                                {!! Form::text('email', null, array('class' => 'form-control', 'id' => 'contacts-email', 'required' => 'required')) !!}
                                            </div>
                                            <div class="error-wrapper"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="contacts-phone">
                                                @lang('contacts::front.phone')
                                            </label>
                                            <div class="form-control-wrapper">
                                                {!! Form::text('phone', null, array('class' => 'form-control', 'id' => 'contacts-phone', 'required' => 'required')) !!}
                                            </div>
                                            <div class="error-wrapper"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="#contacts-message">
                                                @lang('contacts::front.comment')
                                            </label>
                                            <div class="form-control-wrapper">
                                                {!! Form::textarea('message', null, array('id' => 'contacts-message', 'class' => 'form-control', 'rows' => '5', 'required' => 'required')) !!}
                                            </div>
                                            <div class="error-wrapper"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-12 col-lg-8 col-xl-6 d-flex justify-content-end justify-content-sm-start justify-content-md-end justify-content-lg-start mb-sm-3">
                                        <div class="form-group mb-0 mw-100">
                                            <div class="captcha-wrapper form-control-wrapper">
                                                {!! NoCaptcha::display() !!}
                                            </div>
                                            <div class="error-wrapper"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-12 col-lg-4 col-xl-6">
                                        <div class="form-group d-flex align-items-center justify-content-end h-100">
                                            <button type="submit" class="button effect-2 effect-color-1 effect-background-3">
                                                @lang('contacts::front.submit_btn')
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="box-wrapper dark">

                            <div class="info-box">
                                <h6 class="header-1">
                                    @lang('contacts::front.contacts_info_title')
                                </h6>
                                <ul class="info-list list-unstyled">
                                    <li class="info">
                                        {{ $contact->address }}
                                    </li>
                                    <li class="info">
                                        @lang('contacts::front.phone_placeholder')
                                        <a href="tel:{{ $contact->phone }}" title="#" class="basic-link">
                                            {{ $contact->phone }}
                                        </a>
                                    </li>
                                    <li class="info">
                                        @lang('contacts::front.email_placeholder')
                                        <a href="mailto:{{ $contact->email }}" title="#" class="basic-link">
                                            {{ $contact->email }}
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="info-box">
                                <h6 class="header-1">
                                    @lang('contacts::front.working_time')
                                </h6>
                                <ul class="info-list list-unstyled">
                                    <li class="info">
                                        {{ $contact->working_time }}
                                    </li>
                                </ul>
                            </div>

                            <div class="info-box">
                                @include('index::front.boxes.social_media')
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection