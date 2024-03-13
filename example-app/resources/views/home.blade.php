@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="" id="fromquestion">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tagged</label>
                        <input type="text" class="form-control" required name="Tagged" id="exampleFormControlInput1" placeholder="example...">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Todate</label>
                        <input type="date" class="form-control" name="Todate" id="exampleFormControlInput2">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Fromdate</label>
                        <input type="date" class="form-control" name="Fromdate" id="exampleFormControlInput3">
                      </div>

                      <button type="submit" class="btn btn-primary">Submit</button>

                    </form>


                </div>

            </div>
                <div id="respuesta"></div>

        </div>


    </div>

</div>

<script>
var lista = "";

$(document).ready(function () {
        $.ajax({
        type: "GET",
        url: "api/questionlist",
        dataType: "json",
        success: function (response) {


            response.forEach(element => {

                console.log("ID: " + element['id'] + ", Tagged: " + element['Tagged'] + " , " + element['Todate'] + " , Fromdate: " + element['Fromdate'])
                    lista += "</br>" + "ID: " + element['id'] + ", Tagged: " + element['Tagged'] + " , " + element['Todate'] + " , Fromdate: " + element['Fromdate'];
                    lista += '&nbsp;&nbsp;<a target="_blank" href="'
                    lista += 'api/question?Tagged='
                    lista += element['Tagged']
                    lista += '&Todate='
                    lista += element['Todate']!=null && element['Todate']!="null" ? element['Todate'] : ""
                    lista += '&Fromdate='
                    lista += element['Fromdate']!=null && element['Fromdate']!="null" ? element['Fromdate'] : ""
                    lista +='" >url</a>'


            });

            $('#respuesta').html(lista);


        }
    });

    $('#fromquestion').submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "GET",
            url: "api/question",
            data: $('#fromquestion').serialize(),
            dataType: "json",
            success: function (response) {


                console.log(response)


            }
        });

         lista = ""
        $.ajax({
            type: "GET",
            url: "api/questionlist",
            dataType: "json",
            success: function (response) {


                response.forEach(element => {


                    console.log("ID: " + element['id'] + ", Tagged: " + element['Tagged'] + " , " + element['Todate'] + " , Fromdate: " + element['Fromdate'])
                    lista += "</br>" + "ID: " + element['id'] + ", Tagged: " + element['Tagged'] + " , " + element['Todate'] + " , Fromdate: " + element['Fromdate'];
                    lista += '&nbsp;&nbsp;<a target="_blank" href="'
                    lista += 'api/question?Tagged='
                    lista += element['Tagged']
                    lista += '&Todate='
                    lista += element['Todate']!=null && element['Todate']!="null" ? element['Todate'] : ""
                    lista += '&Fromdate='
                    lista += element['Fromdate']!=null && element['Fromdate']!="null" ? element['Fromdate'] : ""
                    lista +='" >url</a>'


                });

                $('#respuesta').html(lista);


            }


        });
    });
});

</script>
@endsection
