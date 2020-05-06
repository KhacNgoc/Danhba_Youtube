@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="col-sm-8 col-sm-offset-2 box">
        <div class="head-phone row">
            <h3 style="color: #fff">Phone book</h3>
        </div>
        <div class="body-phone">
            <div class="row search">
                <form action="{{route('timkiem')}}">
                    <label>Search: <input type="text" name="search" id="search"><i class="glyphicon glyphicon-search"></i><input type="submit" value="find"></label>
                </form>
            </div>
            <div class="list-phone">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($con as $c)
                        <tr>
                            <td>{{$c->name_contact}}</td>
                            <td>{{$c->number_phone}}</td>
                            <td>
                                <ul class="handle">
                                    <li><button onclick="window.location.href='{{route('deletecontact', $c->id)}}';" class="btn-danger">Delete</button></li>
                                    <li>|</li>
                                    <li><button type="button" class="btn-info" data-toggle="modal" data-target="#myModal{{$c->id}}">update</button></li>
                                </ul>
                            </td>
                        </tr>
                        <div id="myModal{{$c->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Modal Header</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{!! url('editcontact') !!}" method="post">
                                            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                                            <input type="hidden" value="{{$c->id}}" name="id">
                                            <input value="{{$c->name_contact}}" name="name" type="text" class="form-control" placeholder="Name...">
                                            <br>
                                            <input value="{{$c->number_phone}}" name="tel" type="text" class="form-control" placeholder="Phone...">
                                            <br>
                                            <select id="cat" name="cat">
                                                @foreach($cates as $cat)
                                                <option value="{{$cat->id}}">{{$cat->name_cat}}</option>
                                                @endforeach
                                            </select>
                                            <br><br>
                                            <input type="submit" class="btn btn-primary">
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @endforeach
                        <!-- <tr>
                            <td>Mary</td>
                            <td>850-648-4200</td>
                            <td><ul class="handle">
                                <li><button class="btn-danger">Delete</button></li>
                                <li>|</li>
                                <li><button type="button" class="btn-info" data-toggle="modal" data-target="#myModal">update</button></li>
                            </ul></td>
                        </tr>
                        <tr>
                            <td>July</td>
                            <td>850-648-4200</td>
                            <td><ul class="handle">
                            <li><button class="btn-danger">Delete</button></li>
                            <li>|</li>
                            <li><button type="button" class="btn-info" data-toggle="modal" data-target="#myModal">update</button></li>
                            </ul></td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="add-phone row">
            <form class="col-sm-8 row" action="{!! url('addcontact') !!}" method="post">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                <label>Name: <input type="text" name="name" id="name"></label>
                <label>Tel: <input type="text" name="tel" id="tel"></label>
                <label>Category: </label>
                <select id="cat" name="cat">
                    @foreach($cates as $cat)
                    <option value="{{$cat->id}}">{{$cat->name_cat}}</option>
                    @endforeach
                </select>
                <input type="submit" class="btn-primary" value="Add">
            </form>
        </div>

    </div>
</div>

@endsection()