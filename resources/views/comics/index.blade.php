@extends('layouts.app')

@section('content')
<div class="table-responsive">

    <div class="col-auto ms-auto">
        <a class="btn btn-primary" href="{{ route('comics.create') }}">
          Nuova comics
        </a>
      </div>

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
            <th>
                edit
            </th>
            <th>
                delete
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
                <td><a href="{{route('comics.edit',$comic)}}">edit comic</a></td>
                <td>
                    <form action="{{ route('comics.destroy',$comic) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                  </form>
                </td>
            </tr>

            
        </tbody>
        </table>
    @endforeach
  </div>
  




@endsection