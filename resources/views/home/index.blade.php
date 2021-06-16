@extends('templates.template')


@section('content')
    <div class="d-flex align-items-center justify-content-center" style="height: 350px">
        <div class="d-flex" style="height: 350px">

    <div class="container">

        <div class="jumbotron-fluid p-5 mb-4 rounded-3 px-3" style="background:#f5fffa">

            <h3>Inforce câmbio de moedas</h3>
            <hr>
        <h5>Selecione as moedas</h5>
        <form id="form1">


            <label class="form-label">Converter de </label>

                <select id="base" name="base" class="form-select mb-3 " aria-label=".form-select-lg example">
                    <option value="">Selecionar moeda</option>
                    @foreach($coins as $coin)
                        <option value="{{$coin->abbreviation}}">{{$coin->name}}</option>
                    @endforeach
                </select>



            <br>

            <label class="form-label">Para </label>

            <label for="to"></label><select id="to" name="to" class="form-select mb-3">
                    <option value="">Selecionar moeda</option>
                    @foreach($coins as $coin)
                        <option value="{{$coin->abbreviation}}">{{$coin->name}}</option>

                    @endforeach
                </select>
            <br>
            <label>
                Valor:
                <input id="value" name="value" type="number" placeholder="Valor" min="0" class="form-control" step="0.01">
            </label>
            <button type="submit" form="form1" class=" ml-3 btn btn-info">Converter</button>
        </form>
        <p class="result mt-3"></p>


    </div>
    </div>
    </div>
    </div>
    <script src="{{asset('/js/jquery.js')}}"></script>
    <script src="{{asset('/js/script.js')}}"></script>
@endsection

