@extends('layout.tmp')


@section('conntent')
<div class="container mt-4">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Index</title>

    <!-- Search Form -->
    <form method="GET" action="{{ route('index') }}" class="d-flex justify-content-center mb-4">
        @csrf
        <div class="input-group" style="width: 60%;">
            <input type="text" name="search" class="form-control" placeholder="ابحث عن الحرفه أو اسم الحرفي" value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search"></i> Search
            </button>
        </div>
    </form>

    <!-- Create Button -->
    <div class="text-end mb-4">
        <a href="{{ route('create_category') }}">
            <button class="btn btn-success btn-sm">إنشاء</button>
        </a>
    </div>

    <!-- Table -->
    <table class="table table-bordered table-hover text-center" style="width: 100%; margin: 0 auto; border-color: black;">
        <thead style="background-color: #6f87c2; color: white; border-color: black;">
            <tr>
                <th style="width: 80%; border: 2px solid black;">التحكم</th>
                <th style="width: 20%; border: 2px solid black;">المهنه</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($allCat as $all)
                <tr style="border: 2px solid black;">
                    
                    <td style="border: 2px solid black;">
                        <a href="{{ route('category.show', [$all->id]) }}">
                            <button class="btn btn-success">عرض</button>
                        </a>
                    </td>
                    <td style="font-size: 20px; border: 2px solid black;">{{ $all['name'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="text-center text-muted" style="border: 2px solid black;">لا توجد نتائج.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
