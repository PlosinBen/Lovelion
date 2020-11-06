@extends('basic')

@section('Content')
    <section class="container">
        <div class="card mb-2">
            <div class="card-body">
                @include('component.investment.commitment-list',['CommitmentList' => $Commitments])
            </div>
        </div>
        <div class="card">
            <div class="card-body text-center pt-0">
                <div class="row py-2 d-none d-sm-flex justify-content-center border-bottom">
                    <div class="col-sm-3 col-md-2">
                        <strong>日期</strong>
                    </div>
                    <div class="col-sm-3 col-md-2">
                        <strong>
                            類型
                        </strong>
                    </div>
                    <div class="col-sm-3 col-md-2">
                        <strong>
                            金額
                        </strong>
                    </div>
                </div>
                @foreach($Details as $detail)
                    <div class="row pt-2 border-bottom justify-content-center">
                        <div class="col-12 col-sm-3 col-md-2 mb-1">
                            {{ $detail->date->toDateString() }}
                        </div>
                        <div class="col d-sm-none"></div>
                        <div class="col-4 col-sm-2 mb-1 d-sm-none text-center">
                            <strong>類型</strong>
                        </div>
                        <div class="col-4 col-sm-2 d-sm-none text-center">
                            <strong>金額</strong>
                        </div>
                        <div class="col d-sm-none"></div>
                        <div class="col-4 col-sm-3 col-md-2 pb-2">
                            {{ $detail->type }}
                        </div>
                        <div class="col-4 col-sm-3 col-md-2 text-right">
                            {{ number_format($detail->amount) }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
