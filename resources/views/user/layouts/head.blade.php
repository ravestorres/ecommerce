<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>USER DASHBOARD</title>
  
    <!-- Preload Poppins Font for better performance -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" as="style">
    
    <!-- Custom fonts for this template-->
    <link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
    <!-- Custom styles for this template-->
    <link href="{{asset('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">
    
    <!-- Apply Poppins globally -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        /* Ensure headings in sb-admin-2 template use Poppins */
        .sb-admin-2 h1, 
        .sb-admin-2 h2, 
        .sb-admin-2 h3, 
        .sb-admin-2 h4, 
        .sb-admin-2 h5, 
        .sb-admin-2 h6 {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    
    @stack('styles')
</head>