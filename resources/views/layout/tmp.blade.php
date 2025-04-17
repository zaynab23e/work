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
        <a href="{{ route('customers.index') }}">العملاء</a> 
        <form action="{{ route('logout') }}" method="POST" style="display: block; margin: 10px 0;">
            @csrf
            <button type="submit" style="width: 100%; text-decoration: none; color: white; padding: 12px 18px; background-color: #525293; border-radius: 5px; text-align: center; border: none; cursor: pointer; font-family: inherit; font-size: inherit; display: none;">تسجيل الخروج</button>
        </form>
    </div>

    @yield('conntent')

    <!-- إضافة جافا سكريبت هنا -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
    // إضافة سكريبت لإظهار زر تسجيل الخروج عند التحويم على القائمة
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const logoutBtn = sidebar.querySelector('form button');
        
        sidebar.addEventListener('mouseenter', function() {
            logoutBtn.style.display = 'block';
        });
        
        sidebar.addEventListener('mouseleave', function() {
            logoutBtn.style.display = 'none';
        });
        
        // إضافة تأثير التحويم على زر تسجيل الخروج
        logoutBtn.addEventListener('mouseenter', function() {
            this.style.backgroundColor = '#9b9adb';
        });
        
        logoutBtn.addEventListener('mouseleave', function() {
            this.style.backgroundColor = '#525293';
        });
    });
    </script>
</body>
</html>