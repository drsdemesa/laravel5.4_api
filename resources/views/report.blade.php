<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            td,th{
                 padding: 10px;
            }
        </style>
    </head>
    <body>
        <div class=" position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif
    
            <div class="content">
                <div class="title m-b-md">
                    P&L Report
                </div>
                <div id="report-content" style="margin-left:100px;">
                    
                    <table border=1 style="border-collapse: collapse;">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Item</th>
                                <th>Amount</th>
                                <th>Balance</th>
                            </tr>
                        </thead>
                        <?php 
                            $outstanding_bal = 0;
                        ?>
                        <tbody>
                            @foreach ($invoices as $invoice)
                                <?php $outstanding_bal += $invoice->item_amt; // add each invoice?> 
                                <tr>
                                    <td>Invoice</td>
                                    <td>{!! $invoice->item !!}</td>
                                    <td>SGD {!! number_format($invoice->item_amt, 2, '.', ',') !!}</td>
                                    <td>SGD {!! number_format($outstanding_bal, 2, '.', ',') !!}</td>
                                </tr>
                            @endforeach
                            @foreach ($expenditures as $expenditure)
                                <?php $outstanding_bal -= $expenditure->exp_amt; ?>
                                <tr>
                                    <td>Expenditure</td>
                                    <td>{!! $expenditure->exp_item !!}</td>
                                    <td>SGD {!! number_format($expenditure->exp_amt, 2, '.', ',') !!}</td>
                                    <td>SGD {!! number_format($outstanding_bal, 2, '.', ',') !!}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <th colspan="3" style="text-align: left;">Total Balance : </th>
                                <th>SGD {!! number_format($outstanding_bal, 2, '.', ',') !!}</th>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
