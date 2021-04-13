@extends('layouts.template')

@section('content')

        <section class="contact-section">
            <div class="sub-title">
                <div class="container d-flex">
                    <h3>Contact me</h3>
                    <a class="ml-auto button-back" href="{{ URL::previous() }}">Go Back</a>
                </div>
            </div>

            <div class="container info">
                <div class="contact-info">
                    <h2>Contact information</h2>
                    <div class="contact-text">
                        <div class="txt-box">
                            <p>Email Me</p>
                            <p>myemail@gmail.com</p>
                        </div>
                        <div class="txt-box">
                            <p>Call Me</p>
                            <p>+371 22 222 222</p>
                        </div>
                    </div>
                </div>

                <div class="contact-box">
                    <h2>Message me</h2>
                    <form>
                      <div class="msg-box">
                        <input type="text" name="" required="">
                        <label>Name & Surname</label>
                      </div>
                      <div class="msg-box">
                        <input type="text" name="" required="">
                        <label>Email</label>
                      </div>
                      <div class="msg-box">
                        <textarea class="form-textarea" name="" id="" cols="30" rows="4"></textarea>
                        <label class="form-label textarea-label">Message</label>
                      </div>
                      <a href="#">
                        Submit
                      </a>
                    </form>
                </div>
                
            </div>

        </section>

@endsection