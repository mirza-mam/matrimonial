@extends('admin.layout.main')
@push('header')
    <title>Website Setting | Select Proposal</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@section('section')    
    <div class="row">
        <div class="col-md-6">
            @php
                $header = \App\Models\WebsiteSetting::where('name','=','Header Title')->first();
            @endphp
            <div class="card mb-4">
                <h5 class="card-header">Header Title</h5>
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <form id="title_form" action="{{ route('admin.website-setting') }}" method="POST">
                    @csrf
                        <div class="input-group">
                            <input type="text" name="text" class="form-control" placeholder="Enter Title" aria-label="Enter Title"
                                aria-describedby="button-addon2" value="{{ $header->content }}" />
                            <input type="hidden" name="id" value="{{ $header->id }}"/>
                            <button type="submit" class="btn btn-outline-success" type="submit"
                                id="button-addon2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @php
                $tab = \App\Models\WebsiteSetting::where('name','=','Tab Title')->first();
            @endphp
            <div class="card mb-4">
                <h5 class="card-header">Tab Title</h5>
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <form action="{{ route('admin.website-setting') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="text" class="form-control" placeholder="Enter Title" aria-label="Enter Title"
                                aria-describedby="button-addon2" value="{{ $tab->content }}" />
                            <input type="hidden" name="id" value="{{ $tab->id }}"/>
                            <button type="submit" class="btn btn-outline-success"
                                id="button-addon2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @php
                $fb_link = \App\Models\WebsiteSetting::where('name','=','Facebook Link')->first();
            @endphp
            <div class="card mb-4">
                <h5 class="card-header">Facebook Link</h5>
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <form action="{{ route('admin.website-setting') }}" method="POST">
                    @csrf
                        <div class="input-group">
                            <input type="text" name="text" class="form-control" placeholder="Enter Title" aria-label="Enter Title"
                                aria-describedby="button-addon2" value="{{ $fb_link->content }}" />
                            <input type="hidden" name="id" value="{{ $fb_link->id }}"/>
                            <button type="submit" class="btn btn-outline-success"
                                id="button-addon2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @php
                $insta_link = \App\Models\WebsiteSetting::where('name','=','Instagram Link')->first();
            @endphp
            <div class="card mb-4">
                <h5 class="card-header">Instagram Link</h5>
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <form action="{{ route('admin.website-setting') }}" method="POST">
                    @csrf
                        <div class="input-group">
                            <input type="text" name="text" class="form-control" placeholder="Enter Title" aria-label="Enter Title"
                                aria-describedby="button-addon2" value="{{ $insta_link->content }}" />
                            <input type="hidden" name="id" value="{{ $insta_link->id }}"/>
                            <button type="submit" class="btn btn-outline-success"
                                id="button-addon2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @php
                $footer_moto = \App\Models\WebsiteSetting::where('name','=','Footer Moto')->first();
            @endphp
            <div class="card mb-4">
                <h5 class="card-header">Footer Moto</h5>
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <form action="{{ route('admin.website-setting') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="text" class="form-control" placeholder="Enter Title" aria-label="Enter Title"
                                aria-describedby="button-addon2" value="{{ $footer_moto->content }}" />
                            <input type="hidden" name="id" value="{{ $footer_moto->id }}"/>
                            <button type="submit" class="btn btn-outline-success"
                                id="button-addon2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @php
                $location = \App\Models\WebsiteSetting::where('name','=','Location')->first();
            @endphp
            <div class="card mb-4">
                <h5 class="card-header">Location</h5>
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <form action="{{ route('admin.website-setting') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="text" class="form-control" placeholder="Enter Title" aria-label="Enter Title"
                                aria-describedby="button-addon2" value="{{ $location->content }}" />
                            <input type="hidden" name="id" value="{{ $location->id }}"/>
                            <button type="submit" class="btn btn-outline-success"
                                id="button-addon2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @php
                $email = \App\Models\WebsiteSetting::where('name','=','Contact Email')->first();
            @endphp
            <div class="card mb-4">
                <h5 class="card-header">Contact Email</h5>
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <form action="{{ route('admin.website-setting') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="text" class="form-control" placeholder="Enter Title" aria-label="Enter Title"
                                aria-describedby="button-addon2" value="{{ $email->content }}" />
                            <input type="hidden" name="id" value="{{ $email->id }}"/>
                            <button type="submit" class="btn btn-outline-success"
                                id="button-addon2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @php
                $l_nbr = \App\Models\WebsiteSetting::where('name','=','Local Contact Number')->first();
            @endphp
            <div class="card mb-4">
                <h5 class="card-header">Local Contact Number</h5>
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <form action="{{ route('admin.website-setting') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="text" class="form-control" placeholder="Enter Title"
                                aria-label="Enter Title" aria-describedby="button-addon2"
                                value="{{ $l_nbr->content }}" />
                            <input type="hidden" name="id" value="{{ $l_nbr->id }}"/>
                            <button type="submit" class="btn btn-outline-success"
                                id="button-addon2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @php
                $a_nbr = \App\Models\WebsiteSetting::where('name','=','Abroad Contact Number')->first();
            @endphp
            <div class="card mb-4">
                <h5 class="card-header">Abroad Contact Number</h5>
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <form action="{{ route('admin.website-setting') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="text" class="form-control" placeholder="Enter Title"
                                aria-label="Enter Title" aria-describedby="button-addon2"
                                value="{{ $a_nbr->content }}" />
                            <input type="hidden" name="id" value="{{ $a_nbr->id }}"/>
                            <button type="submit" class="btn btn-outline-success"
                                id="button-addon2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @php
                $l_w_nbr = \App\Models\WebsiteSetting::where('name','=','Local Whatsapp Link')->first();
            @endphp
            <div class="card mb-4">
                <h5 class="card-header">Local Whatsapp Link</h5>
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <form action="{{ route('admin.website-setting') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="text" class="form-control" placeholder="Enter Title"
                                aria-label="Enter Title" aria-describedby="button-addon2"
                                value="{{ $l_w_nbr->content }}" />
                            <input type="hidden" name="id" value="{{ $l_w_nbr->id }}"/>
                            <button type="submit" class="btn btn-outline-success"
                                id="button-addon2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @php
                $a_w_nbr = \App\Models\WebsiteSetting::where('name','=','Abroad Whatsapp Link')->first();
            @endphp
            <div class="card mb-4">
                <h5 class="card-header">Abroad Whatsapp Link</h5>
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <form action="{{ route('admin.website-setting') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="text" class="form-control" placeholder="Enter Title"
                                aria-label="Enter Title" aria-describedby="button-addon2"
                                value="{{ $a_w_nbr->content }}" />
                            <input type="hidden" name="id" value="{{ $a_w_nbr->id }}"/>
                            <button type="submit" class="btn btn-outline-success"
                                id="button-addon2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @php
                $offer_h = \App\Models\WebsiteSetting::where('name','=','Offer Heading')->first();
            @endphp
            <div class="card mb-4">
                <h5 class="card-header">Offer Heading</h5>
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <form action="{{ route('admin.website-setting') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="text" class="form-control" placeholder="Enter Title"
                                aria-label="Enter Title" aria-describedby="button-addon2"
                                value="{{ $offer_h->content }}" />
                            <input type="hidden" name="id" value="{{ $offer_h->id }}"/>
                            <button type="submit" class="btn btn-outline-success"
                                id="button-addon2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @php
                $offer_b = \App\Models\WebsiteSetting::where('name','=','Offer Big Text')->first();
            @endphp
            <div class="card mb-4">
                <h5 class="card-header">Offer Big Text</h5>
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <form action="{{ route('admin.website-setting') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="text" class="form-control" placeholder="Enter Title"
                                aria-label="Enter Title" aria-describedby="button-addon2"
                                value="{{ $offer_b->content }}" />
                            <input type="hidden" name="id" value="{{ $offer_b->id }}"/>
                            <button type="submit" class="btn btn-outline-success"
                                id="button-addon2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @php
                $offer_s = \App\Models\WebsiteSetting::where('name','=','Offer Small Text')->first();
            @endphp
            <div class="card mb-4">
                <h5 class="card-header">Offer Small Text</h5>
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <form action="{{ route('admin.website-setting') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="text" class="form-control" placeholder="Enter Title"
                                aria-label="Enter Title" aria-describedby="button-addon2"
                                value="{{ $offer_s->content }}" />
                            <input type="hidden" name="id" value="{{ $offer_s->id }}"/>
                            <button type="submit" class="btn btn-outline-success"
                                id="button-addon2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @php
                $offer_show = \App\Models\WebsiteSetting::where('name','=','Show Offer')->first();
            @endphp
            <div class="card mb-4">
                <h5 class="card-header">Show Offer</h5>
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <form action="{{ route('admin.website-setting') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <select class="form-select" name="text" id="inputGroupSelect02">
                                <option value="Y" @selected($offer_show->content == 'Y')>Yes</option>
                                <option value="N" @selected($offer_show->content == 'N')>No</option>
                            </select>
                            <input type="hidden" name="id" value="{{ $offer_show->id }}"/>
                            <label class="input-group-text btn-outline-success" for="inputGroupSelect02"
                                onclick="$(this).closest('form').submit();">Update</label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-6">
            @php
                $disclimer = \App\Models\WebsiteSetting::where('name','=','Disclimer')->first();
            @endphp
            <div class="card mb-4">
                <h5 class="card-header">Disclimer</h5>
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <form action="{{ route('admin.website-setting') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <textarea type="text" name="text" class="form-control" placeholder="Enter Title" aria-label="Enter Title"
                                aria-describedby="button-addon2" rows="6">{{ $disclimer->content }}</textarea>
                            <input type="hidden" name="id" value="{{ $disclimer->id }}"/>
                            <button type="submit" class="btn btn-outline-success"
                                id="button-addon2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @php
                $mail = \App\Models\WebsiteSetting::where('name','=','Mail Text')->first();
            @endphp
            <div class="card mb-4">
                <h5 class="card-header">Mail Text</h5>
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <form action="{{ route('admin.website-setting') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <textarea type="text" class="form-control" placeholder="Enter Title" aria-label="Enter Title"
                                aria-describedby="button-addon2" rows="6">{{ $mail->content }}</textarea>
                            <input type="hidden" name="id" value="{{ $mail->id }}"/>
                            <button type="submit" class="btn btn-outline-success"
                                id="button-addon2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @php
                $mail_cong = \App\Models\WebsiteSetting::where('name','=','Mail Text Congrats')->first();
            @endphp
            <div class="card mb-4">
                <h5 class="card-header">Mail Text Congrats</h5>
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <form action="{{ route('admin.website-setting') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <textarea type="text" class="form-control" placeholder="Enter Title" aria-label="Enter Title"
                                aria-describedby="button-addon2" rows="6">{{ $mail_cong->content }}</textarea>
                            <input type="hidden" name="id" value="{{ $mail_cong->id }}"/>
                            <button type="submit" class="btn btn-outline-success"
                                id="button-addon2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-6">
            @php
                $logo = \App\Models\WebsiteSetting::where('name','=','Logo')->first();
            @endphp
            <div class="card mb-4">
                <h5 class="card-header">Logo</h5>
                <label id="defaultFormControlHelp" class="form-text text-center">
                    {{ $logo->content }}
                </label>
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <form>
                        <div class="input-group">
                            <input type="file" name="media" class="form-control" id="inputGroupFile04"
                                aria-describedby="inputGroupFileAddon04" aria-label="Upload" accept="image/png" />
                            <input type="hidden" name="id" value="{{ $logo->id }}"/>
                            <button class="btn btn-outline-success" type="submit"
                                id="inputGroupFileAddon04">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @php
                $video = \App\Models\WebsiteSetting::where('name','=','Video')->first();
            @endphp
            <div class="card mb-4">
                <h5 class="card-header">Video</h5>
                <label id="defaultFormControlHelp" class="form-text text-center">
                    {{ $video->content }}
                </label>
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <form>
                        <div class="input-group">
                            <input type="file" name="media" class="form-control" id="inputGroupFile04"
                                aria-describedby="inputGroupFileAddon04" aria-label="Upload" accept="video/mp4"/>
                            <input type="hidden" name="id" value="{{ $video->id }}"/>
                            <button class="btn btn-outline-success" type="submit"
                                id="inputGroupFileAddon04">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('footer')
@endpush
