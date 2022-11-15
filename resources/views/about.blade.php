@extends('layout.main')
@push('header')
    <title>About Us | Select Proposal</title>
@endpush
@section('section')
    <div class="container p-5">
        <div class="px-3 mb-4" style="border-left: 8px solid gray">
            <h3>Looking for a Perfect Match?</h3>
            <p>
                You have arrived at the right place.
                <a href="{{ route('user.home') }}">Selectproposal.com</a> is Pakistan's top matrimonial platform where only educated people register their
                profiles. Every proposal registered in <a href="{{ route('user.home') }}">SELECT PROPOSAL</a> undergoes verfication by our team and is then
                published.
                <ul>
                    <li>There is surety of Genuine Proposals, however, please conduct your own due diligence when approaching profiles.</li>
                    <li>Technical Support for all members available in English and Urdu.</li>
                    <li>100% anonymity for ultimate security - your personal contact information is always safe and viewed by only the other authentic registered members.</li>
                </ul>
            </p>
        </div>
    </div>
@endsection
@push('footer')
@endpush
