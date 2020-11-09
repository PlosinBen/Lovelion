@extends('basic')

@section('Content')
    <section class="container">
        <div class="card row-table">
            <div class="card-body pt-0">
                <div class="row py-2 text-center border-bottom justify-content-center">
                    <div class="col d-none d-xl-block">
                        <strong>期別</strong>
                    </div>
                    <div class="col d-none d-xl-block">
                        <strong>期末權益</strong>
                    </div>
                    <div class="col d-none d-xl-block">
                        <strong>未平倉損益</strong>
                    </div>
                    <div class="col d-none d-xl-block">
                        <strong>沖銷損益</strong>
                    </div>
                    <div class="col d-none d-xl-block">
                        <strong>海期權益</strong>
                    </div>
                    <div class="col d-none d-xl-block">
                        <strong>實質權益</strong>
                    </div>
                    <div class="col d-none d-xl-block">
                        <strong>權益差額</strong>
                    </div>
                    <div class="col d-none d-xl-block">
                        <strong>分配總額</strong>
                    </div>
                    <div class="col-3 col-sm-2 d-xl-none">
                        <strong>操作</strong>
                    </div>
                    <div class="col-3 col-sm-2 col-xl">
                        <button class="btn btn-xs btn-info">
                            <i class="fas fa-plus"></i>
                        </button>
                        <button class="btn btn-xs btn-primary">
                            <i class="fa fa-sync"></i>
                        </button>
                    </div>
                </div>
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
                            <strong>操作</strong>
                        </div>
                        <div class="col-6 col-sm-3 col-md-2 col-xl pb-2">
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
