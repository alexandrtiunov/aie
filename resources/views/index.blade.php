<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Учёт личных доходов и расходов</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ URL::to('css\main.css') }}" rel="stylesheet">

</head>
<body>
<div id="wrapper">
    <div id="header">
        <div id="date-form">
            <h5>Выбрать период</h5>
            <form action="{{action('IndexController@store')}}" method="post">
                {{csrf_field()}}
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    с <input type="date" name="start_date" value="{{$start}}">
                </div>
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    по <input type="date" name="end_date" value="{{$end}}">
                </div>
                <div class="form-group col-md-4">
                    <td>
                        <input type="submit" value="Отобрать" class="btn btn-primary" style="margin-left:0px">
                    </td>
                    <td>
                        <a href="{{action('IndexController@index')}}" class="btn btn-default">Сбросить</a></td>
                    </td>
                </div>
            </form>
        </div>
    </div>
    @if (\Session::has('error'))
        <div class="alert alert-danger">
            <p>{{ \Session::get('error') }}</p>
        </div><br/>
    @endif
    <div id="totals">
        <table class="table table-striped">
            <h5>Итог за период</h5>
            <tr>
                <th>Приход: {{$income}} грн.</th>
            </tr>
            <tr>
                <th>Расход: {{$expenditure}} грн.</th>
            </tr>
            <tr>
                <th>Итого: {{$total}} грн.</th>
            </tr>
        </table>
    </div>
    <div id="list">
        <div class="new_operation">
            <td>
                <a href="{{action('Operations\OperationController@create')}}" class="btn btn-primary">Добавить
                транзакцию</a>
            </td>
            <td>
                <a href="{{action('WalletController@createIncome')}}" class="btn btn-primary">Добавить
                    приход</a>
            </td>
            <td>
                <a href="{{action('WalletController@createWallet')}}" class="btn btn-primary">Добавить
                    кошелёк</a>
            </td>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Описание</th>
                <th>Дата</th>
                <th>Сумма (грн.)</th>
                <th>Категория</th>
                <th>Член семьи</th>
                <th>Сумма($)</th>
                <th>Курс</th>
                <th>Примечание</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($operations as $operation)
                <tr>
                    <td>{{$operation->product->name}}</td>
                    <td>{{$operation->created_at}}</td>
                    <td>{{$operation->value_UAH}}</td>
                    <td>{{$operation->category->title}}</td>
                    <td>{{$operation->user->name}}</td>
                    <td>{{$operation->value_USD}}</td>
                    <td>{{$operation->currency}}</td>
                    <td>{{$operation->note}}</td>
                    <td>
                        <a href="{{action('Operations\OperationController@edit', $operation->id)}}" class="settings" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>

                        <form  action="{{action('Operations\OperationController@destroy', $operation->id)}}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="delete" title="Удалить" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>
</body>
</html>