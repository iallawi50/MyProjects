@extends('layouts.app')

@section('title', 'تعديل المشروع ')

@section('content')
    <div class="row justify-content-center text-right">
        <div class="col-8">
            <div class="card p-4 {{ auth()->user()->darkmode ? "card-dm" : '' }}">
                <h1 class="text-center pb-5 font-weight-bold" id="title">
                    تعديل المشروع
                </h1>
                
                <form action="/projects/{{$project->id}}" method="POST" dir="rtl">
                    @include('projects.form')
                    @method('PATCH')
                    <div class="form-group d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-primary">حفظ</button>
                        <a href="/projects/{{ $project->id}}" class="btn btn-light">إلغاء</a>
                    </div>
                    
                    
                </form>
            </div>
        </div>
    </div>
@endsection