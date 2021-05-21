@extends('layouts.app')

@section('content')
@if (session('alert'))
    <div class="alert alert-danger text-center alert-dismissible fade show mt-auto" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" style="top: -4px;" aria-label="Close"></button>
        {{ session('alert') }}
    </div>
@endif
    <header dir="rtl" class="d-flex justify-content-between align-items-center my-5">
        <div class="{{ auth()->user()->darkmode ? "h6 text-dm" : "h6" }}">
المشاريع
        </div>

        <div>
            <a href="/projects/create" class="btn btn-primary px-4" role="button">مشروع جديد</a>
        </div>
    </header>
    
    <section dir="rtl">
        <div dir="rtl" class="row">
        @forelse ($projects as $project)
          <div dir="rtl" class="col-lg-4 col-md-6 col-sm-12  mb-4">
              <div dir="rtl" class="card text-right {{ auth()->user()->darkmode ? "card-dm" : '' }}" style="height: 230px">
                  <div dir="rtl" class="card-body" dir="rtl">
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
                        <a class="{{ auth()->user()->darkmode ? "text-dm" : '' }}" dir="rtl" href="/projects/{{ $project->id }}">{{ $project->title }}</a>
                    </h5>

                    <div class="card-text mt-4">
                        {{  Str::limit($project->description, 120) }}
                    </div>


                </div>
                @include('projects.footer')
              </div>
          </div>
          @empty
          <div class="m-auto align-content-center text-center">
              <p class="{{ auth()->user()->darkmode ? "text-dm" : '' }}">لوحة العمل خالية من المشاريع</p>
              <p class="mt-5">
                  <a href="/projects/create" class="btn btn-primary btn-lg d-inline-flex align-items-center" role="button">أنشئ مشروعاً جديداً الآن</a>
              </p>
          </div>
              
    @endforelse
</div>
    </section>
@endsection
