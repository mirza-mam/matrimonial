@extends('layout.main')
@push('header')
    <title>Services | Select Proposal</title>
@endpush
@section('section')
    <div class="container p-5">
        <div class="px-3 mb-4" style="border-left: 8px solid gray">
            <h3>Why selectproposal.com ?</h3>
            <p>
                After visiting hundred's of Matrimonial Websites and contacting with their registered proposals our team
                come to know that most of the website have no genuine/authentic proposals and have vague information by fake
                people, teenager boys registered and have fun with the genuine proposal through emails and calls and the
                site losses its authenticity. <a href="{{ route('user.home') }}">selectproposal.com</a> provides 100%
                authentic proposals because every proposal
                registered through inspection proper procedure so there is no place for the fake people.
            </p>
        </div>
        <div class="px-3 mb-4" style="border-left: 8px solid gray">
            <h3>Why Registration Fee (Non Refundable) ?</h3>
            <p>
                To maintain the authenticity of the proposals <a href="{{ route('user.home') }}">SELECT PROPOSAL</a> collects registration fee from every proposal
                through HBL, UBL, EasyPaisa, UPaisa and UBL Omni. The other reason for fee because it is not hard to pay for
                the genuine/serious proposal but hard for the student or fake people that's why SELECT PROPOSAL team suggest
                to collect Registration Fee from every proposal who register. <a href="{{ route('user.home') }}">SELECT PROPOSAL</a> team provides 24/7 telephonic,
                email and SMS support to members. This site is designed and run by group of professionals and used very
                simple mechanism of registration even a normal person who use internet can easily register to
                <a href="{{ route('user.home') }}">selectproposal.com</a>.
            </p>
        </div>
    </div>
@endsection
@push('footer')
@endpush
