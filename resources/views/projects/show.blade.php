@extends('layouts.app')
@section('title', $project->title)
@section('content')
<header dir="rtl" class="d-flex justify-content-between align-items-center my-5">
    <div class="h6 {{ auth()->user()->darkmode ? "text-dm" : "h6" }}">
        <a href="/home" class="{{ auth()->user()->darkmode ? "h6 text-dm" : "" }}">المشاريع</a> / {{$project->title}}
    </div>

    <div>
        <a href="/projects/{{$project->id}}/edit" class="btn btn-primary px-4" role="button">تعديل المشروع</a>
    </div>
</header>
{{-- INFO OF TASK --}}
<section dir="rtl">
    <div class="row">
      <div class="col-lg-4 mb-4">
          <div class="card text-right {{ auth()->user()->darkmode ? "card-dm" : '' }}" dir="rtl">
              <div class="card-body" dir="rtl">
                  @switch($project->status)
                  @case(1)
                  <span class="text-success">مكتمل</span>
                  @break

                  @case(2)
                  <span class="text-danger">ملغي</span>
                  @break

                  @default
                  <span class="text-warning">قيد الإنجاز</span>
                  @endswitch
                  <h5 class="font-weight-bold card-title">
                    <p class="{{ auth()->user()->darkmode ? "text-dm" : '' }}" href="/projects/{{ $project->id }}">{{ $project->title }}</p>
                </h5>

                <div class="card-text mt-4">
                    {{  $project->description }}
                </div>

                <br>


            </div>
            @include('projects.footer')
          </div>
          {{-- TASK STATUS --}}
          <div class="card mt-4 {{ auth()->user()->darkmode ? "card-dm" : '' }}">
            <div class="card-body">
                
                <h5 class="card-title text-right font-weight-bold">
                    تغيير حالة المشروع
                </h5>
                
                <form action="/projects/{{ $project->id }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <select name="status" class="custom-select {{ auth()->user()->darkmode ? "custom-select-dm" : '' }}" onchange="this.form.submit()">
                        <option value="0" {{($project->status == 0) ? 'selected' : ""}}>قيد الإنجاز</option>
                        <option value="1" {{($project->status == 1) ? 'selected' : "" }}>مكتمل</option>
                        <option value="2" {{($project->status == 2) ? 'selected' : ""}}>ملغي</option>
                    </select>
                </form>

            </div>
        </div>
      </div>


    <div class="col-lg-8">
        @foreach ($project->tasks as $task)
            <div class="card d-flex flex-row text-right mt-3 p-4 align-items-center {{$task->done ? "checked" : "" }} {{ auth()->user()->darkmode ? "card-dm" : '' }}">
                {{ $task->body }}
            

            <div class="mr-auto">
                <form action="/projects/{{$project->id}}/tasks/{{$task->id}}" method="post">
                    @csrf
                    @method('PATCH')
                    <input type="checkbox" class="p-2 ml-2"  name="done" {{$task->done ? 'checked' : ""}} onclick="this.form.submit()">
                </form>
            </div>
                <div class="d-flex align-items-center">
                    <form action="/projects/{{$project->id}}/tasks/{{$task->id}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn mt-1" srt="" style="
                        color: rgb(160, 0, 0);
                    ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" data-darkreader-inline-fill="" style="--darkreader-inline-fill:currentColor;">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                    </svg>
                                  </button>
                    </form>
                </div>

        </div>
        @endforeach

<div class="card mt-4 {{ auth()->user()->darkmode ? "card-dm" : '' }}">
    <form action="/projects/{{$project->id}}/tasks" method="POST" class="d-flex p-3">
        @csrf
        
        
        <input type="text" name="body" class="form-control {{ auth()->user()->darkmode ? "form-control-dm" : ""}} p-2 ml-2 m-auto border-0" placeholder="اضف مهمة جديدة">
        <div class="form-group content-justify-center text-right m-auto">
            <button type="submit" class="btn btn-primary text-right mr-2">إضافة</button>
        </div>
    </form>
</div> 
</div>
</div>


@endsection