<link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/font-awesome.min.css') }}">
<!-- FontAwesome 5 for modern icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset('dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/duotone-dark.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/iziToast.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/fontawesome-iconpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/bootstrap4-toggle.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/components.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/spacing.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">

<!-- Simple Admin Global Styles -->
<style>
/* Global Simple Admin Styles */
body {
    font-family: 'Source Sans Pro', sans-serif;
    background-color: #f4f6f9;
}

.main-content {
    background-color: #f4f6f9;
}

.section-header {
    background: white;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 25px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    border: none;
}

.section-header h1 {
    color: #333;
    font-weight: 600;
    margin: 0;
    font-size: 1.5rem;
}

.card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    margin-bottom: 20px;
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
}

.card-header {
    background: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
    border-radius: 10px 10px 0 0;
    padding: 15px 20px;
}

.card-header h4 {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 600;
    color: #333;
}

.btn {
    border-radius: 6px;
    font-weight: 500;
    padding: 8px 16px;
    transition: all 0.3s ease;
}

.btn-primary {
    background: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    background: #0056b3;
    border-color: #0056b3;
    transform: translateY(-1px);
}

.btn-success {
    background: #28a745;
    border-color: #28a745;
}

.btn-success:hover {
    background: #1e7e34;
    border-color: #1e7e34;
    transform: translateY(-1px);
}

.btn-danger {
    background: #dc3545;
    border-color: #dc3545;
}

.btn-danger:hover {
    background: #c82333;
    border-color: #c82333;
    transform: translateY(-1px);
}

.btn-warning {
    background: #ffc107;
    border-color: #ffc107;
    color: #212529;
}

.btn-warning:hover {
    background: #e0a800;
    border-color: #e0a800;
    color: #212529;
    transform: translateY(-1px);
}

.btn-info {
    background: #17a2b8;
    border-color: #17a2b8;
}

.btn-info:hover {
    background: #138496;
    border-color: #138496;
    transform: translateY(-1px);
}

.table {
    background: white;
    border-radius: 8px;
    overflow: hidden;
}

.table th {
    background: #f8f9fa;
    border-top: none;
    font-weight: 600;
    color: #333;
    font-size: 0.9rem;
    padding: 12px 15px;
}

.table td {
    padding: 12px 15px;
    vertical-align: middle;
    border-top: 1px solid #f1f3f4;
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: #f9f9f9;
}

.badge {
    font-size: 0.75rem;
    padding: 0.35rem 0.65rem;
    border-radius: 4px;
    font-weight: 500;
}

.form-control {
    border: 1px solid #ddd;
    border-radius: 6px;
    padding: 10px 12px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.form-group label {
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
}

/* Sidebar Enhancements */
.main-sidebar .sidebar-menu li a {
    transition: all 0.3s ease;
}

.main-sidebar .sidebar-menu li a:hover {
    background: rgba(255, 255, 255, 0.1);
}

/* Responsive */
@media (max-width: 768px) {
    .section-header {
        padding: 15px;
        margin-bottom: 20px;
    }
    
    .section-header h1 {
        font-size: 1.3rem;
    }
    
    .card-header {
        padding: 12px 15px;
    }
    
    .table-responsive {
        border-radius: 8px;
    }
}

/* Loading States */
.loading {
    opacity: 0.6;
    pointer-events: none;
}

/* Success/Error Messages */
.alert {
    border: none;
    border-radius: 8px;
    padding: 12px 16px;
}

.alert-success {
    background: #d4edda;
    color: #155724;
    border-left: 4px solid #28a745;
}

.alert-danger {
    background: #f8d7da;
    color: #721c24;
    border-left: 4px solid #dc3545;
}

.alert-warning {
    background: #fff3cd;
    color: #856404;
    border-left: 4px solid #ffc107;
}

.alert-info {
    background: #d1ecf1;
    color: #0c5460;
    border-left: 4px solid #17a2b8;
}
</style>