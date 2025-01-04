@extends('layout.tmp')
@section('title.index')

@section('conntent')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}">
    <title>index</title>
</head>
<body>
    <div class="container-fluid">
    <div class="row mt-4">
        <div class="col-12 position-relative">
            <form method="GET" action="{{ route('index') }}" class="d-flex justify-content-center mb-3">
                @csrf
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="ابحث عن الحرفه او اسم الحرفي" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i> Search
                    </button>
                </div>
            </form>
        
            <!-- Create Button -->
            <div class="text-end mb-3">
                <a href="{{ route('create') }}">
                    <button class="btn btn-secondary btn-sm">إنشاء</button>
                </a>
            </div>
        
                <div class="table-responsive">
                    <table class="table table-bordered table-hover  bottom-0 end-0" style="border-color: #171817;">
                        <thead style="background-color: #6f87c2; color:white" class="text-center">
                            <tr>
                                
                                <th>الاسم</th>
                                <th>المهنة</th>
                                <th>رقم الهاتف</th>
                                {{-- <th>تاريخ  نهاية الاشتراك </th> --}}
                                <th>التحكم</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($craftsmens as $craftsmen)
                                <tr style="background-color: #d5d4e961;">
                                    
                                    <td>{{ $craftsmen->name }}</td>
                                    <td>{{ $craftsmen->Category ? $craftsmen->Category->name : 'غير محدد' }}</td>
                                    {{-- <td>{{ $craftsmen->date ? $craftsmen->date->startDate : 'غير محدد' }}</td> --}}
                                    <td>{{ $craftsmen['phone'] }}</td>
                                    {{-- <td>{{ $craftsmen['EndDate'] }}</td> --}}
                                    <td class="actions">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('show-Craftsmen', [$craftsmen->id]) }}">
                                                <button class="btn btn-secondary btn-sm">عرض</button>
                                            </a>
                                            <a href="{{ route('edit', [$craftsmen->id]) }}">
                                                <button class="btn btn-success btn-sm">تعديل</button>
                                            </a>
                                            <form action="{{ route('destroy', [$craftsmen->id]) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">لا توجد نتائج.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    </div>
@endsection
