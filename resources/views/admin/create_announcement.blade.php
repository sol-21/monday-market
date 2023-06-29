@extends('layouts.app')
@section('content')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Send email to users</div>
                    <hr>
                    <form action="{{ route('announcement.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="input-1">Subject</label>
                            <input type="text" class="form-control" name="subject" id="input-1"
                                placeholder="Enter Your Name">
                        </div>

                        <div class="form-group">
                            <label for="input-5">Message</label>
                            <textarea name="message" class="form-control" placeholder="Message"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-light px-5"><i class="icon-lock"></i> Send
                                Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--End Row-->
@endsection
