@extends('templates.template')


@section('content')


    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <form class="d-flex">
                <h3>Inforce câmbio de moedas</h3>
            </form>
        </div>
    </nav>

    <hr>

    <div class="container">
    <div class="jumbotron-fluid p-5 mb-4 bg-white rounded-3 px-3">
        <h5>Selecione as moedas</h5>
        <form id="form1">

            <label class="form-label">

                <select id="base" name="base" class="form-select mb-3 " aria-label=".form-select-lg example">
                    <option value="">Converter de</option>
                    @foreach($coins as $coin)
                        <option value="{{$coin->abbreviation}}">{{$coin->name}}</option>
                    @endforeach
                </select>

            </label>

            <br>

            <label class="form-label">
                <select id="to" name="to" class="form-select mb-3">
                    <option value="">Converter para</option>
                    @foreach($coins as $coin)
                        <option value="{{$coin->abbreviation}}">{{$coin->name}}</option>

                    @endforeach
                </select>
            </label>
            <br>
            <label>
                Valor:
                <input id="value" name="value" type="number" placeholder="Valor" class="form-control" step="0.01">
            </label>
            <button type="submit" form="form1" class=" ml-3 btn btn-info">Converter</button>
        </form>
        <p class="result mt-3"></p>

    </div>

    </div>
    <script src="{{asset('/js/jquery.js')}}"></script>
    <script src="{{asset('/js/script.js')}}"></script>
@endsection

