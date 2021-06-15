

$('#form1').submit(function (e){
    e.preventDefault();

    let u_base = $('#base').val();
    let u_to = $('#to').val();
    let u_value = $('#value').val();

    //pega o schema, dominio e porta, já que pode variar de sistema pra sistema
    let domain = (window.location.origin);

    //faz requisição pra api
    $.ajax({
        url: domain+'/api/converter/?base='+u_base+'&to='+u_to+'&value='+u_value,
        method: 'GET',
    }).done(function (result){
        if(result.status === 'success') {
            $('.result').text('Resultado: ' + result['data'].value);
        }
        else{
            $('.result').text(result['data']);
        }
    });



})
