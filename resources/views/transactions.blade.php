@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3 mt-3">
            <form action="{{ route('transaction.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="enter  name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="enter email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="address" placeholder="enter address">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="city" placeholder="enter city">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="token" placeholder="enter token no">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-lg-9">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                Decrypt Data
            </button>
            <br> <br>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">address</th>
                        <th scope="col">city</th>
                        <th scope="col">token no</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($transactions as $amit)
                        <!-- <th scope="row">{{$amit->card_name}} </th> -->
                        <th scope="row">{{ \Illuminate\Support\Str::limit($amit->name, 5) }} </th>
                        <td>{{ \Illuminate\Support\Str::limit($amit->email, 5) }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($amit->address, 5) }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($amit->city, 5) }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($amit->token, 5) }}</td>
                        <td>
                            <a href="{{ route('id_coming',$amit->id)}}" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Decrypt</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="container">
            <div class="row">
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Put your token</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('token')}}" method="get">
                                    @csrf
                                    <input type="text" class="form-control" name="token" placeholder="enter token no">
                                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                </form>
                            </div>
                            <!-- <div class="modal-footer">
                                
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection