@extends('website.layouts.app')



@section('content')
    <section class="slider-area slider-area2">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-11 col-md-12">
                            <div class="hero__caption hero__caption2">
                                <h1 data-animation="bounceIn" data-delay="0.2s">My Profile</h1>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<div class="container light-style flex-grow-1 container-p-y">
    <h4 class="font-weight-bold m-5" style="font-size: 40px">Account settings</h4>
    <div class="card overflow-hidden">
        <div class="row no-gutters row-bordered row-border-light">
            <div class="col-md-3 pt-0">
                <div class="list-group list-group-flush account-settings-links">
                    <a class="list-group-item list-group-item-action " data-toggle="list"
                        href="#account-general">General</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list"
                        href="#account-change-password">Change password</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list"
                        href="#account-info">Other Informations</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list"
                        href="#instructor">Start As Instructor</a>



                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">

                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <img src="{{asset('storage/'. $user_data->profile_photo_path)}}" alt class="d-block ui-w-80" style="min-width: 100px; height:100px; border-radius:50%;">
                                <div class="media-body ml-4">
                                    <label class="btn ">

                                        <a  href="{{ route('edit_profile') }}">change photo</a>
                                    </label>
                                    {{-- <button type="button" class="btn md-btn-flat">Reset</button> --}}
                                    @if ($user_data->profile_photo_path== null)

                                    <div class="text-light small mt-1" ><p style="color: rgb(117, 117, 117); font-size:11px;">Allowed JPG, GIF or PNG. Max size of 800K</p></div>
                                    @endif
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="first_name" value="{{ $user_data->name }}"
                                        class="single-input" readonly>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="text" name="email" value="{{ $user_data->email }}"
                                        class="single-input" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password" name="current_password" placeholder="Current password"
                                        required="" class="single-input">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" name="new_password" placeholder="New password" required=""
                                        class="single-input">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" name="repeat_new_password" placeholder="Repeat new password"
                                        required="" class="single-input">
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Bio</label>
                                    <textarea class="single-textarea" placeholder="Write Something"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Birthday</label>
                                    <input type="date" name="first_name" required class="single-input">
                                </div>
                            </div>

                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h3 class="mb-4">Other Contacts</h3>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" placeholder="Phone Number" class="single-input">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">LinkedIn</label>
                                    <input type="text" name="linkedIn" placeholder="LinkedIn URL"
                                        class="single-input">
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="instructor">
                            <p>If you want to start your journey with EduQuest as instructor</p><br>
                            <a href="{{route('instructor-start')}}" class="btn btn-primary">Start As Instructor</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3 mb-5">
            {{-- <button type="button" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-primary">Cancel</button> --}}

        </div>
    </div>
@endsection
