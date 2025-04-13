<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
   @yield('title')
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h2>القائمة الجانبية</h2>
        <a href="{{ route('in') }}">الرئيسية</a>
        <a href="{{ route('index') }}">اصحاب الحرف</a>
        <a href="{{ route('index_category') }}">جميع الحرف</a>
        <form class="group-btn" action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn" type="submit">تسجيل الخروج</button> 
        </form>
    </div>

    @yield('conntent')

    <!-- إضافة جافا سكريبت هنا -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
