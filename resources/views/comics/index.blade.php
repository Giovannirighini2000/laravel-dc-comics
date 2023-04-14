@extends('layouts.app')

@section('content')
<div class="table-responsive">
    
    @foreach ($comics as $comic)
        <table class="table align-middle">
        <thead>
            <th scope="col">
                title 
            </th>
            <th scope="col">
                img
            </th>
            <th scope="col">
                type
            </th>
            <th scope="col">
                serie
            </th>
            <th scope="col">
                sale date
            </th>
            <th scope="col">
                description
            </th>
            <th scope="col">
                price
            </th>
            <th>
                link 
            </th>
            
        </thead>
        
        <tbody>
            
            <tr  class="align-bottom">
                <td class="align-top">{{$comic->title}}</td>
                 <td class="align-top"><img width="100px" src="{{$comic->thumb}}" alt=""></td>  
                <td class="align-top">{{$comic->type}}</td>
                <td class="align-top">{{$comic->series}}</td>
                <td class="align-top">{{$comic->sale_date}}</td>
                <td class="align-top">{{$comic->description}}</td>
                <td class="align-top">{{$comic->price}}</td>
                <td><a href="{{route('comics.show',$comic->id)}}">link comic</a></td> 
            </tr>

            
        </tbody>
        </table>
    @endforeach
  </div>




@endsection