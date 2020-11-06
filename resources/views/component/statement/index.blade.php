@extends('basic')

@section('Content')
    <section class="container">
        <div class="card">
            <div class="card-body pt-0">

                @foreach($FuturesStatements as $futuresStatement)
                    <div class="row pt-2 text-right border-bottom">
                        <div class="col-12 col-xl pb-2 text-center">
                            {{ $futuresStatement->period->format('Y-m') }}
                        </div>
                        <div class="col-6 col-sm-3 col-md-2 d-xl-none pb-2 text-center">
                            <strong>期末權益</strong>
                        </div>
                        <div class="col-6 col-sm-3 col-md-2 col-xl">
                            {{ number_format($futuresStatement->commitment) }}
                        </div>
                        <div class="col-6 col-sm-3 col-md-2 d-xl-none pb-2 text-center">
                            <strong>未平倉損益</strong>
                        </div>
                        <div class="col-6 col-sm-3 col-md-2 col-xl">
                            {{ number_format($futuresStatement->open_interest) }}
                        </div>
                        <div class="col-6 col-sm-3 col-md-2 d-xl-none pb-2 text-center">
                            <strong>沖銷損益</strong>
                        </div>
                        <div class="col-6 col-sm-3 col-md-2 col-xl">
                            {{ number_format($futuresStatement->profit) }}
                        </div>
                        <div class="col-6 col-sm-3 col-md-2 d-xl-none pb-2 text-center">
                            <strong>海期權益</strong>
                        </div>
                        <div class="col-6 col-sm-3 col-md-2 col-xl">
                            {{ number_format($futuresStatement->oversea_commitment) }}
                        </div>
                        <div class="col-6 col-sm-3 col-md-2 d-xl-none pb-2 text-center">
                            <strong>實質權益</strong>
                        </div>
                        <div class="col-6 col-sm-3 col-md-2 col-xl">
                            {{ number_format($futuresStatement->real_commitment) }}
                        </div>
                        <div class="col-6 col-sm-3 col-md-2 d-xl-none pb-2 text-center">
                            <strong>權益差額</strong>
                        </div>
                        <div class="col-6 col-sm-3 col-md-2 col-xl">
                            {{ number_format($futuresStatement->net_commitment) }}
                        </div>
                        <div class="col-6 col-sm-3 col-md-2 d-xl-none pb-2 text-center">
                            <strong>分配總額</strong>
                        </div>
                        <div class="col-6 col-sm-3 col-md-2 col-xl">
                            {{ number_format($futuresStatement->distribution) }}
                        </div>
                        <div class="col-6 col-sm-3 col-md-2 d-xl-none pb-2 text-center">
                        </div>
                        <div class="col-6 col-sm-3 col-md-2 col-xl">
                            <button class="btn btn-warning btn-xs">
                                <i class="fas fa-calculator"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
